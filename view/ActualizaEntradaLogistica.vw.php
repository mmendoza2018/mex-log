<?php

$objOrdenes =  new OrdenCompra();
$listaOrdenes = $objOrdenes->ListarOrdenesCompra();
$listaClientes = Clientes::ListarClientes();
$idEntradaLogistica = @$_GET["id"];
$arrayData = EntradaLogistica::ListarEntrada($idEntradaLogistica);

$totalEnvio = $arrayData[0]["seguro"] + $arrayData[0]["precio"];
$medidas = json_decode($arrayData[0]["medidas"], true);

$alto = $medidas["alto"];
$largo = $medidas["largo"];
$ancho = $medidas["ancho"];

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
        <li><a href="javascript:;">Editar registro</a></li>
      </ul>
    </div>

    <div class="panel-heading">
      <form id="formRegistroCompraLogAct">

        <div class="row">

          <div class="col-sm-3">
            <label>Orden de compra</label>
            <input type="hidden" name="id_entrada" id="idEntradalog" value="<?php echo $arrayData[0]['id_entrada'] ?>">
            <input type="hidden" name="id_factura" value="<?php echo $arrayData[0]['id_factura'] ?>">
            <select class="ordenCompraLog select form-control" disabled id="selectOCompraRegLog">
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
            <input type="text" value="<?php echo $arrayData[0]['numero_guia'] ?>" class="form-control" data-validate name="numero_guia">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Fecha de envio</label>
            <input type="date" value="<?php echo $arrayData[0]['fecha_envio'] ?>" class="form-control" data-validate name="fecha_envio">
          </div>

          <div class="col-sm-3">
            <label>Fecha de recepción</label>
            <input type="date" class="form-control" value="<?php echo $arrayData[0]['fecha_entrega'] ?>" data-validate name="fecha_entrega">
          </div>
          <div class="col-sm-6">
            <label>Dirección</label>
            <input type="text" class="form-control" value="<?php echo $arrayData[0]['direccion'] ?>" data-validate name="direccion">
          </div>

        </div>

        <div class="row">

          <div class="col-sm-3">
            <label>Teléfono</label>
            <input type="text" class="form-control" value="<?php echo $arrayData[0]['telefono'] ?>" data-validate name="telefono">
          </div>

          <div class="col-sm-3">
            <label>Precio del envio</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="precioEnvioAddLog" value="<?php echo $arrayData[0]['precio'] ?>" class="form-control" data-validate name="precio">
          </div>

          <div class="col-sm-3">
            <label>Costo del seguro</label>
            <input type="number" oninput="sumarInputs('precioEnvioAddLog','costoSeguroAddLog','totalAddLog')" id="costoSeguroAddLog" value="<?php echo $arrayData[0]['seguro'] ?>" class="form-control" data-validate name="seguro">
          </div>

          <div class="col-sm-3">
            <label>Total envio</label>
            <input type="number" id="totalAddLog" value="<?php echo $totalEnvio ?>" readonly data-validate class="form-control">
          </div>

          <div class="col-sm-8">
            <div class="col-sm-12">
              <label>Medidas</label>
            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Alto</span>
                <input type="text" class="form-control" value="<?php echo $alto ?>" data-validate aria-describedby="sizing-addon1" name="medidaAlto">
              </div>

            </div>

            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon1">Largo</span>
                <input type="text" class="form-control" value="<?php echo $largo ?>" data-validate aria-describedby="sizing-addon1" name="medidaLargo">
              </div>

            </div>
            <div class="col-sm-4">

              <div class="input-group d-inline">
                <span class="input-group-addon" id="sizing-addon3">Ancho</span>
                <input type="text" class="form-control" value="<?php echo $ancho ?>" data-validate aria-describedby="sizing-addon3" name="medidaAncho">
              </div>

            </div>
          </div>

        </div>
        <div class="text-right w-100">
          <button type="button" onclick="actualizarRegistroLog()" class="btn btn-danger btn-lg" style="margin-top: 2rem;">
            <span class="fa fa-print"></span>
            Guardar
          </button>
        </div>
      </form>
    </div>

    <div style="margin-left: 2.5rem;" id="opcionAgregrarProductos">
    <!--   <button type="button" id="addProductoEntradaLog" data-toggle="modal" data-target="#modalProductoEntradaLog" class="btn btn-info btn-lg">
        Añadir productos
      </button> -->
      <div style="width: 50%;" class="mt-5">
      <div class="text-center">
          <h5 class="bg-info py-5">Productos añadidos</h5>
      </div>
        <table class="table table-xxs table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Descripción</th>
              <th>Proveedor</th>
              <!-- <th class="text-center">Acciones</th> -->
            </tr>
          </thead>
          <tbody id="tbodyEntradaLog">
          </tbody>
        </table>
      </div>
    </div>

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


<script type="text/javascript" src="web/custom-js/listar_campo.js"></script> <!-- jcv PONER LA RUTA DE DONDE ESTA EL ARCHIVO A PARTIR DEL ROOT NO IMPORTA DONDE SE ENCUETRE ESTE ARCHIVO-->
<script type="text/javascript" src="web/custom-js/envioProveedorLog.js"></script>

<script>
  $('.ordenCompraLog').select2();
  let ordenCompra = "<?php echo $arrayData[0]['id_factura']; ?>";

  if (ordenCompra !== "") {

    $("#selectOCompraRegLog").val(ordenCompra).trigger("change");
    obtenerDataOrdenCompra('selectOCompraRegLog');
    
  } else {
    
    obtenerDataOrdenCompra('selectOCompraRegLog', true);
    let tipoEntrada = "<?php echo $arrayData[0]['tipo_entrada']; ?>";
    let idCliente = "<?php echo $arrayData[0]['idClienteEL']; ?>";
    $("#selectTipoCompraRegLog").val(tipoEntrada);
    $("#selectClienteRegLog").val(idCliente).trigger("change");

  }
</script>