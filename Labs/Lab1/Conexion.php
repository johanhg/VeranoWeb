<?php

class Conexion {

  // Credenciales de la base de datos
  private static $DBservername = "localhost";
  private static $DBusername = "postgres";
  private static $DBpassword = "johanherr1024";
  private static $DBname = "lab1DB";
  private static $DBconnection;

  public static function connect() {

      // Establecer conexions
      self::$DBconnection = new mysqli(self::$DBservername, self::$DBusername, self::$DBpassword, self::$DBname);

      if (self::$DBconnection->connect_error) {
          die("Conexion failed: " . self::$DBconnection->connect_error);
      }

      return self::$DBconnection;
  }

}

?>
