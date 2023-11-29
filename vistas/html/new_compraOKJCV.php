<style type="text/css">
.thead-inverse th{color:#fff;background-color:#292b2c}
.thead-default th{color:#464a4c;background-color:#eceeef;font-weight:bold}

  </style>

  
<?php  
/* 
session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) { 
    header("location: ../../login.php");
    exit; 
} 
*/ 


/* Connect To Database*/  
 require_once "./vistas/dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "./vistas/php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
/*require_once "../vistas/dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../vistas/php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
 * 
 */
//Inicia Control de Permisos
include "./vistas/permisosOKJCV.php"; 
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Compras";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$title     = "Compras";
$pacientes = 1;
?>
  
<?php require './vistas/html/includes/header_startOKJCV.php';?>    
 
<?php require './vistas/html/includes/header_endOKJCV0.php';?>   
 


<!-- Begin page -->
<div id="wrapper" class="forced enlarged"> <!-- DESACTIVA EL MENU -->

	<?php /*require 'includes/menu.php';*/?>

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
                                        <li class="active">Nueva orden de compra</li>
                                </ul>
                    </div>
                    <div class="col-lg-14">
                        <div class="portlet">
                            <!--
                                <div class="portlet-heading bg-primary"> 
                                        <h3 class="portlet-title">
                                                Nueva Compra ok
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
                            
                            <div id="bg-primary" class="panel-collapse collapse show"> <!--JCV PARA LA PRIMER PARTE DEL FORMULARIO DASTOS DEL PROVEEDOR-->
                                <div class="portlet-body">
                                    <div class="row">     
                                        <div class="col-lg-14">
                                            <div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 2px solid #339CFF;"> <!--JCV INICIA DATOS DELPROVEEDOR Y DE LA OC-->
                                                <div class="widget-chart" >
                                                    <form role="form" id="datos_factura" > 
                                                        <div class="form-group row" >
                                                        <!--<div class="row">-->
                                                        <!--	<label class="col-2 col-form-label"></label> JCV PARA DEJAR ESPACIO ARRIBA SE DEJA-->
                                                            <!-- JCV PARA OCULTAR LA BUSQUEDA Y DE AÑADIR NUEVO PROVEEDOR, MEJOR QUE SALGA EN UN COMBO BOX LOS PROVEEDORES
                                                                <div class="col-12">
                                                                        <div class="input-group">
                                                                                <input type="text" id="nombre_proveedor" class="form-control" placeholder="Buscar Proveedor" required  tabindex="2">
                                                                                <span class="input-group-btn">
                                                                                        <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoProveedor" title="Agregar Proveedor"><li class="fa fa-plus"></li></button>
                                                                                </span>
                                                                                <
                                                                                <input id="id_proveedor" name="id_proveedor" type='hidden'> 
                                                                        </div>
                                                                </div>
                                                                --> 
                                                                
                                                            <div class="col-md-4">
                                                                <div class="form-group" >
                                                                    <label for="proveedor" class="control-label">Proveedor</label> 

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
                                                            </div> <!-- row DEL SELECT DELÑ PROVEEDOR-->


                                                        <!--JCV</div>  row DEL SELECT DEL PROVEEDOR-->

                                                        
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                <input id="id_proveedor" name="id_proveedor" type='hidden'> 	
                                                                    <label for="fiscal"># Orden C.</label>
                                                                    
                                                                        <div id="f_resultado"></div><!-- Carga los datos ajax del incremento de la fatura -->
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                        <label for="ref">No. pedido</label>
                                                                        <input type="text" class="form-control" autocomplete="off" id="ref" name="ref">
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label for="fiscal">Pago</label>
                                                                        <select class='form-control input-sm' id="condiciones" name="condiciones" onchange="showDiv(this)">
                                                                                <option value="1">Efectivo</option>
                                                                                <option value="2">Cheque</option>
                                                                                <option value="3">Transferencia bancaria</option>
                                                                                <option value="4">Crédito</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                        <div id="resultados2"></div><!-- Carga los datos ajax del incremento de la fatura -->
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="fecha">Fecha</label>
                                                                    <input type="date" class="form-control" id="fecha" name="fecha" required  tabindex="4">
                                                                </div>
                                                            </div>
                                                         
                                                        <!--<div class="row">-->
                                                            <?php if ($permisos_editar == 1) {?>
                                                            <label class="col-4 col-form-label"></label> <!-- JCV PARA DEJAR ESPACIO ENTRE BOTON GUARDAR Y TEXTBOX-->
                                                            
                                                            <div class="col-md-1" align="center">
                                                                <button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" style="height: 40px;"><span class="fa fa-print"></span> Guardar</button>
                                                                    <!--<a href="#" onclick="imprimir_factura('1');"><i class="glyphicon glyphicon-download"></i> PDF</a>-->
                                                            </div>
                                                            <?php }?>
                                                        <!--</div> <!-- JCV DEL ROW DEL BOTON GUARDAR-->
                                                        
                                                        </div> <!-- DEL ROW DE NO FACTURA Y REFERENCIA-->

                                                        
                                                         <!--JCV DEL ROW DE L PAGO-->

                                                    </form> <!-- JCV id="datos_factura" DEL PROVEEDOR-->

                                                </div> <!--JCV widget-chart DEL PROVEEDOR-->
                                            </div> <!--JCV card-box" DEL PROVEEDOR-->

                                        </div> <!--JCV col-lg-4 DEL PROVEEDOR-->


                                    </div>       


 


                                            <?php
include "./vistas/modal/buscar_productos_comprasOKJCV.php";
include "./vistas/modal/registro_proveedorOKJCV.php";
include "./vistas/modal/registro_productoOKJCV.php"; 
//include "../modal/caja.php";
?> 
                                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div><!-- jcv LA QUITE PARA QUE NO APAREZCA EL BORDE GRIS<div class="card-box"> <!--jcv de la busqueda de ARTICULOS-->
                                <!-- JCV BUENO<div class="card-box" style="padding-top: 3px; padding-bottom: 2px;"> <!--jcv de la busqueda de ARTICULOS-->
                                        <div class="widget-chart">
                                                <div id="resultados_ajaxf" class='col-md-14' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                                <form class="form-horizontal" role="form" id="barcode_form">

                                                        <div class="form-group row">

                                                                <label for="barcode_qty" class="col-md-1 control-label">Cant:</label>

                                                                <div class="col-md-2">
                                                                        <input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off">
                                                                </div>
                                                                 <div class="col-md-1">
                                                                     <label for="condiciones" class="control-label">Codigo:</label>	
                                                                </div>


                                                                <div class="col-md-7" >

                                                                    <div class="input-group">

                                                                                <input type="text" class="form-control" id="barcode" autocomplete="off"  tabindex="1" autofocus="true" >
                                                                                <span class="input-group-btn">
                                                                                        <button type="submit" class="btn btn-default"><span class="fa fa-barcode"></span></button>
                                                                                </span>
                                                                        </div>
                                                                </div>

                                                                <div class="col-md-1">
                                                                        <button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar" title="Buscar Producto">
                                                                                <span class="fa fa-search"></span>
                                                                        </button>
                                                                </div>
                                                                <!-- JCV AGREGARLO DESPUÉS PARA QUE PUEDA DAR DE ALTA PRODUCTOS , DESDE AQUÍ
                                                                <div class="col-md-1">
                                                                        <button type="button" accesskey="a" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#nuevoProducto" title="Agregar Nuevo Producto">
                                                                                <span class="fa fa-plus"></span>
                                                                        </button>
                                                                </div>
                                                                -->
                                                        </div>  <!--form-group row"-->
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
                    <!-- end row DESDE CANT: HASYA BOTON GUARDAR --> 

                            
                            
                            

                                    </div>
                            </div>
                            
                            
                            
                        </div> <!--jcv class="portlet"
                        
                        
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
       
<?php
//echo __DIR__;
?>
  
<?php require './vistas/html/includes/footer_startOKJCV99.php'    /*JCV PARA EL AUTOCOMPLETE */   
?> 
<!-- ============================================================== -->
<!-- Todo el codigo js aqui -->
<!-- ============================================================== -->
<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
<script type="text/javascript" src="./js/compraOKJCV.js"></script>
<!-- ============================================================== -->
<!-- Codigos Para el Auto complete de proveedores -->    
<script>  
    ///JCV EL SELECT DEL PROVEEDOR PARA HACER LA COMPRA
    $("#proveedorito").change(function(){
        //alert('hola');
        
        
        var id_provee=0;
            id_provee = $("#proveedorito").val();
            $('#id_proveedor').val(id_provee);
        
            //alert('EL ID_DEREGISTRO de banco EN CHANGE:  '+ id_debancos);
            
        })
     
    /*$(document).ready(function () {*/
    
	$(function() {  
            
		$("#nombre_proveedor").autocomplete({
			/*source: "../ajax/autocomplete/proveedorOKJCV.php",*/
                        //$_SERVER['DOCUMENT_ROOT'].'vistas/ajax/autocomplete/proveedorOKJCV0.php'
                        // ok si jala desde raiz source: "/admin/vistas/ajax/autocomplete/proveedorOKJCV.php",  /*JCV PARA QUE PARTA DEL DIRETORIO RAIZ*/ 
                       // source: "/admin/vistas/ajax/autocomplete/proveedorOKJCV.php",  /*JCV PARA QUE PARTA DEL DIRETORIO RAIZ*/ 
                        //source: RUTA_RAIZ . '/vistas/ajax/autocomplete/proveedorOKJCV.php',  /*JCV PARA QUE PARTA DEL DIRETORIO RAIZ*/ 
                   //source: "./vistas/ajax/autocomplete/proveedorOKJCV0.php",      
                   source: "http://localhost/admin/vistas/ajax/autocomplete/proveedorOKJCV0.php",     
                    
                         
			minLength: 2,
			select: function(event, ui) { 
				
                                event.preventDefault();
                                
				$('#id_proveedor').val(ui.item.id_proveedor);
				$('#nombre_proveedor').val(ui.item.nombre_proveedor);
				$('#tel1').val(ui.item.fiscal_proveedor);
				$.Notification.notify('custom','bottom right','EXITO!', 'PROVEEDOR AGREGADO CORRECTAMENTE');

			}
                        
		});

	});

	$("#nombre_proveedor" ).on( "keydown", function( event ) { 
            
            // alert($('#rutaraiz').val());  /*C:\XAMPP\HTDOCS\ADMIN*/
               
            // var curWwwPath=window.document.location.href;
             //var pathName=window.document.location.pathname;
            // var pos=curWwwPath.indexOf(pathName);
            // alert(curWwwPath);  /* http://localhost/admin/?View=NuevaOrdenCompra */
            // alert(pathName);  /* /admin/ */
            // alert(pos);   /* 16 */
             
            // var pathName = window.location.pathname.substring(1);
            //var webName = pathName == '' ? '' : pathName.substring(0, pathName.indexOf('/'));
            //if (webName == "") {
            //    alert(window.location.protocol + '//' + window.location.host); /* http://localhost/admin */
           // }
            //else {
            //    alert(window.location.protocol + '//' + window.location.host + '/' + webName); /* http://localhost/admin */
    
            //}
            

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
<script>
	function showDiv(select){
		if(select.value==4){
			$("#resultados2").load("./vistas/ajax/carga_prima2OKJCV.php");
		} else{
			$("#resultados2").load("./vistas/ajax/carga_resibido2OKJCV.php");
		}
	}
</script>
<?php require './vistas/html/includes/footer_endOKJCV.php'
?>

