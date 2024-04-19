<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form id="loginForm">
        <div>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena">
        </div>
        <div>
            <input type="submit" value="Iniciar Sesión">
        </div>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const usuario = document.getElementById('usuario').value;
            const contrasena = document.getElementById('contrasena').value;

            // Realizar una solicitud al servidor para manejar la validación
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'validar_credenciales.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    alert(response.mensaje);
                } else {
                    alert('Error al procesar la solicitud');
                }
            };
            xhr.send('usuario=' + encodeURIComponent(usuario) + '&contrasena=' + encodeURIComponent(contrasena));
        });
    </script>
</body>
</html>

