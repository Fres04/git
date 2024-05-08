<?php
function buscar_productos(string $cadena_busqueda){
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
    $preparada = $bd->prepare("SELECT CodProd, Nombre, Descripccion, Peso, Stock, CodCat FROM productos WHERE Nombre = ?");
	$preparada->execute(array('%'.$cadena_busqueda.'%'));
    if (!$preparada->rowCount() === 0) {
		$preparada->fetchAll(PDO::FETCH_ASSOC);
	}
    else{
        return false;
    }
    $bd->commit();
    }
function validar_envios($codped) {
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    
    // Consulta preparada para actualizar los pedidos
    $sqlPedidos = "UPDATE pedidos SET enviado =1 where CodPed= ? ";
    $stmtPedidos = $bd->prepare($sqlPedidos);
    $stmtPedidos->execute(array($codped));
    $totalPedidos = $stmtPedidos->fetchColumn();

    // Consulta preparada para insertar la fecha actual a pedidos
    $sqlProductos = "UPDATE pedidos SET fecha =CURRENT_TIMESTAMP where CodPed=?";
    $stmtProductos = $bd->prepare($sqlProductos);
    $stmtProductos->execute(array($codped));
    $productos = $stmtProductos->fetchAll(PDO::FETCH_ASSOC);
    if($stmtPedidos->rowCount()>1){
        return false;
    }
    if($stmtProductos->rowCount()>1){
        return false;
    }
    $bd->commit();
}