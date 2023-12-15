<?php

$listaRegistrosGeneral =  EntradaLogistica::ListadoGeneral();

?>
<!-- Basic initialization -->
<div class="panel panel-flat">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
      <li><a href="javascript:;">Historial entregas logistica</a></li>
    </ul>
  </div>
  <div class="panel-body">
  </div>
  <div id="reload-div">
    <table class="table datatable-basic table-xxs table-hover">
      <thead>
        <tr>
          <th>Nro referencia</th>
          <th>Fecha registro</th>
          <th>Cliente</th>
          <th>Asesor</th>
          <th>Tipo registro</th>
          <th class="text-center">Opciones</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($listaRegistrosGeneral as $registro) :
          $idReferencia = $registro["id_referencia"];
        ?>
          <tr>
            <td><?php echo $idReferencia ?></td>
            <td><?php echo $registro["fecha_registro"] ?></td>
            <td><?php echo $registro["nombre_cliente"] ?></td>
            <td><?php echo $registro["nombre_vendedor"] ?></td>
            <td><?php echo $registro["tipo_registro"] ?></td>
            <td class="text-center">
              <ul class="icons-list">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right">
                    
                    <?php if ($registro["tipo_registro"] != "VENTA") {?>
                    <li>
                      <a href="./?View=ActualizaEntradaLogistica&id=<?php echo $idReferencia ?>">
                        <i class="icon-pencil6"></i>
                        Editar
                      </a>
                    </li>
                    <?php } else { ?>
                      <li><a data-toggle="modal" onclick="obtenerListaEntradasPorVenta('<?php echo $idReferencia ?>')" data-target="#modalDetalleEntrada">
                        <i class=" icon-eye8">
                        </i> Ver lista</a>
                    </li>
                    <?php } ?>
                  </ul>
                </li>
              </ul>
            </td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>
</div>

<!-- modal detalle -->
<div id="modalDetalleEntrada" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">&nbsp; <span class="title-form"></span></h5>
      </div>

      <form role="form" autocomplete="off" class="form-validate-jquery" id="frmModal">
        <div class="modal-body" id="modal-container">
          <h5>Detalle registros</h5>
          <div id="llegaTablaVentalog">

          </div>

        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-default" id="reset" class="btn btn-link" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- fin modal detalle -->

<!-- /iconified modal -->
<?php include('./includes/footer.inc.php'); ?>
</div>
<!-- /content area -->
</div>
<!-- /main content -->
</div>
<!-- /page content -->
</div>
<!-- /page container -->
</body>

</html>
<script type="text/javascript" src="web/custom-js/cuentasatributos.js"></script>
<script type="text/javascript" src="web/custom-js/envioProveedorLog.js"></script>