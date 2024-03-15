<?php
session_start();

if (isset($_SESSION["nombre"])) {
     $apellidos = $_POST["apellidos"];

    if (empty($apellidos)) {
          echo "Por favor, ingresa tus apellidos.";
        echo '<a href="ejercicio3.php">Volver al segundo formulario</a>';
    } else {
          $_SESSION["apellidos"] = $apellidos;
          header("Location: ejercicio5.php");
        exit;
    }
} else {
  header("Location: ejercicio1.php");
    exit;
}
?>
