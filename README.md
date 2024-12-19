## Sprint 1: Preparación

### 1. **Comprobación de commit y push al repositorio**

1. **Clonación del repositorio**:
   Cloné el repositorio utilizando el siguiente comando:
   ```bash
   git clone https://github.com/camachoo18/examen-dam2-1 .git
   ```
   Para comprobarlo hacemos lo siguiente:
   -git add <README.md>
   -git commit -m "Compruebo commit y push!"
   -git push origin master

### 2. **Documentación para Comprobar la Sesión en Docker Hub**

## Paso 1: Abrimos una Terminal
Asegurarnos de que en la terminal o consola de nuestro sistema que tenemos instalado Docker.

## Paso 2: Verifica la Sesión Actual
Ejecutamos el siguiente comando para verificar si estás autenticado en Docker Hub:

```bash
docker info
```

Buscamos en la salida una línea similar a:

```
Username: <camachoo18>
```

Si aparece mi nombre de usuario de Docker Hub, significa que tengo la sesion iniciada.


## Paso 3: Cerrar Sesión (Opcional)
Si deseas cerrar sesión después de confirmar el inicio, utiliza el siguiente comando:

```bash
docker logout
```

Esto asegurará que no queden sesiones activas no deseadas en nuestro sistema.

# Sprint 2: Apache

Este documento describe los pasos realizados para crear un servidor web Apache que sirva un archivo `index.html` con el mensaje "Hola Mundo".

## Paso 1: Creamos la Carpeta y el Archivo Dockerfile
1. Creamos una carpeta llamada `apache`:
   ```bash
   mkdir apache
   cd apache
   ```

2. Dentro de la carpeta, creamos un archivo llamado `Dockerfile`:
   ```bash
   touch Dockerfile
   ```

## Paso 2: Configurar el Dockerfile
Editamos el archivo `Dockerfile` con el siguiente contenido:

```dockerfile
# Usa la imagen base de Apache
FROM httpd:2.4

# Copiamos el archivo index.html al directorio de contenido web de Apache
COPY index.html /usr/local/apache2/htdocs/
```

## Paso 3: Creamos el Archivo `index.html`
Creamos un archivo `index.html` en la misma carpeta con el siguiente contenido:

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
    <h1>Hola Mundo</h1>
</body>
</html>
```

## Paso 4: Construir la Imagen
Ejecutamos el siguiente comando para construir la imagen Docker:

```bash
docker build -t apache-hola-mundo .
```

## Paso 5: Lanzamos el Contenedor
Iniciamos un contenedor a partir de la imagen creada:

```bash
docker run -d -p 8080:80 --name apache-servidor apache-hola-mundo
```

El servidor web estará disponible en (http://localhost:8080).

## Paso 6: Verificar el Funcionamiento
Abr mi navegador y voy a `http://localhost:8080` para ver la página "Hola Mundo".

# Sprint 3: Apache + PHP

## Paso 1: Creamos la Carpeta y Configuramos el Dockerfile
1. Copiamos la carpeta `apache` creada en el Sprint 2 y renómbrala a `apache-php`:
   ```bash
   cp -r apache apache-php
   cd apache-php
   ```

2. Edita el archivo `Dockerfile` con el siguiente contenido:

```dockerfile
# Usamos la imagen base de Apache con soporte para PHP
FROM php:7.4-apache

# Copiamos el archivo index.php al directorio de contenido web de Apache
COPY index.php /var/www/html/
```

## Paso 2: Creamos el Archivo `index.php`
Creamos un archivo `index.php` en la carpeta con el siguiente contenido:

```php
<?php
// Muestra un mensaje de Hola Mundo
echo "<h1>Hola Mundo</h1>";

// Muestra la fecha y hora actual
echo "<p>Fecha y hora actual: " . date('Y-m-d H:i:s') . "</p>";

// Muestra la versión de PHP
echo "<p>Versión de PHP: " . phpversion() . "</p>";

// Muestra la versión de Apache
echo "<p>Versión de Apache: " . apache_get_version() . "</p>";

// Muestra la IP del servidor
echo "<p>IP del servidor: " . $_SERVER['SERVER_ADDR'] . "</p>";

// Muestra la IP del cliente
echo "<p>IP del cliente: " . $_SERVER['REMOTE_ADDR'] . "</p>";
?>
```

## Paso 3: Construimos la Imagen
Ejecutamos el siguiente comando para construir la imagen Docker:

```bash
docker build -t apache-php-info .
```

## Paso 4: Lanzamos el Contenedor
Iniciamos un contenedor a partir de la imagen creada:

```bash
docker run -d -p 8081:80 --name apache-php-servidor apache-php-info
```

El servidor web estará disponible en (http://localhost:8081).

## Paso 5: Verificar el Funcionamiento
Abrimos un navegador y vamos a `http://localhost:8081` para ver la información dinámica generada por el archivo `index.php`.