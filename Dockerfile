FROM php:8.1.7
SHELL ["/bin/bash", "-o", "pipefail", "-c"]
COPY . /var/www/html
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y zip=3.0-12 unzip=6.0-26+deb11u1 p7zip-full=16.02+dfsg-8 --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y git=1:2.30.2-1+deb11u2 --no-install-recommends
RUN export COMPOSER_ALLOW_SUPERUSER=1 && composer install