<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Librodiario();

	if(!empty($_GET)){
			$idlibrodiario = isset($_GET['librodiario']) ? $_GET['librodiario'] : '';
			$funcion->Ver_Limite_Credito($idlibrodiario);
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
                                    $funcion->Borrar_Librodiario($numero_transaccion);
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
	if(isset($_POST['fecha'])){  /* JCV DEBE SER UN CAMPO QUE NO DEBA SER NULO QUE SIEMPRE TENGA DATO*/

		try {

			$proceso = $_POST['proceso'];
			$id_librodiario = $_POST['id_librodiario'];
			$fecha = trim($_POST['fecha']);
			$ingreso = trim($_POST['ingreso']);
			$egreso = trim($_POST['egreso']);
			$nombre_cuentaderegistro = trim($_POST['nombre_cuentaderegistro']);
			$saldo = trim($_POST['saldo']);
			$observaciones = trim($_POST['observaciones']);
			$estado = trim($_POST['estado']);
			$nombre_cuentaacumulativa = trim($_POST['nombre_cuentaacumulativa']);
                        $nombre_cuentadebanco = trim($_POST['nombre_cuentadebanco']);
                        $id_deregistroR = trim($_POST['id_deregistroR']);
                        $id_debancosL = trim($_POST['id_debancosL']);
                        
                        $naturalezaL = trim($_POST['naturalezaL']);
                        $id_acumulativa = trim($_POST['id_acumulativa']);

			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Librodiario($fecha,$nombre_cuentaderegistro,$ingreso,
				$egreso,$saldo,$observaciones,$nombre_cuentaacumulativa,$nombre_cuentadebanco,$id_deregistroR,$id_debancosL,$naturalezaL,$id_acumulativa);
			break;

			case 'Edicion':
				$funcion->Editar_Librodiario($id_librodiario,$fecha,$nombre_cuentaderegistro,$ingreso,
				$egreso,$saldo,$observaciones,$nombre_cuentaacumulativa,$nombre_cuentadebanco,$id_deregistroR,$id_debancosL,$naturalezaL,$id_acumulativa,$estado);
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
