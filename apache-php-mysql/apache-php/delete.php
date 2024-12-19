<?php
// Conexión a la base de datos
$servername = "db";
$username = "user";
$password = "password";
$dbname = "users_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el ID fue enviado a través del formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del usuario
    $id = $_POST['id'];

    // Validar si el ID no está vacío
    if (empty($id)) {
        echo "El ID del usuario es obligatorio.";
    } else {
        // Consulta para eliminar el usuario de la base de datos
        $sql = "DELETE FROM users WHERE id=$id";

        // Ejecutar la consulta y comprobar si tuvo éxito
        if ($conn->query($sql) === TRUE) {
            echo "Usuario eliminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- Formulario para eliminar un usuario -->
<form method="POST" action="delete.php">
    <label for="id">ID del Usuario:</label>
    <input type="text" name="id" required><br><br>
    
    <button type="submit">Eliminar Usuario</button>
</form>
