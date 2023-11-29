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
//Inicia Control de Permisos
include "./vistas/permisosOKJCV.php";
 
//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id); 
$modulo = "Ventas";
permisos($modulo, $cadena_permisos); //JCV MAY42023 FUNCIONA NORMAL EN PRUEBA 
//Finaliza Control de Permisos

$title  = "Ventas";
$ventas = 1;
?>
 
<?php require './vistas/html/includes/header_startOKJCV.php';?>  
  
<?php require './vistas/html/includes/header_endOKJCV0.php';?>   

<!-- Begin page --> 
<div id="wrapper" class="forced enlarged"> 

	<?php/* require './vistas/includes/menuOKJCV.php';*/?>

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
								Historial de Órdenes de Compra
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
include "./vistas/modal/eliminar_facturaOKJCV.php"; 
    ?>

								<form class="form-horizontal" role="form" id="datos_cotizacion">
									<div class="form-group row">
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" id="q" placeholder="Buscar por proveedor o número de orden de compra" onkeyup='load(1);'>
												<span class="input-group-btn">
													<button type="button" class="btn btn-info waves-effect waves-light" onclick='load(1);'>
														<span class="fa fa-search" ></span> Buscar</button>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<span id="loader"></span>
											</div>

										</div>
									</form>
									<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
									<div class='outer_div'></div><!-- Carga los datos ajax -->



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

	<?php require './vistas/html/includes/footer_startOKJCV.php'
?>
	<!-- ============================================================== -->
	<!-- Todo el codigo js aqui-->
	<!-- ============================================================== -->
	<script type="text/javascript" src="./js/VentanaCentradaOKJCV.js"></script>
	<script type="text/javascript" src="./js/bitacora_comprasOKJCV.js"></script>

	<?php require './vistas/html/includes/footer_endOKJCV.php' 
?>
 
