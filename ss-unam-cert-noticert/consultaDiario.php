<?php
require ('conexionbd.php');

//	CONSULTAR DIARIO
	$hoy = date('Y-m-d');
	$respuesta = pg_fetch_array(pg_query("SELECT SUM(numeronoticias) FROM noticias WHERE fechas = '$hoy'"));
	echo $respuesta['sum'];


 ?>
