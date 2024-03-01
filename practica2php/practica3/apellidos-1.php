<?php
session_start();

if(isset($_SESSION['apellidos'])) {
    echo "Apellidos: ".$_SESSION['apellidos'];
} else {
    echo "<form action='apellidos-2.php' method='post'>
            Apellidos: <input type='text' name='apellidos'>
            <input type='submit' value='Enviar'>
          </form>";
}
?>
