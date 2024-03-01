<?php
session_start();

if(isset($_SESSION['nombre'])) {
    echo "Nombre: ".$_SESSION['nombre'];
} else {
    echo "<form action='nombre-2.php' method='post'>
            Nombre: <input type='text' name='nombre'>
            <input type='submit' value='Enviar'>
          </form>";
}
?>
