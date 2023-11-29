<?php      
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Reporteinventarios { 

		  
                
                public function Insertar_datos_inventarios(){

			$cmd = ReporteinventariosModel::Insertar_datos_inventarios();

		}   
                  
                   
                public function Listar_inventarios(){

			$filas = ReporteinventariosModel::Listar_inventarios();    
			return $filas;

		}
                   

                 
                

	}
 
 
 ?>
