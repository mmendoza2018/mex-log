<?php

	class Cuentasbancos {

		public function Listar_Cuentas_Bancos(){

			$filas = CuentaBancosModel::Listar_Cuentas_Bancos();
			return $filas;

		}

		public function Ver_Limite_Credito($idcliente){

			$filas = CuentaBancosModel::Ver_Limite_Credito($idcliente);
			return $filas;

		}

		public function Listar_Clientes_Activos(){

			$filas = CuentaBancosModel::Listar_Clientes_Activos();
			return $filas;

		}

		public function Listar_Clientes_Inactivos(){

			$filas = CuentaBancosModel::Listar_Clientes_Inactivos();
			return $filas;

		}

		public function Insertar_Cuenta_Bancos($idcuenta,$fecha, $concepto, $ingreso, $egreso,
		$saldo, $observaciones, $tipocuenta){

			$cmd = CuentaBancosModel::Insertar_Cuenta_Bancos($idcuenta, $fecha, $concepto, $ingreso, $egreso,
		$saldo, $observaciones, $tipocuenta);

		}

		public function Editar_Cuenta_Bancos($idcliente, $nombre_cliente, $numero_nit, $numero_nrc, $direccion,
		$numero_telefono, $email, $giro, $limite_credito, $estado){

			$cmd = CuentaBancosModel::Editar_Cuenta_Bancos($idcliente, $nombre_cliente, $numero_nit, $numero_nrc, $direccion,
		$numero_telefono, $email, $giro, $limite_credito, $estado);

		}

	}


 ?>
