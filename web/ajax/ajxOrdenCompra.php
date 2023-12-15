<?php

function __autoload($className)
{
	$model = "../../model/" . $className . "_model.php";
	$controller = "../../controller/" . $className . "_controller.php";

	require_once($model);
	require_once($controller);
}

$idOrdenCompra = @$_POST["idOrdenCompra"];
$idEntradalogistica = @$_POST["idEntradalogistica"];

if ($idOrdenCompra !== "") {

	$objOrdenes =  new OrdenCompra();
	$listaDetOrdenes = $objOrdenes->ListarOrdenesCompra($idOrdenCompra);
		$listaDetproductos = $objOrdenes->ListarProductosOrdenCompra($idOrdenCompra);
		echo json_encode(["detalle" => $listaDetOrdenes, "productos" => $listaDetproductos]);

} else {
	$listaDetEntradaLog = EntradaLogistica::ListarproductosEntrada($idEntradalogistica);
	echo json_encode(["detalle" => [], "productos" => $listaDetEntradaLog]);
	//echo json_encode(["detalle" => [], "productos" => []]);
}
