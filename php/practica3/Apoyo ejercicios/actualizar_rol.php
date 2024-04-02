<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: sesiones1_login.php?redirigido=true");
    exit;
}

$usuariosRegistrados = [
    ['Código' => 1, 'Nombre' => 'Carlos', 'Clave' => '11111', 'Rol' => '0'],
    ['Código' => 2, 'Nombre' => 'Alejandro', 'Clave' => '22222', 'Rol' => '0'],
    ['Código' => 3, 'Nombre' => 'Marcos', 'Clave' => '33333', 'Rol' => '0'],
    ['Código' => 8, 'Nombre' => 'admin', 'Clave' => '1', 'Rol' => '1'],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoUsuario = $_POST['Clave'];
    $nuevoRol = $_POST['Rol'];

   
    foreach ($usuariosRegistrados as &$usuario) {
        if ($usuario['Código'] == $codigoUsuario) {
            $usuario['Rol'] = $nuevoRol;
            break;
        }
    }

    header("Location: editar_rol.php?exito=true");
    exit;
}
?>
