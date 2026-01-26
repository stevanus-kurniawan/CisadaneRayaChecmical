# Setup Instructions - Fix Docker and Run Application

## Issue: Docker "exec format error"

This error occurs when Docker Desktop's WSL2 backend isn't properly configured. Follow these steps:

## Step 1: Restart Docker Desktop

1. **Right-click the Docker Desktop icon** in your system tray (bottom-right)
2. Click **"Quit Docker Desktop"**
3. Wait 10 seconds
4. **Start Docker Desktop again** from the Start menu
5. Wait until Docker Desktop shows "Docker Desktop is running" (green icon)

## Step 2: Verify Docker is Working

Open PowerShell and run:
```powershell
docker run --rm hello-world
```

If this works, proceed to Step 3. If you still get errors, see "Alternative: Run Without Docker" below.

## Step 3: Run the Application

Once Docker is working, run these commands in PowerShell:

```powershell
cd "D:\Green resources\greenresource\frontend"

# Start containers
docker-compose up -d --build

# Wait for containers to be ready (about 30 seconds)
Start-Sleep -Seconds 30

# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate

# Seed admin user
docker-compose exec app php artisan db:seed --class=AdminUserSeeder

# Create storage link
docker-compose exec app php artisan storage:link
```

## Step 4: Access the Application

- **Website**: http://localhost
- **Admin Panel**: http://localhost/admin/login
  - Email: `admin@greenresources.com`
  - Password: `admin123`

## Alternative: Run Without Docker

If Docker continues to have issues, you can run the application directly with PHP:

### Prerequisites:
- Install PHP 8.1+ (from https://windows.php.net/download/)
- Install Composer (from https://getcomposer.org/download/)
- Install PostgreSQL or use SQLite

### Setup Steps:

1. **Install PHP and add to PATH**
2. **Install Composer globally**
3. **Configure database in `.env`** (use SQLite for simplicity)
4. **Run these commands**:
```powershell
cd "D:\Green resources\greenresource\frontend"
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan storage:link
php artisan serve
```

Then access at: http://localhost:8000

## Troubleshooting Docker

If Docker still doesn't work after restarting:

1. **Check WSL2 is installed**:
   ```powershell
   wsl --list --verbose
   ```

2. **Update WSL2**:
   ```powershell
   wsl --update
   ```

3. **Restart WSL2**:
   ```powershell
   wsl --shutdown
   ```
   Then restart Docker Desktop

4. **Check Docker Desktop Settings**:
   - Open Docker Desktop
   - Go to Settings > General
   - Ensure "Use the WSL 2 based engine" is checked
   - Go to Settings > Resources > WSL Integration
   - Ensure your WSL distribution is enabled
