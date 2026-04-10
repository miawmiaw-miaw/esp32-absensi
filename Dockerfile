FROM php:8.2-apache

# Disable MPM event, pakai prefork (yang cocok untuk PHP)
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Install MySQL driver
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

EXPOSE 80
