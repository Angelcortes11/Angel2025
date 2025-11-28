<?php

class Usuario
{
    // Propiedades
    private $id;
    private $nombre;
    private $apellido;
    private $rol;
    private $email;

    // Propiedad estática
    private static $contadorUsuarios = 0;

     
    public function __construct($nombre, $apellido, $rol, $email)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rol = $rol;
        $this->email = $email;

        self::$contadorUsuarios++;
    }

    // Método normal
    public function nombreCompleto(): string
    {
        return $this->rol . " Vol. " . $this->nombre . " " . $this->apellido . " # " . $this->email;
    }

    // Método estático
    public static function cantidadUsuarios()
    {
        return self::$contadorUsuarios;
    }

    // Getters y Setters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
?>
