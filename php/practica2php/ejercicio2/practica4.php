<?php
session_start();

if (!isset($_SESSION["word"])) {
    header("Location: practica1.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $finalWord = $_SESSION["word"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 4</title>
</head>
<body>
    <h2>¡Felicidades! Has ingresado la palabra correctamente:</h2>
    <p><?php echo $finalWord; ?></p>
</body>
</html>

