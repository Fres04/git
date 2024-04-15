<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
/*
  EDITAR
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['pagina_inicio'])){
    setcookie('pagina_inicio',$_POST['pagina_inicio'],time()+3600*24);
	$_COOKIE['pagina_inicio']=$_POST['pagina_inicio'];
	}else{
		setcookie('pagina_inicio','',time()-3600*24);
		$_COOKIE['pagina_inicio']=NULL;
	}
	if(isset($_POST['stock'])){
		setcookie('stock',$_POST['stock'],time()+3600*24);
		$_COOKIE['stock']=$_POST['stock'];
	}
	else{
		setcookie('stock','',time()-3600*24);
		$_COOKIE['stock']=NULL;
	}
	if(isset($_POST['carrito'])){
		setcookie('carrito',json_encode($_SESSION['carrito']),time()+3600*24);
		$_COOKIE['carrito']=json_encode($_SESSION['carrito']);
	}
	else{
		setcookie('carrito','',time()-3600*24);
		$_COOKIE['carrito']=NULL;
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Preferencias</title>
</head>
<?php require 'cabecera.php'; ?>
<h1>Preferencias</h1>
<form action="preferencias.php" method="POST">
	<input type="checkbox" id="pagina_inicio" name="pagina_inicio" value="carrito.php" 
	<?php /* EDITAR */ 
	if(isset($_COOKIE['pagina_inicio'])){
		echo 'checked';
	}
	?>>
	<label for="pagina_inicio"> Ver carrito al acceder </label><br>
	<input type="checkbox" id="stock" name="stock" value=1 
	<?php /* EDITAR */ 
	if(isset($_COOKIE['stock'])){
		echo 'checked';
	}
	?>>
	<label for="stock"> Ocultar productos sin stock </label><br>
	<input type="checkbox" id="carrito" name="carrito" value=1 
	<?php /* EDITAR */ 
	if(isset($_COOKIE['carrito'])){
		echo 'checked';
	}
	?>>
	<label for="carrito"> Guardar el carrito entre sesiones </label><br><br>
	<input type="submit" value="Guardar">
</form>

</body>

</html>