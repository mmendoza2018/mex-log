<?php  

/*session_start();
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
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$title          = "Ventas";
$nombre_usuario = get_row('users', 'usuario_users', 'id_users', $user_id);
?>


<?php require './vistas/html/includes/header_startOKJCV.php';?> 
<?php require './vistas/html/includes/header_endOKJCV0.php';?>   
<?php/* require './vistas/html/includes/header_endOKJCV.php';*/?>

<?php /*require './vistas/html/includes/header_startOKJCV.php';*/?>    
 
<?php /*require './vistas/html/includes/header_endOKJCV0.php';*/?>   

<!-- Begin page -->
<div id="wrapper" class="forced enlarged"> <!-- DESACTIVA EL MENU -->
	<?php /*require 'includes/menuOKJCV.php';*/?>

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<?php if ($permisos_ver == 1) {
    ?>
					<div class="col-lg-12">
						<div class="portlet">
							<div class="portlet-heading bg-primary">
								<h3 class="portlet-title">
									Nueva Cotización77
								</h3> 
								<div class="portlet-widgets"> 
									<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
									<span class="divider"></span>
									<a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary"><i class="ion-minus-round"></i></a>
									<span class="divider"></span>
									<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
					 		<div id="bg-primary" class="panel-collapse collapse show">
								<div class="portlet-body">
									<?php 
include "./vistas/modal/buscar_productos_ventasJCV.php";
    include "./vistas/modal/registro_clienteOKJCV.php";
    include "./vistas/modal/registro_productoOKJCV.php";
    ?>
									<div class="row">
										<div class="col-lg-8">
											<div class="card-box"> 

												<div class="widget-chart">
													<div id="resultados_ajaxf" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
													<form class="form-horizontal" role="form" id="barcode_form">
														<div class="form-group row">
															<label for="barcode_qty" class="col-md-1 control-label">Cant:</label>
															<div class="col-md-2">
																<input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off">
															</div>

															<label for="condiciones" class="control-label">Codigo:</label>
															<div class="col-md-5" align="left">
																<div class="input-group">
																	<input type="text" class="form-control" id="barcode" autocomplete="off"  tabindex="1" autofocus="true" >
																	<span class="input-group-btn">
																		<button type="submit" class="btn btn-default"><span class="fa fa-barcode"></span></button>
																	</span>
																</div>
															</div>
															<div class="col-md-2">
																<button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar">
																	<span class="fa fa-search"></span> Buscar
																</button>
															</div>
                                                                                                                        
                                                                                                                        
                                                                                                                        <div class="col-md-5">
                                                                                                                            <div class="form-group" > 
                                                                                                                                <label for="id_clientejcv" class="control-label">Cliente</label> 

                                                                                                                                <select class='form-control' name='id_clientejcv' id='id_clientejcv' required onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                                                                                    <option value="">-- Selecciona --</option>
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
                                                                                                                        </div> <!-- row DEL SELECT DEL CLIENTE-->
                                                                                                                         
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                        
														</div>
													</form>
 
													<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->

												</div>
											</div>
 
										</div> 

										<div class="col-lg-4">
											<div class="card-box">
												<div class="widget-chart">
													<form role="form" id="datos_factura">
														<div class="form-group row">
															<label class="col-2 col-form-label"></label>
															<div class="col-12">
																<div class="input-group">
																<!--	
                                                                                                                                    <input type="text" id="nombre_cliente" class="form-control" placeholder="Buscar Cliente"   tabindex="2">
                                                                                                                                    -->
                                                                                                                                    
																	<span class="input-group-btn">
																		<button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoCliente"><li class="fa fa-plus"></li></button>
																	</span>
																	<input id="id_cliente" name="id_cliente" type=''>
																</div>
															</div>
														</div>
														
                                                                                                            <!--
                                                                                                                <div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="email">Email</label>
																	<input type="text" class="form-control" autocomplete="off" id="em" disabled="true">
																</div>
															</div>
														</div>
														-->
                                                                                                                <div class="row">
														<!--
                                                                                                                    <div class="col-md-6">
																<div class="form-group">
																	<label for="fiscal"> RFC</label>
																	<input type="text" class="form-control" autocomplete="off" id="tel1" disabled="true">
																</div>
															</div>
														-->	
                                                                                                                    
                                                                                                                 <div class="col-md-6">
																<div class="form-group">
																	<label for="fiscal">No. Cotización</label>
																	<div id="f_resultado"></div><!-- Carga los datos ajax del incremento de la fatura -->
																</div>
															</div>   
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                    
														</div>

														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="condiciones">Pago</label>
																	<select class="form-control input-sm condiciones" id="condiciones" name="condiciones" onchange="showDiv(this)">
																		<option value="1">Contado</option>
																		<option value="4">Crédito</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="validez">Periodo de Validez</label>
																	<select class="form-control" id="validez" name="validez">
																		<option value="1">5 días</option>
																		<option value="2">10 días</option>
																		<option value="3">15 días</option>
																		<option value="4">30 días</option>
																		<option value="5">60 días</option>

																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-12" align="center">
															<button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" aria-haspopup="true" aria-expanded="false"><span class="fa fa-save"></span> Guardar</button>
														</div>
													</form>

												</div>
											</div>

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

		<?php/* require './vistas/html/includes/pieOKJCV.php';*/?> 
                <?php require './vistas/html/includes/pieOKJCV.php';?>

	</div>
	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php/* require './vistas/html/includes/footer_startOKJCV99.php'    /*JCV PARA EL AUTOCOMPLETE */   
?>
 <!--JCV PARA QUE PUEDA APARECER LA MODAL PARA IMPRIMIR LA COTIZACION TIENE QUE ESTAR EL SIGUIENTE ARCHIVO: footer_startOKJCV.php (ES PARA EL AUTO COMPLETE) 
 PORQUE SI PONEMOS EL ARCHIVO: footer_startOKJCV99.php NO APARECE EL MODAL PARA IMPRIMIR-->
<?php require './vistas/html/includes/footer_startOKJCV.php'  
?>

<!-- ============================================================== -->
<!-- Todo el codigo js aqui--> 
<!-- ============================================================== -->
<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
<script type="text/javascript" src="./js/cotizacionJCV.js"></script> 
<!-- ============================================================== -->
<!-- Codigos Para el Auto complete de Clientes -->
<script>
	 $("#id_clientejcv").change(function(){
         var id_deregistro=0;
         id_deregistro = $("#id_clientejcv").val();
            //alert('EL ID_DEREGISTRO EN CHANGE:  '+ id_deregistro);
            //listar_campo(id_deregistro);
           $('#id_cliente').val(id_deregistro); 
            
        
        
        })
</script> 
<!-- FIN --> 
<script>
// print order function
function printFactura(id_factura) {
	$('#modal_vuelto').modal('hide');
	if (id_factura) {
		$.ajax({
			url: './vistas/pdf/documentos/imprimir_cotizacionOKJCV.php',
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
	function obtener_caja(user_id) {
		$(".outer_div3").load("./vistas/modal/carga_cajaOKJCV.php?user_id=" + user_id);//carga desde el ajax
	}
</script>
<script>
	function showDiv(select){
		if(select.value==4){
			$("#resultados3").load("./vistas/ajax/carga_primaOKJCV.php");
		} else{
			$("#resultados3").load("./vistas/ajax/carga_resibidoOKJCV.php");
		}
	}
</script>

<?php require './vistas/html/includes/footer_endOKJCV.php'
?>

 