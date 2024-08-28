
FROM php:8.2-fpm

WORKDIR /var/www/public

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

RUN composer require phpmailer/phpmailer

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader

COPY . .

CMD ["php-fpm"]	
