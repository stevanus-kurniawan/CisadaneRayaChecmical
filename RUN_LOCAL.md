# Run Cisadane Raya Chemical Locally

Two ways to run the app locally. Use **Docker** (recommended) or **PHP + SQLite** (no Docker).

---

## Option A: With Docker (recommended)

**Requires:** Docker Desktop installed and running.

**From project root (one command):**
```powershell
.\run-local.ps1
```

**Or from `frontend/`:**
```powershell
cd frontend
.\docker-start.ps1
```

**Ports:** Web **8080**, Postgres **5434** (host). First run may take a few minutes (build + Composer install).

**After start:**
- **Site:** http://localhost:8080  
- **Admin:** http://localhost:8080/admin/login  
- **Credentials:** admin@greenresources.com / admin123  

---

## Option B: Without Docker (PHP + SQLite)

**Requires:** PHP 8.1+ (with pdo_sqlite, mbstring, openssl, xml, ctype, json) and Composer. No database install.

**From project root:**
```powershell
.\run-local.ps1 -NoDocker
```

**Or from `frontend/`:**
```powershell
cd frontend
.\run-local-no-docker.ps1
```

First run installs dependencies, creates SQLite DB, runs migrations and seeds, then starts the server at **http://localhost:8080**.

---

## Useful commands (Docker)

From `frontend/`:
```powershell
docker-compose logs -f   # View logs
docker-compose down      # Stop
docker-compose down -v   # Stop and remove DB data
```

---

## Troubleshooting

| Issue | Action |
|-------|--------|
| Port **8080** in use | In `frontend/docker-compose.yml`, change `nginx` ports to e.g. `"9080:80"`. Then use http://localhost:9080 |
| Port **5434** in use | In `frontend/docker-compose.yml`, change `postgres` ports to e.g. `"5435:5432"` |
| Docker build fails (apt 503/404) | Transient mirror issue. Run `docker-compose up -d --build` again from `frontend/`. Dockerfile uses Bookworm for stable mirrors. |
| Docker not running | Start Docker Desktop, or run without Docker: `.\run-local.ps1 -NoDocker` |
| PHP not found (no-Docker) | Install PHP 8.1+ (e.g. Laragon, XAMPP) and add to PATH |
