<?php
include "bd_examen.php";
if(isset($_POST['Nombre'])){
$codPedido=$_POST['Nombre'];
$resultado= buscar_productos($codped);
}
echo (json_encode($resultado));