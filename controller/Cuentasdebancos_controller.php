<?php

	class Cuentasdebancos {

		public function Listar_Cuentasdebancos(){

			$filas = CuentasdebancosModel::Listar_Cuentasdebancos();
			return $filas;

		}

		public function Ver_Limite_Credito($id_debancos){

			$filas = CuentasdebancosModel::Ver_Limite_Credito($id_debancos);
			return $filas;

		}

		public function Listar_Cuentasdebancos_Activos(){

			$filas = CuentasdebancosModel::Listar_Cuentasdebancos_Activos();
			return $filas;

		}

		public function Listar_Cuentasdebancos_Inactivos(){

			$filas = CuentasdebancosModel::Listar_Cuentasdebancos_Inactivos();
			return $filas;

		}

		public function Insertar_Cuentasdebancos($nombre, $saldo){

			$cmd = CuentasdebancosModel::Insertar_Cuentasdebancos($nombre, $saldo);

		}

		public function Editar_Cuentasdebancos($id_debancos, $nombre, $saldo, $estado){

			$cmd = CuentasdebancosModel::Editar_Cuentasdebancos($id_debancos, $nombre, $saldo, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cuentasdebancos($id_debancos){

		$cmd = CuentasdebancosModel::Borrar_Cuentasdebancos($id_debancos);

		}
                

	}


 ?>
