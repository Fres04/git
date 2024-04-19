<?php
// Obtener los valores del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Conectar a la base de datos (reemplaza 'host', 'usuario', 'contraseña' y 'basededatos' con tus propios valores)
$conexion = new mysqli('host', 'usuario', 'contraseña', 'basededatos');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para verificar las credenciales
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conexion->query($consulta);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($resultado->num_rows > 0) {
    // Credenciales válidas
    echo json_encode(array('mensaje' => 'Inicio de sesión exitoso'));
} else {
    // Credenciales inválidas
    echo json_encode(array('mensaje' => 'Credenciales incorrectas'));
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
