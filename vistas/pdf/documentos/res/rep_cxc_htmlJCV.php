  <style type="text/css">
    <!--
    table { vertical-align: top; }
    tr    { vertical-align: top; }
    td    { vertical-align: top; }
    .midnight-blue{
      background:#2c3e50;
      padding: 4px 4px 4px;
      color:white;
      font-weight:bold;
      font-size:14px;
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
    
    date_default_timezone_set("America/Mexico_City");
    setlocale(LC_TIME,'spanish');
    
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
    
    $fecha = strftime("%A, %d de %B de %Y");
    
} 
?>


 

<page pageset='new' backtop='10mm' backbottom='10mm' backleft='5mm' backright='5mm' style="font-size: 14px; font-family: helvetica">
    <div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 2px solid #339CFF;"> <!--JCV INICIA DATOS DELPROVEEDOR Y DE LA OC-->
    <table cellspacing="0" style="width: 100%;"  border="0"> <!--jcv para encabezado de cotizacion--> 
        <tr>
            <td style="width: 20%; color: #444444; margin-top: 10 px; margin-left: 20px;">
                <img style="width: 100%;" src="../../../img/Logo_Advance_Medical.jpg" alt="Logo">
           </td>
              <td style="width: 5%;"></td>
            <td style="width: 50%; font-size:12px;text-align:center">
                <span style="color: #008BC7;font-size:20px;font-weight:bold"><?php echo $bussines_name; ?></span>
                <br><?php echo $address . ', ' . $city . ', ' . $state; ?><br>
                Teléfono: <?php echo $phone; ?><br>
                Email: <?php echo $email; ?>

            </td>
            
            <td style="width: 25%;text-align:right; color:#ff0000; font-size: 10px; ">
<br>Impresión:<br> <?php echo $fecha; ?>
            </td>
 
        </tr>
    </table>
    </div>
     <br>

  <table style="width: 100%; border: solid 0px black;" cellspacing=0>
    <tr>
      <td style="text-align: left;    width: 30%"></td>
      <td style="text-align: center;    width: 40%;font-size: 16px; font-weight: bold">Reporte de Abonos de Crédito</td>
      <td style="text-align: right;    width: 30%"></td>
    </tr>
  </table>

  <br> <br> <br>
      <!--AQUI VA ENCABEZADO-->

  
  
  <table style="width: 100%; border: solid 0px black;">
    <tr>
      <?php
$sql_abono = mysqli_query($conexion, "select * from creditos_abonos, clientes where creditos_abonos.numero_factura='$numero_factura' and creditos_abonos.id_cliente=clientes.id_cliente");
$rw        = mysqli_fetch_array($sql_abono);
?>
      <td style="font-size: 18px; font-weight: bold;text-align: center;width: 100%">Cliente: <?php echo $rw['nombre_cliente']; ?></td>
    </tr>
  </table>
  <br>
  <br>
  <table cellspacing="0" style="width: 96%; text-align: left; font-size: 10pt;">
    <tr class="midnight-blue">
     <th style="width:20%;text-align:center">No. venta</th>
     <th style="width:25%;text-align:center">Fecha</th>
     <th style="width:20%;text-align:center">Crédito</th>
     <th style="width:20%;text-align:center">Abonos</th>
     <th style="width:20%;text-align:center">Saldos</th>
   </tr>
   <?php
while ($row = mysqli_fetch_array($query)) {
    ?>
    <tr>
      <td><?php echo $row['numero_factura']; ?></td>
      <td style=" text-align: center"><?php echo date("d/m/Y", strtotime($row['fecha_abono'])); ?></td>
      <td style=" text-align: right"><?php echo $simbolo_moneda . '' . number_format($row['monto_abono'], 2); ?></td> 
      <td style=" text-align: right"><?php echo $simbolo_moneda . '' . number_format($row['abono'], 2); ?></td>
      <td  class='text-right' style=" text-align: right"><?php echo $simbolo_moneda . '' . number_format($row['saldo_abono'], 2); ?></td>
      
      <!--<td class='text-right' colspan=4>SUBTOTAL</td>
    <td class='text-right'><b><?php echo $simbolo_moneda . ' ' . number_format($subtotal, 2); ?></b></td>
      -->
    </tr>
    <?php }?>
  </table>
  <br><br> 
  
  <div class="card-box" style="padding-top: 3px; padding-bottom: 1px;border-bottom: 1px solid #bdc3c7;"> <!--JCV INICIA DATOS DELPROVEEDOR Y DE LA OC-->
      <table cellspacing="0" style="width: 96%; text-align: left; font-size: 10pt;">
          
      </table>
  </div>
  
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
  <page_footer>
  <table style="width: 100%; border: solid 0px black;">
    <tr>
      <td style="text-align: left;    width: 50%"></td>
      <td style="text-align: right;    width: 50%">page [[page_cu]]/[[page_nb]]</td>
    </tr>
  </table>
  </page_footer>
</page>