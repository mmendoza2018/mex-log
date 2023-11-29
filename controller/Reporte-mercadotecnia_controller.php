<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reportemercadotecnia { 

		
                
                public function Insertar_datos_flujo(){

			$cmd = ReportemercadotecniaModel::Insertar_datos_flujo();

		}
                 
                
                public function Listar_mercadotecnia(){

			$filas = ReportemercadotecniaModel::Listar_mercadotecnia();
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
