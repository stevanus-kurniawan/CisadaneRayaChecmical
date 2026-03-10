# Deploy / Run Changes Locally

If **http://localhost:8080** shows "This site can't be reached", the app is not running. Start it using one of the options below.

---

## Option A: Run without Docker (fastest)

Uses PHP built-in server and SQLite. No Docker required.

1. Open PowerShell in the **frontend** folder.
2. Run:
   ```powershell
   .\run-local-no-docker.ps1
   ```
3. Open **http://localhost:8080** and **http://localhost:8080/admin** (or **http://localhost:8080/admin/login**).
4. To apply code changes: save files; refresh the browser (no restart needed).

**Stop:** Press `Ctrl+C` in the terminal.

---

## Option B: Run with Docker (PostgreSQL + Nginx)

Uses Docker Compose (app + nginx + postgres). Port 8080 must be set in `.env`.

1. **First-time setup** (from **frontend** folder):
   ```powershell
   .\setup-local.ps1
   ```
   This creates `.env`, starts containers, runs migrations, and seeds the admin user.

2. **Ensure port 8080**  
   In `frontend\.env` set:
   ```env
   APP_URL=http://localhost:8080
   APP_HTTP_PORT=8080
   ```
   If `APP_HTTP_PORT` is missing, add it. Then restart:
   ```powershell
   docker-compose down
   docker-compose up -d
   ```

3. Open **http://localhost:8080** and **http://localhost:8080/admin**.

4. **Deploy code changes**  
   With the volume mount, code changes are already in the container. If something doesn’t update:
   ```powershell
   docker-compose exec app php artisan config:clear
   docker-compose exec app php artisan route:clear
   docker-compose exec app php artisan view:clear
   ```
   Then refresh the browser.

**Stop:** `docker-compose down`

---

## Quick checks

- **Port in use?**  
  `netstat -ano | findstr ":8080"`
- **Admin login:**  
  **http://localhost:8080/admin/login** — Email: `admin@greenresources.com`, Password: `admin123`
