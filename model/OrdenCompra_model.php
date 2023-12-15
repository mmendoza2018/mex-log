<?php

require_once('Conexion.php');

class OrdenCompra extends Conexion
{
	public function ListarOrdenesCompra($idOrdenCompra = false)
	{
		$dbconec = Conexion::Conectar();

		try {

			$query = "SELECT * FROM facturas_compras fc LEFT JOIN clientes c ON fc.id_cliente = c.id_cliente";
			$query .= " INNER JOIN proveedores pr ON fc.id_proveedor = pr.id_proveedor ";

			if ($idOrdenCompra) {
				$query .= "WHERE id_factura = $idOrdenCompra";
			}
			$stmt = $dbconec->prepare($query);
			$stmt->execute();
			$count = $stmt->rowCount();

			if ($count > 0) {
				return $stmt->fetchAll();
			}

			$dbconec = null;
		} catch (Exception $e) {
			return false;
		}
	}

	public function ListarProductosOrdenCompra($idOrdenCompra)
	{
		$dbconec = Conexion::Conectar();

		try {
			$query = "SELECT * FROM detalle_fact_compra df INNER JOIN productos prod ON df.id_producto = prod.id_producto";  
			$query .= " INNER JOIN proveedores prov ON prod.id_proveedor = prov.id_proveedor";
			$query .= " WHERE id_factura = $idOrdenCompra";
			
			$stmt = $dbconec->prepare($query);
			$stmt->execute();
			$stmt->rowCount();

			return $stmt->fetchAll();

			$dbconec = null;
		} catch (Exception $e) {
			return false;
		}
	}

}
