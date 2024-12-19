# Usamos la imagen base de PHP con soporte para Apache
FROM php:7.4-apache

# Instalamos la extensión mysqli
RUN docker-php-ext-install mysqli

# Copiamos todos los archivos al directorio de contenido web de Apache
COPY . /var/www/html/

# Ajustamos los permisos para asegurar que Apache pueda acceder a los archivos
RUN chown -R www-data:www-data /var/www/html

# Habilitamos el módulo rewrite (si lo necesitas)
RUN a2enmod rewrite

# Expone el puerto 80 (por defecto Apache usa este puerto)
EXPOSE 80
