<?php
include "bd_examen.php";
if(isset($_POST['CodPed'])){
$codPedido=$_POST['CodPed'];
$resultado= validar_envios($codped);
}
echo (json_encode($resultado));

