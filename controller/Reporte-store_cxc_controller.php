<?php      
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_controller.php*/
	class Reportecxc { 

		  
                 
                public function Insertar_datos_cxc(){

			$cmd = ReportecxcModel::Insertar_datos_cxc();

		}   
                 
                   
                public function Listar_cxc(){

			$filas = ReportecxcModel::Listar_cxc();   
			return $filas;

		}
                   

                 
                

	}
 

 ?>
