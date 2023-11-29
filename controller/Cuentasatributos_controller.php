<?php

	class Cuentasatributos {

		public function Listar_Cuentasatributos(){

			$filas = CuentasatributosModel::Listar_Cuentasatributos();
			return $filas;

		}

		public function Ver_Limite_Credito($id_atributo){

			$filas = CuentasatributosModel::Ver_Limite_Credito($id_atributo);
			return $filas;

		}

		public function Listar_Cuentasatributos_Activos(){

			$filas = CuentasatributosModel::Listar_Cuentasatributos_Activos();
			return $filas;

		}

		public function Listar_Cuentasatributos_Inactivos(){

			$filas = CuentasatributosModel::Listar_Cuentasatributos_Inactivos();
			return $filas;

		}

		public function Insertar_Cuentasatributos($nombre){

			$cmd = CuentasatributosModel::Insertar_Cuentasatributos($nombre);

		}

		public function Editar_Cuentasatributos($id_atributo, $nombre, $estado){

			$cmd = CuentasatributosModel::Editar_Cuentasatributos($id_atributo, $nombre, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cuentasatributos($id_atributo){

		$cmd = CuentasatributosModel::Borrar_Cuentasatributos($id_atributo);

		}
                

	}


 ?>
