# Stage 1: build frontend assets (delete this stage if you don't use Vite/npm)
FROM node:20 AS assets
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: PHP + Apache
FROM php:8.3-apache

RUN apt-get update && apt-get install -y libpq-dev libzip-dev unzip git \
    && docker-php-ext-install pdo_pgsql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
COPY --from=assets /app/public/build public/build

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
CMD ["docker-entrypoint.sh"]