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
$numerito_de_factura = intval($_GET['id_factura']);

if (isset($numerito_de_factura)) {
    $id_factura = $numerito_de_factura;
    $campos      = "clientes.id_cliente, clientes.nombre_cliente, clientes.fiscal_cliente, clientes.email_cliente, facturas_ventas.id_vendedor, facturas_ventas.fecha_factura, facturas_ventas.condiciones, facturas_ventas.estado_factura, facturas_ventas.numero_factura,  facturas_ventas.tipo_arrendamiento";
    $sql_factura = mysqli_query($conexion, "select $campos from facturas_ventas, clientes where facturas_ventas.id_cliente=clientes.id_cliente and id_factura='" . $id_factura . "'");
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
        $estado_factura             = $rw_factura['estado_factura'];
        $numero_factura             = $rw_factura['numero_factura'];
        $tipo_arrendamiento         = $rw_factura['tipo_arrendamiento']; 
        $_SESSION['id_factura']     = $id_factura;
        $_SESSION['numero_factura'] = $numero_factura;
    } else {
       // header("location: facturas.php");
        exit;
    }
} else {
   // header("location: facturas.php");
    exit;
} 
?>

<?php require './vistas/html/includes/header_startOKJCV.php';?>    
 
<?php require './vistas/html/includes/header_endOKJCV0.php';?>  
  
 
<!-- Begin page -->
<div id="wrapper" class="forced enlarged">

	<?php/* require 'includes/menuOKJCV.php'*/;?> 

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="content-page"> 
		<!-- Start content -->
		<div class="content">
			<div class="container" style="margin-top: -20px; margin-left: -5px"> 
				<?php if ($permisos_ver == 1) { 
    ?>
                                <div class="breadcrumb-line" ">
                                    <ul class="breadcrumb" style="height: 15px; padding-top: 3px; ">
                                        <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
                                        <li><a href="javascript:;">Ventas</a></li>  
                                        <li class="active">Editar venta</li>  
                                    </ul>
                                </div> 
					<div class="col-lg-14">
						<div class="portlet">
                                                    
						<!--	<div class="portlet-heading bg-primary">
								<h3 class="portlet-title">
									Editar Factura
								</h3>
								<div class="portlet-widgets">
								</div>
								<div class="clearfix"></div> 
							</div>
                                                    --> 
							<div id="bg-primary" class="panel-collapse collapse show">
								<div class="portlet-body">
									<?php

                                                                        include "./vistas/modal/buscar_productos_ventasOKJCV.php";
                                                                        include "./vistas/modal/registro_clienteOKJCV.php";
                                                                        include "./vistas/modal/registro_productoOKJCV.php";
                                                                        include "./vistas/modal/cajaOKJCV.php";
                                                                        
     
      
include "./vistas/modal/agregar_fecha_depago.php"; /*JCV PARA MANDAR LLAMAR LA VENTANA DE AGREGAR FECHAS PROMESAS DE PAGO*/

include "./vistas/modal/editar_fecha_depago.php";
include "./vistas/modal/borrar_fecha_depago.php"; 
       
    ?> 
									<div class="row">
                                                                            <div class="col-lg-8">
											<div class="card-box">

												<div class="widget-chart"> 
													<div id="resultados_ajaxf" class='col-md-14' style="margin-top:5px"></div><!-- Carga los datos ajax -->
													<form class="form-horizontal" role="form" id="barcode_form">
														<div class="form-group row">
															<label for="barcode_qty" class="col-md-1 control-label">Cant:</label>
															
                                                                                                                        <div class="col-md-2">
                                                                                                                            <input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off" readonly="true">
															</div>
                                                                                                                        
                                                                                                                        <!--JCV REVISAR SI QUITAR O PONER 
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
															<div class="col-md-2">
																<button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar">
																	<span class="fa fa-search"></span> Buscar productos
																</button>
															</div>
														</div>
													</form>

													<div id="resultados" class='col-md-13' style="margin-top:10px; padding: 0px"></div><!-- Carga los datos ajax -->
 
												</div>
											</div>
 
										</div>  
 
										<div class="col-lg-4"> 
											<div class="card-box">
												<div class="widget-chart"> 
												<div class="editar_factura" class='col-md-12' style="margin-top:-15px"></div><!-- Carga los datos ajax --> 
													<form role="form" id="datos_factura">
                                                                                                            <input id="id_vendedor" name="id_vendedor" type='hidden' value="<?php echo $id_vendedor_db; ?>"> 
														<div class="form-group row">
															<!--<label class="col-2 col-form-label"></label>-->
															<div class="col-12">
																<div class="input-group">
                                                                                                                                    <input type="hidden" id="nombre_cliente" class="form-control" required value="<?php echo $nombre_cliente; ?>" tabindex="2">
																	<!--
                                                                                                                                        <span class="input-group-btn">
																		<button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoCliente"><li class="fa fa-plus"></li></button>
																	</span>
                                                                                                                                        --> 
                                                                                                                                        <input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente; ?>"> 
                                                                                                                                        
                                                                                                                                        <!-- JCV ESTE NO OCULTARLO, QUITARLO, LOS TEXTBOX SI OCULTARLOS CON HIDDEN <label>id_proveedorJCV</label>-->
                                                                                                                                        <input id="id_proveedorJCV" name="id_proveedorJCV" value=""  type="hidden">   
																</div>
															</div>
														</div>
                                                                                                                
                                                                                                                <div class="form-group row">  
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="proveedor" class="control-label">Cliente:</label>  

                                                                                                                        <select class='form-control' name='proveedorito' id='proveedorito' required onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                                                                            <option value="">-- Selecciona --</option>
                                                                                                                            <?php 

                                                                                                                            $query_proveedor = mysqli_query($conexion, "select * from clientes order by nombre_cliente");
                                                                                                                            while ($rw = mysqli_fetch_array($query_proveedor)) {
                                                                                                                            ?>
                                                                                                                            <option value="<?php echo $rw['id_cliente']; ?>"><?php echo $rw['nombre_cliente']; ?></option> 
                                                                                                                            <?php
                                                                                                                            } 
                                                                                                                            ?> 
                                                                                                                        </select>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                
                                                                                                                
														<div class="row">
                                                                                                                        <!--
                                                                                                                        <div class="col-md-6">
																<div class="form-group">
																	<label for="fiscal">RFC</label>
																	<input type="text" class="form-control" autocomplete="off" id="tel1" disabled="true" value="<?php echo $fiscal_cliente; ?>">
																</div>
															</div>
                                                                                                                        -->
															<div class="col-md-6">
																<div class="form-group">
																	<label for="fiscal">Factura</label>
																	<input type="text" class="form-control" autocomplete="off" id="factura"  name="factura" value="<?php echo $numero_factura; ?>" readonly>
																</div>
															</div>
                                                                                                                        
                                                                                                                        <div class="col-md-6">
																<div class="form-group">
																	<label for="fiscal">Pago</label>
																	<select class='form-control input-sm' id="condiciones" name="condiciones">
																		<option value="1" <?php if ($condiciones == 1) {echo "selected";}?>>Efectivo</option>
																		<option value="2" <?php if ($condiciones == 2) {echo "selected";}?>>Cheque</option>
																		<option value="3" <?php if ($condiciones == 3) {echo "selected";}?>>Transferencia bancaria</option>
																		<option value="4" <?php if ($condiciones == 4) {echo "selected";}?>>Crédito</option>
																	</select>
																</div>
															</div>
                                                                                                                        
                                                                                                                        
														</div>

														<div class="row">
															
															<div class="col-md-6">
																<div class="form-group">
																	<label for="resibido">Estado Factura</label>
																	<select class='form-control' id="estado_factura" name="estado_factura">
																		<option value="1" <?php if ($estado_factura == 1) {echo "selected";}?>>Pagado</option>
																		<option value="2" <?php if ($estado_factura == 2) {echo "selected";}?>>Pendiente</option> 
																	</select>
																</div>
															</div>
                                                                                                                    
                                                                                                                    
                                                                                                                        <div class="col-md-6">
																<div class="form-group">
																	<label for="resibido">Tipo de venta</label>
																	<select class='form-control' id="tipo_venta" name="tipo_venta"> 
																		<option value="1" <?php if ($tipo_arrendamiento == 1) {echo "selected";}?>>Arrendamiento</option>
																		<option value="2" <?php if ($tipo_arrendamiento == 2) {echo "selected";}?>>Sin arrendamiento</option>  
																	</select>
																</div>
															</div>
                                                                                                                     
                                                                                                                    
														</div>

														<div class="col-md-14" align="center">  
															<button type="submit" class="btn btn-danger btn-block btn-lg waves-effect waves-light" aria-haspopup="true" aria-expanded="false"><span class="fa fa-refresh"></span> Actualizar</button><br><br>
															<button type="button" id="imprimir" class="btn btn-default waves-effect waves-light" onclick="printOrder('<?php echo $id_factura; ?>');" accesskey="t" ><span class="fa fa-print"></span> Ticket</button>
															<button type="button" id="imprimir2" class="btn btn-default waves-effect waves-light" onclick="printFactura('<?php echo $id_factura; ?>');" accesskey="p"><span class="fa fa-print"></span> Factura</button>
														</div>
                                                                                                                
                                                                                                                <br>
                                                                                                                <div class="row">
                                                                                                                <div class="col-md-12   " align="center"> 
																<div class="btn-group pull-center">
																	
																	<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#add-stock"><i class="fa fa-plus"></i> Agregar fechas de pagos</button>
																	
																</div>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                
                                                                                                              <!--  <div class="col-xs-4">
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</div> 
																	<input type="text" class="form-control daterange pull-right" value="<?php echo "01" . date('/m/Y') . ' - ' . date('d/m/Y'); ?>" id="range" readonly>
																	<span class="input-group-btn">
														<button class="btn btn-info waves-effect waves-light" type="button" onclick='load(1);'><i class='fa fa-search'></i></button>
													</span>

																</div>
															</div>
                                                                                                                
                                                                                                                -->
                                                                                                                
                                                                                                                
													</form>
                                                                                                
                                                                                                        

												</div> <!-- widget-chart-->
                                                                                                
                                                                                                
                                                                                                
                                                                                                
											</div> <!--card-box  JCV HASTA EL FORM DEL BOTON AGREGAR FECHAS DE PAGO-->

                                                                                    
                                                                                        <div class="col-md-12" align="center">
                                                                                            <div id="resultados_ajaxjcv"></div>
                                                                                            <div class="clearfixjcv"></div>
                                                                                            <div class='outer_divjcv'></div><!-- Carga los datos ajax -->
                                                                                         </div>
                                                                                        
     <?php
if ($permisos_editar == 1) {    
        
        /*include "./vistas/modal/editar_fecha_depago.php"; */
       
    }
    ?>                                                                               
   
<!--
    <div id="fecha_resultado">                                                                                 
    <div class="row" > 


            <div class="col-lg-8">
              

            </div>
            <div class="col-lg-12">
              <div class="portlet" >
                <div class="portlet-heading " style=" background-color:#ECEEEF"> 
                    <h3 class="portlet-title" style="color:#000">
                    Promesa de pago
                  </h3>
                  <div class="portlet-widgets">
                    
                    
                    <span class="divider"></span>
                    
                    <span class="divider"></span>
                    
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div id="bg-primary" class="panel-collapse collapse show">
                  <div class="portlet-body">
                    <div class="table-responsive">
                      <table class="table table-sm no-margin table-striped"> 
                        <thead>
                          <tr>
                           
                            
                            <th class="text-center">Fecha promesa de pago</th> 
                            <th class="text-center">Monto</th>
                            <th class="text-center">estatus</th>
                            <th class="text-center">Acc.</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php /*
fechas_pago($numero_factura); */
    ?>
                        </tbody>
                      </table>
                    </div>
                   
                 
                  </div>
                </div>
              </div>
              
                
            </div>

          </div>

    </div>                                                                            
                                                                                    
                                                                                    
 -->                                                                                   
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
										</div>

									</div>
									<!-- end row -->


								</div>
							</div>
						</div>
					</div>
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

			</div>
			<!-- end container -->
		</div>
		<!-- end content -->

		 
                <?php require './vistas/html/includes/pieOKJCV.php';?> 
	</div>
	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->
 

</div>
<!-- END wrapper -->

<?php require './vistas/html/includes/footer_startOKJCV99.php'    /*JCV PARA EL AUTOCOMPLETE */   
?>
<!-- ============================================================== --> 
	<!-- Todo el codigo js aqui-->
	<!-- ============================================================== -->
        <script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
	
        <script type="text/javascript" src="./js/editar_ventaOKJCV2.js"></script>
        <script type="text/javascript" src="./js/ver_agregarfecha.js"></script>
	<!-- ============================================================== -->
	<!-- Codigos Para el Auto complete de Clientes -->
	<script>
            
            $("#id_cliente").change(function(){  
        alert('hola id cliente');  
         
        
        var id_provee=0;
            id_provee = $("#id_cliente").val();
            alert(id_provee);
            //$("#proveedorito > option[value=6]").attr("selected",true);
            
            $("#proveedorito option[value='"+ id_provee +"']").attr("selected",true);
            
            $('#id_proveedorJCV').val($("#proveedorito").val());
        //$('#id_proveedor').val(id_provee);
        
            //alert('EL ID_DEREGISTRO de banco EN CHANGE:  '+ id_debancos);
            
        })
     
    
    
    
    ///JCV EL SELECT DEL PROVEEDOR PARA HACER LA COMPRA
    $("#proveedorito").change(function(){
        //alert('hola proveedorito');  
        
        
        var id_provee2=0;
            id_provee2 = $("#proveedorito").val();
            $('#id_proveedorJCV').val(id_provee2);
        
            //alert('EL ID_DEREGISTRO de banco EN CHANGE:  '+ id_debancos);
            
        })
     
    
            
            
            
            
		$(function() {
			$("#nombre_cliente").autocomplete({
				//source: "../ajax/autocomplete/clientesOKJCV.php",
                                source: "./vistas/ajax/autocomplete/clientesOKJCV.php",
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$('#id_cliente').val(ui.item.id_cliente);
					$('#nombre_cliente').val(ui.item.nombre_cliente);
					$('#tel1').val(ui.item.fiscal_cliente);
				}
			});
                        
                         
        
$("#fecha_abono").datepicker({
firstDay: 1,
 locale: 'es',
        format: 'DD/MM/YYYY',
         //format: 'YYYY/MM/DD',
		
		
		
		monthNames: [
		"Enero",
		"Febrero",
		"Marzo",
		"Abril",
		"Mayo",
		"Junio",
		"Julio",
		"Agosto",
		"Septiembre",
		"Octubre",
		"Noviembre",
		"Diciembre"
		],
		
                dayNamesMin: [
		"Do",
		"Lu",
		"Ma",
		"Mi",
		"Ju",
		"Vi",
		"Sa"
		],
	
	opens: "right"


});       
          
    
                     
                         
                        
});

		$("#nombre_cliente" ).on( "keydown", function( event ) {
			if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
			{
				$("#id_cliente" ).val("");
				$("#tel1" ).val("");
			}
			if (event.keyCode==$.ui.keyCode.DELETE){
				$("#nombre_cliente" ).val("");
				$("#id_cliente" ).val("");
				$("#tel1" ).val("");
			}
		});
	</script>
	<!-- FIN -->
	<script>
// print order function
function printOrder(id_factura) {
	if (id_factura) {
		$.ajax({
			//url: '../pdf/documentos/imprimir_venta_editOKJCV.php',
                        url: './vistas/pdf/documentos/imprimir_venta_editOKJCV.php',
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
                mywindow.close();
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
</script>
<script>
// print order function
function printFactura(id_factura) {
	if (id_factura) {
		$.ajax({
			//url: '../pdf/documentos/imprimir_factura_ventaOKJCV.php',
                        url: './vistas/pdf/documentos/imprimir_factura_ventaOKJCV.php',
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
                mywindow.close();
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
</script>

<?php require './vistas/html/includes/footer_endOKJCV.php'  
?>

