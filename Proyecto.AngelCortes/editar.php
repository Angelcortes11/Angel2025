<?php
// Mostrar errores (opcional)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$archivo = 'data/usuarios.json';

// Tomar el ID del usuario desde la URL
$id = $_GET['id'] ?? null;

// Leer usuarios
if(file_exists($archivo)) {
    $usuarios = json_decode(file_get_contents($archivo), true);
} else {
    $usuarios = [];
}

// Si no existe el ID, redirigir a index.php
if($id === null || !isset($usuarios[$id])) {
    header('Location: index.php');
    exit;
}

// Si se envió el formulario de edición
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarios[$id]['nombre'] = $_POST['nombre'] ?? '';
    $usuarios[$id]['apellido'] = $_POST['apellido'] ?? '';
    $usuarios[$id]['email'] = $_POST['email'] ?? '';
    $usuarios[$id]['password'] = $_POST['password'] ?? '';
    $usuarios[$id]['rol'] = $_POST['rol'] ?? '';

    // Guardar cambios en JSON
    file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

    // Redirigir a index.php
    header('Location: index.php');
    exit;
}

// Obtener datos actuales del usuario
$usuario = $usuarios[$id];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Editar usuario</h1>

            <form method="POST">
                <div>
                    <label for="nombre">Nombre</label><br>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                </div>

                <br>

                <div>
                    <label for="apellido">Apellido</label><br>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido']; ?>" required>
                </div>

                <br>

                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>" required>
                </div>

                <br>

                <div>
                    <label for="password">Contraseña</label><br>
                    <input type="text" name="password" id="password" value="<?php echo $usuario['password']; ?>" required>
                </div>

                <br>

                <div>
                    <label for="rol">Rol del usuario</label><br>
                    <select name="rol" id="rol">
                        <option value="jefe" <?php if($usuario['rol'] == 'jefe') echo 'selected'; ?>>Jefe</option>
                        <option value="secretario" <?php if($usuario['rol'] == 'secretario') echo 'selected'; ?>>Secretario</option>
                        <option value="gerente" <?php if($usuario['rol'] == 'gerente') echo 'selected'; ?>>Gerente</option>
                    </select>
                </div>

                <br><br>

                <input type="submit" value="Guardar cambios">
                <a href="index.php">Volver</a>
            </form>
        </div>
    </div>
</body>
</html>
