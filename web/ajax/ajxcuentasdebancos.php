<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cuentasdebancos();

	if(!empty($_GET)){
			$id_debancos = isset($_GET['cliente']) ? $_GET['cliente'] : '';
                /*$funcion->Ver_Limite_Credito($id_debancos);*/
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
                                    $funcion->Borrar_Cuentasdebancos($numero_transaccion);
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
			$id_debancos = $_POST['id_debancos'];
			$nombre = trim($_POST['nombre']);
                        $saldo = trim($_POST['saldo']);
			$estado = trim($_POST['estado']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cuentasdebancos($nombre,$saldo);
			break;

			case 'Edicion':
				$funcion->Editar_Cuentasdebancos($id_debancos,$nombre,$saldo,$estado);
			break;

                    
                        /*JCV PARA BORRAR*/
                        case 'Borrar':
                                $numero_transaccion = trim($_POST['numero_transaccion']);
                                $funcion->Borrar_Cotizacion($numero_transaccion);
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
