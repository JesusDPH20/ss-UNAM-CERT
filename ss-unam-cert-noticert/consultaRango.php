<?php
require ('conexionbd.php');

	$hoy = date('m/d/Y');
	$mensajeRango = 'Error, rango inválido<br>La fecha de orígen no puede ser mayor a la de destino.';
	$mensajeLimite = 'Error, rango inválido<br>No hay datos disponibles depués del '.$hoy;

	$calendario1 = strtotime($_POST["datepickerFrom"]);
	$calendario2 = strtotime($_POST["datepickerTo"]);
	$hoy = strtotime($hoy);

//	CONSULTAR RANGO
	if ($calendario1 > $calendario2) {
		echo $mensajeRango;
	} elseif ($calendario2 > $hoy) {
		echo $mensajeLimite;
	} elseif ($calendario1 < $calendario2) {
		$calendario1 = date("Y-m-d", $calendario1);
		$calendario2 = date("Y-m-d", $calendario2);
		$respuesta = pg_fetch_array(pg_query("SELECT SUM(numeronoticias) FROM noticias WHERE fechas BETWEEN '$calendario1' AND '$calendario2'"));
		echo $respuesta['sum'];
	} elseif ($calendario1 == $calendario2) {
		$calendario1 = date("Y-m-d", $calendario1);
		$respuesta = pg_fetch_array(pg_query("SELECT numeronoticias FROM noticias WHERE fechas='$calendario1'"));
		echo $respuesta['numeronoticias'];
	} elseif ($calendario1 == $hoy && $calendario2 == $hoy) {
		$hoy = date("Y-m-d", $hoy);
		$respuesta = pg_fetch_array(pg_query("SELECT numeronoticias FROM noticias WHERE fechas='$hoy'"));
		echo $respuesta['numeronoticias'];
	}

/*


*/



 ?>
