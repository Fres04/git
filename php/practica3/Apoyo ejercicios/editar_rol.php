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
    $usuarioCodigo = $_POST['usuario'];

    // Encontrar el usuario seleccionado
    $usuarioSeleccionado = null;
    foreach ($usuariosRegistrados as $usuario) {
        if ($usuario['Código'] == $usuarioCodigo) {
            $usuarioSeleccionado = $usuario;
            break;
        }
    }

    if ($usuarioSeleccionado) {
        // Mostrar los datos del usuario seleccionado y formulario para editar el rol
        echo "<h2>Editar Rol de Usuario: {$usuarioSeleccionado['Nombre']}</h2>";
        echo "<p>Rol actual: {$usuarioSeleccionado['Rol']}</p>";
        
        // Formulario para editar el rol
        echo "<form action='actualizar_rol.php' method='post'>";
        echo "<input type='hidden' name='codigo_usuario' value='{$usuarioSeleccionado['Código']}'>";
        echo "<label for='nuevo_rol'>Nuevo Rol:</label>";
        echo "<input type='text' name='nuevo_rol'>";
        echo "<button type='submit'>Actualizar Rol</button>";
        echo "</form>";
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
