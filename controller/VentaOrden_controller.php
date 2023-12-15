<?php

	class VentaOrden {

		public static function listarVentas () {

			$filas = VentaOrdenModel::ListarVentasOrden();
			return $filas;

		}

	}


 ?>
