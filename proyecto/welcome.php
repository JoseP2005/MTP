<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php"); // Si no está autenticado, redirige al login
  exit();
}

// Si el usuario está autenticado, redirige a la página principal
header("location: home/index.html");
exit();






