FROM php:8.3.10-fpm

WORKDIR /var/www/app

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd 

RUN rm /bin/sh && ln -s /bin/bash /bin/sh
ENV NVM_DIR /root/.nvm
# Instalar NVM
RUN curl --silent -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.0/install.sh | bash

RUN source $NVM_DIR/nvm.sh \
    nvm install 20

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

USER root

RUN chmod 777 -R /var/www/app
