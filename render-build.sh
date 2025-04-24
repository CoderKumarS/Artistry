#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Install PHP
sudo apt update && sudo apt install -y php-cli unzip

# Verify PHP installation
php -v

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Verify Composer installation
composer --version

# Install PHP dependencies
composer install --no-dev

# Install Node dependencies
npm install

# Run database migrations
php artisan migrate --force
