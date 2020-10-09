<?php
require ('conexionbd.php');


//	CONSULTAR TOTAL
	$respuesta = pg_fetch_array(pg_query("SELECT SUM(numeronoticias) FROM noticias"));
	echo $respuesta['sum'];

 ?>
