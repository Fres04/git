<?php
session_start();

if(isset($_SESSION['nombre']) && isset($_SESSION['apellidos'])) {
    echo "Nombre: ".$_SESSION['nombre']."<br>";
    echo "Apellidos: ".$_SESSION['apellidos'];
} else {
    echo "No se ha ingresado la información completa.";
}
?>
