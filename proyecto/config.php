<?php
// Datos de conexión a la base de datos
$host = "localhost";       // Servidor (generalmente localhost)
$username = "root";        // Usuario (por defecto: root)
$password = "";            // Contraseña (vacía por defecto en XAMPP)
$dbname = "mtp";           // Nombre exacto de tu base de datos

// Crear la conexión
$link = mysqli_connect($host, $username, $password, $dbname);

// Verificar conexión
if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
