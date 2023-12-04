<?php 

	class OrdenesCompra {

		public function Listar_Categorias(){

			$filas = OrdenCompra::ListarOrdenesCompra();
			return $filas;
		
		}

	}


 ?>