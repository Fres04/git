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
    $media = array_sum($datos)/count($datos);
   return $media;
   
}
function moda ($datos){
    $conteo = array_count_values($datos);
    arsort($conteo);
    $moda_valor = key($conteo);
    $moda_repeticiones = current($conteo);

    if ($moda_repeticiones == max($conteo)) {
        return "Conjunto multimodal: Valor que más se repite: $moda_valor, Número de repeticiones: $moda_repeticiones";
    } else {
        return "Conjunto unimodal: Valor que más se repite: $moda_valor, Número de repeticiones: $moda_repeticiones";
    }
   
}
function mediana ($datos){
    sort($datos);
    $count = count($datos);
    $mediana = ($count % 2 == 0) ? ($datos[$count/2 - 1] + $datos[$count/2]) / 2 : $datos[floor($count/2)];
    
    return "Mediana (Me o Q2): $mediana";
   
}

function varianzadesviacionTipica ($datos){
    $count = count($datos);
    $media = array_sum($datos) / $count;
    $varianza = array_sum(array_map(function($x) use ($media) { return pow($x - $media, 2); }, $datos)) / $count;
    $desviacion_tipica = sqrt($varianza);

    return "Varianza: $varianza, Desviación Típica (SD): $desviacion_tipica";
   
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
/////////////
$maxmin = recorrido($datos);
echo ("Recorrido: ". $maxmin . "</br>");
/////////////
$mediaa =media($datos);
echo ("Media: ". $mediaa . "</br>");
///////////////////////////////////
$mostrarModa = moda($datos);
echo moda($datos) . "\n" . "</br>";
///////////////////////////////////
$mostrarMediana = mediana($datos);
echo mediana($datos) . "\n" . "</br>";
///////////////////////////////////
$mostrarDesviacion = varianzadesviacionTipica($datos);
echo $mostrarDesviacion . "\n"  . "</br>";
//////////////////////////
$resultados = calcularCuartiles($datos);
echo "Q1: " . $resultados['Q1'] . "\n" . "</br>";
echo "Q3: " . $resultados['Q3'] . "\n" . "</br>";
?>