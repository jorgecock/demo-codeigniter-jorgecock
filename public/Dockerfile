# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilitar mod_rewrite para que CodeIgniter funcione bien
RUN a2enmod rewrite

# Copiar todo el proyecto (un nivel arriba, ya que Dockerfile está en public/)
COPY ../ /var/www/html/

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache cuando el contenedor arranque
CMD ["apache2-foreground"]
