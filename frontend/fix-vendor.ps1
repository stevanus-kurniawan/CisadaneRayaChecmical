# Fix missing vendor/ and storage/cache permissions (run from frontend folder: .\fix-vendor.ps1)

Set-Location $PSScriptRoot

# 1. Composer deps if needed
if (-not (Test-Path "vendor\autoload.php")) {
    Write-Host "Installing Composer dependencies..." -ForegroundColor Cyan
    docker-compose exec -T app composer install --no-interaction --prefer-dist --no-scripts
}

# 2. Ensure APP_KEY is set (required by Laravel; avoids "No application encryption key" error)
if (-not (Select-String -Path ".env" -Pattern "APP_KEY=base64:" -Quiet)) {
    Write-Host "Generating application key..." -ForegroundColor Cyan
    docker-compose exec -T app php artisan key:generate --force
}

# 3. Fix permissions so Laravel can write to storage/logs and bootstrap/cache
Write-Host "Setting storage and bootstrap/cache permissions in container..." -ForegroundColor Cyan
docker-compose exec -T app sh -c "chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null; chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache"
Write-Host "Done. Refresh http://localhost:8080" -ForegroundColor Green
