<style type="text/css">  
.thead-inverse th{color:#fff;background-color:#292b2c}
.thead-default th{color:#464a4c;background-color:#eceeef;font-weight:bold}

  </style>
 
<?php   
/*
session_start(); 
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: ../../loginOKJCV.php");
    exit;
} 
*/
 
/* Connect To Database*/
require_once "./vistas/dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "./vistas/php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
//Archivo de funciones PHP
require_once "./vistas/funcionesOKJCV.php";
//Inicia Control de Permisos

include "./vistas/permisosOKJCV.php"; 
//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos); //JCV MAY42023 FUNCIONA NORMAL EN PRUEBA
//Finaliza Control de Permisos

$title          = "Ventas";
$Ventas         = 1;
$nombre_usuario = get_row('users', 'usuario_users', 'id_users', $user_id);

if (isset($_GET['id_factura'])) {
    $id_factura  = intval($_GET['id_factura']);
    $campos      = "clientes.id_cliente, clientes.nombre_cliente, clientes.fiscal_cliente, clientes.email_cliente, facturas_cot.id_vendedor, facturas_cot.fecha_factura, facturas_cot.condiciones, facturas_cot.validez, facturas_cot.numero_factura";
    $sql_factura = mysqli_query($conexion, "select $campos from facturas_cot, clientes where facturas_cot.id_cliente=clientes.id_cliente and id_factura='" . $id_factura . "'");
    $count       = mysqli_num_rows($sql_factura);
    if ($count == 1) {
        $rw_factura                 = mysqli_fetch_array($sql_factura);
        $id_cliente                 = $rw_factura['id_cliente'];
        $nombre_cliente             = $rw_factura['nombre_cliente'];
        $fiscal_cliente             = $rw_factura['fiscal_cliente'];
        $email_cliente              = $rw_factura['email_cliente'];
        $id_vendedor_db             = $rw_factura['id_vendedor'];
        $fecha_factura              = date("d/m/Y", strtotime($rw_factura['fecha_factura']));
        $condiciones                = $rw_factura['condiciones'];
        $validez                    = $rw_factura['validez'];
        $numero_factura             = $rw_factura['numero_factura'];
        $_SESSION['id_factura']     = $id_factura;
        $_SESSION['numero_factura'] = $numero_factura;
    } else {
        header("location: facturas.php");
        exit;
    }
} else {
    header("location: facturas.php");
    exit;
}
//consulta para elegir el comprobante
$query = $conexion->query("select * from comprobantes");
$tipo  = array();
while ($r = $query->fetch_object()) {$tipo[] = $r;}
?>
<!--JCV LAS ORIGINALES-->
<?php/* require 'includes/header_startOKJCV.php';*/?>

<?php/* require 'includes/header_endOKJCV.php';*/?>


<?php require './vistas/html/includes/header_startOKJCV.php';?>    
 
<?php require './vistas/html/includes/header_endOKJCV0.php';?>      



<!-- Begin page -->
<div id="wrapper" class="forced enlarged">
    <?php/* require 'includes/menuOKJCV.php';*/?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
            <!-- Start content -->
        <div class="content">
            <div class="container" style="margin-top: -20px; margin-left: -5px">  
                <?php if ($permisos_ver == 1) {?>
                <div class="breadcrumb-line" ">
                    <ul class="breadcrumb" style="height: 15px; padding-top: 3px; ">
                        <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
                        <li><a href="javascript:;">Cotización Advance</a></li>  
                        <li class="active" >Editar cotización</li>  
                    </ul>
                </div> 

                <div class="col-lg-14">  
                    <div class="portlet">
                        <div id="bg-primary" class="panel-collapse collapse show">
                            <div class="portlet-body">
                            <?php
include "./vistas/modal/buscar_productos_ventasOKJCV.php";
include "./vistas/modal/registro_clienteOKJCV.php";
include "./vistas/modal/registro_productoOKJCV.php";
include "./vistas/modal/cajaOKJCV.php";
    
?>
                                <div class="row">
                                    <div class="col-lg-14">
                                        <div class="card-box" style="padding-bottom: 0px; padding-top: 7px; border-bottom: 2px solid #339CFF;">
                                            <!--<div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 2px solid #339CFF;"> <!--JCV INICIA DATOS DEL cliente Y DE LA COTIZACION-->
                                            <div class="widget-chart" style="padding-bottom: 0px">
                                                <!--<div id="resultados_ajaxf" class='col-md-12' style="margin-top:0px;"></div><!-- Carga los datos ajax -->
                                                <div class="editar_factura" class='col-md-12' style="margin-top:0px"></div><!-- JCV Carga los datos MENSAJES --> 
                                                <!--jcv original<form class="form-horizontal" role="form" id="barcode_form">-->
                                                <form role="form" id="datos_factura">   
                                                    <input id="id_vendedor" name="id_vendedor" type='hidden' value="<?php echo $id_vendedor_db; ?>"> 
                                                    <div class="form-group row">
                                                        <div class="col-md-4" >
                                                            <div class="form-group" > 
                                                                <label for="id_clientejcv" class="control-label">Cliente</label> 

                                                                <select class='form-control' name='id_clientejcv' id='id_clientejcv' required onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                    <option value="">-- Selecciona cliente --</option>
                                                                    <?php 

                                                                    $query_cliente = mysqli_query($conexion, "select * from clientes order by nombre_cliente");
                                                                    while ($rw = mysqli_fetch_array($query_cliente)) {
                                                                    ?>
                                                                    <option value="<?php echo $rw['id_cliente']; ?>"><?php echo $rw['nombre_cliente']; ?></option>
                                                                    <?php
                                                                    } 
                                                                    ?> 
                                                                </select>
 
                                                            </div>
                                                        </div> 
 

                                                        <div class="col-md-2" >
                                                            <div class="form-group" >
                                                                <input id="id_cliente" name="id_cliente" value="<?php echo $id_cliente; ?>" type='hidden'> 
                                                                <!-- JCV ESTE NO OCULTARLO, QUITARLO, LOS TEXTBOX SI OCULTARLOS CON HIDDEN <label>id_proveedorJCV</label>-->
                                                                <!--<input id="id_proveedorJCV" name="id_proveedorJCV" value=""  type="hidden">   -->
                                                                
                                                                <!-- 
                                                                <label for="fiscal">No. Cotización</label>
                                                                <div  id="f_resultado" id="oc" name="oc"  ></div><!-- Carga los datos ajax del incremento de la cotización -->
                                                                
                                                                <label for="cotizacion">No. Cotización</label>
                                                                <input type="text" class="form-control" autocomplete="off" id="cotizacion"  name="cotizacion" value="<?php echo $numero_factura; ?>" readonly>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2" >
                                                            <div class="form-group">
                                                                <label for="validez">Valida por:</label>
                                                                <select class="form-control" id="validez" name="validez">
                                                                    <option value="1">5 días</option>
                                                                    <option value="2">10 días</option>
                                                                    <option value="3">15 días</option>
                                                                    <option value="4">30 días</option>
                                                                    <option value="5">60 días</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" >
                                                            <div class="form-group">
                                                                <label for="condiciones">Pago</label>
                                                                <select class="form-control input-sm condiciones" id="condiciones" name="condiciones" onchange="showDiv(this)">
                                                                <!--<select class="form-control" id="condiciones" name="condiciones">-->
                                                                        <option value="1">Contado</option>
                                                                        <option value="4">Crédito</option>
                                                                </select>
                                                            </div>
                                                        </div> 

                                                         
                                                        
                                                        <div class="col-md-3" align="center" style=" width: 12%"> <!--JCV PAGO RECIBIDO-->
                                                            <div class="form-group">
                                                                <input id="id_pago" name="id_pago" value="<?php echo $condiciones; ?>" type='hidden'> 
                                                                
                                                                <!--<label for="prima">Anticipo</label>-->
                                                                <div id="resultados3"></div><!-- Carga los datos ajax del incremento de la fatura -->
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- JCV CHECAR SI ESTE BOTON O ACTUALIZAR VAN
                                                        <label class="col-2 col-form-label"></label> <!-- JCV PARA DEJAR ESPACIO ENTRE BOTON GUARDAR Y TEXTBOX-->
                                                        <!--
                                                        <div class="col-md-1" align="center" style=" width: 12%">
                                                                
                                                                <button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" style="height: 40px; margin-top: 18%"><span class="fa fa-print"></span> Guardar</button>
                                                        </div>
                                                        -->
                                                        
                                                        
                                                        <!--JCV PARA NUEVO CLIENTE SÍ FUNCIONA SOLO QUE NO ACTUALIZA CHECAR SI LO PONEMOS
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoCliente"><li class="fa fa-plus"></li></button>
                                                        </span>
                                                        -->

                                                    </div> <!-- DEL ROW DE NO FACTURA Y REFERENCIA-->


                                                   <div class="form-group row">
                                                        
                                                        <div class="col-md-2"> <!--jcv document-->
                                                            <div class="form-group">
                                                            <div id="resultados4"></div><!-- Carga los datos ajax -->
                                                            </div>
                                                            <div id="resultados5"></div><!-- Carga los datos ajax -->
                                                        </div>
                                                       
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="id_comp" class="control-label">Comprobante:</label>
                                                                <select id = "id_comp" class = "form-control" name = "id_comp" required autocomplete="off" onchange="getval(this);">
                                                                    <option value="">-SELECCIONE-</option>
                                                                    <?php foreach ($tipo as $c): ?>
                                                                            <option value="<?php echo $c->id_comp; ?>"><?php echo $c->nombre_comp; ?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fiscal">No. Comprobante</label>
                                                                <div id="outer_comprobante"></div><!-- Carga los datos ajax -->
                                                            </div>
                                                        </div>
                                                        
                                                        
 
                                                          

                                                        <div class="col-md-6"> 
                                                            <button  style="width: 30%; height: 40px; margin-top: 3.5%" type="button" class="btn btn-danger waves-effect waves-light" aria-haspopup="true" aria-expanded="false" id="btn_actualizar"><span class="fa fa-refresh"></span> Actualizar</button>
                                                            <label class="col-2 col-form-label"></label> <!-- JCV PARA DEJAR ESPACIO ENTRE BOTONes-->
                                                            <button style="width: 30%; height: 40px; margin-top: 3.5%" type="button" class="btn btn-success waves-effect waves-light" id="btn_guardar"><span class="ti-shopping-cart-full"></span> Convertir a venta</button>
                                                            
                                                            
                                                            
                                                        </div>
                                                            
                                                       
 
                                                    </div>



                                                </form>

                                                
                                            </div> <!--JCV widget-chart DEL PROVEEDOR-->
                                        </div> <!--JCV card-box" DEL PROVEEDOR-->

                                    </div> <!--JCV col-lg-14 DEL PROVEEDOR-->

                                </div>       <!--JCV DEL ROW DE DATOS DE LA cotización-->  



                                <div class="row">
                                    <div class="col-lg-10">
                                        <div><!-- jcv LA QUITE PARA QUE NO APAREZCA EL BORDE GRIS<div class="card-box"> <!--jcv de la busqueda de ARTICULOS-->
                                            <!-- JCV BUENO<div class="card-box" style="padding-top: 3px; padding-bottom: 2px;"> <!--jcv de la busqueda de ARTICULOS-->
                                            <div class="widget-chart">
                                                <div id="resultados_ajaxf" class='col-md-14' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                                <form class="form-horizontal" role="form" id="barcode_form">

                                                    <div class="form-group row">
                                                        
                                                        <label for="barcode_qty" class="col-md-1 control-label">Cantidad</label>
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off" readonly="true">
                                                        </div>
 
                                                        <!--
                                                        <label for="condiciones" class="control-label">Codigo:</label>
                                                        <div class="col-md-5" align="left">
                                                                <div class="input-group">
                                                                        <input type="text" class="form-control" id="barcode" autocomplete="off"  tabindex="1" autofocus="true" >
                                                                        <span class="input-group-btn">
                                                                                <button type="submit" class="btn btn-default"><span class="fa fa-barcode"></span></button>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                        --> 
                                                        <div class="col-md-3">
                                                                <button id="busquedajcv" type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar">
                                                                        <span class="fa fa-search"></span> Buscar equipos y productos
                                                                </button>
                                                                
                                                        </div>
                                                        

                                                    </div>

                                                </form>



                                            </div> <!--<div class="widget-chart">--> 
                                        </div> <!--class="card-box"-->

                                    </div> <!--col-lg-8-->



                                    <div class="row">
                                        <div class="col-lg-14">

                                            <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->

                                        </div>
                                    </div>

                                </div> <!--row-->  


                            </div> <!-- portlet-body-->
                        </div> <!-- bg-primary-->



                    </div> <!--jcv class="portlet"-->


                </div> <!-- col-lg-14-->


                <?php
} else {
?>
                <section class="content">
                    <div class="alert alert-danger" align="center">
                        <h3>Acceso denegado! </h3>
                        <p>No cuentas con los permisos necesario para acceder a este módulo.</p>
                    </div>
                </section>
                <?php
}
?>

            </div> <!-- end container PRINCIPAL -->

        </div><!-- end content PRINCIPAL -->

 
        <?php require './vistas/html/includes/pieOKJCV.php';?> 

    </div><!-- content-page-->
	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->

 
</div><!-- END wrapper -->
<!-- END wrapper -->
 
<?php/*JCV ORIGINAL  require 'includes/footer_startOKJCV.php' 
*/?>

<?php require './vistas/html/includes/footer_startOK99.php'    /*JCV PARA EL AUTOCOMPLETE */    
?> 
  
<!-- ============================================================== -->
	<!-- Todo el codigo js aqui-->
	<!-- ============================================================== -->
	<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
	<script type="text/javascript" src="./js/editar_cotizacionOKJCVOK.js"></script>
        
	<!-- ============================================================== -->
	<!-- Codigos Para el Auto complete de Clientes -->
<script>
    $(function() { ///JCV EL SELECT DEL cliente PARA HACER LA cotizacion 
            $("#id_clientejcv").change(function(){
            var id_deregistro=0;
            id_deregistro = $("#id_clientejcv").val();
               //alert('EL ID_DEREGISTRO EN CHANGE:  '+ id_deregistro);
               //listar_campo(id_deregistro);
              $('#id_cliente').val(id_deregistro); 
});
 
$("#id_cliente").change(function(){ //EL TEXT BOX DEL ID DEL ID_CLIENTE
        //alert('hola');  
        var id_provee=0;
            id_provee = $("#id_cliente").val();
            //alert(id_provee);
            $("#id_clientejcv option[value='"+ id_provee +"']").attr("selected",true);
        });
  
 
$("#condiciones").change(function(){ ///JCV EL SELECT DEL pago (condiciones)
            var id_condiciones=0;
            id_condiciones = $("#condiciones").val();
               //alert('EL ID_DEREGISTRO EN CHANGE:  '+ id_deregistro);
               //listar_campo(id_deregistro);
              $('#id_pago').val(id_condiciones); 
              
 }); 

$("#id_pago").change(function(){ //EL TEXT BOX DEL ID DEL ID_PAGO
        //alert('hola');  
        var id_pago=0;
            id_pago = $("#id_pago").val();
            //alert(id_provee);
            $("#condiciones option[value='"+ id_pago +"']").attr("selected",true);
        

 });
 
 
  
 

    });




</script>
	<!-- FIN -->
<script>
// print order function 
function printOrder(id_factura) {
	$('#modal_vuelto').modal('hide');//CIERRA LA MODAL
	if (id_factura) {
		$.ajax({
			url: './vistas/pdf/documentos/imprimir_venta_cot-ticketOKJCVOK.php',
			type: 'post',
			data: {
				id_factura: id_factura
			},
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Facturación</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                //mywindow.close(); //JCV APAGARLO PORQUE SINO, SE PASA DIRECTO AL HISTORIAL SIN VER LA VENTANA DE IMPRESIÓN
                window.location.href = './?View=HistorialCotizacion';
            } // /success function
 
        }); // /ajax function to fetch the printable order
        
        
    } // /if orderId
} // /print order function
</script>
<script>    
// print order function
function printFactura(id_factura) { 
	$('#modal_vuelto').modal('hide');
	if (id_factura) {
		$.ajax({
			//JCV PARA PROBAR CON COTIZACION: url: './vistas/pdf/documentos/imprimir_cotizacionOKJCVOK.php', 
                        url: './vistas/pdf/documentos/imprimir_factura_cot-ventaOKJCVOK.php',
			type: 'post',
			data: { 
				id_factura: id_factura
			},
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Facturación</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                //mywindow.close();//JCV APAGARLO PORQUE SINO, SE PASA DIRECTO AL HISTORIAL SIN VER LA VENTANA DE IMPRESIÓN
              
                
                //JCV OK window.location.href = 'http://localhost/admin/?View=HistorialCotizacion';
                window.location.href = './?View=HistorialCotizacion';
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
</script>
<script>
function obtener_caja(user_id) {
		$(".outer_div3").load("./vistas/modal/carga_cajaOKJCV.php?user_id=" + user_id);//carga desde el ajax
	}
	function showDiv(select){
		if(select.value==4){
			$("#resultados3").load("./vistas/ajax/carga_primaOKJCV.php");
		} else{
			$("#resultados3").load("./vistas/ajax/carga_resibidoOKJCV.php");
		}
	}
	function comprobar(select){
		var rnc = $("#rnc").val();
		if(select.value==1 && rnc==''){
			$.Notification.notify('warning','bottom center','NOTIFICACIÓN', 'AL CLIENTE SELECCIONADO NO SE LE PUEDE IMPRIR LA FACTURA, NO TIENE RFC REGISTRADO')
			$("#resultados4").load("./vistas/ajax/tipo_docOKJCV.php");
		} else{
			//$("#resultados3").load("../ajax/carga_resibido.php");
		}
	}
	
function getval(sel)
  {
    $.Notification.notify('success', 'bottom center', 'NOTIFICACIÓN', 'CAMBIO DE COMPROBANTE')
    $("#outer_comprobante").load("./vistas/ajax/carga_correlativosOKJCV.php?id_comp="+sel.value);

  }
  
	$(document).ready( function () {
        $(".UpperCase").on("keypress", function () {
         $input=$(this);
         setTimeout(function () {
          $input.val($input.val().toUpperCase());
         },50);
        })
       })
</script>

<?php require './vistas/html/includes/footer_endOKJCV.php' 
?>

 