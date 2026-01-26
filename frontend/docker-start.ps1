# Quick start script for Docker setup (PowerShell)

Write-Host "🚀 Starting Cisadane Raya Chemical Docker containers..." -ForegroundColor Green

# Build and start containers
docker-compose up -d --build

Write-Host "⏳ Waiting for services to be ready..." -ForegroundColor Yellow
Start-Sleep -Seconds 5

# Run migrations
Write-Host "📦 Running database migrations..." -ForegroundColor Cyan
docker-compose exec -T app php artisan migrate --force

# Seed admin user
Write-Host "👤 Seeding admin user..." -ForegroundColor Cyan
docker-compose exec -T app php artisan db:seed --class=AdminUserSeeder

# Create storage link
Write-Host "🔗 Creating storage link..." -ForegroundColor Cyan
docker-compose exec -T app php artisan storage:link

Write-Host "✅ Setup complete!" -ForegroundColor Green
Write-Host ""
Write-Host "🌐 Access the application at: http://localhost:8000" -ForegroundColor White
Write-Host "🔐 Admin panel: http://localhost:8000/admin/login" -ForegroundColor White
Write-Host "   Email: admin@greenresources.com" -ForegroundColor Gray
Write-Host "   Password: admin123" -ForegroundColor Gray
Write-Host ""
Write-Host "📝 View logs: docker-compose logs -f" -ForegroundColor Yellow
Write-Host "Stop containers: docker-compose down" -ForegroundColor Yellow

