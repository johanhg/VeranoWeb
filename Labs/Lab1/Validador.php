<?php

class Validador{
	public static $OK = 0;

	public function __construct(){
	}

	// Retorna $OK o el mensaje de error
	public static function validarCodigoArea($string){
		if(! preg_match("/\+\d{3}/", $string)){
			return "Deber ser '+' y 3 dígitos más y no [$string]";
		}
		return self::$OK;
	}


	// Retorna $OK o el mensaje de error
	public static function validarNumeroTelefono($string){
		if(! preg_match("/\d{8}/", $string)){
			return "Número de teléfono debe ser de 8 dígitos y no [$string]";
		}
		return self::$OK;

	}

	// Retorna $OK o el mensaje de error
	public static function validarEmail($string){
		if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
      		return "Formato de email inválido: $string";
    	}
		return self::$OK;
	}


	// Retorna $OK o el mensaje de error
	public static function validarContrasena($string){
		// Debe contener mayusculas, minusculas y ser de 8 o mas caracacteres
		$len = strlen($string);
		$base = "Error: mal formato.";
		if($len < 8){
			return "$base Debe ser de 8+ caraceteres y no $len <br>";
		}
		if( ! preg_match("/[a-z]+/", $string)){
			return "$base Debe tener minúsculas";
		}
		if( ! preg_match("/[A-Z]+/", $string)){
			return "$base Debe tener mayúsculas";
		}
		if( ! preg_match("/\d+/", $string)){
			return "$base Debe tener dígitos";
		}
		return self::$OK;


	}

	// Retorna $OK o el mensaje de error
	public static function validarUsuario($usuario){
		$resultado = self::$OK;

		$resultado =  self::validarEmail($usuario->obtenerEmail());
		if( ! is_integer($resultado)){
			return $resultado;
		}

		$resultado = self::validarContrasena($usuario->obtenerContrasena());
		if( ! is_integer($resultado)){
			return $resultado;
		}

		$resultado = self::validarNumeroTelefono($usuario->obtenerNumeroTelefono());
		if( ! is_integer($resultado)){
			return $resultado;
		}

		$resultado = self::validarCodigoArea($usuario->obtenerCodigoArea());
		if( ! is_integer($resultado)){
			return $resultado;
		}
		return $resultado;

  	}

}

?>
