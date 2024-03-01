<?php
session_start();

if (!isset($_SESSION["word"])) {
    header("Location: practica1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 3</title>
</head>
<body>
    <h2>¡Has ingresado la palabra correctamente!</h2>
    <p>La palabra que ingresaste es: <?php echo $_SESSION["word"]; ?></p>
    
</body>
</html>

