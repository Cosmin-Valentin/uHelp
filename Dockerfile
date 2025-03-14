FROM richarvey/nginx-php-fpm:1.7.2

# Copy application files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Ensure scripts are executable
RUN chmod +x /var/www/html/scripts/00-laravel-deploy.sh

# Allow Composer to run
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV SKIP_COMPOSER 0  # Enable composer installation

# Run Laravel deploy script before starting server
RUN /var/www/html/scripts/00-laravel-deploy.sh

# Start Nginx & PHP-FPM
CMD ["php-fpm", "-R"]
