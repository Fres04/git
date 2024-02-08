<?php
$datos = [0, 0, 5, 0, 9, 5, 2, 0, 6, 4, 4, 9, 1, 0, 5, 5, 9, 2, 0, 6, 6, 6, 9, 7, 8, 2, 5, 6, 8, 7,
7, 9, 0, 3, 0, 3, 1, 0, 4, 9, 7, 4, 3, 3, 2, 1, 4, 0, 0, 2, 4, 1, 3, 3, 4, 0, 0, 2, 0, 5,
4, 3, 4, 2, 5, 5, 5, 0, 2, 1, 1, 5, 3, 1, 0, 5, 5, 9, 8, 7, 3, 2, 4, 2, 4, 9, 9, 1, 5, 6];
 
function recorrido ($datos){
    $mayor = max($datos);
    $menor = min($datos);
    return $mayor-$menor;
 
}
function media ($datos){
    $media = avg($datos);
   return $media;
   
}
function calcularCuartiles($datos) {
    sort($datos);
    $n = count($datos);
    $q1_pos = ($n + 1) * 0.25; 
    $q2_pos =($n + 1) * 0.50;
    $q3_pos = ($n + 1) * 0.75; 
    $q4_pos = ($n + 1) * 0.100; 
    ////////////////////////////
    $q1 = $datos[floor($q1_pos) - 1];
    $q2 = $datos[floor($q2_pos) - 1];
    $q3 = $datos[floor($q3_pos) - 1];
    $q4 = $datos[floor($q4_pos) - 1];

    return ['Q1' => $q1, 'Q3' => $q3];
}
$maxmin = recorrido($datos);
echo ("Recorrido: ". $maxmin);
$mediaa =media($datos);
echo ("Media: ". $mediaa);
$resultados = calcularCuartiles($datos);
echo "Q1: " . $resultados['Q1'] . "\n" . "</br>";
echo "Q3: " . $resultados['Q3'] . "\n";

?>