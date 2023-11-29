<?php       
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Reporteproveedores { 

		  
                
                public function Insertar_datos_proveedores(){

			$cmd = ReporteproveedoresModel::Insertar_datos_proveedores();  

		}   
                  
                   
                public function Listar_proveedores(){

			$filas = ReporteproveedoresModel::Listar_proveedores();    
			return $filas;

		}
                    
 
                 
                

	}
 
 
 ?>
