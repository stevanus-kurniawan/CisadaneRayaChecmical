# Quick start script for Docker setup (PowerShell)

$FrontendDir = $PSScriptRoot
Set-Location $FrontendDir

# Ensure .env exists (required for DB_PASSWORD used by docker-compose)
if (-not (Test-Path ".env")) {
    Write-Host "Creating .env from env.example.template..." -ForegroundColor Yellow
    Copy-Item "env.example.template" ".env"
    (Get-Content ".env") -replace 'DB_PASSWORD=CHANGE_THIS_TO_SECURE_PASSWORD', 'DB_PASSWORD=postgres123' -replace 'APP_URL=.*', 'APP_URL=http://localhost:8080' | Set-Content ".env"
}

Write-Host "Starting Cisadane Raya Chemical Docker containers..." -ForegroundColor Green

# Build and start containers
docker-compose up -d --build

Write-Host "Waiting for services to be ready..." -ForegroundColor Yellow
Start-Sleep -Seconds 10

# Install Composer deps if vendor is missing (volume mount overwrites image, so vendor is empty)
if (-not (Test-Path "vendor\autoload.php")) {
    Write-Host "Installing Composer dependencies (this may take 1-2 minutes)..." -ForegroundColor Cyan
    docker-compose exec -T app composer install --no-interaction --prefer-dist --no-scripts
    if ($LASTEXITCODE -ne 0) {
        Write-Host "Composer install had issues. Retrying once..." -ForegroundColor Yellow
        docker-compose exec -T app composer install --no-interaction --prefer-dist --no-scripts
    }
}
if (-not (Test-Path "vendor\autoload.php")) {
    Write-Host "vendor/ still missing. Run manually: docker-compose exec app composer install --no-interaction" -ForegroundColor Red
    exit 1
}
Start-Sleep -Seconds 2

# Run migrations
Write-Host "Running database migrations..." -ForegroundColor Cyan
docker-compose exec -T app php artisan migrate --force

# Seed database (navigation, pages, admin user)
Write-Host "Seeding database..." -ForegroundColor Cyan
docker-compose exec -T app php artisan db:seed --force

# Create storage link
Write-Host "Creating storage link..." -ForegroundColor Cyan
docker-compose exec -T app php artisan storage:link

Write-Host "Setup complete!" -ForegroundColor Green
Write-Host ""
Write-Host "Access the application at: http://localhost:8080" -ForegroundColor White
Write-Host "Admin panel: http://localhost:8080/admin/login" -ForegroundColor White
Write-Host "  Email: admin@greenresources.com" -ForegroundColor Gray
Write-Host "  Password: admin123" -ForegroundColor Gray
Write-Host ""
Write-Host "View logs: docker-compose logs -f" -ForegroundColor Yellow
Write-Host "Stop containers: docker-compose down" -ForegroundColor Yellow
