<?php
// Configuración de la base de datos
$host = "localhost";
$user = "root"; // Usuario por defecto en WAMP
$password = ""; // Contraseña por defecto en WAMP
$dbname = "mi_negocio_db"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre_usuario = $_POST['name'];
    $contrasena = $_POST['password']; // No encriptamos la contraseña

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES ('$nombre_usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        // Si los datos se insertaron correctamente, redirigir a la página deseada
        header("Location: https://www.minegocioefectivo.com/#/autenticacion");
        exit();
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
