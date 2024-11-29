<?php
require_once "config.php";

// Inicializar variables
$nombre = $email = $password = $confirm_password = "";
$nombre_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validar nombre
  if (empty(trim($_POST["nombre"]))) {
    $nombre_err = "Please enter your name.";
  } else {
    $nombre = trim($_POST["nombre"]);
  }

  // Validar email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validar contraseña
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validar confirmación de contraseña
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm your password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if ($password !== $confirm_password) {
      $confirm_password_err = "Passwords do not match.";
    }
  }

  // Si hay errores, mostrar alertas
  if (!empty($nombre_err) || !empty($email_err) || !empty($password_err) || !empty($confirm_password_err)) {
    echo "<script>
            alert('Error: " . addslashes($nombre_err . $email_err . $password_err . $confirm_password_err) . "');
            window.history.back();
        </script>";
    exit();
  }

  // Insertar en la base de datos si no hay errores
  $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
  if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_email, $param_password);

    $param_nombre = $nombre;
    $param_email = $email;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    if (mysqli_stmt_execute($stmt)) {
      echo "<script>
                alert('Registro exitoso. Ahora puedes iniciar sesión.');
                window.location.href = 'index.php';
            </script>";
      exit();
    } else {
      echo "<script>
                alert('Error al registrar. Inténtalo de nuevo más tarde.');
                window.history.back();
            </script>";
      exit();
    }
    mysqli_stmt_close($stmt);
  }

  mysqli_close($link);
}
