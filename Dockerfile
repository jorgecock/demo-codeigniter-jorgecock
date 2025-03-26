# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilitar mod_rewrite para que CodeIgniter funcione bien
RUN a2enmod rewrite

# Copiar los archivos del proyecto al servidor
COPY . /var/www/html/

# Establecer el directorio de trabajo
WORKDIR /var/www/html/

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache cuando el contenedor arranque
CMD ["apache2-foreground"]
