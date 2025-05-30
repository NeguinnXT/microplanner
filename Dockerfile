FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    git \
    zip \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Exibir erros do PHP
RUN echo "display_errors = On\nerror_reporting = E_ALL" > /usr/local/etc/php/conf.d/docker-php-errors.ini

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite e configura DocumentRoot
RUN a2enmod rewrite && \
    sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>' >> /etc/apache2/apache2.conf

# Copia arquivos
COPY . /var/www/html/
COPY .env /var/www/html/.env

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/writable

EXPOSE 80
