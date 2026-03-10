# Step-by-step deployment (start → deployed)

Follow these steps in order on a **single server** (Ubuntu 22.04 / Debian 12). Replace placeholders with your values.

---

## Before you start

- SSH access to the server (user with `sudo`)
- Your Git repo URL (e.g. `https://github.com/your-org/CisadaneRayaChecmical.git`)
- Your site URL (e.g. `https://your-domain.com`) and a strong password for the database

---

### Step 1 — SSH into the server

```bash
ssh your-user@YOUR_SERVER_IP
```

---

### Step 2 — Update system and install prerequisites

```bash
sudo apt-get update
sudo apt-get install -y ca-certificates curl gnupg lsb-release
```

---

### Step 3 — Add Docker repository

```bash
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

**If the server is Debian** (not Ubuntu), use this instead of the last line above:

```bash
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

---

### Step 4 — Install Docker, Docker Compose, and Git

```bash
sudo apt-get update
sudo apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin git
```

---

### Step 5 — Add your user to the docker group

```bash
sudo usermod -aG docker $USER
```

Then **log out and log back in** (or run `newgrp docker`) so Docker works without `sudo`.

---

### Step 6 — Verify Docker and Git

```bash
docker --version
docker compose version
git --version
```

You should see version numbers for all three.

---

### Step 7 — Create app directory and clone the repo

```bash
sudo mkdir -p /opt/CisadaneRayaChecmical
sudo chown $USER:$USER /opt/CisadaneRayaChecmical
cd /opt/CisadaneRayaChecmical
git clone YOUR_REPO_URL .
```

Example:

```bash
git clone https://github.com/stevanus-kurniawan/CisadaneRayaChecmical.git .
```

---

### Step 8 — Go to the frontend folder

```bash
cd /opt/CisadaneRayaChecmical/frontend
```

---

### Step 9 — Create `.env` from example

```bash
cp .env.example .env
```

---

### Step 10 — Edit `.env` with production values

```bash
nano .env
```

Set at least these (replace placeholders):

| Variable | Example value |
|----------|----------------|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://your-domain.com` or `http://YOUR_SERVER_IP` |
| `APP_HTTP_PORT` | `80` |
| `DB_PASSWORD` | Your strong database password (e.g. long random string) |

Leave `DB_HOST=postgres` and `DB_PORT=5432` as they are. Save and exit (Ctrl+O, Enter, Ctrl+X in nano).

---

### Step 11 — Generate application key

```bash
docker compose run --rm app php artisan key:generate --force
```

Copy the line that looks like `APP_KEY=base64:...` from the output. Open `.env` again and paste it (replace any existing `APP_KEY=` line):

```bash
nano .env
```

Save and exit.

---

### Step 12 — Build and start all containers

```bash
docker compose up -d --build
```

Wait for the build to finish (can take a few minutes the first time).

---

### Step 13 — Check that containers are running

```bash
docker compose ps
```

You should see three containers: **postgres**, **app**, and **nginx**, all **Up**.

---

### Step 14 — Wait for the app to be ready (optional check)

```bash
docker compose logs -f app
```

Wait until you see **PostgreSQL is up** and **ready to handle connections**. Press Ctrl+C to stop following logs.

---

### Step 15 — Run database migrations

```bash
docker compose exec app php artisan migrate --force
```

Confirm with `yes` if prompted.

---

### Step 16 — Seed admin user (optional)

```bash
docker compose exec app php artisan db:seed --class=AdminUserSeeder --force
```

---

### Step 17 — Create storage link

```bash
docker compose exec app php artisan storage:link
```

---

### Step 18 — Cache config, routes, and views (production)

```bash
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache
```

---

### Step 19 — Open HTTP port in firewall (if ufw is enabled)

```bash
sudo ufw allow 80/tcp
sudo ufw allow 22/tcp
sudo ufw --force enable
sudo ufw status
```

If you don’t use ufw, skip this step or open port 80 in your cloud/network firewall.

---

### Step 20 — Verify the site in the browser

Open in a browser:

- **http://YOUR_SERVER_IP**  
  or  
- **http://your-domain.com** (if DNS already points to the server)

You should see the Cisadane Raya Chemical site.

---

### Step 21 — Verify admin (optional)

Open:

- **http://YOUR_SERVER_IP/admin/login**  
  or  
- **http://your-domain.com/admin/login**

Log in with the admin credentials from your project (e.g. from the AdminUserSeeder). **Change the default password** after first login.

---

## Deployed

At this point the app is deployed and running. Summary:

- **PostgreSQL** and **Laravel + Nginx** run in Docker on one server.
- **Site:** `http://YOUR_SERVER_IP` or your domain.
- **Admin:** `http://YOUR_SERVER_IP/admin/login` or your domain + `/admin/login`.

---

## After future deploys (when you update code)

From the server:

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

Optionally bump `APP_ASSET_VERSION` in `.env` (e.g. set to `2`) so users get new CSS/JS without cache.
