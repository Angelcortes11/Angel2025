<?php
// Mostrar errores (opcional)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ruta del archivo JSON
$archivo = 'data/usuarios.json';

// Tomar el ID del usuario a eliminar desde la URL
$id = $_GET['id'] ?? null;

if($id !== null && file_exists($archivo)) {
    // Leer JSON existente
    $usuarios = json_decode(file_get_contents($archivo), true);

    if(isset($usuarios[$id])) {
        // Eliminar el usuario
        unset($usuarios[$id]);

        // Reindexar el array para evitar huecos
        $usuarios = array_values($usuarios);

        // Guardar de nuevo en JSON
        file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));
    }
}

// Redirigir de nuevo a index.php
header('Location: index.php');
exit;
?>
