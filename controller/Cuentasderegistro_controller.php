<?php

	class Cuentasderegistro {

		public function Listar_Cuentasderegistro(){

			$filas = CuentasderegistroModel::Listar_Cuentasderegistro();
			return $filas;

		}

		public function Ver_Limite_Credito($id_deregistro){

			$filas = CuentasderegistroModel::Ver_Limite_Credito($id_deregistro);
			return $filas;

		}

		public function Listar_Cuentasderegistro_Activos(){

			$filas = CuentasderegistroModel::Listar_Cuentasderegistro_Activos();
			return $filas;

		}

		public function Listar_Cuentasderegistro_Inactivos(){

			$filas = CuentasderegistroModel::Listar_Cuentasderegistro_Inactivos();
			return $filas;

		}

		public function Insertar_Cuentasderegistro($codigo_deregistro, $nombre, $nivel, $id_acumulativa, $nombre_acumulativa, $naturaleza){

			$cmd = CuentasderegistroModel::Insertar_Cuentasderegistro($codigo_deregistro, $nombre, $nivel, $id_acumulativa, $nombre_acumulativa, $naturaleza);

		}

                              
                
                
		public function Editar_Cuentasderegistro($id_deregistro, $codigo_deregistro, $nombre, $nivel, $id_acumulativa, $nombre_acumulativa, $naturaleza, $estado){

			$cmd = CuentasderegistroModel::Editar_Cuentasderegistro($id_deregistro, $codigo_deregistro, $nombre, $nivel, $id_acumulativa, $nombre_acumulativa, $naturaleza, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Cuentasderegistro($id_deregistro){

		$cmd = CuentasderegistroModel::Borrar_Cuentasderegistro($id_deregistro);

		}
                
                //PARA RRELLENAR TIPO DE GASTO EN DE REGISTRO CON LA TABLA DE ACUMULATIVA
                public function Listar_Acumulativa(){

			$filas = CuentasderegistroModel::Listar_Acumulativa();
			return $filas;

		}
                
                
                

	}


 ?>
