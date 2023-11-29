<?php

	class CuentasdebancosJCV {

		public function Listar_Clientes(){

			$filas = ClienteModel::Listar_Clientes();
			return $filas;

		}

		public function Ver_Limite_Credito($idcliente){

			$filas = ClienteModel::Ver_Limite_Credito($idcliente);
			return $filas;

		}

		public function Listar_Clientes_Activos(){

			$filas = ClienteModel::Listar_Clientes_Activos();
			return $filas;

		}

		public function Listar_Clientes_Inactivos(){

			$filas = ClienteModel::Listar_Clientes_Inactivos();
			return $filas;

		}

		public function Insertar_Cliente($fecha, $concepto, $ingreso, 
		$egreso, $saldo, $observaciones, $tipo_de_gasto){

			$cmd = ClienteModel::Insertar_Cliente($fecha, $concepto, $ingreso,
			$egreso, $saldo, $observaciones, $tipo_de_gasto);

		}

		public function Editar_Cliente($id_cuentas_de_bancos, $fecha, $concepto, $ingreso, 
		$egreso, $saldo, $observaciones, $tipo_de_gasto, $estado){

			$cmd = ClienteModel::Editar_Cliente($id_cuentas_de_bancos, $fecha, $concepto, $ingreso, 
			$egreso, $saldo, $observaciones, $tipo_de_gasto, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cliente($id_cuentas_de_bancos){

		$cmd = ClienteModel::Borrar_Cliente($id_cuentas_de_bancos);

		}
                

	}


 ?>
