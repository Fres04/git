<!-- pagina-3.php -->
<?php
session_start();

if (isset($_SESSION["nombre"])) {
      $nombre = $_SESSION["nombre"];
} else {
      header("Location: ejercicio1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario en Dos Pasos - Apellidos</title>
</head>
<body>
    <h1>Formulario en Dos Pasos - Apellidos</h1>
    <p>Nombre: <?php echo $nombre; ?></p>
    <form action="ejercicio4.php" method="post">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>
