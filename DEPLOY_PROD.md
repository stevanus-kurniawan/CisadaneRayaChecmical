# Production Deployment Guide — Cisadane Raya Chemical (Single Server)

Deploy the app to **production** on **one server**: PostgreSQL + Laravel app + Nginx run together using the full `docker-compose.yml`.

This guide includes everything needed on a **new** server: OS update, Docker, Docker Compose, Git, then deploy.

---

## What runs on the server

- **PostgreSQL** (database)
- **Laravel app** (PHP-FPM)
- **Nginx** (web, port 80 or your choice)

All in Docker on a single host.

---

## Part 1: Server and OS

Use a **Ubuntu 22.04 LTS** (or 20.04) or **Debian 12** server with SSH access and a public IP or domain.

(For RHEL/CentOS/Rocky, see the alternative install section at the end.)

---

## Part 2: Install Docker and Docker Compose (Ubuntu/Debian)

Run as a user with `sudo`.

### 2.1 Update system and install basics

```bash
sudo apt-get update
sudo apt-get install -y ca-certificates curl gnupg lsb-release
```

### 2.2 Add Docker’s official GPG key and repo

```bash
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg

echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

**On Debian** (instead of the last line above):

```bash
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

### 2.3 Install Docker Engine and Compose plugin

```bash
sudo apt-get update
sudo apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

### 2.4 Install Git

```bash
sudo apt-get install -y git
```

### 2.5 Allow your user to run Docker (no sudo)

```bash
sudo usermod -aG docker $USER
```

Log out and log back in (or run `newgrp docker`) so the group change applies.

### 2.6 Check installation

```bash
docker --version
docker compose version
git --version
```

---

## Part 3: Clone the project

```bash
sudo mkdir -p /opt/CisadaneRayaChecmical
sudo chown $USER:$USER /opt/CisadaneRayaChecmical
cd /opt/CisadaneRayaChecmical

git clone <your-repo-url> .
# Example: git clone https://github.com/your-org/CisadaneRayaChecmical.git .
```

Then:

```bash
cd /opt/CisadaneRayaChecmical/frontend
```

---

## Part 4: Configure production environment

### 4.1 Create `.env` from example

```bash
cp .env.example .env
nano .env
```

### 4.2 Set production values

Use a **strong** `DB_PASSWORD` and a real `APP_KEY` (see below).

```env
APP_NAME="Cisadane Raya Chemical CMS"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
APP_ASSET_VERSION=1
APP_HTTP_PORT=80

LOG_CHANNEL=stack
LOG_LEVEL=warning

DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=greenresource
DB_USERNAME=postgres
DB_PASSWORD=your_strong_production_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

**Important:**

- `APP_ENV=production` and `APP_DEBUG=false`
- `APP_URL` = your real site URL (e.g. `https://your-domain.com`)
- `DB_HOST=postgres` (Docker service name; do not change)
- `DB_PORT=5432` (internal; do not change)
- `DB_PASSWORD` = strong password (used by both Postgres and Laravel)
- `APP_HTTP_PORT=80` so the app is on port 80 (or use another port if something else uses 80)

### 4.3 Generate `APP_KEY`

```bash
# From the frontend directory, run key generation inside a temporary container
docker compose run --rm app php artisan key:generate --force
```

Copy the printed `APP_KEY=base64:...` into `.env` (replace the empty `APP_KEY=` line), or leave it and let the entrypoint generate it on first start (then copy from `.env` after first run if needed).

---

## Part 5: Build and start all services

From `/opt/CisadaneRayaChecmical/frontend`:

```bash
docker compose up -d --build
```

Check that all containers are up:

```bash
docker compose ps
docker compose logs -f app
```

Wait until you see **PostgreSQL is up** and **ready to handle connections**, then press Ctrl+C.

---

## Part 6: First-time Laravel setup

Still in `frontend/`:

```bash
docker compose exec app php artisan migrate --force
docker compose exec app php artisan db:seed --class=AdminUserSeeder --force
docker compose exec app php artisan storage:link
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache
```

---

## Part 7: Open firewall (if enabled)

Allow HTTP (and HTTPS if you use it later):

```bash
# ufw (Ubuntu/Debian)
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw allow 22/tcp
sudo ufw enable
sudo ufw status
```

---

## Part 8: Verify

- In browser: **http://YOUR_SERVER_IP** or **http://your-domain.com** (if DNS points to the server).
- Admin: **http://YOUR_SERVER_IP/admin/login** (or `/admin/login` on your domain).
- Default admin (change after first login): see your project’s admin seeder (e.g. email and password in seed or docs).

---

## Part 9: Optional — HTTPS (reverse proxy)

To serve over HTTPS:

1. Install Nginx or Caddy on the **host** (not in Docker).
2. Get a certificate (e.g. Let’s Encrypt with `certbot`).
3. Configure the host Nginx/Caddy to:
   - Listen on 443 (HTTPS) and optionally 80 (redirect to HTTPS).
   - Proxy to `http://127.0.0.1:80` (where the app’s Nginx container is mapped when `APP_HTTP_PORT=80`).

Keep `APP_HTTP_PORT=80` and set `APP_URL=https://your-domain.com` in `.env`.

---

## Part 10: After each production deploy

After you pull new code or change assets:

1. Bump **`APP_ASSET_VERSION`** in `.env` (e.g. `2` or a date).
2. Rebuild/restart and refresh caches:

```bash
cd /opt/CisadaneRayaChecmical/frontend
git pull origin main

docker compose exec app php artisan view:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache

docker compose restart app
```

If you changed code or Dockerfile:

```bash
docker compose up -d --build
```

---

## Summary checklist (single server)

| Step | Action |
|------|--------|
| 1 | SSH into the new server |
| 2 | Update system, install Docker, Docker Compose plugin, Git (§2) |
| 3 | Add user to `docker` group and re-login |
| 4 | Clone repo into `/opt/CisadaneRayaChecmical`, `cd frontend` (§3) |
| 5 | Copy `.env.example` to `.env`, set production values and `DB_PASSWORD` (§4) |
| 6 | Generate `APP_KEY` and put it in `.env` (§4.3) |
| 7 | Run `docker compose up -d --build` (§5) |
| 8 | Run migrate, seed, storage:link, config/route/view cache (§6) |
| 9 | Open port 80 (and 443 if using HTTPS) in firewall (§7) |
| 10 | Test site and admin; change default admin password (§8) |

---

## Security (production)

- Use a **strong** `DB_PASSWORD` and keep it secret.
- Keep `APP_DEBUG=false` and `APP_ENV=production`.
- Use **HTTPS** in production (reverse proxy with SSL).
- Change the default admin password after first login.
- Keep the OS and Docker images updated.

---

## Alternative: Install Docker on RHEL/CentOS/Rocky

```bash
sudo yum install -y yum-utils
sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
sudo yum install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
sudo systemctl enable docker
sudo systemctl start docker
sudo usermod -aG docker $USER
# Install Git if needed: sudo yum install -y git
```

Then log out and back in, and continue from **Part 3: Clone the project**.
