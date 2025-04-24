#!/bin/bash

# Exit immediately if a command fails
set -e

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Install PHP dependencies
composer install --no-dev

# Install Node dependencies
npm install

# Run database migrations
php artisan migrate --force
