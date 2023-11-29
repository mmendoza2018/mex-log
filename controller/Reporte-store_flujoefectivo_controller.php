<?php    
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reporteflujoefectivo {  

		  
                
                public function Insertar_datos_flujo(){

			$cmd = ReporteflujoefectivoModel::Insertar_datos_flujo();

		}
                 
                  
                public function Listar_flujoefectivo(){

			$filas = ReporteflujoefectivoModel::Listar_flujoefectivo();   
			return $filas;

		}
                  

                 
                

	}
 

 ?>
