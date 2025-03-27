# Primera etapa: Instalamos las dependencias con Composer
FROM composer:2 AS build
WORKDIR /app

# Copiamos los archivos necesarios para instalar dependencias
COPY composer.json composer.lock ./

# Instalamos dependencias sin límites de memoria
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist || true

# Segunda etapa: Servidor PHP con Apache
FROM php:8.1-cli  # Usamos CLI para reducir consumo de memoria
WORKDIR /var/www/html

# Instalamos Apache manualmente
RUN apt-get update && apt-get install -y apache2 libapache2-mod-php \
    && rm -rf /var/lib/apt/lists/*

# Copiamos el código fuente
COPY . .

# Copiamos las dependencias instaladas
COPY --from=build /app/vendor ./vendor

# Damos permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponemos el puerto 80
EXPOSE 80

# Iniciamos Apache en primer plano
CMD ["apachectl", "-D", "FOREGROUND"]
