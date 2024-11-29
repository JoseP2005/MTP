<?php
session_start();
require_once "config.php";

// Inicializar variables
$email = $password = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validar email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validar contraseña
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Verificar credenciales
  if (empty($email_err) && empty($password_err)) {
    $sql = "SELECT id_usuario, nombre, email, password FROM usuarios WHERE email = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_email);
      $param_email = $email;

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $id_usuario, $nombre, $email, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Iniciar sesión
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id_usuario"] = $id_usuario;
              $_SESSION["nombre"] = $nombre;

              echo "<script>
                                alert('Inicio de sesión exitoso.');
                                window.location.href = 'welcome.php';
                            </script>";
              exit();
            } else {
              echo "<script>
                                alert('Error: Contraseña incorrecta.');
                                window.history.back();
                            </script>";
              exit();
            }
          }
        } else {
          echo "<script>
                        alert('Error: El correo no está registrado.');
                        window.history.back();
                    </script>";
          exit();
        }
      } else {
        echo "<script>
                    alert('Error al procesar tu solicitud. Inténtalo más tarde.');
                    window.history.back();
                </script>";
        exit();
      }
      mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($link);
}
