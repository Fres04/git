<?php
session_start();

if (!isset($_SESSION["word"])) {
    header("Location: practica1.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word2 = $_POST["word2"];
    if (ctype_alnum($word2)) {
        if ($word2 === $_SESSION["word"]) {
            header("Location: practica3.php");
            exit;
        } else {
            echo "La palabra no coincide con la ingresada anteriormente.";
        }
    } else {
        echo "Por favor, ingresa una palabra válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 2</title>
</head>
<body>
    <form method="post" action="pagina-2.php">
        <label for="word2">Ingresa la misma palabra nuevamente:</label>
        <input type="text" id="word2" name="word2">
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>

