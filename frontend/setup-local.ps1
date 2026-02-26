# Automated Setup Script for Cisadane Raya Chemical Application
# Run this script after Docker Desktop is restarted and working

Write-Host "=========================================" -ForegroundColor Cyan
Write-Host "Cisadane Raya Chemical - Local Setup Script" -ForegroundColor Cyan
Write-Host "=========================================" -ForegroundColor Cyan
Write-Host ""

# Check if Docker is running
Write-Host "Checking Docker..." -ForegroundColor Yellow
try {
    $dockerVersion = docker --version 2>&1
    Write-Host "✓ Docker is installed: $dockerVersion" -ForegroundColor Green
} catch {
    Write-Host "✗ Docker is not installed or not in PATH" -ForegroundColor Red
    Write-Host "Please install Docker Desktop from https://www.docker.com/products/docker-desktop" -ForegroundColor Yellow
    exit 1
}

# Test Docker
Write-Host "Testing Docker..." -ForegroundColor Yellow
try {
    docker ps > $null 2>&1
    Write-Host "✓ Docker is running" -ForegroundColor Green
} catch {
    Write-Host "✗ Docker is not running" -ForegroundColor Red
    Write-Host "Please start Docker Desktop and wait for it to fully start" -ForegroundColor Yellow
    exit 1
}

# Navigate to frontend directory
$scriptPath = Split-Path -Parent $MyInvocation.MyCommand.Path
Set-Location $scriptPath

# Ensure .env exists for DB_PASSWORD (docker-compose)
if (-not (Test-Path ".env")) {
    Write-Host "Creating .env from .env.example..." -ForegroundColor Yellow
    if (Test-Path ".env.example") { Copy-Item ".env.example" ".env" }
    else { Copy-Item "env.example.template" ".env"; (Get-Content ".env") -replace 'DB_PASSWORD=CHANGE_THIS_TO_SECURE_PASSWORD', 'DB_PASSWORD=postgres123' -replace 'APP_URL=.*', 'APP_URL=http://localhost:8080' | Set-Content ".env" }
}

Write-Host ""
Write-Host "Building and starting Docker containers..." -ForegroundColor Yellow
Write-Host "This may take several minutes on first run..." -ForegroundColor Gray

# Build and start containers
docker-compose up -d --build

if ($LASTEXITCODE -ne 0) {
    Write-Host ""
    Write-Host "✗ Failed to build/start containers" -ForegroundColor Red
    Write-Host "Common issues:" -ForegroundColor Yellow
    Write-Host "  1. Docker Desktop needs to be restarted" -ForegroundColor White
    Write-Host "  2. Port 8080 might be in use (check with: netstat -ano | findstr ':8080 ')" -ForegroundColor White
    Write-Host "  3. WSL2 backend not properly configured" -ForegroundColor White
    Write-Host ""
    Write-Host "See SETUP_INSTRUCTIONS.md for troubleshooting steps" -ForegroundColor Yellow
    exit 1
}

Write-Host "✓ Containers started successfully" -ForegroundColor Green
Write-Host ""
Write-Host "Waiting for services to be ready..." -ForegroundColor Yellow
Start-Sleep -Seconds 15

# Check if containers are running
$containers = docker-compose ps --services --filter "status=running"
if ($containers.Count -lt 3) {
    Write-Host "⚠ Some containers may not be running. Checking logs..." -ForegroundColor Yellow
    docker-compose logs --tail=20
    Write-Host ""
    Write-Host "Waiting a bit longer..." -ForegroundColor Yellow
    Start-Sleep -Seconds 15
}

Write-Host ""
Write-Host "Running database migrations..." -ForegroundColor Yellow
docker-compose exec -T app php artisan migrate --force

if ($LASTEXITCODE -ne 0) {
    Write-Host "⚠ Migration failed. This might be normal if database is already set up." -ForegroundColor Yellow
}

Write-Host ""
Write-Host "Generating application key..." -ForegroundColor Yellow
docker-compose exec -T app php artisan key:generate --force

Write-Host ""
Write-Host "Seeding admin user..." -ForegroundColor Yellow
docker-compose exec -T app php artisan db:seed --class=AdminUserSeeder --force

Write-Host ""
Write-Host "Creating storage link..." -ForegroundColor Yellow
docker-compose exec -T app php artisan storage:link

Write-Host ""
Write-Host "=========================================" -ForegroundColor Green
Write-Host "✓ Setup Complete!" -ForegroundColor Green
Write-Host "=========================================" -ForegroundColor Green
Write-Host ""
Write-Host "🌐 Access your application:" -ForegroundColor White
Write-Host "   Website: http://localhost:8080" -ForegroundColor Cyan
Write-Host "   Admin:   http://localhost:8080/admin/login" -ForegroundColor Cyan
Write-Host ""
Write-Host "🔐 Admin Credentials:" -ForegroundColor White
Write-Host "   Email:    admin@greenresources.com" -ForegroundColor Gray
Write-Host "   Password: admin123" -ForegroundColor Gray
Write-Host ""
Write-Host "📝 Useful Commands:" -ForegroundColor White
Write-Host "   View logs:    docker-compose logs -f" -ForegroundColor Gray
Write-Host "   Stop:         docker-compose down" -ForegroundColor Gray
Write-Host "   Restart:      docker-compose restart" -ForegroundColor Gray
Write-Host ""
