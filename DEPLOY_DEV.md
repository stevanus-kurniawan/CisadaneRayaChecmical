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

```bash
# Use the backend-only compose file
docker compose -f docker-compose.backend.yml --env-file .env.backend up -d

# Check container and health
docker compose -f docker-compose.backend.yml ps
docker compose -f docker-compose.backend.yml logs -f postgres
```

### 1.5 Open firewall (if applicable)

Allow the **frontend server IP (172.28.92.56)** to connect to the DB port (e.g. 5432):

```bash
# Example for firewalld (RHEL/CentOS)
sudo firewall-cmd --permanent --add-rich-rule='rule family="ipv4" source address="172.28.92.56" port port="5432" protocol="tcp" accept'
sudo firewall-cmd --reload

# Or ufw (Ubuntu)
sudo ufw allow from 172.28.92.56 to any port 5432
sudo ufw reload
```

### 1.6 Note for frontend

- **DB host for frontend:** `172.28.92.57`
- **DB port:** value of `DB_PORT` in `.env.backend` (e.g. 5432)
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
APP_URL=http://172.28.92.56:PORT   # Replace PORT with your HTTP port when known

DB_CONNECTION=pgsql
DB_HOST=172.28.92.57
DB_PORT=5432
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

### 2.5 Set HTTP port

When you have the dev HTTP port (e.g. 8080), set it in `docker-compose.frontend.yml`:

```yaml
nginx:
  ports:
    - "YOUR_PORT:80"   # e.g. "8080:80"
```

Then:

```bash
docker compose -f docker-compose.frontend.yml up -d
```

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

- Open: `http://172.28.92.56:YOUR_PORT`
- Admin (if seeded): `http://172.28.92.56:YOUR_PORT/admin/login`

---

## Part 3: Summary checklist

| Step | Server        | Action |
|------|---------------|--------|
| 1    | 172.28.92.57  | Install Docker (if needed), clone/copy repo |
| 2    | 172.28.92.57  | Configure `.env.backend`, start `docker-compose.backend.yml` |
| 3    | 172.28.92.57  | Open firewall for 172.28.92.56 → DB port |
| 4    | 172.28.92.56  | Install Docker (if needed), clone repo, `cd frontend` |
| 5    | 172.28.92.56  | Copy `.env.example` to `.env`, set `DB_*` to backend (172.28.92.57) |
| 6    | 172.28.92.56  | Set HTTP port in `docker-compose.frontend.yml`, then `up -d --build` |
| 7    | 172.28.92.56  | Run `migrate`, optional `db:seed`, `storage:link` |
| 8    | -             | Test in browser: `http://172.28.92.56:PORT` |

---

## Ports (to be filled when available)

| Service   | Server        | Variable / Location        | Example |
|----------|---------------|-----------------------------|---------|
| HTTP     | 172.28.92.56  | `nginx` ports in `docker-compose.frontend.yml` | 8080 |
| PostgreSQL | 172.28.92.57 | `DB_PORT` in `.env.backend` and in backend compose | 5432 |

---

## Troubleshooting

- **Frontend cannot connect to DB:**  
  Check firewall on 172.28.92.57 allows 172.28.92.56 to the DB port; confirm `DB_HOST`/`DB_PORT` in frontend `.env`.

- **502 Bad Gateway:**  
  App container may not be up or not ready. Check `docker compose -f docker-compose.frontend.yml logs app`.

- **Permission errors (storage/bootstrap):**  
  `docker compose -f docker-compose.frontend.yml exec app chown -R www-data:www-data storage bootstrap/cache`

- **Clear Laravel caches:**  
  `docker compose -f docker-compose.frontend.yml exec app php artisan config:clear && php artisan cache:clear`

---

## Optional: Using a single docker-compose on each server

- On **172.28.92.57** use only `docker-compose.backend.yml` (no frontend).
- On **172.28.92.56** use only `docker-compose.frontend.yml` (no local Postgres; `.env` points to 172.28.92.57).

This keeps DB and app on separate servers as required.
