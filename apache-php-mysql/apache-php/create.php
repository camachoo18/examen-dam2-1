<?php
// Conexión a la base de datos
$servername = "db";  // El nombre del contenedor de MySQL en Docker
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
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validar si los campos no están vacíos
    if (empty($name) || empty($password)) {
        echo "El nombre y la contraseña son obligatorios.";
    } else {
        // Consulta para insertar el usuario en la base de datos
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password')";

        // Ejecutar la consulta y comprobar si tuvo éxito
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo usuario creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- Formulario para crear un nuevo usuario -->
<form method="POST" action="create.php">
    <label for="name">Nombre:</label>
    <input type="text" name="name" required><br><br>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Crear Usuario</button>
</form>
