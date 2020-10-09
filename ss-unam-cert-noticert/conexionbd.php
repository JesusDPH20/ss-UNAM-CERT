<?php

//function conectarBD(){
	try {
		$dbconn = "host=paginasss.com port=5432 dbname=noticert user=postgres password=postgres";
		$conn = pg_connect($dbconn);
	  //echo '<h1>Conexión exitosa</h1>';
	} catch (\Exception $e) {
		die ("<h1>Error de conexion.</h1> ");
	}
//}

 ?>
