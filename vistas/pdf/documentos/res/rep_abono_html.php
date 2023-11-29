<style type="text/css">
  <!-- 
  table { vertical-align: top; }
  tr    { vertical-align: top; }
  td    { vertical-align: top; }
  th    { vertical-align: top; }
  .midnight-blue{
    background:#2c3e50;
    padding: 4px 4px 4px;
    color:white;
    font-weight:bold;
    font-size:13px;
  }
  .silver{
    background:white;
    padding: 3px 4px 3px;
  }
  .clouds{
    background:#ecf0f1;
    padding: 3px 4px 3px;
  }
  .border-top{
    border-top: solid 1px #bdc3c7;

  }
  .border-left{
    border-left: solid 1px #bdc3c7;
  }
  .border-right{
    border-right: solid 1px #bdc3c7;
  }
  .border-bottom{
    border-bottom: solid 1px #bdc3c7;
  }
  table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}

-->
</style>

<?php
if ($conexion) {//PARA ENCABEZADO 
    /*Datos de la empresa*/
    $sql           = mysqli_query($conexion, "SELECT * FROM perfil");//JCV AFUERA DE LA <page>
    $rw            = mysqli_fetch_array($sql);
    $moneda        = $rw["moneda"];
    $bussines_name = $rw["nombre_empresa"];
    $address       = $rw["direccion"];
    $city          = $rw["ciudad"];
    $state         = $rw["estado"];
    $postal_code   = $rw["codigo_postal"];
    $phone         = $rw["telefono"];
    $email         = $rw["email"];
    $logo_url      = $rw["logo_url"];
} 
?>


<page pageset='new' backtop='10mm' backbottom='10mm' backleft='5mm' backright='5mm' footer='page'>
  
    <table cellspacing="0" style="width: 100%;"  border="0"> <!--jcv para encabezado de cotizacion--> 
        <tr>
            <td style="width: 20%; color: #444444; margin-top: 10 px; margin-left: 20px;">
                <img style="width: 100%;" src="../../../img/Logo_Advance_Medical.jpg" alt="Logo">
           </td>
              <td style="width: 12%;"></td>
            <td style="width: 45%; font-size:12px;text-align:center">
                <span style="color: #008BC7;font-size:20px;font-weight:bold"><?php echo $bussines_name; ?></span>
                <br><?php echo $address . ', ' . $city . ', ' . $state; ?><br>
                Teléfono: <?php echo $phone; ?><br>
                Email: <?php echo $email; ?>

            </td>
            <td style="width: 23%;text-align:right; color:#ff0000; ">
Abonos a la:<br> Venta Nº <br> <?php echo $numero_factura; ?>
            </td>

        </tr>
    </table>
    
    <br><br>
  <!--  Generalizada -->
  <?php
$tySql  = "SELECT * FROM creditos_abonos, clientes, users WHERE creditos_abonos.id_cliente = clientes.id_cliente and creditos_abonos.id_users_abono= users.id_users and creditos_abonos.id_abono ='$id_abono'";
$tyData = $conexion->query($tySql);

while ($tyResult = $tyData->fetch_array()) {
    $numero_factura = $tyResult['numero_factura'];
    $abono          = $tyResult['abono'];
    $nombre_users   = $tyResult['nombre_users'] . ' ' . $tyResult['apellido_users'];
    $date_added     = date('d/m/Y', strtotime($tyResult['fecha_abono']));
    $concepto       = $tyResult['concepto_abono'];
    // datos del Cliente
    $nombre_cliente    = $tyResult['nombre_cliente'];
    $direccion_cliente = $tyResult['direccion_cliente'];
    $telefono_cliente  = $tyResult['telefono_cliente'];
    $email_cliente     = $tyResult['email_cliente'];
    // calculos
    $impuesto       = get_row('perfil', 'impuesto', 'id_perfil', 1);
    $simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
}
?>
  <table cellpadding='4' cellspacing='0' border='0'>
    <tr>
      <td style="width:50%;" class='midnight-blue'>CLIENTE</td>
    </tr>
    <tr>
      <td style="width:50%;" >
        <?php
echo "<b>Nombre: </b>";
echo $nombre_cliente;
echo "<br> <b>Dirección: </b>";
echo $direccion_cliente;
echo "<br> <b>Teléfono: </b>";
echo $telefono_cliente;
echo "<br> <b>Email: </b> ";
echo $email_cliente;
?>
      </td>
    </tr>
  </table><br><br><br><br>
  <table cellspacing="0" style="width: 110%; text-align: left; font-size: 10pt;">
  <!-- JCV ORIG <table cellpadding='4' cellspacing='0' border='0'>-->
    <tr>
      <th style="width: 20%" class='midnight-blue'>No. venta</th>
      <th style="width: 35%" class='midnight-blue'>Concepto</th>
      <th style="width: 20%" class='midnight-blue'>Fecha</th>
      <th style="width: 15%;text-align: right" class='midnight-blue'>Importe</th>
    </tr>

    <tr>
      <td style="height:3%;text-align: center;"><?php echo $numero_factura; ?></td>
      <td style="height:3%;text-align: left"><?php echo $concepto; ?></td>
      <td style="height:3%;text-align: left"><?php echo $date_added; ?></td>
      <td style="height:3%;text-align: right"><?php echo $simbolo_moneda . '' . $abono; ?></td>
    </tr>
    
    <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="3" style="text-align: right;">SUBTOTAL <?php echo $simbolo_moneda; ?> </td>
      <td style="text-align: right;"> <?php echo number_format($abono, 2); ?></td>
    </tr>

    <tr>
      <td colspan="3" style="text-align: right;">IVA (<?php echo $impuesto; ?>)% <?php echo $simbolo_moneda; ?> </td>
      <td style="text-align: right;">0.0</td>
    </tr>

    <tr>
      <td colspan="3" style="text-align: right;">TOTAL <?php echo $simbolo_moneda; ?> </td>
      <td style="text-align: right;"> <?php echo number_format($abono, 2); ?></td>
    </tr>
  </table>
<br><br>
<br><br>
<?php
$orderSql   = "SELECT * FROM creditos_abonos where numero_factura = '$numero_factura'";
$orderQuery = $conexion->query($orderSql);
$countOrder = $orderQuery->num_rows;

$total_abono = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
    $total_abono += $orderResult['abono'];
    $credito = $orderResult['monto_abono'];
    $saldo   = $orderResult['saldo_abono'];
}
?>
<table cellpadding='4' cellspacing='0' border='0'>
  <tr>
    <th style="width: 35%">Crédito</th>
    <th style="width: 35%">Total Abonado</th>
    <th style="width: 35%">Saldo</th>
  </tr>
  <tr>
    <td style="height:5%;text-align: left"><?php echo $simbolo_moneda . '' . number_format($credito, 2); ?></td>
    <td style="height:5%;text-align: left"><?php echo $simbolo_moneda . '' . number_format($total_abono, 2); ?></td>
    <td style="height:5%;text-align: left"><?php echo $simbolo_moneda . '' . number_format($saldo, 2); ?></td>
  </tr>
</table>
<br><br>
<br><br>


<br><br>
<!--<div style='width:45%;font-size: 12pt; border-bottom: 1px solid #2c3e50;padding-bottom:10px'>F:</div>
<div style='width:45%;font-size: 12pt; border-bottom: 0px solid #2c3e50;padding-bottom:10px'><?php echo $nombre_users; ?></div>
-->


</page>

