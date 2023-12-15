<?php

function __autoload($className)
{
  $model = "../../model/" . $className . "_model.php";
  $controller = "../../controller/" . $className . "_controller.php";

  require_once($model);
  require_once($controller);
}

$idVenta = @$_POST["idVenta"];
$listaSalidasPorVenta =  SalidaLogistica::ListarLogisticaPorVenta($idVenta);

?>


<table class="table datatable-basic table-xxs table-hover">
  <thead>
    <tr class="info">
      <th>#</th>
      <th>Nro Guia</th>
      <th>Asesor</th>
      <th>cliente</th>
      <th>Total</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($listaSalidasPorVenta as $registro) :
    $idEntradaLogistica = $registro["id_salida"]
    ?>
      <tr>
        <td><?php echo $idEntradaLogistica ?></td>
        <td><?php echo $registro["guia"] ?></td>
        <td><?php echo $registro["nombre_users"] ?></td>
        <td><?php echo $registro["nombre_cliente"] ?></td>
        <td><?php echo $registro["estimado_total"] ?></td>
        <td class="text-center">
          <a class="btn btn-sm btn-info" href="./?View=ActualizaEntradaLogistica&id=<?php echo $idEntradaLogistica ?>">Actualizar</a>
        </td>
      </tr>
    <?php endforeach ?>

  </tbody>
</table>