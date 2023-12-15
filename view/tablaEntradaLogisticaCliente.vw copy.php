<?php

$listaRegistroslogistica =  VentaOrden::listarVentas();

?>
<!-- Basic initialization -->
<div class="panel panel-flat">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
      <li><a href="javascript:;">Historial entregas logistica clientes</a></li>
    </ul>
  </div>
  <div class="panel-body">
  </div>
  <div id="reload-div">
    <table class="table datatable-basic table-xxs table-hover">
      <thead>
        <tr class="info">
          <th># Venta</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Asesor</th>
          <th class="text-center">Total venta</th>
          <th>Estado</th>
          <th class="text-center">Origen</th>
          <th class="text-center">Tipo de venta</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($listaRegistroslogistica as $venta) :

          $asesor = $venta["nombre_users"] . $venta["apellido_users"];
          $numFactura = $venta["numero_factura"];
          $tipoArrendamiento = ($venta["tipo_arrendamiento"] == 1)
            ? $text_tipo = "Arrendamiento"
            : $text_tipo = "Sin arrendamiento";

          /* $idEntradaLogistica = $registro["id_entrada"];
          $ordenCompra = ($registro["id_factura"] == NULL) ? "-" : $registro["id_factura"];
          $cliente = ($registro["id_factura"] == NULL) ? $registro["clienteEL"] : $registro["clienteOC"]; */
        ?>
          <tr>
            <td><?php echo $venta["numero_factura"] ?></td>
            <td><?php echo $venta["fecha_factura"] ?></td>
            <td><?php echo $venta["nombre_cliente"] ?></td>
            <td><?php echo $asesor ?></td>
            <td><?php echo $venta["monto_factura"] ?></td>
            <td><?php echo $venta["estado_entrega"] ?></td>
            <td><?php echo $venta["origen"] ?></td>
            <td><?php echo $tipoArrendamiento ?></td>
            <td class="text-center">
              <ul class="icons-list">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="javascript:;" data-toggle="modal" data-target="#modalDetalleEnvioLog">
                        <i class="icon-menu9"></i>
                        Detalles
                      </a>
                    </li>
                    <li>
                      <a href="./?View=NuevaSalidaLogistica&id=<?php echo $numFactura ?>">
                        <i class="icon-pencil6"></i>
                        Agregar
                      </a>
                    </li>

                  </ul>
                </li>
              </ul>
            </td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>

  <!-- modal detalle -->
  <div id="modalDetalleEnvioLog" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">&nbsp; <span class="title-form"></span></h5>
        </div>

        <form role="form" autocomplete="off" class="form-validate-jquery" id="frmModal">
          <div class="modal-body" id="modal-container">
            <h5>Detalle registros</h5>
            <table class="table datatable-basic table-xxs table-hover">
              <thead>
                <tr class="info">
                  <th># Venta</th>
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Asesor</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($listaRegistroslogistica as $venta) :

                  $asesor = $venta["nombre_users"] . $venta["apellido_users"];
                  $tipoArrendamiento = ($venta["tipo_arrendamiento"] == 1)
                    ? $text_tipo = "Arrendamiento"
                    : $text_tipo = "Sin arrendamiento";
                ?>
                  <tr>
                    <td><?php echo $venta["numero_factura"] ?></td>
                    <td><?php echo $venta["fecha_factura"] ?></td>
                    <td><?php echo $venta["nombre_cliente"] ?></td>
                    <td><?php echo $asesor ?></td>
                    <td><?php echo $venta["monto_factura"] ?></td>
                    <td><?php echo $venta["estado_entrega"] ?></td>
                    <td><?php echo $venta["origen"] ?></td>
                    <td><?php echo $tipoArrendamiento ?></td>
                    <td class="text-center">
                      <ul class="icons-list">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:;" data-toggle="modal" data-target="#modalDetalleEnvioLog">
                                <i class="icon-menu9"></i>
                                Detalles
                              </a>
                            </li>
                            <li>
                              <a href="javascript:;" href="./?View=ActualizaEntradaLogistica&id=<?php echo $idEntradaLogistica ?>">
                                <i class="icon-pencil6"></i>
                                Agregar
                              </a>
                            </li>

                          </ul>
                        </li>
                      </ul>
                    </td>
                  </tr>
                <?php endforeach ?>

              </tbody>
            </table>
          </div>

          <div class="modal-footer">
            <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
            <button id="btnEditar" type="submit" class="btn btn-warning">Editar</button>
            <button type="reset" class="btn btn-default" id="reset" class="btn btn-link" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- fin modal detalle -->
</div>

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