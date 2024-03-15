<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];

    if (empty($nombre)) {
        echo "Por favor, ingresa tu nombre.";
        echo '<a href="ejercicio1.php">Volver al primer formulario</a>';
    } else {
        $_SESSION["nombre"] = $nombre;
        header("Location: ejercicio3.php");
        exit;
    }
} else {
header("Location: ejercicio1.php");
    exit;
}
?>
