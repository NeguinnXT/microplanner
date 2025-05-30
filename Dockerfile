FROM php:8.2-apache

# Instalar dependências e extensão intl
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Ativar mod_rewrite
RUN a2enmod rewrite

# Corrigir o DocumentRoot para apontar para /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copiar arquivos do projeto
COPY . /var/www/html/

# Corrigir permissões da pasta writable
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar dependências do projeto
WORKDIR /var/www/html
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 80
