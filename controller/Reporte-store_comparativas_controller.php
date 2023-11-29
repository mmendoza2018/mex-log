<?php        
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Reportecomparativas { 

		  
                 
                public function Insertar_datos_comparativas(){

			$cmd = ReportecomparativasModel::Insertar_datos_comparativas();  

		}   
                  
                   
                public function Listar_comparativas(){

			$filas = ReportecomparativasModel::Listar_comparativas();    
			return $filas;

		}
                    
 
                   
                

	}
 
 
 ?>
