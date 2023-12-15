<?php

	require_once('Conexion.php');

	class ProductosModel extends Conexion
	{

		public static function listarProductos($idProducto = false)
		{
			$dbconec = Conexion::Conectar();

			try {

				$query = "SELECT * FROM productos prod INNER JOIN proveedores prov ON prod.id_proveedor = prov.id_proveedor";
				if ($idProducto) {
					$query .= " WHERE id_producto = $idProducto";
				}
				$stmt = $dbconec->prepare($query);
				$stmt->execute();
	
				return $stmt->fetchAll();
	
				$dbconec = null;
			} catch (Exception $e) {
	
				echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
			}
		}

	}


 ?>
