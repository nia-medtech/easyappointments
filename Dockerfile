FROM php:8.0-apache
WORKDIR /var/www/html

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext mysqli pdo_mysql

ADD build /var/www/html

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www
USER www-data

EXPOSE 80