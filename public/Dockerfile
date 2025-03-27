# Usa una imagen base con Apache y PHP
FROM php:8.1-apache

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y unzip git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código fuente al contenedor
COPY . .

# Verifica que composer.json se haya copiado
RUN ls -lah /var/www/html/ && cat /var/www/html/composer.json || echo "composer.json NO encontrado"

# Cambia permisos para evitar errores de permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 775 /var/www/html

# Instala extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Instala las dependencias de PHP con Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
