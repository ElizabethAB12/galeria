<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


// Incluir el archivo de configuración para la conexión a la base de datos
include 'config.php';

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Comprobar si los datos no están vacíos
    if (empty($name) || empty($email) || empty($message)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Preparar la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO reseñas (name, email, message) VALUES (?, ?, ?)";

    // Usar una sentencia preparada para evitar inyecciones SQL
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("sss", $name, $email, $message);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Reseña enviada correctamente.";
        } else {
            // Imprimir error detallado si la inserción falla
            echo "Error al enviar la reseña: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        // Mostrar error si la preparación falla
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>
