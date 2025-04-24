# Use official PHP and Node image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl zip unzip git nodejs npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --prefer-dist

# Install Node dependencies
RUN npm install --omit=dev

# Cache Laravel configuration
RUN php artisan config:cache && php artisan route:cache

# Run database migrations
RUN php artisan migrate --force

# Set correct permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose ports
EXPOSE $PORT

# Start Laravel using your `composer dev` command
CMD ["sh", "-c", "PORT=${PORT} composer run dev"]
