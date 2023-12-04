<?php

$objOrdenes =  new OrdenCompra();
$listaOrdenes = $objOrdenes->ListarOrdenesCompra();

$listaClientes = ClienteModel::ListarClientes();
//;

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
            <select class="ordenCompraLog select form-control" onchange="obtenerDataOrdenCompra(this)" id="selectOCompraRegLog" name="">
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
            <input type="text" class="form-control">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Fecha de envio</label>
            <input type="date" class="form-control">
          </div>

          <div class="col-sm-3">
            <label>Fecha de recepción</label>
            <input type="date" class="form-control">
          </div>
          <div class="col-sm-6">
            <label>Dirección</label>
            <input type="text" class="form-control">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Teléfono</label>
            <input type="text" class="form-control">
          </div>

          <div class="col-sm-3">
            <label>Precio del envio</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="precioEnvioAddLog" class="form-control">
          </div>

          <div class="col-sm-3">
            <label>Costo del seguro</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="costoSeguroAddLog" class="form-control">
          </div>

          <div class="col-sm-3">
            <label>Total envio</label>
            <input type="number" id="totalAddLog" readonly class="form-control">
          </div>

          <div class="col-sm-8">
            <div class="col-sm-12">
              <label>Medidas</label>
            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Alto</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon1">
              </div>

            </div>

            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Largo</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon1">
              </div>

            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon3">Ancho</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon3">
              </div>

            </div>
          </div>

        </div>
        <div class="text-right w-100">
          <button type="submit" id="guardar_factura" class="btn btn-danger btn-lg" style="margin-top: 2rem;">
            <span class="fa fa-print"></span>
            Guardar
          </button>
        </div>
      </form>
    </div>
    <!--     <div>
      <div class="breadcrumb-line border_oc">
        <ul class="breadcrumb">
          <li><i class="icon-home2 position-left"></i>Productos agregados</li>
        </ul>
      </div>
      <div id="containerTableOC">

      </div>

    </div> -->


  </div>

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
<script>
  $('.ordenCompraLog').select2();
</script>

<script type="text/javascript" src="web/custom-js/listar_campo.js"></script> <!-- jcv PONER LA RUTA DE DONDE ESTA EL ARCHIVO A PARTIR DEL ROOT NO IMPORTA DONDE SE ENCUETRE ESTE ARCHIVO-->
<script type="text/javascript" src="web/custom-js/envioProveedorLog.js"></script>