<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cuentastipodegasto();

	if(!empty($_GET)){
			$id_tipodegasto = isset($_GET['cliente']) ? $_GET['cliente'] : '';
                /*$funcion->Ver_Limite_Credito($id_atributo);*/
	}

	if (!empty($_POST))
	{
            /*JCV BORRAR*/
            if (isset($_POST['numero_transaccion']))
	{
                try {
                    $proceso = $_POST['proceso'];
                    switch($proceso){
                        case 'Borrar':
                                    $numero_transaccion = trim($_POST['numero_transaccion']);
                                    $funcion->Borrar_Cuentastipodegasto($numero_transaccion);
                            break;

                            default:
                                    $data = "Error";
                                    echo json_encode($data);
                            break;
                    }
                } catch (Exception $e) {

                    $data = "Error";
                    echo json_encode($data);
                }
            }
	if(isset($_POST['nombre'])){  /* JCV DEBE SER UN CAMPO QUE NO DEBA SER NULO QUE SIEMPRE TENGA DATO*/

		try {

			$proceso = $_POST['proceso'];
			$id_tipodegasto = $_POST['id_tipodegasto'];
			$nombre = trim($_POST['nombre']);
			$estado = trim($_POST['estado']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cuentastipodegasto($nombre);
			break;

			case 'Edicion':
				$funcion->Editar_Cuentastipodegasto($id_tipodegasto,$nombre,$estado);
			break;

                    
                        /*JCV PARA BORRAR*/
                        case 'Borrar':
                                $numero_transaccion = trim($_POST['numero_transaccion']);
                                $funcion->Borrar_Cuentastipodegasto($numero_transaccion);
                        break;
                    
			default:
				$data = "Error";
 	   		 	echo json_encode($data);
			break;
		}

		} catch (Exception $e) {

			$data = "Error";
 	   		echo json_encode($data);
		}

	}

}




?>
