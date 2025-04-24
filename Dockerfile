# Use official PHP and Node.js image
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

# Build assets using Vite
RUN npm run build

# Cache Laravel configuration
RUN php artisan config:cache && php artisan route:cache

# Rollback, migrate, and seed database
RUN php artisan migrate:rollback && php artisan migrate --seed

# Set correct permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose Render's dynamic port
EXPOSE $PORT

# Start Laravel using Composer dev
CMD ["sh", "-c", "PORT=${PORT} composer run dev"]