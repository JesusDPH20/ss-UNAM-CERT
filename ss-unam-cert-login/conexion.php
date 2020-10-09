<?php
	define('SERVER', 'logincert.unam.mx');
	define('DBNAME', 'usuarios');
	define('USER', 'postgres');
	define('PASSWORD', '');

	//PDO - PHP DATA OBJECTS
	/**
	 *
	 */
	class Conexion{

		function conectar()
		{
			try {
				$conexion = new PDO
			} catch (\Exception $error) {
				die('El error de conexión es: '.$error->getMessage());
			}


		}
	}





?>
