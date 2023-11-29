<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cliente();

	if(!empty($_GET)){
			$idcliente = isset($_GET['cliente']) ? $_GET['cliente'] : '';
			$funcion->Ver_Limite_Credito($idcliente);
	}

	if (!empty($_POST))
	{

	if(isset($_POST['nombre_cliente'])){

		try {

			$proceso = $_POST['proceso'];
			$id = $_POST['id'];
			$nombre_cliente = trim($_POST['nombre_cliente']);
                        $telefono_cliente = trim($_POST['telefono_cliente']);
			$rfc = trim($_POST['rfc']);
			$direccion = trim($_POST['direccion_cliente']);
                        $numero_telefono = trim($_POST['numero_telefono']);
			$email = trim($_POST['email']);
			$direccion_entrega1 = trim($_POST['direccion_entrega1']);
                        $direccion_entrega2 = trim($_POST['direccion_entrega2']);
                        $encargado = trim($_POST['encargado']);
                        $celular_encargado = trim($_POST['celular_encargado']);
                        $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
                        
			$estado = trim($_POST['estado']);
			
			//$limite_credito = trim($_POST['limite_credito']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cliente($nombre_cliente,$telefono_cliente,$rfc,$direccion,
				$numero_telefono,$email,$direccion_entrega1,$direccion_entrega2,$encargado,$celular_encargado,$fecha_nacimiento );
                        break;

			case 'Edicion':
				$funcion->Editar_Cliente($id,$nombre_cliente,$telefono_cliente,$rfc,$direccion,
				$numero_telefono,$email,$direccion_entrega1,$direccion_entrega2,$encargado,$celular_encargado,$fecha_nacimiento,$estado);
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
