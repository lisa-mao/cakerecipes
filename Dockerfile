--- STAGE 1: Build dependencies (uses Composer) ---

We use a PHP-FPM image that includes Composer already installed

FROM php:8.2-fpm-alpine as base

Install essential system packages and PHP extensions

The extensions listed here are standard for most Laravel apps (pdo_mysql, curl, etc.)

RUN apk add --no-cache

curl

mysql-client

git

supervisor

nginx

$PHPIZE_DEPS

&& docker-php-ext-install pdo_mysql opcache

&& docker-php-ext-enable opcache

Set the application directory

WORKDIR /app

Copy the core application files

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

--- STAGE 2: Production Runtime (Smallest and most secure) ---

Start from a clean, lighter base image for the final runtime

FROM php:8.2-fpm-alpine

Install Nginx (since PHP-FPM needs a web server to talk to)

RUN apk add --no-cache nginx

Copy the compiled application code from the build stage

COPY --from=base /app /var/www/html

Set working directory to the public directory for the web server (Nginx)

WORKDIR /var/www/html

Set up the Nginx configuration to point to our Laravel public folder

COPY --from=base /etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf

Expose the port (Render will use this)

EXPOSE 8080

Run Nginx and PHP-FPM when the container starts

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
