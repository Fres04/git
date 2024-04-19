<?php	
$cadena_conexion = 'mysql:dbname=pedidos;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $result = $bd->query("select codcat, nombre from categorias");
    $filas = $result->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($filas);
    echo ($json);
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

	// $cat1 = array("cod" => 1, "nombre" => "Comida");
	// $cat2 = array("cod" => 2, "nombre" => "Bebida");
	// $array = array($cat1, $cat2);
	// $json = json_encode($array);
	
	// echo $json;
