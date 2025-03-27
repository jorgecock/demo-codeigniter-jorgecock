# Primera etapa: Construcción de dependencias con Composer
FROM composer:2 AS build
WORKDIR /app

# Copiar archivos de Composer
COPY composer.json composer.lock ./
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Segunda etapa: Servidor PHP con Apache
FROM php:8.1-apache
WORKDIR /var/www/html

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar la aplicación
COPY . .

# Copiar los paquetes instalados de Composer
COPY --from=build /app/vendor ./vendor

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Ejecutar Apache
CMD ["apache2-foreground"]
