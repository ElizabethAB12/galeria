<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // o el nombre de tu servidor
$username = "root"; // usuario de la base de datos
$password = ""; // contraseña de la base de datos (deja en blanco si no tienes contraseña)
$dbname = "galeria"; // nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
