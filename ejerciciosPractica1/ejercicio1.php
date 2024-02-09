<?php
function resolverEcuacionSegundoGrado($a, $b, $c) {
  $hola = $b * $b - 4 * $a * $c;
  $soluciones = [];

  if ($hola > 0) {
    $x1 = (-$b + sqrt($hola)) / (2 * $a);
    $x2 = (-$b - sqrt($hola)) / (2 * $a);
    $soluciones = [$x1, $x2];
    echo "La ecuación tiene dos soluciones reales: " . implode(", ", $soluciones);
  } elseif ($hola === 0) {
    $x = -$b / (2 * $a);
    $soluciones = [$x];
    echo "La ecuación tiene una solución real: " . implode(", ", $soluciones);
  } else {
    echo "sin solucion";
  }
}
resolverEcuacionSegundoGrado(1, 2, 4); 

?>