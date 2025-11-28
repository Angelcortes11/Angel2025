<?php
// Mostrar errores (opcional, para desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ruta del archivo JSON
$archivo = 'data/usuarios.json';

// Tomar los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$rol = $_POST['rol'] ?? '';

// Crear array del nuevo usuario
$nuevoUsuario = [
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'password' => $password,
    'rol' => $rol
];

// Leer archivo JSON existente
if(file_exists($archivo)) {
    $usuarios = json_decode(file_get_contents($archivo), true);
    if(!is_array($usuarios)) $usuarios = [];
} else {
    $usuarios = [];
}

// Agregar el nuevo usuario al array
$usuarios[] = $nuevoUsuario;

// Guardar el array completo en JSON
file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

// Redirigir a index.php
header('Location: index.php');
exit;
?>
