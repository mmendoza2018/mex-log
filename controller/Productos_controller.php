<?php

	class Productos {

		public static function listarProductos($idProducto = false){

			$filas = ProductosModel::listarProductos($idProducto);
			return $filas;

		}
	}


 ?>
