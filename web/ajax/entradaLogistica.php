<?php

function __autoload($className)
{
	$model = "../../model/" . $className . "_model.php";
	$controller = "../../controller/" . $className . "_controller.php";

	require_once($model);
	require_once($controller);
}

$funcion = new EntradaLogistica();

if (!empty($_POST)){

	try {

		$proceso = @$_POST['proceso'];

		$numero_guia = @trim($_POST["numero_guia"]);
		$fecha_envio = @trim($_POST["fecha_envio"]);
		$fecha_entrega = @trim($_POST["fecha_entrega"]);
		$direccion = @($_POST["direccion"]);
		$telefono = @($_POST["telefono"]);
		$precio = @trim($_POST["precio"]);
		$seguro = @trim($_POST["seguro"]);
		$estado = @trim($_POST['estado']);
		$id_entrada = @trim($_POST['id_entrada']);
		$tipo_entrada = @($_POST['tipo_entrada']);
		$id_cliente = @($_POST['id_cliente']);
		$id_factura = @($_POST['id_factura']);
		$idsProducto = @($_POST['idsProducto']);
		

		$medidaAlto = @$_POST["medidaAlto"];
		$medidaLargo = @$_POST["medidaLargo"];
		$medidaAncho = @$_POST["medidaAncho"];

		$medidas = [
			"alto" => $medidaAlto,
			"largo" => $medidaLargo,
			"ancho" => $medidaAncho
		];

		$jsonMedidas = json_encode($medidas);

		$arrayData = [
			"numero_guia" => $numero_guia,
			"fecha_envio" => $fecha_envio,
			"fecha_entrega" => $fecha_entrega,
			"id_cliente" => $id_cliente,
			"id_factura" => $id_factura,
			"tipo_entrada" => $tipo_entrada,
			"direccion" => $direccion,
			"telefono" => $telefono,
			"medidas" => $jsonMedidas,
			"precio" => $precio,
			"seguro" => $seguro,
			"estado" => $estado,
			"id_entrada" => $id_entrada
		];

		$arrayDataDetalle = [];
		foreach (explode("|", $idsProducto) as $idProducto) {
			$arrTemporal = [
				"id_entrada" => null,
				"id_producto" => $idProducto,
			 	"estado" => "PENDIENTE"
			];
			array_push($arrayDataDetalle, $arrTemporal);
		}

		switch ($proceso) {

			case 'Registro':
				$funcion->InsertarEntrada($arrayData, $arrayDataDetalle);
				break;

			case 'Edicion':
				$funcion->EditarEntrada($arrayData);
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
