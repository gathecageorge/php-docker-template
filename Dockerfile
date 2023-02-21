FROM php:7.1-apache

RUN apt-get update && \
  docker-php-ext-install mysqli pdo pdo_mysql && \
  apachectl restart
