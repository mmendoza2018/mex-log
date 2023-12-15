<?php

$objOrdenes =  new OrdenCompra();
$listaOrdenes = $objOrdenes->ListarOrdenesCompra();
$listaClientes = Clientes::ListarClientes();
$listaProductos = Productos::listarProductos();


?>
<style>
  .border_oc {
    border-bottom: 2px solid #339CFF !important;
    border-top: 2px solid #339CFF !important;
  }
</style>
<!-- Basic initialization -->
<div class="panel panel-flat">

  <div class="panel panel-flat" id="inicialpagina">
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
        <li><a href="javascript:;">Nuevo registro</a></li>
      </ul>

    </div>

    <div class="panel-heading">
      <form id="formRegistroCompraLog">

        <div class="row">

          <div class="col-sm-3">
            <label>Orden de compra</label>
            <select class="ordenCompraLog select form-control" name="id_factura" onchange="obtenerDataOrdenCompra('selectOCompraRegLog')" id="selectOCompraRegLog">
              <option value=""></option>
              <?php foreach ($listaOrdenes as $orden) : ?>
                <option value="<?php echo $orden["id_factura"] ?>"><?php echo $orden["numero_factura"] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="col-sm-3">
            <label>Tipo de compra</label>
            <select class="select form-control" id="selectTipoCompraRegLog" name="">
              <option value="Selecciona una opción" selected disabled></option>
              <option value="REPARACION">REPARACION</option>
              <option value="STOCK">STOCK</option>
              <option value="VENTA">VENTA</option>
            </select>
            <input type="hidden" id="selectTipoCompraRegLog2">
          </div>

          <div class="col-sm-4">
            <label>Cliente</label>
            <select class="ordenCompraLog select form-control" id="selectClienteRegLog" name="">
              <option value=""></option>
              <?php foreach ($listaClientes as $cliente) : ?>
                <option value="<?php echo $cliente["id_cliente"] ?>"><?php echo $cliente["nombre_cliente"] ?></option>
              <?php endforeach ?>
            </select>
            <input type="hidden" id="selectClienteRegLog2">
          </div>

          <div class="col-sm-2">
            <label>N° de guia</label>
            <input type="text" class="form-control" data-validate name="numero_guia">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Fecha de envio</label>
            <input type="date" class="form-control" data-validate name="fecha_envio">
          </div>

          <div class="col-sm-3">
            <label>Fecha de recepción</label>
            <input type="date" class="form-control" data-validate name="fecha_entrega">
          </div>
          <div class="col-sm-6">
            <label>Dirección</label>
            <input type="text" class="form-control" data-validate name="direccion">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Teléfono</label>
            <input type="text" class="form-control" data-validate name="telefono">
          </div>

          <div class="col-sm-3">
            <label>Precio del envio</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="precioEnvioAddLog" class="form-control" data-validate name="precio">
          </div>

          <div class="col-sm-3">
            <label>Costo del seguro</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="costoSeguroAddLog" class="form-control" data-validate name="seguro">
          </div>

          <div class="col-sm-3">
            <label>Total envio</label>
            <input type="number" id="totalAddLog" readonly data-validate class="form-control">
          </div>

          <div class="col-sm-8">
            <div class="col-sm-12">
              <label>Medidas</label>
            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Alto</span>
                <input type="text" class="form-control" data-validate aria-describedby="sizing-addon1" name="medidaAlto">
              </div>

            </div>

            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Largo</span>
                <input type="text" class="form-control" data-validate aria-describedby="sizing-addon1" name="medidaLargo">
              </div>

            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon3">Ancho</span>
                <input type="text" class="form-control" data-validate aria-describedby="sizing-addon3" name="medidaAncho">
              </div>

            </div>
          </div>

        </div>
        <div class="text-right w-100">
          <button type="button" onclick="enviarRegistroLog()" class="btn btn-danger btn-lg" style="margin-top: 2rem;">
            <span class="fa fa-print"></span>
            Guardar
          </button>
        </div>
      </form>
    </div>

    <div style="margin-left: 2.5rem;" id="opcionAgregrarProductos">
      <button type="button" id="addProductoEntradaLog" data-toggle="modal" data-target="#modalProductoEntradaLog" class="btn btn-info btn-lg">
        Añadir productos
      </button>
      <div style="width: 50%;" class="mt-5">
        <table class="table table-xxs table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Descripción</th>
              <th>Proveedor</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody id="tbodyEntradaLog">
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>
<!-- modal detalle -->
<div id="modalProductoEntradaLog" class="modal fade">
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
                <th>Código</th>
                <th>Descripción</th>
                <th>Proveedor</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($listaProductos as $producto) :
                $idProducto = $producto["id_producto"] ?>
                <tr>
                  <td><?php echo $producto["codigo_producto"] ?></td>
                  <td><?php echo $producto["descripcion_producto"] ?></td>
                  <td><?php echo $producto["nombre_proveedor"] ?></td>
                  <td class="text-center">
                    <a class="btn btn-success p-0" href="javascript:;" onclick="obtenerDetalleProducto('<?php echo $idProducto ?>')">
                      <i class="fa fa-plus">+</i>
                    </a>
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
<script>
  $('.ordenCompraLog').select2();
</script>

<script type="text/javascript" src="web/custom-js/listar_campo.js"></script> <!-- jcv PONER LA RUTA DE DONDE ESTA EL ARCHIVO A PARTIR DEL ROOT NO IMPORTA DONDE SE ENCUETRE ESTE ARCHIVO-->
<script type="text/javascript" src="web/custom-js/envioProveedorLog.js"></script>
<script type="text/javascript" src="web/custom-js/cuentasatributos.js"></script>