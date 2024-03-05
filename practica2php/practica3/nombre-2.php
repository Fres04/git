<?php
session_start();

if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
    header('Location: index.html');
} else {
    echo "Por favor, ingrese su nombre.";
}
?>
