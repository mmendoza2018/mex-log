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
//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id);
 
$modulo = "Ventas";
permisos($modulo, $cadena_permisos); //JCV MAY42023 FUNCIONA NORMAL EN PRUEBA
//Finaliza Control de Permisos

$title          = "Ventas"; 
  
//$nombre_usuario = get_row('users', 'usuario_users', 'id_users', $user_id);//JCV (TABLA, CAMPO, CAMPO A COMPARACION, VARIABLE PARA COMPARAR CON EL CAMPO A COMPARACION get_row($table, $row, $id, $equal) : "select $row from $table where $id='$equal'"
$nombre_usuario  ="admin"; //JCV 4MAY2023 PARA QUE TODOS INGRESE CON EL USUARIO admin YA DESPUÉS HABILITREMOS USUARIOS Y PERMISOS

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
                <div class="breadcrumb-line" ">
                    <ul class="breadcrumb" style="height: 15px; padding-top: 3px; "> 
                            <li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
                            <li><a href="javascript:;">Combos</a></li>
                            <li class="active">Nuevo combo</li>
                    </ul>
                </div>     
                    
                    <div class="col-lg-14">
                        <div class="portlet">
                            <div id="bg-primary" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                    <?php 
                                        include "./vistas/modal/buscar_productos_combo.php";
  //                                      include "./vistas/modal/registro_clienteOKJCV.php";
  //                                      include "./vistas/modal/registro_productoOKJCV.php";
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-14">
                                            <div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 2px solid #339CFF;"> <!--JCV INICIA DATOS DEL cliente Y DE LA COTIZACION-->
                                                <div class="widget-chart">
                                                    <div id="resultados_ajaxf" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                                    <!--jcv original<form class="form-horizontal" role="form" id="barcode_form">-->
                                                    <form role="form" id="datos_factura">    
                                                        <div class="form-group row"> 
                                                            
                                                            <div class="col-md-2" 
                                                                <div class="form-group" >
                                                                <input id="id_cliente" name="id_cliente" type='hidden'>  
                                                                    <label for="id_clientejcv" class="control-label">Código de combo *</label> 
                                                                    <input type="text" class="form-control" autocomplete="off" id="codigo_combo" name="codigo_combo">
                                                                   
 
                                                                </div>
                                                              
                                                             
                                                            <div class="col-md-6" >
                                                                <div class="form-group" >
                                                                   <!-- <input id="id_combo" name="id_combo" type='hidden'>-->
                                                                    <label for="fiscal">Nombre de combo</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="nombre_combo" name="nombre_combo">
                                                                    <div  id="f_resultado" id="oc" name="oc"  ></div><!-- Carga los datos ajax del incremento de la cotización -->
                                                                     
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label for="condiciones">Existencia</label>
                                                                        <input type="text" class="form-control" autocomplete="off" id="existencia" name="existencia">
                                                                </div>
                                                            </div> 
                                                            
                                                            <div class="col-md-2" >
                                                                <div class="form-group" >
                                                                    <input id="id_combo" name="id_combo" type='hidden'>
                                                                    <label for="fiscal">Precio de compra</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="precio_compra" name="precio_compra">
                                                                    <!--<div  id="f_resultado" id="oc" name="oc"  ></div><!-- Carga los datos ajax del incremento de la cotización -->
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                           
                                                        </div> 
                                                        
                                                        <div class="form-group row"> 
                                                            
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validez">Precio de venta 1</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="precio_venta1" name="precio_venta1">
                                                                    <div  id="p_venta" id="p_venta" name="p_venta"  ></div><!--  -->
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validez">Precio de venta 2</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="precio_venta2" name="precio_venta2">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validez">Precio de venta 3</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="precio_venta3" name="precio_venta3">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validez">Stock mínimo</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="stock_minimo" name="stock_minimo">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="validez">Stock máximo</label>
                                                                    <input type="text" class="form-control" autocomplete="off" id="stock_maximo" name="stock_maximo">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                             
                                                            <label class="col-2 col-form-label"></label> <!-- JCV PARA DEJAR ESPACIO ENTRE BOTON GUARDAR Y TEXTBOX-->
                                                            <div class="col-md-1" align="center" style=" width: 12%">
                                                                    <!--<button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" aria-haspopup="true" aria-expanded="false"><span class="fa fa-save"></span> Guardar</button>-->
                                                                    <button type="submit" id="guardar_factura" class="btn btn-danger btn-block btn-lg waves-effect waves-light" style="height: 40px; margin-top: 18%"><span class="fa fa-print"></span> Guardar</button>
                                                            </div>
                                                            
                                                        </div> 
                                                            <!--JCV PARA NUEVO CLIENTE SÍ FUNCIONA SOLO QUE NO ACTUALIZA CHECAR SI LO PONEMOS
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#nuevoCliente"><li class="fa fa-plus"></li></button>
                                                            </span>
                                                            -->
                                                    
                                                        </div> <!-- DEL ROW DE NO FACTURA Y REFERENCIA-->

                                                    </form> <!-- JCV id="datos_factura" DEL CLIENTE-->

                                                </div> <!--JCV widget-chart DEL PROVEEDOR-->
                                            </div> <!--JCV card-box" DEL PROVEEDOR-->

                                        </div> <!--JCV col-lg-14 DEL PROVEEDOR-->


                                    </div>       <!--JCV DEL ROW DE DATOS DE LA COTIZACIÓN-->  
                                                            
                                                            
                                    
                                    <div class="row">
                        <div class="col-lg-8">
                            <div><!-- jcv LA QUITE PARA QUE NO APAREZCA EL BORDE GRIS<div class="card-box"> <!--jcv de la busqueda de ARTICULOS-->
                                <!-- JCV BUENO<div class="card-box" style="padding-top: 3px; padding-bottom: 2px;"> <!--jcv de la busqueda de ARTICULOS-->
                                        <div class="widget-chart">
                                                <div id="resultados_ajaxf" class='col-md-14' style="margin-top:10px"></div><!-- Carga los datos ajax -->
                                                <form class="form-horizontal" role="form" id="barcode_form">

                                                        <div class="form-group row">
                                                            <!--
                                                            <label for="barcode_qty" class="col-md-1 control-label">Cant:</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" id="barcode_qty" value="1" autocomplete="off" readonly="true">
                                                            </div>
                                                            -->
                                                            
                                                            
                                                            <div class="col-md-2" style="margin-left: 30px">
                                                                    <button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar">
                                                                            <span class="fa fa-search"></span> Buscar equipos y productos para agregar a combo
                                                                    </button>
                                                            </div>
 

                                                        </div>
                                                    
                                                    </form>



                                        </div> <!--<div class="widget-chart">--> 
                                </div> <!--class="card-box"-->

                        </div> <!--col-lg-8-->
                                                    


                                                    <!--</form> <!jcv del primer form-->
                        
                        <div class="row">
                            <div class="col-lg-14">

                                <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->

                            </div>
                        </div>
                                                    
                                                   <!-- <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
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

                </div>
                    <!-- end container PRINCIPAL -->
            </div>
                <!-- end content PRINCIPAL -->
                
                
		<?php/* require './vistas/html/includes/pieOKJCV.php';*/?> 
                <?php require './vistas/html/includes/pieOKJCV.php';?>

	</div> <!-- content-page-->
	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->

    
</div> 
<!-- END wrapper -->

<?php/* require './vistas/html/includes/footer_startOKJCV99.php'    /*JCV PARA EL AUTOCOMPLETE */   
?>
 <!--JCV PARA QUE PUEDA APARECER LA MODAL PARA IMPRIMIR LA COTIZACION TIENE QUE ESTAR EL SIGUIENTE ARCHIVO: footer_startOKJCV.php (ES PARA EL AUTO COMPLETE) 
 PORQUE SI PONEMOS EL ARCHIVO: footer_startOKJCV99.php NO APARECE EL MODAL PARA IMPRIMIR-->

<?php/*jcv el ok require './vistas/html/includes/footer_startOKJCV.php'  */
?>

<?php require './vistas/html/includes/footer_startOK99.php'  
?>    
  
<!-- ============================================================== -->
<!-- Todo el codigo js aqui--> 
<!-- ============================================================== -->
<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
<script type="text/javascript" src="./js/combo.js"></script>  
<!-- ============================================================== -->
<!-- Codigos Para el Auto complete de Clientes -->

<script>
	 $("#codigo_combo").change(function(){
         var id_deregistro=0;
         id_deregistro = $("#codigo_combo").val();
            //alert('EL ID_DEREGISTRO EN CHANGE:  '+ id_deregistro);
            //listar_campo(id_deregistro);
           $('#id_cliente').val(id_deregistro); 
            
        
        
        })
</script> 
 
 

 
<!-- FIN --> 


<?php require './vistas/html/includes/footer_endOKJCV.php'
?>
 
 