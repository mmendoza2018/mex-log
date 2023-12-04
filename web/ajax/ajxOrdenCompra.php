<?php

function __autoload($className)
{
	$model = "../../model/" . $className . "_model.php";
	$controller = "../../controller/" . $className . "_controller.php";

	require_once($model);
	require_once($controller);
}

$idOrdenCompra = @$_POST["idOrdenCompra"];
if ($idOrdenCompra !== "") {

	$objOrdenes =  new OrdenCompra();
	$listaDetOrdenes = $objOrdenes->ListarOrdenesCompra($idOrdenCompra);
	
	echo json_encode($listaDetOrdenes);
	
} else {
	
	echo json_encode([]);

}

?>
