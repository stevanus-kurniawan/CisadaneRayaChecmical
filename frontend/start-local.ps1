# Start Local Laravel Application
# This script runs the app using PHP directly (requires PHP 8.2+ installed)

Write-Host "Starting Cisadane Raya Chemical Application..." -ForegroundColor Green

# Check if PostgreSQL is running
$postgresRunning = docker ps | Select-String "green_resources_postgres"
if (-not $postgresRunning) {
    Write-Host "Starting PostgreSQL container..." -ForegroundColor Yellow
    docker-compose up -d postgres
    Start-Sleep -Seconds 5
}

# Check PHP version
Write-Host "`nChecking PHP installation..." -ForegroundColor Cyan
try {
    $phpVersion = php -r "echo PHP_VERSION;"
    Write-Host "PHP Version: $phpVersion" -ForegroundColor Green
    
    # Check if PHP version is 8.2 or higher
    $versionParts = $phpVersion -split '\.'
    $major = [int]$versionParts[0]
    $minor = [int]$versionParts[1]
    
    if ($major -lt 8 -or ($major -eq 8 -and $minor -lt 2)) {
        Write-Host "`nERROR: PHP 8.2 or higher is required. Current version: $phpVersion" -ForegroundColor Red
        Write-Host "Please install PHP 8.2+ from: https://windows.php.net/download/" -ForegroundColor Yellow
        Write-Host "Or use XAMPP/Laragon with PHP 8.2+" -ForegroundColor Yellow
        exit 1
    }
} catch {
    Write-Host "`nERROR: PHP is not installed or not in PATH" -ForegroundColor Red
    Write-Host "Please install PHP 8.2+ and add it to your PATH" -ForegroundColor Yellow
    Write-Host "Download from: https://windows.php.net/download/" -ForegroundColor Yellow
    exit 1
}

# Check Composer
Write-Host "`nChecking Composer..." -ForegroundColor Cyan
try {
    composer --version | Out-Null
    Write-Host "Composer is installed" -ForegroundColor Green
} catch {
    Write-Host "Composer not found. Installing dependencies may fail." -ForegroundColor Yellow
}

# Install dependencies if needed
if (-not (Test-Path "vendor")) {
    Write-Host "`nInstalling Composer dependencies..." -ForegroundColor Cyan
    composer install --no-interaction
    if ($LASTEXITCODE -ne 0) {
        Write-Host "Failed to install dependencies. Trying with platform requirements ignored..." -ForegroundColor Yellow
        composer install --no-interaction --ignore-platform-reqs
    }
}

# Generate app key if needed
if (-not (Select-String -Path ".env" -Pattern "APP_KEY=base64:")) {
    Write-Host "`nGenerating application key..." -ForegroundColor Cyan
    php artisan key:generate
}

# Create storage link
if (-not (Test-Path "public/storage")) {
    Write-Host "`nCreating storage link..." -ForegroundColor Cyan
    php artisan storage:link
}

# Start the server
Write-Host "`n========================================" -ForegroundColor Green
Write-Host "Starting Laravel development server..." -ForegroundColor Green
Write-Host "Application will be available at:" -ForegroundColor Cyan
Write-Host "  http://localhost:5000" -ForegroundColor White
Write-Host "`nPress Ctrl+C to stop the server" -ForegroundColor Yellow
Write-Host "========================================`n" -ForegroundColor Green

php artisan serve --host=0.0.0.0 --port=5000
