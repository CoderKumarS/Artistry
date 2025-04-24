#!/bin/bash

# Exit immediately if a command fails
set -e

# Update package lists and install PHP without sudo
apt-get update && apt-get install -y php-cli unzip

# Verify PHP installation
php -v || { echo "PHP installation failed"; exit 1; }

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Verify Composer installation
composer --version || { echo "Composer installation failed"; exit 1; }

# Install PHP dependencies
composer install --no-dev --prefer-dist

# Install Node dependencies
npm install --omit=dev

# Set correct permissions
chmod -R 775 storage bootstrap/cache

# Run database migrations
php artisan migrate --force
