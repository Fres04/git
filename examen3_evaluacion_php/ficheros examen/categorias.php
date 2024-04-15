<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	require_once 'bd_examen.php';
	comprobar_sesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Lista de categorías</title>
	</head>
	<body>
		<?php require 'cabecera.php';?>
		<h1>Lista de links del examen</h1>
		<li><a href='cartera_productos.php'> cartera</li>
		<h1>Lista de categorías</h1>		
		<!--lista de vínculos con la forma 
		productos.php?categoria=1-->
		<?php
		$categorias = cargar_categorias();

		if($categorias===false){
			echo "<p class='error'>Error al conectar con la base datos</p>";
		}else{
			echo "<ul>"; //abrir la lista
			$url = "productos.php?categoria=".$cat['CodCat']. "&numProducto=0";
			foreach($categorias as $cat){				
				/*$cat['nombre] $cat['codCat']*/
				$url = "productos.php?categoria=".$cat['CodCat'];
				echo "<li><a href='$url'>".$cat['Nombre']."</a></li>";
			}
			echo "</ul>";
		}
		?>
	</body>
</html>