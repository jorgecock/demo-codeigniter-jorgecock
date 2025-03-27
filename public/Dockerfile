# Primera etapa: Instalamos las dependencias con Composer
FROM composer:2 AS build
WORKDIR /app

# Copiamos solo lo necesario para instalar dependencias
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Segunda etapa: Servidor PHP con Apache
FROM php:8.1-apache
WORKDIR /var/www/html

# Copiamos el código fuente
COPY . . 

# Copiamos las dependencias ya instaladas
COPY --from=build /app/vendor ./vendor

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
