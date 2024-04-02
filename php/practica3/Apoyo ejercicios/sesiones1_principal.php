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

$esAdministrador = ($_SESSION['usuario'] === 'admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (basename($_SERVER['PHP_SELF']) === 'editar.php') {
        header("Location: sesiones1_login.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Página principal</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php echo "Bienvenido " . $_SESSION['usuario']; ?>

    <?php if ($esAdministrador): ?>
        <h2>Datos de usuarios registrados:</h2>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Clave</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuariosRegistrados as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['Código']; ?></td>
                        <td><?php echo $usuario['Nombre']; ?></td>
                        <td><?php echo $usuario['Clave']; ?></td>
                        <td><?php echo $usuario['Rol']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Edición de roles de usuario:</h2>
        <form action="editar_rol.php" method="post" target="_blank">
            <label for="usuario">Selecciona un usuario:</label>
            <select name="usuario" id="usuario">
                <?php foreach ($usuariosRegistrados as $usuario): ?>
                    <option value="<?php echo $usuario['Código']; ?>"><?php echo $usuario['Nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>
</html>
