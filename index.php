<?php

// PROYECTO: Mini sistema de usuarios con roles
// ALUMNO: Ángel Bruno Cortes Hamie
// OBJETIVO: Crear, editar y eliminar usuarios con diferentes roles

//Arrays (indexado, asociativo y multidimencional)
$usuarioUno = [
     "id" => TRUE,
     "Nombre" => "Roberto",
     "Edad" => "38",
     "Rol" => "Jefe"
];

$usuarioDos = [
    "id" => TRUE,
    "Nombre" => "Maria",
    "Edad" => "26",
    "Rol" => "Secretaria"
];

$usuarioTres = [
    "id" => TRUE,
    "Nombre" => "Carlos",
    "Edad" => "30",
    "Rol" => "Gerente"
];
$usuarioCuatro = [
    "id" => TRUE,
    "Nombre" => "Santiago",
    "Edad" => "23",
    "Rol" => "Programador"
];

$usuarios = [$usuarioUno, $usuarioDos, $usuarioTres, $usuarioCuatro];

echo "<pre>";
print_r($usuarios);
echo "</pre>";


// Funciones propias y nativas
function Permanencia( string $nombre, int $tiempoEnLaEmpresa = 5): string {
    $mensaje = "El usuario/a $nombre tiene $tiempoEnLaEmpresa años en la empresa.";
    echo "<pre>";
    print_r($mensaje);
    echo "</pre>";
    return $mensaje;
    
}

 Permanencia("Carlos", 9) ;


// En PHP.net busqué la funcion de strtoupper que sirve para convertir un String a mayusculas
$rol = "jefe";
$rolMayusculas = strtoupper($rol);

echo "<pre>";
print_r($rolMayusculas);
echo "</pre>";

//Condicionales (if, else, while, switch y foreach )

$cantidadDeEmpleados = 130;

if($cantidadDeEmpleados > 100 ) {
    echo "<pre>";
    print_r(" Hay que despedir personal urgentemente");
    echo "</pre>";
}else{
    echo "<pre>";
    print_r(" Aumento salarial para todos");
    echo "</pre>";
}


$puestosDisponibles = 4; 

while ($puestosDisponibles > 0){
    echo "<pre>";
    print_r("Podemos seguir contratando personal en zonas libres");
    echo "</pre>";
    
    echo "<pre>";
    print_r($puestosDisponibles);
    echo "</pre>";

    break;
}


$rolUsuario = "Secretario";

switch($rolUsuario){

    case "Jefe":
        echo "<pre>";
        print_r("Lider en absoluto de esta empresa");
        echo "</pre>";
        break;

    case "Secretario":
        echo "<pre>";
        print_r("Gestiona la agenda, redacta documentos, atiende llamadas y organiza reuniones");
        echo "</pre>";

        echo "<pre>";
        print_r("Rol: " . $rolUsuario);
        echo "</pre>";
        break;

    default:
        echo "<pre>";
        print_r("Empleado de la empresa");
        echo "</pre>";
}


$empleados = ["Roberto", "Maria", "Carlos", "Santiago"];
foreach ($empleados as $nombre){
    echo "<p> ¡Buen/a empleado/a $nombre!</p>";
    
    
}
 
//includes y sitio dinamico

$jsonData = file_get_contents("data.json");
$arrayUsuarios = json_decode($jsonData, true); 

echo "<pre>";
print_r($arrayUsuarios);
echo "</pre>";



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
<form method="POST" action="procesar.php">
    <div>
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required>
    </div>

    <br>

    <div>
        <label for="apellido">Apellido</label><br>
        <input type="text" name="apellido" id="apellido" required>
    </div>

    <br>

    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required>
    </div>

    <br>

    <div>
        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password" required>
    </div>

    <br>

    <div>
        <label for="rol">Rol del usuario</label><br>
        <select name="rol" id="rol">
            <option value="jefe">Jefe</option>
            <option value="secretario">Secretario</option>
            <option value="gerente">Gerente</option>
        </select>
    </div>

    <br><br>

    <input type="submit" value="Registrar">
</form>
<hr>

<h2>Usuarios registrados</h2>

<?php

$archivo = 'data/usuarios.json'; // Ruta de tu JSON

if(file_exists($archivo)) {
    $usuarios = json_decode(file_get_contents($archivo), true);

    if(!empty($usuarios)) {
        echo "<ul>";
        foreach($usuarios as $index => $usuario) {
            echo "<li>";
            echo $usuario['nombre'] . " " . $usuario['apellido'] . " (" . $usuario['rol'] . ") - " . $usuario['email'];
            echo " <a href='editar.php?id=$index'>Editar</a>";
            echo " | <a href='eliminar.php?id=$index' onclick='return confirm(\"¿Seguro que quieres eliminar este usuario?\");'>Eliminar</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay usuarios registrados.</p>";
    }
} else {
    echo "<p>No hay usuarios registrados.</p>";
}
?>

</body>
</html>


<?php


require 'Clases/usuario.php';

// Crear objetos
$usuario1 = new Usuario("Ángel", "Cortes", "Jefe", "angel@gmail.com");
$usuario2 = new Usuario("Bruno", "Cano", "Secretario", "bruno@gmail.com");

// Mostrar datos
echo "<pre>";
print_r($usuario1);
echo "</pre>";

echo "<pre>";
print_r($usuario2);
echo "</pre>";


// Mostrar cantidad de usuarios creados
echo "Cantidad de usuarios: " . Usuario::cantidadUsuarios();


?>

