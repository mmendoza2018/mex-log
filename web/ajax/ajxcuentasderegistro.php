<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cuentasderegistro();

	if(!empty($_GET)){
			$id_deregistro = isset($_GET['cliente']) ? $_GET['cliente'] : '';
                /*$funcion->Ver_Limite_Credito($id_deregistro);*/
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
                                    $funcion->Borrar_Cuentasderegistro($numero_transaccion);
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
			$id_deregistro = $_POST['id_deregistro'];
                        $codigo_deregistro = $_POST['codigo_deregistro'];
			$nombre = trim($_POST['nombre']);
                        $nivel = trim($_POST['nivel']);
                        $id_acumulativa = trim($_POST['id_acumulativa']);
                        $nombre_acumulativa = trim($_POST['nombre_acumulativa']);
                        
                        $naturaleza = trim($_POST['naturaleza']);
                        
			$estado = trim($_POST['estado']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cuentasderegistro($codigo_deregistro,$nombre,$nivel,$id_acumulativa,$nombre_acumulativa,$naturaleza);
			break;

			case 'Edicion':
				$funcion->Editar_Cuentasderegistro($id_deregistro,$codigo_deregistro,$nombre,$nivel,$id_acumulativa,$nombre_acumulativa,$naturaleza,$estado);
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
