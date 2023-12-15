<?php

function __autoload($className)
{
  $model = "../../model/" . $className . "_model.php";
  $controller = "../../controller/" . $className . "_controller.php";

  require_once($model);
  require_once($controller);
}

$idVenta = @$_POST["idVenta"];
$listaEntradaPorVenta =  EntradaLogistica::ListarLogisticaPorVenta($idVenta);

?>


<table class="table datatable-basic table-xxs table-hover">
  <thead>
    <tr class="info">
      <th>#</th>
      <th>Nro guia</th>
      <th>Fecha envio</th>
      <th>Fecha entrega</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($listaEntradaPorVenta as $registro) :
    $idEntradaLogistica = $registro["id_entrada"]
    ?>
      <tr>
        <td><?php echo $idEntradaLogistica ?></td>
        <td><?php echo $registro["numero_guia"] ?></td>
        <td><?php echo $registro["fecha_envio"] ?></td>
        <td><?php echo $registro["fecha_entrega"] ?></td>
        <td class="text-center">
          <a class="btn btn-sm btn-info" href="./?View=ActualizaEntradaLogistica&id=<?php echo $idEntradaLogistica ?>">Actualizar</a>
        </td>
      </tr>
    <?php endforeach ?>

  </tbody>
</table>