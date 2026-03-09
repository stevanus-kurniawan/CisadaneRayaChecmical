# Dev Deployment Guide — Cisadane Raya Chemical

Deploy the app to the dev environment with:
- **Frontend server (172.28.92.56):** Laravel app (Nginx + PHP-FPM)
- **Backend server (172.28.92.57):** PostgreSQL database

Ports are left as placeholders; replace them when you have the final values.

---

## Prerequisites (both servers)

- Docker and Docker Compose installed
- Git (to clone/pull the repo)
- SSH access to both servers
- Network: frontend server must be able to reach backend on the DB port (e.g. 5432 or your chosen port)

---

## Part 1: Backend server (172.28.92.57) — Database

### 1.1 Prepare the server

```bash
# SSH into backend server
ssh user@172.28.92.57

# Ensure Docker is installed
docker --version
docker compose version
```

### 1.2 Clone/pull the project (or copy only backend compose)

```bash
# Option A: Full repo (recommended)
git clone <your-repo-url> /opt/crc-app
cd /opt/crc-app/frontend

# Option B: Only copy these files to 172.28.92.57 (e.g. /opt/crc-db):
# - frontend/docker-compose.backend.yml
# - frontend/.env.backend.example (copy to .env.backend)
```

### 1.3 Configure environment

```bash
cd /opt/crc-app/frontend   # or the folder where you copied the backend files

# Create .env for backend (DB only)
cp .env.backend.example .env.backend
# Edit and set:
# - DB_PASSWORD (strong password for dev)
# - DB_PORT (host port, e.g. 5432) — replace when you have the final port
nano .env.backend
```

### 1.4 Start PostgreSQL

**Important:** Backend compose reads variables from **`.env.backend`** only when you pass `--env-file .env.backend`. Without it, `DB_PASSWORD` is blank and Postgres may start with an empty password.

```bash
# Always use --env-file .env.backend for every backend compose command
docker compose -f docker-compose.backend.yml --env-file .env.backend up -d

# Check container and health (must use same --env-file)
docker compose -f docker-compose.backend.yml --env-file .env.backend ps
docker compose -f docker-compose.backend.yml --env-file .env.backend logs -f postgres
```

### 1.5 Open firewall (if applicable)

Allow the **frontend server IP (172.28.92.56)** to connect to the DB port **5002**:

```bash
# Example for firewalld (RHEL/CentOS)
sudo firewall-cmd --permanent --add-rich-rule='rule family="ipv4" source address="172.28.92.56" port port="5002" protocol="tcp" accept'
sudo firewall-cmd --reload

# Or ufw (Ubuntu)
sudo ufw allow from 172.28.92.56 to any port 5002
sudo ufw reload
```

### 1.6 Note for frontend

- **DB host for frontend:** `172.28.92.57`
- **DB port:** `5002` (value of `DB_PORT` in `.env.backend`)
- **DB name:** `greenresource` (or value from `.env.backend`)
- **DB user / password:** same as in `.env.backend`

---

## Part 2: Frontend server (172.28.92.56) — Laravel app

### 2.1 Prepare the server

```bash
# SSH into frontend server
ssh user@172.28.92.56

docker --version
docker compose version
```

### 2.2 Clone the project

```bash
git clone <your-repo-url> /opt/crc-app
cd /opt/crc-app/frontend
```

### 2.3 Configure environment

```bash
cp .env.example .env

# Edit .env for dev (point to backend server DB)
nano .env
```

Set at least:

```env
APP_ENV=development
APP_DEBUG=true
APP_URL=http://172.28.92.56:8010

DB_CONNECTION=pgsql
DB_HOST=172.28.92.57
DB_PORT=5002
DB_DATABASE=greenresource
DB_USERNAME=postgres
DB_PASSWORD=<same-as-backend-.env.backend>
```

Generate app key:

```bash
# If you have PHP locally on the server:
php artisan key:generate

# Or run inside container after first compose up:
docker compose -f docker-compose.frontend.yml exec app php artisan key:generate
```

### 2.4 Build and run (frontend-only stack)

```bash
cd /opt/crc-app/frontend

# Build image and start Nginx + app (no local DB)
docker compose -f docker-compose.frontend.yml up -d --build
```

### 2.5 HTTP port

Frontend is configured to listen on **port 8010**. To override, set `APP_HTTP_PORT` in `.env` or change the port in `docker-compose.frontend.yml`.

### 2.6 First-time Laravel setup inside app container

```bash
# Run migrations (DB is on 172.28.92.57)
docker compose -f docker-compose.frontend.yml exec app php artisan migrate --force

# Optional: seed admin user
docker compose -f docker-compose.frontend.yml exec app php artisan db:seed --class=AdminUserSeeder --force

# Storage link
docker compose -f docker-compose.frontend.yml exec app php artisan storage:link

# Cache clear (optional)
docker compose -f docker-compose.frontend.yml exec app php artisan config:clear
```

### 2.7 Verify

- Open: `http://172.28.92.56:8010`
- Admin (if seeded): `http://172.28.92.56:8010/admin/login`

---

## Part 3: Summary checklist

| Step | Server        | Action |
|------|---------------|--------|
| 1    | 172.28.92.57  | Install Docker (if needed), clone/copy repo |
| 2    | 172.28.92.57  | Configure `.env.backend`, start `docker-compose.backend.yml` |
| 3    | 172.28.92.57  | Open firewall for 172.28.92.56 → DB port |
| 4    | 172.28.92.56  | Install Docker (if needed), clone repo, `cd frontend` |
| 5    | 172.28.92.56  | Copy `.env.example` to `.env`, set `DB_*` to backend (172.28.92.57) |
| 6    | 172.28.92.56  | Run `up -d --build` (HTTP port 8010 is already set) |
| 7    | 172.28.92.56  | Run `migrate`, optional `db:seed`, `storage:link` |
| 8    | -             | Test in browser: `http://172.28.92.56:8010` |

---

## Ports

| Service   | Server        | Variable / Location        | Value |
|----------|---------------|-----------------------------|-------|
| HTTP     | 172.28.92.56  | `APP_HTTP_PORT` / nginx in `docker-compose.frontend.yml` | 8010 |
| PostgreSQL | 172.28.92.57 | `DB_PORT` in `.env.backend` and in backend compose | 5002 |

---

## Troubleshooting

### 502 Bad Gateway (http://172.28.92.56:8010/)

**Cause:** Nginx is running but cannot reach the PHP-FPM app container. Usually the **app container never finishes starting** because it waits for PostgreSQL; if the DB is unreachable, PHP-FPM never starts and Nginx returns 502.

**Steps to fix:**

1. **On the frontend server (172.28.92.56), check app container logs:**
   ```bash
   cd /opt/crc-app/frontend   # or your app path
   docker compose -f docker-compose.frontend.yml logs app
   ```
   - If you see **"PostgreSQL is unavailable - sleeping"** or **"Could not connect to PostgreSQL at ..."** → the app cannot reach the DB. Go to step 2.
   - If you see **"PostgreSQL is up"** but still 502 → check that the app container is running: `docker compose -f docker-compose.frontend.yml ps`.

2. **Ensure PostgreSQL is running on the backend server (172.28.92.57):**
   ```bash
   ssh user@172.28.92.57
   cd /opt/crc-app/frontend
   docker compose -f docker-compose.backend.yml ps
   # postgres should be "Up" and healthy
   ```

3. **Ensure firewall on 172.28.92.57 allows the frontend server to the DB port (5002):**
   ```bash
   # On 172.28.92.57 (firewalld)
   sudo firewall-cmd --list-all
   # Or (ufw): sudo ufw status
   # Allow: 172.28.92.56 → port 5002 (see Part 1.5 in this doc)
   ```

4. **Test DB connectivity from the frontend server:**
   ```bash
   # On 172.28.92.56
   nc -zv 172.28.92.57 5002
   # or: telnet 172.28.92.57 5002
   ```
   If this fails, fix firewall or network so 172.28.92.56 can reach 172.28.92.57:5002.

5. **Confirm frontend .env has the correct DB settings:**
   ```bash
   # On 172.28.92.56, in frontend/.env
   DB_HOST=172.28.92.57
   DB_PORT=5002
   DB_DATABASE=greenresource
   DB_USERNAME=postgres
   DB_PASSWORD=<same as on backend .env.backend>
   ```

6. **Restart the frontend stack after fixing DB/firewall:**
   ```bash
   docker compose -f docker-compose.frontend.yml down
   docker compose -f docker-compose.frontend.yml up -d
   docker compose -f docker-compose.frontend.yml logs -f app
   ```
   Wait until you see "PostgreSQL is up", then try http://172.28.92.56:8010/ again.

---

- **Frontend cannot connect to DB:**  
  Check firewall on 172.28.92.57 allows 172.28.92.56 to port **5002**; confirm `DB_HOST=172.28.92.57` and `DB_PORT=5002` in frontend `.env`.

- **502 after fixing DB:**  
  Ensure the app container is running: `docker compose -f docker-compose.frontend.yml ps`. If the app container exits, `logs app` will show the error (e.g. DB timeout). The entrypoint now fails after 60s with a clear message if DB is unreachable.

- **Permission errors (storage/bootstrap):**  
  `docker compose -f docker-compose.frontend.yml exec app chown -R www-data:www-data storage bootstrap/cache`

- **Clear Laravel caches:**  
  `docker compose -f docker-compose.frontend.yml exec app php artisan config:clear && php artisan cache:clear`

---

## Optional: Using a single docker-compose on each server

- On **172.28.92.57** use only `docker-compose.backend.yml` (no frontend).
- On **172.28.92.56** use only `docker-compose.frontend.yml` (no local Postgres; `.env` points to 172.28.92.57).

This keeps DB and app on separate servers as required.
