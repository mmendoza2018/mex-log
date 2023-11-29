<?php  
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Cuentasdebancos {

		public function Listar_Cuentasdebancos(){

			$filas = CuentasdebancosModel::Listar_Cuentasdebancos();
			return $filas;

		}
                
                public function Insertar_datos_flujo(){

			$cmd = CuentasdebancosModel::Insertar_datos_flujo();

		}
                 
                
                public function Insertar_datos_flujo_A(){

			$cmd = CuentasdebancosModel::Insertar_datos_flujo_A();

		}
                 
                
                
                public function Listar_Flujo_de_efectivo(){

			$filas = CuentasdebancosModel::Listar_Flujo_de_efectivo();
			return $filas;

		}
                
                 
                public function Listar_Flujo_de_efectivo_A(){

			$filas = CuentasdebancosModel::Listar_Flujo_de_efectivo_A();
			return $filas;

		}
                

                 /*JCV DE PRUEBA PARA DASHBARD APLICAD A FORMULAS DE FLUJO DE EFECTIVO*/
                public function Datos_Paneles(){  

			$filas = CuentasdebancosModel::Datos_Paneles();
			return $filas;

		}
                
                public function Listar_Cuentasacumulativa(){

			$filas = CuentasdebancosModel::Listar_Cuentasacumulativa();
			return $filas;

		}
                
                 
                public function Listar_Cuentasacumulativa_A(){

			$filas = CuentasdebancosModel::Listar_Cuentasacumulativa_A();
			return $filas;

		}
                
                
                
                public function Compras_Anuales(){

			$filas = CuentasdebancosModel::Compras_Anuales();
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
