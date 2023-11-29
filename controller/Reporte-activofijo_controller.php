<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class ReporteActivofijo {

		
                /*JCV
                public function Insertar_datos_flujo(){

			$cmd = ReporteedoresultadosModel::Insertar_datos_flujo();

		}
                */
                
                public function Listar_Conceptos_Reporte_activofijo(){

			$filas = ReporteActivofijoModel::Listar_Conceptos_Reporte_activofijo();
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
