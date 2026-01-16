FROM php:8.3-apache

# System dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install zip pdo pdo_pgsql

# Enable rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# Frontend
RUN npm install
RUN npm run build

# Permissions
# Permissions yang lebih kuat
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Apache root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

EXPOSE 80
# Jalankan migrasi database, baru kemudian jalankan Apache
CMD php artisan migrate --force && apache2-foreground