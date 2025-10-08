# ======================
# Stage 1 — Build assets
# ======================
FROM node:20 AS frontend

WORKDIR /app

# Copy package files and install dependencies
COPY package*.json ./
RUN npm install

# Copy the rest of your app to allow Tailwind/Vite to find sources
COPY . .

# Build your CSS/JS (Tailwind + Vite)
RUN npm run build


# ======================
# Stage 2 — Laravel + PHP
# ======================
FROM php:8.3-fpm

# Install PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip bcmath

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy all application files
COPY . .

# Copy built assets from the Node stage into Laravel's public/build
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies (no dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set correct permissions for Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expose port and start Laravel
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
