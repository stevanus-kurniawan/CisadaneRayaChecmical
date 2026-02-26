#!/bin/bash

# Quick start script for Docker setup
cd "$(dirname "$0")"

# Ensure .env exists (required for DB_PASSWORD used by docker-compose)
if [ ! -f .env ]; then
    echo "📄 Creating .env from env.example.template..."
    cp env.example.template .env
    sed -i.bak 's/DB_PASSWORD=CHANGE_THIS_TO_SECURE_PASSWORD/DB_PASSWORD=postgres123/' .env
    sed -i.bak 's|APP_URL=.*|APP_URL=http://localhost:8080|' .env
    rm -f .env.bak
fi

echo "🚀 Starting Cisadane Raya Chemical Docker containers..."

# Build and start containers
docker-compose up -d --build

echo "⏳ Waiting for services to be ready..."
sleep 5

# Run migrations
echo "📦 Running database migrations..."
docker-compose exec -T app php artisan migrate --force

# Seed database (navigation, pages, admin user)
echo "👤 Seeding database..."
docker-compose exec -T app php artisan db:seed --force

# Create storage link
echo "🔗 Creating storage link..."
docker-compose exec -T app php artisan storage:link

echo "✅ Setup complete!"
echo ""
echo "🌐 Access the application at: http://localhost:8080"
echo "🔐 Admin panel: http://localhost:8080/admin/login"
echo "   Email: admin@greenresources.com"
echo "   Password: admin123"
echo ""
echo "📝 View logs: docker-compose logs -f"
echo "🛑 Stop containers: docker-compose down"

