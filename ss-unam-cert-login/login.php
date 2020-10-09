<!DOCTYPE html>
<html lang="en">
<head>

	<title>Login - UNAM CERT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script>
	   function onSubmit(token) {
	     document.getElementById("demo-form").submit();
	   }

	 </script>
	 <style media="screen">
	 	h2{
			padding: 20px;
			text-align: center;
		  /*background-color: #f44336; /* Red */
			background-color: rgba(150,23,15,0.5);
		  color: white;
		  margin-bottom: 15px;
			border: 2px solid #9b9b9b;
		}


		label{
			text-align:center;
			color:white;
			font-size: 25px;
		}

		div.g-recaptcha{
			text-align: center;
			width: 300px;
  		margin: 0 auto;
		}
		input.button{
			background-color: rgba(40,23,150,0.5);
			border: 2px solid #FFFFFF;
		  border-radius: 12px;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  font-size: 16px;
			width: 390px;
		}
		input.formulario{
			text-align: center;
			height: 40px;
			width: 400px;
			border-right-width: 1px;
			border-bottom-width: 1px;
			border-left-width: 1px;
			border-top-style: none;
			border-right-style: solid;
			border-bottom-style: solid;
			border-left-style: solid;
		}
	 </style>
	 <?php
	 include 'captcha.php';
	 ?>

</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<label><h1>Accede a tu cuenta</h1></label>
				<form id="demo-form" action="validarUsuario.php" method="post">
					<label>Usuario</label>
					<input class="formulario" type="text" name="usuario" size="40" maxlength="20" /><br>
					<br>
					<label>Contraseña</label>
					<input class="formulario" type="password" name="password" size="40" maxlength="10" /><br>
					<br>
					<div class="g-recaptcha" data-sitekey="6Ldtsc8ZAAAAAAnZj_sWrr-r2djsGJP4LvZfUkCi" ></div> <br>
					<input class="button" type="submit" value="Ingresar" />
				</form>
				<br><br>

				<?php
					$mensaje = 'Acceso denegado. Verifica tus credenciales';
					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					if (strpos($fullUrl, 'error=captcha') !== FALSE) {
						echo '<div class="error">
						<span><h2>Por favor completa el Captcha</h2></span>
						</div>';
						exit();
					} elseif (strpos($fullUrl, 'error=password') !== FALSE) {
						echo '<div class="error">
						<span><h2>'.$mensaje.'</h2></span>
						</div>';
						exit();
					} elseif (strpos($fullUrl, 'error=user') !== FALSE) {
						echo '<div class="error">
						<span><h2>'.$mensaje.'</h2></span>
						</div>';
						exit();
					} elseif (strpos($fullUrl, 'error=vacio') !== FALSE) {
						echo '<div class="error">
						<span><h2>Por favor llena todos los campos</h2></span>
						</div>';
						exit();
					}
				?>
			</div>

		</div>





	</div>


	<div id="dropDownSelect1"></div>

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
