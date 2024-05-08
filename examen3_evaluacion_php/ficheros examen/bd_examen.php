<?php
require_once "bd.php";

function cartera_productos(){
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
    $sql="SELECT CodProd, Nombre FROM Productos ORDER BY Nombre";
    $resul=$bd->query($sql);
    if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul->fetchALL(PDO::FETCH_ASSOC);
}
function eliminar_producto($codProd){
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
    $bd->beginTransaction();
    $sql="DELETE FROM pedidosproductos where CodProd = ?";
    $preparada=$bd->prepare($sql);
    $resul=$preparada->execute(array($codProd));
    if (!$resul) {
        $bd->rollback();
        return false;
    } else {
        $sql="DELETE FROM productos where CodProd = ?";
        $preparada=$bd->prepare($sql);
        $resul=$preparada->execute(array($codProd));
        if (!$resul) {
            $bd->rollback();
            return false;
        }
    }
    $bd->commit();
    return true;
}
function cuenta_pedidos($fechaInicio, $fechaFinal) {
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    
    // Consulta preparada para obtener el total de pedidos entre las fechas
    $sqlPedidos = "SELECT COUNT(*) AS total_pedidos FROM pedidos WHERE fecha >= ? AND fecha <= ?";
    $stmtPedidos = $bd->prepare($sqlPedidos);
    $stmtPedidos->execute(array($fechaInicio, $fechaFinal));
    $totalPedidos = $stmtPedidos->fetchColumn();

    // Consulta preparada para obtener el total de productos pedidos
    $sqlProductos = "SELECT productos.Nombre, SUM(pedidosproductos.Unidades) AS Cantidad 
                    FROM pedidos 
                    LEFT JOIN (pedidosproductos 
                     LEFT JOIN productos ON pedidosproductos.CodProd=productos.CodProd)
                    ON pedidos.CodPed = pedidosproductos.CodPed 
                    WHERE pedidos.Fecha >= ? AND pedidos.Fecha <= ?
                    GROUP BY productos.Nombre
                    ORDER BY productos.Nombre";
    $stmtProductos = $bd->prepare($sqlProductos);
    $stmtProductos->execute(array($fechaInicio, $fechaFinal));
    $productos = $stmtProductos->fetchAll(PDO::FETCH_ASSOC);

    $resultado = array(
        'pedidos' => $totalPedidos,
        'productos' => $productos
    );

    return $resultado;
}



?>