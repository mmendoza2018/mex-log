<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$funcion = new Cuentasbancos();

	if(!empty($_GET)){
			$id = isset($_GET['idcuenta']) ? $_GET['idcuenta'] : '';
			/*JCV NO $funcion->Ver_Limite_Credito($idcliente);*/
	}

	if (!empty($_POST))
	{

	if(isset($_POST['concepto'])){

		try {

			$proceso = $_POST['proceso'];
			$id = $_POST['idcuenta'];
                        
			$fecha = trim($_POST['fecha']);
			$concepto = trim($_POST['concepto']);
			$ingreso = trim($_POST['ingreso']);
			$egreso = trim($_POST['egreso']);
			$saldo = trim($_POST['saldo']);
			$observaciones = trim($_POST['observaciones']);
			
			$tipocuenta = trim($_POST['tipocuenta']);


			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Cuenta_Bancos($idcuenta,$fecha,$concepto,$ingreso,$egreso,
				$saldo,$observaciones,$tipocuenta);
			break;

			case 'Edicion':
				$funcion->Editar_Cuenta_Bancos($idcuenta,$fecha,$concepto,$ingreso,$egreso,
				$saldo,$observaciones,$tipocuenta);
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
