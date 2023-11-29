<?php   
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reporteedoresultados { 

		  
                
                public function Insertar_datos_flujo(){

			$cmd = ReporteedoresultadosModel::Insertar_datos_flujo();

		}
                 
                  
                public function Listar_edoresultados(){

			$filas = ReporteedoresultadosModel::Listar_edoresultados();
			return $filas;

		}
                  

                 
                

	}


 ?>
