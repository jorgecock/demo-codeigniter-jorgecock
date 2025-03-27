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

# Instala las dependencias de PHP con Composer
RUN composer install --no-dev --optimize-autoloader

# Lista los archivos después de copiarlos
RUN echo "Archivos copiados:" && ls -lah /var/www/html/

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
