<?php

$objOrdenes =  new OrdenCompra();
$listaOrdenes = $objOrdenes->ListarOrdenesCompra();
$listaClientes = Clientes::ListarClientes();

$tipo = @$_GET["tipo"];
$id = @$_GET["id"];

if ($tipo == "venta") {
  $listaDetproductos = EntradaLogistica::ListarDetalleProductosPorVenta($id);
} else {
  $listaDetproductos = EntradaLogistica::ListarproductosEntrada($id);
}
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
          <div class="col-sm-6">
            <h5 class="text-center">Productos</h5>
            <table class="datatable-basic table-xxs table-hover">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Estado</th>
                  <th>-</th>
                </tr>
              </thead>
              <?php foreach ($listaDetproductos as $producto) : ?>
                <tr>
                  <td> - <?php echo $producto["nombre_producto"] ?></td>
                  <td>Habil</td>
                  <td> <input type="checkbox"></td>
                </tr>
              <?php endforeach ?>
            </table>
            <hr>
            <h5 class="text-center">Gastos adicionales</h5>
            <div>
              <div class="row" style="margin-top: 1rem;" data-clone id="inputCloneEQCO">
                <div class="col-sm-6">
                  <select class="form-control" data-validate name="tipoMedicion[]">
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="Peajes">Peajes</option>
                    <option value="almuerzos">almuerzos</option>
                    <option value="Transporte">Transporte</option>
                  </select>
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control form-control-sm" name="fechaIngreso[]" data-validate>
                </div>
                <div class="col-1">
                  <a href="#" class="text-danger">
                    <i class="fas fa-minus-circle fa-2x mb-3" onclick="QuitarElemento(this)">quitar</i>
                  </a>
                </div>
              </div>
            </div>
            <button class="btn btn-sm btn-warning" style="margin-top: 1rem;" onclick="clonarElemento('inputCloneEQCO')" type="button">Nuevo</button>
          </div>
          <div class="col-sm-6">

            <div class="row">

              <div class="col-sm-5">
                <label>Cliente</label>
                <select class="ordenCompraLog select form-control" id="selectClienteRegLog" name="">
                  <option value=""></option>
                  <?php foreach ($listaClientes as $cliente) : ?>
                    <option value="<?php echo $cliente["id_cliente"] ?>"><?php echo $cliente["nombre_cliente"] ?></option>
                  <?php endforeach ?>
                </select>
                <input type="hidden" id="selectClienteRegLog2">
              </div>

              <div class="col-sm-7">
                <label>Ubicación</label>
                <input type="text" class="form-control" data-validate name="numero_guia">
              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <label>N° de guia</label>
                <input type="text" class="form-control" data-validate name="numero_guia">
              </div>

              <div class="col-sm-4">
                <label>Peso</label>
                <input type="text" class="form-control" data-validate name="numero_guia">
              </div>

              <div class="col-sm-4">
                <label>Estimado</label>
                <input type="text" class="form-control" data-validate name="numero_guia">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <label>Fecha de recolección</label>
                <input type="date" class="form-control" data-validate name="fecha_envio">
              </div>

              <div class="col-sm-6">
                <label>Fecha de entrega</label>
                <input type="date" class="form-control" data-validate name="fecha_entrega">
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