
FROM php:8.2-fpm-alpine as base

RUN apk add --no-cache

curl

mysql-client

git

supervisor

nginx

$PHPIZE_DEPS

&& docker-php-ext-install pdo_mysql opcache

&& docker-php-ext-enable opcache

WORKDIR /app

Copy the core application files/

COPY . /app

Run Composer install to download all dependencies

We specify --no-dev and optimize the autoloader for production

RUN composer install

--no-dev

--optimize-autoloader

Run the necessary Laravel setup commands (key generation and configuration caching)


RUN php artisan key:generate --force

&& php artisan config:cache

&& php artisan route:cache

&& php artisan view:cache


FROM php:8.2-fpm-alpine

RUN Install Nginx

RUN apk add --no-cache nginx

Copy the compiled application code from the build stage/

COPY --from=base /app /var/www/html

WORKDIR /var/www/html

COPY --from=base /etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf

Expose the port (Render will use this)

EXPOSE 8080

Run Nginx and PHP-FPM when the container starts

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
