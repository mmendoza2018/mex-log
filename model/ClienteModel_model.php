<?php

require_once('Conexion.php');

class ClienteModel extends Conexion
{

	public static function ListarClientes()
	{
		$dbconec = Conexion::Conectar();

		try {

			$query = "SELECT * FROM clientes;";
			$stmt = $dbconec->prepare($query);
			$stmt->execute();

				return $stmt->fetchAll();

			$dbconec = null;
		} catch (Exception $e) {

			echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
		}
	}
	
}
