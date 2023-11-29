<?php

	class Cuentasacumulativa {

		public function Listar_Cuentasacumulativa(){

			$filas = CuentasacumulativaModel::Listar_Cuentasacumulativa();
			return $filas;

		}

		public function Ver_Limite_Credito($id_acumulativa){

			$filas = CuentasacumulativaModel::Ver_Limite_Credito($id_acumulativa);
			return $filas;

		}

		public function Listar_Cuentasacumulativa_Activos(){

			$filas = CuentasacumulativaModel::Listar_Cuentasacumulativa_Activos();
			return $filas;

		}

		public function Listar_Cuentasacumulativa_Inactivos(){

			$filas = CuentasacumulativaModel::Listar_Cuentasacumulativa_Inactivos();
			return $filas;

		}

		public function Insertar_Cuentasacumulativa($codigo_acumulativa, $nombre, $nivel, $id_tipodegasto, $nombre_tipodegasto, $id_atributo, $nombre_atributo){

			$cmd = CuentasacumulativaModel::Insertar_Cuentasacumulativa($codigo_acumulativa, $nombre, $nivel, $id_tipodegasto, $nombre_tipodegasto, $id_atributo, $nombre_atributo);

		}

                              
                
                
		public function Editar_Cuentasacumulativa($id_acumulativa, $codigo_acumulativa, $nombre, $nivel, $id_tipodegasto, $nombre_tipodegasto, $id_atributo, $nombre_atributo, $estado){

			$cmd = CuentasacumulativaModel::Editar_Cuentasacumulativa($id_acumulativa, $codigo_acumulativa, $nombre, $nivel, $id_tipodegasto, $nombre_tipodegasto, $id_atributo, $nombre_atributo, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cuentasacumulativa($id_acumulativa){

		$cmd = CuentasacumulativaModel::Borrar_Cuentasacumulativa($id_acumulativa);

		}
                
                //PARA RRELLENAR TIPO DE GASTO EN ACUMULATIVA
                public function Listar_Tipodegasto(){

			$filas = CuentasacumulativaModel::Listar_Tipodegasto();
			return $filas;

		}
                
                //PARA RELLENAR atributo EN ACUMULATIVA
                public function Listar_Atributo(){

			$filas = CuentasacumulativaModel::Listar_Atributo();
			return $filas;

		}
                

	}


 ?>
