FROM php:7.4-fpm-alpine

# Based on https://github.com/jguyomard/docker-laravel
LABEL maintainer="karl@portablecto.com"

RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        curl-dev \
        imagemagick-dev \
        libtool \
        libxml2-dev \
        postgresql-dev \
        sqlite-dev \
    && apk add --no-cache \
        curl \
        git \
        imagemagick \
        mysql-client \
        postgresql-client \
        postgresql-libs \
        libintl \
        icu \
        icu-dev \
        libzip-dev \
    && apk add gnu-libiconv --update-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted \
    && apk add --update npm \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install \
        bcmath \
        curl \
        iconv \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        pcntl \
        tokenizer \
        xml \
        zip \
        intl \
    && curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer \
    && apk del -f .build-deps

ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

WORKDIR /var/www

RUN npm install
RUN npm install --global cross-env

COPY --chown=www-data:www-data ./ /var/www

COPY --chown=www-data:www-data ./.env.example /var/www/.env
