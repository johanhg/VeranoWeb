<?php
include "Validador.php";
include "Conexion.php";

class ModeloUsuario {

  private $ConexionDB;

  function __construct() {
      $this->ConexionDB = Conexion::connect();
  }

  // True en caso de exito y string en caso de error
  public function insertarUsuario($usuario) {
      $resultado = True;

      // Validar campos del usuario
      $resultado = Validador::validarUsuario($usuario);

      if( ! is_integer($resultado)){
        // if resultado no es integer ...
        return $resultado;
      }

      if ($declaracion = $this->ConexionDB->prepare("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?, ?);")) {

        // Guardar atributos del usuario
        $nombreUsuario = $usuario->obtenerNombreUsuario();
        $nombre = $usuario->obtenerNombre();
        $apellido1 = $usuario->obtenerApellido1();
        $apellido2 = $usuario->obtenerApellido2();
        $contrasena = $usuario->obtenerContrasena();
        $email = $usuario->obtenerEmail();
        $numeroTelefono = $usuario->obtenerNumeroTelefono();
        $codigoArea = $usuario->obtenerCodigoArea();

        // Todos los parametros son string
        $declaracion->bind_param("ssssssss", $nombreUsuario, $nombre, $apellido1, $apellido2, $contrasena, $email, $numeroTelefono, $codigoArea);
        $resultado = $declaracion->execute();
        $declaracion->close();
      }
      $this->ConexionDB->close();
      return ($resultado) ? Validador::$OK : "Fallo en el query";
  }

  public function obtenerUsuario($nombre) {
    if ($declaracion = $this->ConexionDB->prepare("SELECT * FROM usuarios WHERE nombreUsuario = ?")) {
      $declaracion->bind_param("s", $nombre); // "s" parametros es string
      $declaracion->execute();
      // Obtener usuario seleccionado de la base
      $selected_usuario = $this->queryAUsuario($declaracion->get_result());
      $declaracion->close();
    }
    $this->ConexionDB->close();

    return $selected_usuario;
  }

  public function actualizarContrasena($nombreUsuario, $contrasenaNueva) {
    $declaracion = $this->ConexionDB->prepare("UPDATE usuarios SET contrasena = ? WHERE nombreUsuario = ?;");
    // Parametros son string
    $declaracion->bind_param("ss", $contrasenaNueva, $nombreUsuario);
    $declaracion->execute();
    $declaracion->close();
    $this->ConexionDB->close();
  }

  // Obtiene el resultado de un query, obtiene los datos y crea un objeto Usuario
  private function queryAUsuario($queryResult) {
    if ($queryResult->num_rows > 0) {
      $fila = $queryResult->fetch_assoc();
      return new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['contrasena'], $fila['email'], $fila['numeroTelefono'], $fila['codigoArea']);
    }
    else {
      exit("Usuario no existe");
      return NULL;
    }
  }


}
?>
