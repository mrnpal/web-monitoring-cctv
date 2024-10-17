# Gunakan image dasar dengan PHP 8.2
FROM php:8.2-fpm

# Install ekstensi yang dibutuhkan
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin proyek Laravel ke dalam container
WORKDIR /app

COPY . .

# Install dependensi
RUN composer install --no-dev --optimize-autoloader

EXPOSE  80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

