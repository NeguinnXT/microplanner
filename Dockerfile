FROM php:8.2-apache

# Instala extensões necessárias do PHP
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia o projeto para o container
COPY . /var/www/html/

# Permissões para a pasta writable
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable \
    && a2enmod rewrite

# Corrige DocumentRoot para o Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Exponha a porta 80
EXPOSE 80
