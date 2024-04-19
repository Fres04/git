<?php	
$cadena_conexion = 'mysql:dbname=pedidos;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $result = $bd->query("select *from productos");
    $filas = $result->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($filas);
    echo ($json);
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

