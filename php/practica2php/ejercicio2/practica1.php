<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST["word"];
    if (ctype_alnum($word)) {
        $_SESSION["word"] = $word;
        header("Location: practica2.php");
        exit;
    } else {
        echo "Por favor, ingresa una palabra válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 1</title>
</head>
<body>
    <form method="post" action="practica1.php">
        <label for="word">Ingresa una palabra:</label>
        <input type="text" id="word" name="word">
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>

