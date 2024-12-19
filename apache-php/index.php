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