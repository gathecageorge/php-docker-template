FROM php:7.1-apache

RUN apt update && \
  apt install -y git && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
  docker-php-ext-install mysqli pdo pdo_mysql && \
  apachectl restart
