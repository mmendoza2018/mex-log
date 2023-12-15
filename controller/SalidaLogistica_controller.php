<?php

class SalidaLogistica
{

	public function InsertarEntrada($arrayData, $arrayDataDetalle)
	{

		$response = EntradaLogisticaModel::InsertarEntradaLogistica($arrayData);
		if ($response) {
			$idUltimaEntrada = EntradaLogisticaModel::obtenerUltimoId();

			foreach ($arrayDataDetalle as &$producto) {
				$producto["id_entrada"] = $idUltimaEntrada[0]["id_entrada"];
			}

			$responseDetalle = EntradaLogisticaModel::insertarDetalleProductos($arrayDataDetalle);
		}
	}
	

	public function EditarEntrada($arrayData)
	{

		$cmd = EntradaLogisticaModel::EditarEntradaLogistica($arrayData);
	}

	public static function ListarEntrada($idEntrada = false)
	{

		$data = EntradaLogisticaModel::ListarEntradasLogistica($idEntrada);
		return $data;
	}

	public static function ListadoGeneral()
	{

		$data = EntradaLogisticaModel::obtenerlistaGeneral();
		return $data;
	}

	public static function ListarLogisticaPorVenta($idVenta)
	{

		$data = SalidaLogisticaModel::ListarSalidasLogisticaPorVenta($idVenta);
		return $data;
	}

	public static function ListarproductosEntrada($idEntrada)
	{

		$data = EntradaLogisticaModel::ListarDetalleProductos($idEntrada);
		return $data;

	}

	
}
