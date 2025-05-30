FROM php:8.2-apache

# Instala extensões do PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia o projeto para o container
COPY . /var/www/html/

# Define permissões corretas
RUN chown -R www-data:www-data /var/www/html/writable \
    && a2enmod rewrite

# Define o DocumentRoot correto do Apache para public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Exponha a porta 80
EXPOSE 80
