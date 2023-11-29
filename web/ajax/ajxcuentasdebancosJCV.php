<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new CuentasdebancosJCV();

	if(!empty($_GET)){
			$idcliente = isset($_GET['cliente']) ? $_GET['cliente'] : '';
			$funcion->Ver_Limite_Credito($idcliente);
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
                                    $funcion->Borrar_Cliente($numero_transaccion);
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
			$id_cuentas_de_bancos = $_POST['id_cuentas_de_bancos'];
			$fecha = trim($_POST['fecha']);
			$ingreso = trim($_POST['ingreso']);
			$egreso = trim($_POST['egreso']);
			$concepto = trim($_POST['concepto']);
			$saldo = trim($_POST['saldo']);
			$observaciones = trim($_POST['observaciones']);
			$estado = trim($_POST['estado']);
			/*$direccion = trim($_POST['direccion']);*/
			$tipo_de_gasto = trim($_POST['tipo_de_gasto']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cliente($fecha,$concepto,$ingreso,
				$egreso,$saldo,$observaciones,$tipo_de_gasto);
			break;

			case 'Edicion':
				$funcion->Editar_Cliente($id_cuentas_de_bancos,$fecha,$concepto,$ingreso,
				$egreso,$saldo,$observaciones,$tipo_de_gasto,$estado);
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
