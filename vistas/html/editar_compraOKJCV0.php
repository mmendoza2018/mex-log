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
//Inicia Control de Permisos
include "./vistas/permisosOKJCV.php";
//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id); 
$modulo = "Ventas";
permisos($modulo, $cadena_permisos); //JCV MAY42023 FUNCIONA NORMAL EN PRUEBA 
//Finaliza Control de Permisos
 
$title   = "Compras";
$compras = 1;
//$numerito_de_factura=142;   
$numerito_de_factura = intval($_GET['id_factura']);
/*if (isset($_GET['id_factura'])) {
$id_factura = intval($_GET['id_factura']); */
if (isset($numerito_de_factura)) {
    $id_factura = $numerito_de_factura;
    $campos     = "proveedores.id_proveedor, proveedores.nombre_proveedor, proveedores.fiscal_proveedor, proveedores.email_proveedor, facturas_compras.id_vendedor, facturas_compras.fecha_factura, facturas_compras.condiciones, facturas_compras.estado_factura, facturas_compras.numero_factura, facturas_compras.ref_factura";

    $sql_factura = mysqli_query($conexion, "select $campos from facturas_compras, proveedores where facturas_compras.id_proveedor=proveedores.id_proveedor and facturas_compras.id_factura='" . $id_factura . "'");
    $count       = mysqli_num_rows($sql_factura);
    if ($count == 1) {
        $rw_factura                 = mysqli_fetch_array($sql_factura);
        $id_proveedor               = $rw_factura['id_proveedor'];
        $nombre_proveedor           = $rw_factura['nombre_proveedor'];
        $fiscal_proveedor           = $rw_factura['ref_factura'];
        $email_proveedor            = $rw_factura['email_proveedor'];
        $id_vendedor_db             = $rw_factura['id_vendedor'];
        $fecha_factura              = date("d/m/Y", strtotime($rw_factura['fecha_factura']));
        $condiciones                = $rw_factura['condiciones'];
        $estado_factura             = $rw_factura['estado_factura'];
        $numero_factura             = $rw_factura['numero_factura'];
        $_SESSION['id_factura']     = $id_factura;
        $_SESSION['numero_factura'] = $numero_factura;
    } else {
        //header("location: bitacora_comprasOKJCV.php"); 
         
        
        exit;
    }
} else {
    //header("location: bitacora_comprasOKJCV.php");
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
                        <li><a href="javascript:;">Órdenes de compra</a></li>  
                        <li class="active">Editar orden de compra</li>  
                    </ul>
                </div> 
                <div class="col-lg-14">  
                    <div class="portlet">
                        <!--
                            <div class="portlet-heading bg-primary"> 
                                    <h3 class="portlet-title">
                                            Editar Compra
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
                        --> 
                        <div id="bg-primary" class="panel-collapse collapse show">
                            <div class="portlet-body">
                                <?php
                                include "./vistas/modal/buscar_productos_comprasOKJCV0.php";  
                                include "./vistas/modal/registro_proveedorOKJCV.php";
                                include "./vistas/modal/registro_productoOKJCV.php"; 
                                //include "../modal/caja.php";  
                                ?>
                                <div class="row"> 
                                    <div class="col-lg-14">  
                                        <div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 2px solid #339CFF;"> <!--JCV INICIA DATOS DELPROVEEDOR Y DE LA OC-->
                                            <div class="widget-chart">
                                            <div class="editar_factura" class='col-md-14' style="margin-top:0px"></div><!-- Carga los datos ajax -->  
                                                <form role="form" id="datos_factura">
                                                    <div class="form-group row">
                                                        <!--	<label class="col-2 col-form-label"></label> JCV PARA DEJAR ESPACIO ARRIBA SE DEJA-->
                                                        <div class="col-12">
                                                            <div class="input-group"> 
                                                                <!--
                                                                <span class="input-group-btn">
                                                                        <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoProveedor" title="Agregar Proveedor"><li class="fa fa-plus"></li></button>
                                                                </span>
                                                                -->  
                                                                <input type="hidden" id="nombre_proveedor" class="form-control" placeholder="Buscar Proveedor" required value="<?php echo $nombre_proveedor; ?>" tabindex="2" >
                                                                <!-- JCV ESTE NO OCULTARLO, QUITARLO, LOS TEXTBOX SI OCULTARLOS CON HIDDEN<label>id_proveedor</label>-->
                                                                <input id="id_proveedor" name="id_proveedor" value="<?php echo $id_proveedor; ?>"  type="hidden">

                                                                <!-- JCV ESTE NO OCULTARLO, QUITARLO, LOS TEXTBOX SI OCULTARLOS CON HIDDEN <label>id_proveedorJCV</label>-->
                                                                <input id="id_proveedorJCV" name="id_proveedorJCV" value=""  type="hidden">  
 
                                                            </div>
                                                        </div>
 
 
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="proveedor" class="control-label">Proveedor:</label>  

                                                                <select class='form-control' name='proveedorito' id='proveedorito' required onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                    <option value="">-- Selecciona --</option>
                                                                    <?php 

                                                                    $query_proveedor = mysqli_query($conexion, "select * from proveedores order by nombre_proveedor");
                                                                    while ($rw = mysqli_fetch_array($query_proveedor)) {
                                                                    ?>
                                                                    <option value="<?php echo $rw['id_proveedor']; ?>"><?php echo $rw['nombre_proveedor']; ?></option>
                                                                    <?php
                                                                    } 
                                                                    ?> 
                                                                </select>

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                    <label for="fiscal"># Orden C.</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="factura" name="factura" value="<?php echo $numero_factura; ?>" tabindex="3">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-1">
                                                            <div class="form-group"> 
                                                                <!--<input id="id_proveedor" name="id_proveedor"> -->
                                                                    <label for="fiscal">No. pedido</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="tel1" value="<?php echo $fiscal_proveedor; ?>">
                                                            </div>
                                                        </div>
                                                          
                                                        <div class="col-md-2">
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
                                                         
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fecha">Estado</label>
                                                                <select class='form-control' id="estado_factura" name="estado_factura">
                                                                        <option value="1" <?php if ($estado_factura == 1) {echo "selected";}?>>Pagado</option>
                                                                        <option value="2" <?php if ($estado_factura == 2) {echo "selected";}?>>Pendiente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php if ($permisos_editar == 1) {?>
                                                            
                                                            <div class="col-md-2" align="center">
                                                                    <button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" style="height: 40px;margin-top: 20px;"><span class="fa fa-refresh"></span> Actualizar</button>
                                                                    <!--<a href="#" onclick="imprimir_factura('1');"><i class="glyphicon glyphicon-download"></i> PDF</a>-->
                                                            </div>
                                                        <?php }?>
                                                        
                                                         
                                                    </div> <!--form-group row--> 
                                                         
                                                </form> <!--id="datos_factura-->
                                            </div> <!--widget-chart>-->
                                        </div> <!--CARD-BOX--> 
                                    </div> <!--col-lg-14-->
                                </div>  <!--row-->
                                  
                                <div class="row">
                                    <div class="col-lg-8"> 
                                        <div>  
                                            <div class="widget-chart">  
                                            <div id="resultados_ajaxf" class='col-md-14' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                                <form class="form-horizontal" role="form" id="barcode_form">
                                                    <div class="form-group row">
                                                        <label for="barcode_qty" class="col-md-1 control-label">Cant:</label>
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off" readonly="true">
                                                        </div>
                                                        <!--
                                                        <div class="col-md-1">
                                                             <label for="condiciones" class="control-label">Codigo:</label>	
                                                        </div>  
                                                        <div class="col-md-7" align="left"> 
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="barcode" autocomplete="off"  tabindex="1" autofocus="true" >
                                                                <span class="input-group-btn">
                                                                        <button type="submit" class="btn btn-default"><span class="fa fa-barcode"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        --> 
                                                        <div class="col-md-2">
                                                                <button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar" title="Buscar Producto">
                                                                        <span class="fa fa-search"></span>Buscar equipos y productos
                                                                </button>
                                                        </div>
                                                        
                                                         
                                                        
                                                        <!-- JCV AGREGARLO DESPUÉS PARA QUE PUEDA DAR DE ALTA PRODUCTOS , DESDE AQUÍ
                                                        <div class="col-md-1">
                                                                <button type="button" accesskey="a" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#nuevoProducto" title="Agregar Nuevo Producto">
                                                                        <span class="fa fa-plus"></span>
                                                                </button>
                                                        </div>
                                                        -->
                                                    </div>
                                                </form>

<!--                                            <div id="resultados" class='col-md-14' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                            </div> <!--widget-chart-->
                                        </div> <!--card-box-->
                                    </div> <!--class="col-lg-8"-->
                                    <div class="row">
                                        <div class="col-lg-14"> 

                                            <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->

                                        </div>
                                    </div>
                                </div> <!-- row --> 

                            </div> <!--portlet-body-->
                        </div>  <!--bg-primary-->
                    </div><!--portlet-->
                </div> <!--col-lg-14-->
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
 
            </div> <!-- end container -->
        </div> <!-- end content-->
        <?php require './vistas/html/includes/pieOKJCV.php';?> 
    </div> <!-- end content PAGE -->
	
</div>
<!-- END wrapper -->
  
  
<?php require './vistas/html/includes/footer_startOKJCV99.php'    /*JCV PARA EL AUTOCOMPLETE */   
?> 
<!-- ============================================================== -->
<!-- Todo el codigo js aqui -->
<!-- ============================================================== -->
<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
<script type="text/javascript" src="./js/editar_compraOKJCV0.js"></script> 

<!-- ============================================================== --> 
<!-- Codigos Para el Auto complete de proveedores --> 
<script>
    
    $("#id_proveedor").change(function(){ 
        //alert('hola');  
         
        
        var id_provee=0;
            id_provee = $("#id_proveedor").val();
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
		$("#nombre_proveedor").autocomplete({
			source: "../ajax/autocomplete/proveedorOKJCV.php",
			minLength: 2,
			select: function(event, ui) {
				event.preventDefault();
				$('#id_proveedor').val(ui.item.id_proveedor);
				$('#nombre_proveedor').val(ui.item.nombre_proveedor);
				$('#tel1').val(ui.item.fiscal_proveedor);



			}
		});


	});

	$("#nombre_proveedor" ).on( "keydown", function( event ) {
		if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
		{
			$("#id_proveedor" ).val("");
			$("#tel1" ).val("");

		}
		if (event.keyCode==$.ui.keyCode.DELETE){
			$("#nombre_proveedor" ).val("");
			$("#id_proveedor" ).val("");
			$("#tel1" ).val("");
		}
	});
</script>
<!-- FIN -->
<!--<script>
	$(document).ready(function () {
		$("#texto1").off('blur');
		$("#texto1").on('blur',function(){
			//$("#texto1").keyup(function () {
				var value = $(this).val();
				id_tmp = $(this).attr("id");
				$.ajax({
					type: "POST",
					url: "../ajax/editar_costo_compra.php",
					data: "id_tmp=" + id_tmp + "&value=" + value,
					beforeSend: function(objeto) {
						$("#resultadosx").html('<img src="../../img/ajax-loader.gif"> Cargando...');
					},
					success: function(datos) {
						$("#resultadosx").html(datos);
						$.Notification.notify('success','bottom center','Notificación', 'Producto agregado a la Factura correctamente')
					}
				});
			});
		});
	</script>-->

	<?php require './vistas/html/includes/footer_endOKJCV.php' 
?>

