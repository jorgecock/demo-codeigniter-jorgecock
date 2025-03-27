# Usa una imagen base con Apache y PHP
FROM php:8.1-apache

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip git libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql mbstring gd xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código fuente al contenedor
COPY . .

# Verifica que composer.json se haya copiado
RUN ls -lah /var/www/html/ && cat /var/www/html/composer.json || echo "composer.json NO encontrado"

# Cambia permisos para evitar errores de permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 775 /var/www/html

# Instala dependencias de PHP con Composer (con control de memoria)
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
