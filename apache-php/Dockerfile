# Usamos la imagen base de PHP con soporte para Apache
FROM php:7.4-apache

# Copiamos todos los archivos al directorio de contenido web de Apache
COPY . /var/www/html/

# Establecemos el ServerName para evitar la advertencia
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Ajustamos los permisos para asegurar que Apache pueda acceder a los archivos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80 (por defecto Apache usa este puerto)
EXPOSE 80
