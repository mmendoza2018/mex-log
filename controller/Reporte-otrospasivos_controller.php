<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reporteotrospasivos {

		
                /*JCV
                public function Insertar_datos_flujo(){

			$cmd = ReporteedoresultadosModel::Insertar_datos_flujo();

		}
                */
                
                public function Listar_Conceptos_Reporte_otrospasivos(){

			$filas = ReporteotrospasivosModel::Listar_Conceptos_Reporte_otrospasivos();
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
