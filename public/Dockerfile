# Usa una imagen base con Apache y PHP
FROM php:8.1-apache

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia el código fuente al contenedor
COPY . .

# Muestra los archivos copiados en los logs de Render
RUN echo "Archivos copiados:" && ls -lah /var/www/html/

# Instala Composer y las dependencias si usas PHP con Composer
RUN apt-get update && apt-get install -y unzip git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --optimize-autoloader

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
