<?php

  include "Usuario.php";
  include "ModeloUsuario.php";

  class Controller {

    private $arrayPost;
    private $modelo;

    function __construct($accion, $post) {

      // Inicializar sesion
      if(!isset($_SESSION)){
        session_start();
      }

      // Guardar los valores recibidos por HTTP POST
      $this->arrayPost = $post;
      // Inicializar el modelo para interactuar con la DB
      $this->modelo = new ModeloUsuario();

      if ($accion == "login") {
        $this->login();
      }
      elseif ($accion == "registrarUsuario") {
        $this->registrarUsuario();
      }
      elseif ($accion == "modificarContrasena") {
        $this->modificarContrasena();
      }
      else {
        echo "No accion correcta detectada";
      }

    }

    private function login() {

      // Obtener datos del formulario
      $nombreUsuario = $this->arrayPost['nombreUsuario'];
      $contrasena = $this->arrayPost['contrasena'];

      $paginaInicio = "home.php";
      $paginaLogin = "login.html";

      // Traer datos de la base
      $usuarioAEvaluar = $this->modelo->obtenerUsuario($nombreUsuario);

      // Los credenciales hacen match
      if (!is_null($usuarioAEvaluar) && $usuarioAEvaluar->obtenerContrasena() == $contrasena) {
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['contrasena'] = $contrasena;
        include_once $paginaInicio;
      }
      else {
        echo "\nCredenciales inválidos";
        session_destroy();
        include_once $paginaLogin;
      }

    }

    private function registrarUsuario() {

      // Obtener valores del formulario
      $nombre = $this->arrayPost['nombre'];
      $apellido1 = $this->arrayPost['apellido1'];
      $apellido2 = $this->arrayPost['apellido2'];
      $nombreUsuario = $this->arrayPost['nombreUsuario'];
      $contrasena = $this->arrayPost['contrasena'];
      $email = $this->arrayPost['email'];
      $numeroTelefono = $this->arrayPost['numeroTelefono'];
      $codigoArea = $this->arrayPost['codigoArea'];

      $paginaLogin = "login.html";

      // Traer datos de la base
      $user = new Usuario($nombreUsuario, $nombre, $apellido1, $apellido2, $contrasena, $email, $numeroTelefono, $codigoArea);

      $estado = $this->modelo->insertarUsuario($user);

      if ( is_integer($estado) ) {
        echo "Registro exitoso";
        include_once $paginaLogin;
      }
      else {
        echo "<h2> Registro fallido </h2>";
        echo "<h4> $estado </h4>";
      }

    }

    private function modificarContrasena() {

      if ($_SESSION['nombreUsuario'] == null) {
        echo "No hay autorización";
        die();
      }

      $contrasenaActual = $this->arrayPost["contrasenaActual"];
      $contrasenaNueva = $this->arrayPost["contrasenaNueva"];

      $contrasenaRealActual = $_SESSION["contrasena"];
      $nombreUsuarioSesion = $_SESSION['nombreUsuario'];

      if ($contrasenaActual == $contrasenaRealActual) {
        $this->modelo->actualizarContrasena($nombreUsuarioSesion, $contrasenaNueva);
        echo "Actualización exitosa";
        include_once "home.php";
      }

      else {
        echo "Contraseña incorrecta";
        include_once "actualizarContrasena.html";
      }

    }

  }

?>
