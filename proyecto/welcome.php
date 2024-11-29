<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h1>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
