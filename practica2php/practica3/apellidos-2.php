<?php
session_start();

if(isset($_POST['apellidos']) && !empty($_POST['apellidos'])) {
    $_SESSION['apellidos'] = $_POST['apellidos'];
    header('Location: index.php');
} else {
    echo "Por favor, ingrese sus apellidos.";
}
?>
