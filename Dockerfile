FROM php:7.1-apache

RUN apt update && apt upgrade -y && apt autoremove -y

RUN docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql && \
  apachectl restart

ARG COMPOSE_FILE
COPY . /var/www/html
RUN if [[ "$COMPOSE_FILE" == *"mount.yml"* ]]; then \
    rm -r /var/www/html/*; \
    fi
