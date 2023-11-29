<?php

	class Cuentastipodegasto {

		public function Listar_Cuentastipodegasto(){

			$filas = CuentastipodegastoModel::Listar_Cuentastipodegasto();
			return $filas;

		}

		public function Ver_Limite_Credito($id_tipodegasto){

			$filas = CuentastipodegastoModel::Ver_Limite_Credito($id_tipodegasto);
			return $filas;

		}

		public function Listar_Cuentastipodegasto_Activos(){

			$filas = CuentastipodegastoModel::Listar_Cuentastipodegasto_Activos();
			return $filas;

		}

		public function Listar_Cuentastipodegasto_Inactivos(){

			$filas = CuentastipodegastoModel::Listar_Cuentastipodegasto_Inactivos();
			return $filas;

		}

		public function Insertar_Cuentastipodegasto($nombre){

			$cmd = CuentastipodegastoModel::Insertar_Cuentastipodegasto($nombre);

		}

		public function Editar_Cuentastipodegasto($id_tipodegasto, $nombre, $estado){

			$cmd = CuentastipodegastoModel::Editar_Cuentastipodegasto($id_tipodegasto, $nombre, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cuentastipodegasto($id_tipodegasto){

		$cmd = CuentastipodegastoModel::Borrar_Cuentastipodegasto($id_tipodegasto);

		}
                

	}


 ?>
