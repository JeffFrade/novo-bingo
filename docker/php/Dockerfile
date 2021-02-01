FROM composer:1 AS composer
FROM php:7.4-fpm

USER root
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        libzip-dev \
        libicu-dev \
        libpq-dev \
        libc-client-dev \
        libkrb5-dev \
        libssl-dev \
        libpng-dev \
        net-tools
RUN PHP_OPENSSL=yes docker-php-ext-configure \
        imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install \
        zip \
        intl \
        pdo \
        imap \
        gd
RUN useradd -m bingo
USER bingo
WORKDIR /bingo