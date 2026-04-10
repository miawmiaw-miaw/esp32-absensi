FROM php:8.2-cli

# Install MySQL driver
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /app
COPY . .

CMD php -S 0.0.0.0:$PORT
