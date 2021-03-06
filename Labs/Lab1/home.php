<?php

	// Activar reporte de errores
	ini_set('display_errors', 1); error_reporting(-1);

	if(!isset($_SESSION)){
    session_start();
  }

	if ($_SESSION['nombreUsuario'] == null) {
		echo "No hay autorización";
		die();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V19</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-3">
				<h6 class="text-center">Nombre de usuario: <?php echo $_SESSION['nombreUsuario'] ?></h6>
      </div>
    </div>
		<div class="row mb-5 mt-3">
			<div class="col-12">
        <h1 class="text-center">Inicio</h1>
      </div>
		</div>
		<div class="row">
			<div class="col">
				<a href="actualizarContrasena.html" class="txt2">
					<h5 class="text-center">Cambiar contraseña</h5>
				</a>
			</div>
			<div class="col">
				<a href="cerrar_sesion.php" class="txt2">
					<h5 class="text-center">Salir</h5>
				</a>
			</div>
		</div>
  </div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
