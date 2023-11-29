<?php         
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/ 
	class Reporteeficiencia { 

		  
                
                public function Insertar_datos_eficiencia(){

			$cmd = ReporteeficienciaModel::Insertar_datos_eficiencia();  

		}   
                  
                   
                public function Listar_eficiencia(){

			$filas = ReporteeficienciaModel::Listar_eficiencia();    
			return $filas;

		}
                    
 
                   
                

	}
  
   
 ?>
