<?php
include "encriptar.php";
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Validación del usuario
if (empty($usuario) || !preg_match('/^[a-zA-Z0-9]+$/', $usuario)) {
    echo "Error: El usuario no puede estar vacío y solo puede contener caracteres alfanuméricos sin espacios.";
    exit;
}

// Validación de la clave
if (empty($clave) || !preg_match('/^[a-zA-Z0-9]+$/', $clave)) {
    echo "Error: La clave no puede estar vacía y solo puede contener caracteres alfanuméricos.";
    exit;
}

$archivo = fopen("acceso.txt", "r");
while ($linea = fgets($archivo)) {
    [$usuarioExistente, $claveExistente, $rol] = explode(" ", $linea);
    if ($usuarioExistente === $usuario) {
        echo "Error: El usuario ya existe.";
        exit;
    }
}
fclose($archivo);


// file_put_contents — Escribir datos en un fichero 
$encriptada = encript_blowfish($clave);
$nuevaLinea = "$usuario $encriptada 0\n";
file_put_contents("acceso.txt", $nuevaLinea, FILE_APPEND);

echo "Registro exitoso. Los datos se han guardado en acceso.txt.";
?>

