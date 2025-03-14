#!/usr/bin/env bash
set -e  # Exit on any error

echo "Running Composer Install..."
composer global require hirak/prestissimo || true
composer install --no-dev --prefer-dist --optimize-autoloader

echo "Caching Config & Routes..."
php artisan config:clear
php artisan config:cache
php artisan route:cache

