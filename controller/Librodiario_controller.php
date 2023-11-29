<?php

	class Librodiario {

		public function Listar_Librodiario(){

			$filas = LibrodiarioModel::Listar_Librodiario();
			return $filas;

		}
                 
                
                public function Listar_LibrodiarioBancos($id_debancosL,$fecha1,$fecha2,$estado,$vacio){

			$filas = LibrodiarioModel::Listar_LibrodiarioBancos($id_debancosL,$fecha1,$fecha2,$estado,$vacio); 
			return $filas;

		}
                

		public function Ver_Limite_Credito($idcliente){

			$filas = LibrodiarioModel::Ver_Limite_Credito($idcliente);
			return $filas;

		}

		public function Listar_Librodiario_Activos(){

			$filas = LibrodiarioModel::Listar_Librodiario_Activos();
			return $filas;

		}

		public function Listar_Librodiario_Inactivos(){

			$filas = LibrodiarioModel::Listar_Librodiario_Inactivos();
			return $filas;

		}

		public function Insertar_Librodiario($fecha, $nombre_cuentaderegistro, $ingreso, 
		$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR,  $id_debancosL, $naturalezaL, $id_acumulativa){

			$cmd = LibrodiarioModel::Insertar_Librodiario($fecha, $nombre_cuentaderegistro, $ingreso,
			$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR,  $id_debancosL, $naturalezaL, $id_acumulativa);

		}

		public function Editar_Librodiario($id_librodiario, $fecha, $nombre_cuentaderegistro, $ingreso, 
		$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR, $id_debancosL, $naturalezaL, $id_acumulativa, $estado){

			$cmd = LibrodiarioModel::Editar_Librodiario($id_librodiario, $fecha, $nombre_cuentaderegistro, $ingreso, 
			$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR, $id_debancosL, $naturalezaL, $id_acumulativa, $estado);

		}
                
                
                /*JCV PARA BORRAR*/
                public function Borrar_Librodiario($id_librodiario){

		$cmd = LibrodiarioModel::Borrar_Librodiario($id_librodiario);

		}
                
                
                //PARA RRELLENAR TIPO DE GASTO EN DE REGISTRO CON LA TABLA DE ACUMULATIVA
                public function Listar_Deregistro(){

			$filas = LibrodiarioModel::Listar_Deregistro();
			return $filas;

		}
                
                
                
                //PARA RRELLENAR cuentas de bancos en libro diario
                public function Listar_Debancos(){

			$filas = LibrodiarioModel::Listar_Debancos();
			return $filas;

		}
                
                
                
	}


 ?>
