<?php

  // Activar reporte de errores
  ini_set('display_errors', 1); error_reporting(-1);

  include "Controller.php";

  // Dejar que el controlador direccione las acciones a los distintos metodos
  $accion = $_POST['accion'];
  $controller = new Controller($accion, $_POST);

?>
