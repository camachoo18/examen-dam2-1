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

// Verificar si los datos fueron enviados a través del formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validar si los campos no están vacíos
    if (empty($id) || empty($name) || empty($password)) {
        echo "El id, el nombre y la contraseña son obligatorios.";
    } else {
        // Consulta para actualizar un usuario en la base de datos
        $sql = "UPDATE users SET name='$name', password='$password' WHERE id=$id";

        // Ejecutar la consulta y comprobar si tuvo éxito
        if ($conn->query($sql) === TRUE) {
            echo "Usuario actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- Formulario para actualizar un usuario -->
<form method="POST" action="update.php">
    <label for="id">ID del Usuario:</label>
    <input type="text" name="id" required><br><br>
    
    <label for="name">Nombre:</label>
    <input type="text" name="name" required><br><br>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Actualizar Usuario</button>
</form>
