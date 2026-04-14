#!/bin/bash

# Start the application
php-fpm &

# Keep the container running
sleep 3

# Generate the application key
#php artisan key:generate --force

# Migrations
php artisan migrate --force

# Cache the configuration
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Initialize nginx
nginx -g 'daemon off;'