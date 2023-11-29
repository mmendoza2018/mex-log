<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cuentasacumulativa();

	if(!empty($_GET)){
			$id_acumulativa = isset($_GET['cliente']) ? $_GET['cliente'] : '';
                /*$funcion->Ver_Limite_Credito($id_acumulativa);*/
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
                                    $funcion->Borrar_Cuentasacumulativa($numero_transaccion);
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
			$id_acumulativa = $_POST['id_acumulativa'];
                        $codigo_acumulativa = $_POST['codigo_acumulativa'];
			$nombre = trim($_POST['nombre']);
                        $nivel = trim($_POST['nivel']);
                        $id_tipodegasto = trim($_POST['id_tipodegasto']);
                        $nombre_tipodegasto = trim($_POST['nombre_tipodegasto']);
                        $id_atributo = trim($_POST['id_atributo']);
                        $nombre_atributo = trim($_POST['nombre_atributo']);
                        
			$estado = trim($_POST['estado']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cuentasacumulativa($codigo_acumulativa,$nombre,$nivel,$id_tipodegasto,$nombre_tipodegasto,$id_atributo,$nombre_atributo);
			break;

			case 'Edicion':
				$funcion->Editar_Cuentasacumulativa($id_acumulativa,$codigo_acumulativa,$nombre,$nivel,$id_tipodegasto,$nombre_tipodegasto,$id_atributo,$nombre_atributo,$estado);
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
