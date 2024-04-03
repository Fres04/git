<?php
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zona de administradores</title>
</head>
<body>
<?php require 'cabecera.php';?>

		<h1>Zona de administradores</h1>
        <ul>
       <li><a href="datos_usu.php">Datos del restaurante</a></li> 
        </ul>
</body>
</html>