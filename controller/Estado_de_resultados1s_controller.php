<?php         
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Estado_de_resultados1s { 

		  
                 
                public function Insertar_datos_edo_resultados1s(){

			$cmd = Estado_de_resultados1sModel::Insertar_datos_edo_resultados1s();  

		}   
                  
                   
                public function Listar_edo_resultados1s(){

			$filas = Estado_de_resultados1sModel::Listar_edo_resultados1s();    
			return $filas;

		}
                    
 
                   
                   

	}
 
 
 ?>
