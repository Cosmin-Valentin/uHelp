# Stage 1: Base image with Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:1.7.2 AS base

# Stage 2: PHP setup based on your php:8.0.0rc1-fpm
FROM php:8.0.0rc1-fpm AS php-setup

# Install system dependencies
RUN apt-get update && apt-get install -y git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Stage 3: Combine base and PHP setup
FROM base

# Copy PHP setup from php-setup stage
COPY --from=php-setup /usr/bin/composer /usr/bin/composer
COPY --from=php-setup /usr/local/etc/php/conf.d /usr/local/etc/php/conf.d

# Copy your application code
COPY . .

# Image config (adjust as needed)
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config (adjust as needed)
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV SKIP_COMPOSER 0
RUN chmod +x scripts/00-laravel-deploy.sh

# overwrite the default CMD from richarvey's image.
CMD ["/start.sh"]