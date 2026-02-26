# Run Cisadane Raya Chemical locally WITHOUT Docker (PHP + SQLite)
# Requires: PHP 8.1+ with pdo_sqlite, mbstring, openssl, xml, ctype, json, fileinfo. Composer.

$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

Write-Host "Cisadane Raya Chemical - Local run (no Docker)" -ForegroundColor Cyan
Write-Host ""

# Check PHP
try {
    $phpVersion = php -r "echo PHP_VERSION;"
    Write-Host "PHP: $phpVersion" -ForegroundColor Green
} catch {
    Write-Host "PHP not found. Install PHP 8.1+ and add to PATH (e.g. Laragon, XAMPP)." -ForegroundColor Red
    exit 1
}

# Ensure .env exists
if (-not (Test-Path ".env")) {
    Write-Host "Creating .env from .env.example..." -ForegroundColor Yellow
    if (Test-Path ".env.example") { Copy-Item ".env.example" ".env" }
    else { Copy-Item "env.example.template" ".env" }
}

# Switch to SQLite for no-Docker run
$envContent = Get-Content ".env" -Raw
if ($envContent -match "DB_CONNECTION=pgsql") {
    Write-Host "Configuring SQLite for local run..." -ForegroundColor Yellow
    $envContent = $envContent -replace "DB_CONNECTION=pgsql", "DB_CONNECTION=sqlite"
    $envContent = $envContent -replace "DB_HOST=.*", "# DB_HOST= (not used for SQLite)"
    $envContent = $envContent -replace "DB_PORT=.*", "# DB_PORT= (not used for SQLite)"
    $envContent = $envContent -replace "DB_DATABASE=.*", "DB_DATABASE=database/database.sqlite"
    $envContent = $envContent -replace "DB_USERNAME=.*", "# DB_USERNAME= (not used for SQLite)"
    $envContent = $envContent -replace "DB_PASSWORD=.*", "# DB_PASSWORD= (not used for SQLite)"
    $envContent = $envContent -replace "APP_URL=.*", "APP_URL=http://localhost:8080"
    Set-Content ".env" $envContent -NoNewline
}

# Create SQLite database file
$dbPath = Join-Path $PSScriptRoot "database" "database.sqlite"
if (-not (Test-Path $dbPath)) {
    Write-Host "Creating SQLite database..." -ForegroundColor Yellow
    New-Item -ItemType File -Path $dbPath -Force | Out-Null
}

# Composer install
if (-not (Test-Path "vendor")) {
    Write-Host "Installing Composer dependencies..." -ForegroundColor Cyan
    composer install --no-interaction 2>&1
    if ($LASTEXITCODE -ne 0) { composer install --no-interaction --ignore-platform-reqs 2>&1 }
}

# App key
if (-not (Select-String -Path ".env" -Pattern "APP_KEY=base64:" -Quiet)) {
    Write-Host "Generating application key..." -ForegroundColor Cyan
    php artisan key:generate --ansi
}

# Migrate
Write-Host "Running migrations..." -ForegroundColor Cyan
php artisan migrate --force

# Seed
Write-Host "Seeding database..." -ForegroundColor Cyan
php artisan db:seed --force

# Storage link
if (-not (Test-Path "public\storage")) {
    Write-Host "Creating storage link..." -ForegroundColor Cyan
    php artisan storage:link
}

Write-Host ""
Write-Host "Starting development server at http://localhost:8080" -ForegroundColor Green
Write-Host "Admin: http://localhost:8080/admin/login (admin@greenresources.com / admin123)" -ForegroundColor Gray
Write-Host "Press Ctrl+C to stop." -ForegroundColor Yellow
Write-Host ""
php artisan serve --host=0.0.0.0 --port=8080
