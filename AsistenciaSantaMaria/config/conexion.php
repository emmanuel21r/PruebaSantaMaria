<?php
$hostname = "localhost"; // Cambia esto al nombre de tu servidor MySQL
$username = "root";      // Cambia esto a tu nombre de usuario de MySQL
$password = "";          // Cambia esto a tu contraseña de MySQL
$database = "usuario3";  // Cambia esto al nombre de tu base de datos

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
?>
