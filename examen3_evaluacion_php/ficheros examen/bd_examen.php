<?php
require_once "bd.php";
function cartera_productos($nombre) {
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $ins = "SELECT CodProd, Nombre FROM productos WHERE CodProd=?";
    $resul = $bd->prepare($ins);
    $resul->execute(array($nombre));
    if (!$resul) {
        $bd->rollBack();
        echo "Error en la base de datos.";
        return FALSE;
    } else {
        $producto = $resul->fetch(PDO::FETCH_ASSOC);
        return $producto;
    }
}
function eliminar_producto($codigo_producto) {
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $bd->beginTransaction();
$borrar_producto = "DELETE FROM productos WHERE CodProd=?";
$codigo_producto="DELETE FROM pedidosproductos where CodProd=?";
$stmt_producto = $bd->prepare($borrar_producto);
$stmt_producto->execute(array($codigo_producto));
if ($stmt_producto->rowCount() > 0) {
    $bd->commit();
    return true;
} else {
    $bd->rollBack();
    return false;
}
}
function cuenta_pedidos($fechaInicio, $fechaFinal) {
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $consulta_pedidos = "SELECT COUNT(*) AS total_pedidos FROM pedidos WHERE Fecha BETWEEN ? AND ?";
    $sql_pedidos = $bd->prepare($consulta_pedidos);
    $sql_pedidos->execute(array($fechaInicio, $fechaFinal));
    $resultado_pedidos = $sql_pedidos->fetch(PDO::FETCH_ASSOC);
    $total_pedidos = $resultado_pedidos['total_pedidos'];

    $consulta_productos = "SELECT productos.Nombre, SUM(pedidosproductos.Unidades) AS Cantidad
                           FROM pedidos
                           LEFT JOIN pedidosproductos ON pedidos.CodPed = pedidosproductos.CodPed
                           LEFT JOIN productos ON pedidosproductos.CodProd = productos.CodProd
                           WHERE pedidos.Fecha BETWEEN ? AND ?
                           GROUP BY productos.Nombre";
    $sql_productos = $bd->prepare($consulta_productos);
    $sql_productos->execute(array($fechaInicio, $fechaFinal));
    $resultados_productos = $sql_productos->fetchAll(PDO::FETCH_ASSOC);

    $productos_array = array();
    foreach ($resultados_productos as $producto) {
        $nombre_producto = $producto['Nombre'];
        $cantidad_producto = $producto['Cantidad'];
        $productos_array[$nombre_producto] = $cantidad_producto;
    }

    $resultado_final = array(
        'pedidos' => $total_pedidos,
        'productos' => $productos_array
    );
    return $resultado_final;
    
}

?>