<?php
session_start();

if (!isset($_SESSION["word"])) {
    header("Location: practica1.php");
    exit;
}

echo "¡La palabra ingresada es: " . $_SESSION["word"] . "!";

?>

