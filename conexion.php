<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', 'mipassword123', 'pagina_tesci');

// Verificar si hubo error en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
