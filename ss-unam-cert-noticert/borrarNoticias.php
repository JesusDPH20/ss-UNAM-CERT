<?php
require ('conexionbd.php');

//	CONFIGURACIÓN DEL CALENDARIO
		$hoy = date("Y-m-d");
		$hoy = (string)$hoy;
		//$calendario = date("Y-m-d", strtotime($calendario1));
		//$count = $_POST['count'];

//	ELIMINA UNA NOTICIA
		//consulta del día
		$row = pg_fetch_array(pg_query("SELECT fechas FROM noticias WHERE fechas='$hoy'"));
		//consulta de la cantidad de noticias
		$noticiasHoy = pg_fetch_array(pg_query("SELECT numeronoticias FROM noticias WHERE fechas='$hoy'"));

    //Actualiza nuemero de noticias sobre la misma fecha, restando noticias
    $actualizarDatos = pg_query("UPDATE noticias SET numeronoticias = numeronoticias - 1  WHERE fechas='$hoy'");
		/*if ($actualizarDatos) {
			echo 'Actualización realizada';
		}else {
			echo 'No se pudo actualizar';
		}*/
		echo ('realizado');

  }



 ?>
