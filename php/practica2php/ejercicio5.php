<?php
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["apellidos"])) {
     $nombre = $_SESSION["nombre"];
    $apellidos = $_SESSION["apellidos"];
} else {
      header("Location: pagina-1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Resultado</title>
</head>
<body>
    <h1>Formulario - Resultado</h1>
    <p>Nombre completo: <?php echo $nombre . ' ' . $apellidos; ?></p>
  </body>
</html>
