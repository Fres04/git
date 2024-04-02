<?php
$conexion = new PDO('mysql:dbname=empresa;host=127.0.0.1', 'root', '');

function comprobar_usuario($nombre, $clave, $conexion){
    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre AND clave = :clave";
    
    $ok = $conexion->prepare($sql);
    
    $ok->execute(array(':nombre' => $nombre, ':clave' => $clave));
    
    if ($ok->rowCount() > 0) {
        $usu = $ok->fetch();
        return $usu;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    $usu = comprobar_usuario($_POST['usuario'], $_POST['clave'], $conexion);
    
    if($usu == false){
        $err = true;
        $usuario = $_POST['usuario'];
    } else {    
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: sesiones1_principal.php");    
    }    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de login</title>        
    <meta charset="UTF-8">
</head>
<body>    
    <?php if(isset($_GET["redirigido"])){
        echo "<p>Haga login para continuar</p>";
    }?>
    <?php if(isset($err) && $err == true){
        echo "<p>Revise usuario y contraseña</p>";
    }?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        Usuario
        <input value="<?php if(isset($usuario)) echo $usuario; ?>" id="usuario" name="usuario" type="text">                            
        Clave            
        <input id="clave" name="clave" type="password">                        
        <input type="submit">
    </form>
</body>
</html>