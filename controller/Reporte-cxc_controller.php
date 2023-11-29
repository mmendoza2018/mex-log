<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reportecxc {

		
                /*JCV
                public function Insertar_datos_flujo(){

			$cmd = ReportecxcModel::Insertar_datos_flujo();

		}
                */
                
                public function Listar_Conceptos_Reporte_cxc(){

			$filas = ReportecxcModel::Listar_Conceptos_Reporte_cxc();
			return $filas;

		}
                

                 /*JCV DE PRUEBA PARA DASHBARD APLICAD A FORMULAS DE FLUJO DE EFECTIVO*/
                
               /*JCV 
                public function Listar_Cuentasacumulativa(){

			$filas = ReportemercadotecniaModel::Listar_Cuentasacumulativa();
			return $filas;

		}
                */
                
                
                

	}


 ?>
