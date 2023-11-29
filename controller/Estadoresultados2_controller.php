<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Cuentasdebancos {

		
                
                public function Insertar_datos_flujo(){

			$cmd = CuentasdebancosModel::Insertar_datos_flujo();

		}
                
                
                public function Listar_Conceptos_estado_de_resultados(){

			$filas = CuentasdebancosModel::Listar_Conceptos_estado_de_resultados();
			return $filas;

		}
                

                 /*JCV DE PRUEBA PARA DASHBARD APLICAD A FORMULAS DE FLUJO DE EFECTIVO*/
                
                
                public function Listar_Cuentasacumulativa(){

			$filas = CuentasdebancosModel::Listar_Cuentasacumulativa();
			return $filas;

		}
                
                
                
                

	}


 ?>
