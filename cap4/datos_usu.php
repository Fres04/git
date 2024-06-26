<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Listado de usuarios</title>
</head>

<body>
	<?php
	require 'cabecera.php';
	/* ---- A modificar ----
	Si accedemos mediante POST, actualizamos los datos en la base de datos a través de la función actualizar_restaurante 
	Si la modificación en la base de datos ha sido correcta, mostramos el mensaje "Datos actualizados correctamente"
	En caso contrario, mostramos el mensaje "Error al actualizar los datos"
	*/
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if(!actualizar_restaurantes($_POST)){
		echo "Error no se ha podido actualizar";
	   }
	   else{
		echo  "<h2>Los cambios han sido guardados correctamente.</h2>";
	   }
	}
	$restaurantes = cargar_restaurantes();
	if ($restaurantes === FALSE) {
		echo "<p class='error'>Error al conectar con la base datos</p>";
		exit;
	}

	echo "<table>"; //abrir la tabla
	echo "<tr><th>Correo</th><th>Clave</th><th>País</th><th>CP</th><th>Ciudad</th><th>Dirección</th><th>Rol</th></tr>";
	foreach ($restaurantes as $restaurante) {
		$correo = $restaurante['Correo'];
		$clave = $restaurante['Clave'];
		$pais = $restaurante['Pais'];
		$cp = $restaurante['CP'];
		$ciudad = $restaurante['Ciudad'];
		$direccion = $restaurante['Direccion'];
		$rol = $restaurante['Rol'];
		$codres = $restaurante['CodRes'];
		echo "<tr>
            <form action = 'datos_usu.php' method = 'POST'>
            <td><input name = ':correo' value = '$correo'></td>
            <td><input name = ':clave' value = '$clave'></td>
            <td><input name = ':pais' value = '$pais'></td>
            <td><input name = ':cp' value = '$cp'></td>
            <td><input name = ':ciudad' value = '$ciudad'></td>
            <td><input name = ':direccion' value = '$direccion'></td>
            <td><input name = ':rol' value = '$rol'></td>
            <input name = ':codres'  type='hidden'  value = '$codres'>
            <td><input type = 'submit' value='Modificar'></td>
			</form>
            </tr>";
	}
	echo "</table>";
	function cargar_restaurantes()
{
$res = leer_config(dirname(__FILE__) . "/configuracion.xml", 
dirname(__FILE__) . "/configuracion.xsd");
$bd = new PDO($res[0], $res[1], $res[2]);
$ins = "select * from restaurantes";
$resul = $bd->query($ins);
if (!$resul) {
return FALSE;
}
if ($resul->rowCount() === 0) {
return FALSE;
}
//si hay 1 o más
return $resul;
}
	?>

</body>
</html>