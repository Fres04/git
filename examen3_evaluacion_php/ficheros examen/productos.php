<?php
require 'sesiones.php';
require_once 'bd.php';
require_once 'bd_examen.php';
comprobar_sesion();

if (isset($_GET['mostrar'])) {
    $mostrar = $_GET['mostrar'];
    setcookie('productos_por_pagina', $mostrar, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    header('Location: productos.php?categoria=' . $_GET['categoria']); // Redirigir a la misma página después de cambiar el número de productos por página
    exit();
}

$productosPorPagina = isset($_COOKIE['productos_por_pagina']) ? $_COOKIE['productos_por_pagina'] : 10;
$productosPorPagina = intval($productosPorPagina); // Convertir a entero

$cat = cargar_categoria($_GET['categoria']);
$_SESSION['cat'] = $_GET['categoria'];

$totalProductos = productos_en_categoria($_GET['categoria']);
$totalPaginas = ceil($totalProductos / $productosPorPagina);

if (!isset($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$inicio = ($pagina - 1) * $productosPorPagina;
$productos = cargar_productos_categoria($_GET['categoria'], $inicio, $productosPorPagina);

if ($cat === FALSE or $productos === FALSE) {
    echo "<p class='error'>Error al conectar con la base de datos</p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabla de productos por categoría</title>
</head>
<body>
    <?php
    require 'cabecera.php';

    echo "<h1>" . $cat['Nombre'] . "</h1>";
    echo "<p>" . $cat['Descripcion'] . "</p>";

    // Formulario select para que el restaurante elija la cantidad de productos por página
	echo "<form action='' method='get'>";
	echo "<input type='hidden' name='categoria' value='" . $_GET['categoria'] . "'>"; // Campo oculto para enviar el código de la categoría
	echo "<label for='mostrar'>Mostrar:</label>";
	echo "<select name='mostrar' id='mostrar'>";
	echo "<option value='5' " . ($productosPorPagina == 5 ? 'selected' : '') . ">5</option>";
	echo "<option value='10' " . ($productosPorPagina == 10 ? 'selected' : '') . ">10</option>";
	echo "<option value='$totalProductos' " . ($productosPorPagina == $totalProductos ? 'selected' : '') . ">Todos</option>";
	echo "</select>";
	echo "<input type='submit' value='Mostrar'>";
	echo "</form>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<a href='?categoria=" . $_GET['categoria'] . "&pagina=" . $i . "'>" . $i . "</a> ";
    }
    echo "<table>"; //abrir la tabla
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";
    foreach ($productos as $producto) {
        if ($producto['Stock'] >= 0) {
            $cod = $producto['CodProd'];
            $nom = $producto['Nombre'];
            $des = $producto['Descripcion'];
            $peso = $producto['Peso'];
            $stock = $producto['Stock'];
            echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td>
            <td><form action='anadir.php' method='POST'>
            <input name='unidades' type='number' min='1' value='1'>
            <input type='submit' value='Comprar'><input name='cod' type='hidden' value='$cod'>
            </form></td></tr>";
        }
    }
    echo "</table>";


    ?>
</body>
</html>
