<?php
  class Usuario {

    private $nombreUsuario;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $contrasena;
    private $email;
    private $numeroTelefono;
    private $codigoArea;

    function __construct($nombreUsuario, $nombre, $apellido1, $apellido2, $contrasena, $email, $numeroTelefono, $codigoArea) {

        $this->nombreUsuario = $nombreUsuario;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->numeroTelefono = $numeroTelefono;
        $this->codigoArea = $codigoArea;

    }

    public function obtenerNombre() {return $this->nombre;}
    public function obtenerContrasena() {return $this->contrasena;}
    public function obtenerNombreUsuario() {return $this->nombreUsuario;}
    public function obtenerApellido1() {return $this->apellido1;}
    public function obtenerApellido2() {return $this->apellido2;}
    public function obtenerEmail() {return $this->email;}
    public function obtenerNumeroTelefono() {return $this->numeroTelefono;}
    public function obtenerCodigoArea() {return $this->codigoArea;}

  }
?>
