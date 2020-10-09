<?php
include 'captcha.php';
try {
	$dbconn = "host=logincert.unam.mx port=5432 dbname=autenticacion user=postgres password=postgres";
	$conn = pg_connect($dbconn); // or die ("<h1>Error de conexion.</h1> ")
} catch (\Exception $e) {
	die ("<h1>Error de conexion.</h1> ");
}

session_start();

function quitar($mensaje)
{
 $nopermitidos = array("'",'\\','<','>',"\"");
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}
if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != ""){

		$usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));
	 	 $password = $_POST["password"];
	 	 $result = pg_query('SELECT nombreusuario, contrasenia FROM usuarios WHERE nombreusuario=\''.$usuario.'\'');

	 	 if($row = pg_fetch_array($result)){
	 			if (!$captcha) {
					header('Location: ../login.php?error=captcha');
					exit();
	 			} else {
					if($row["contrasenia"] == ('\x'.sha1($password))){
		 		   $_SESSION["k_username"] = $row['nombreusuario'];
					 echo'<script type="text/javascript">
	         window.location.href="index.php";
	         </script>';
		 		  }else{
						 header('Location: ../login.php?error=password');
	 					 exit();
		 		  }
	 			}
	 	 }else{
				header('Location: ../login.php?error=user');
				exit();
	 	 }
	 pg_free_result($result);
}else{
	header('Location: ../login.php?error=vacio');
	exit();
}
pg_close();
?>
