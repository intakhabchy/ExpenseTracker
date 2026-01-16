# Use official PHP 8.2 with FPM
FROM php:8.2-fpm

# Set working directory inside container
WORKDIR /var/www

# Install system packages and PHP extensions needed by Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy all Laravel files into container
COPY . .

# Copy Composer from official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install

# Expose Laravel development port
EXPOSE 8000

# Start Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8000