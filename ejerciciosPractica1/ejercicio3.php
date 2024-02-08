<?php
$datos = [0, 0, 5, 0, 9, 5, 2, 0, 6, 4, 4, 9, 1, 0, 5, 5, 9, 2, 0, 6, 6, 6, 9, 7, 8, 2, 5, 6, 8, 7,
7, 9, 0, 3, 0, 3, 1, 0, 4, 9, 7, 4, 3, 3, 2, 1, 4, 0, 0, 2, 4, 1, 3, 3, 4, 0, 0, 2, 0, 5,
4, 3, 4, 2, 5, 5, 5, 0, 2, 1, 1, 5, 3, 1, 0, 5, 5, 9, 8, 7, 3, 2, 4, 2, 4, 9, 9, 1, 5, 6];
 
function calcularRecorrido ($datos){
    $mayor = max($datos);
    $menor = min($datos);
    echo ($mayor);
    echo($menor);
    return $mayor-$menor;
 
}
function media ($datos){
    $media = avg($datos);
    echo $media;
   return $media;
   
}
?>