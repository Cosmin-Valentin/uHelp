FROM richarvey/nginx-php-fpm:1.7.2

# Set working directory first
WORKDIR /var/www/html

# Copy application files
COPY . .

# Ensure scripts are executable
RUN chmod +x scripts/00-laravel-deploy.sh

# Allow Composer to run
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV SKIP_COMPOSER 0  # Enable composer installation

# Start Nginx & PHP-FPM
CMD ["/start.sh"]
