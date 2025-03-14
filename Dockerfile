FROM richarvey/nginx-php-fpm:latest
 
COPY . .

# Install node and npm using apk
RUN apk update && apk add --no-cache nodejs npm

# Install node dependencies and build assets
WORKDIR /var/www/html
RUN npm install && npm run build

# Image config
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV SKIP_COMPOSER 0
RUN chmod +x scripts/00-laravel-deploy.sh

CMD ["/start.sh"]