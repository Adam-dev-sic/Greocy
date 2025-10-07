# Use latest PHP with required extensions
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip bcmath

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy all application files first
COPY . .

# Install dependencies (no dev) AFTER code is present (so artisan exists)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set correct permissions for Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8000 and start Laravel’s built-in server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
