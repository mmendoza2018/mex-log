<?php
include "is_loggedOKJCV.php"; //Archivo comprueba si el usuario esta logueado
$numero_factura = $_SESSION['numero_factura'];
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
#require_once "../libraries/inventory.php"; //Contiene funcion que controla stock en el inventario
//Inicia Control de Permisos
include "../permisosOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php"; 
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
$orderSql       = "SELECT * FROM creditos_abonos where numero_factura = '$numero_factura'";
$orderQuery     = $conexion->query($orderSql);
$countOrder     = $orderQuery->num_rows;

$total_abono = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
    $total_abono += $orderResult['abono'];
    $credito = $orderResult['monto_abono'];
    $saldo   = $orderResult['saldo_abono'];
}
?> 
<div class="col-lg-12 col-md-6">
	<div class="card-box widget-icon">
		<div>
			<i class="mdi mdi-briefcase-check text-primary"></i>
			<div class="wid-icon-info text-right">
				<p class="text-muted m-b-5 font-13 font-bold text-uppercase">MONTO DE CREDITO</p>
				<h4 class="m-t-0 m-b-5 counter font-bold text-primary"><?php echo $simbolo_moneda . '' . number_format($credito, 2); ?></h4>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 col-md-6">
	<div class="card-box widget-icon">
		<div>
			<i class="mdi mdi-cash-multiple text-success"></i>
			<div class="wid-icon-info text-right">
				<p class="text-muted m-b-5 font-13 font-bold text-uppercase">TOTAL ABONADO</p>
				<h4 class="m-t-0 m-b-5 counter font-bold text-success"><?php echo $simbolo_moneda . '' . number_format($total_abono, 2); ?></h4>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12 col-md-6">
	<div class="card-box widget-icon">
		<div>
			<i class="mdi mdi-calendar text-pink"></i>
			<div class="wid-icon-info text-right">
				<p class="text-muted m-b-5 font-13 font-bold text-uppercase">SALDO</p>
				<h4 class="m-t-0 m-b-5 counter font-bold text-danger"><?php echo $simbolo_moneda . '' . number_format($saldo, 2); ?></h4>
			</div>
		</div>
	</div>
</div>