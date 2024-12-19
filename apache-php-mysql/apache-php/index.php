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


<?php
$servername = "db"; // El nombre del servicio del contenedor de MySQL (según docker-compose.yml)
$username = "user"; // El usuario configurado en MySQL
$password = "password"; // La contraseña configurada en MySQL
$dbname = "users_db"; // La base de datos configurada en MySQL

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
