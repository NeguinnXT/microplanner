FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    git \
    zip \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite para CodeIgniter
RUN a2enmod rewrite

# Corrige o DocumentRoot do Apache para a pasta /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copia os arquivos da aplicação
COPY . /var/www/html/

# Instala dependências PHP do projeto
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Define permissões da pasta writable
RUN chown -R www-data:www-data writable \
    && chmod -R 775 writable

EXPOSE 80
