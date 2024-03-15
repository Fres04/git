<?php
if (isset($_POST["'Código'"])) {
    alert("El Código que pusiste no esta en la base de datos".$_POST["'Código'"]) ;
}else{
    $cod = $_POST['codigo'];
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
 $usuario = 'root';
 $clave = '';
 try {
 $bd = new PDO($cadena_conexion, $usuario, $clave);
 echo "Conexión realizada con éxito<br>"; 
 $sql = "SELECT * FROM usuarios where Código = $cod";
 $usuarios = $bd->query($sql);
 echo "Número de usuarios: " . $usuarios->rowCount() . "<br>";
 foreach ($usuarios as $usu) {
 print " Codigo : " . $usu['Código'] . "<br>";
 print "Nombre : " . $usu['Nombre']. "<br>";
 print " Clave : " . $usu['Clave'] . "<br>";
 print " Rol : " . $usu['Rol'] . "<br>";
 }
 } catch (PDOException $e) {
 echo 'Error con la base de datos: ' . $e->getMessage();
}}

?>