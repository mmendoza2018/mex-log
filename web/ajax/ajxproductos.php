<?php

function __autoload($className)
{
  $model = "../../model/" . $className . "_model.php";
  $controller = "../../controller/" . $className . "_controller.php";

  require_once($model);
  require_once($controller);
}
$idProducto = @$_POST["idProducto"];
$productos = new Productos();
$listaproductos = $productos::listarProductos($idProducto);

echo json_encode($listaproductos);