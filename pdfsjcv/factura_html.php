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
    font-size:12px;
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
if ($conexion) {
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

<page pageset='new' backtop='10mm' backbottom='10mm' backleft='20mm' backright='20mm' footer='page'>
    
    
    
    
    <table cellspacing="0" style="width: 100%;"  border="0">
        <tr>

            <td style="width: 18%;">
                <!--JCV ORIGINAL <img style="width: 100%;" src="../<?php echo $logo_url; ?>" alt="Logo"><br>-->
               <img style="width: 100%; " src="./img/Logo_Advance_Medical.jpg" alt="Logo">

            </td> 
              <td style="width: 12%;"></td>
            <td style="width: 45%; font-size:12px;text-align:center">
                <span style="font-size:14px;font-weight:bold"><?php echo $bussines_name; ?></span>
                <br><?php echo $address . ', ' . $city . ', ' . $state; ?><br>
                Teléfono: <?php echo $phone; ?><br>
                Email: <?php echo $email; ?>

            </td>
            <td style="width: 30%;text-align:right; color:#ff0000"">
FACTURA No.466 
            </td>

        </tr>
    </table>
    
    
    
    
    
  
    <br>

 

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>Facturar a:</td>
        </tr>
        <tr>
           <td style="width:50%;" >
            <?php
$sql_cliente = mysqli_query($conexion, "select * from clientes where id_cliente= 2 ");
$rw_cliente  = mysqli_fetch_array($sql_cliente);
echo $rw_cliente['nombre_cliente'];
echo "<br>";
echo $rw_cliente['direccion_cliente'];
echo "<br> Teléfono: ";
echo $rw_cliente['telefono_cliente'];
echo "<br> Email: ";
echo $rw_cliente['email_cliente'];
?>

           </td>
        </tr>


    </table>

       <br>
        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Vendedor</td>
          <td style="width:25%;" class='midnight-blue'>Fecha</td>
           <td style="width:40%;" class='midnight-blue'>Forma de Pago</td>
        </tr>
        <tr>
           <td style="width:35%;">
            <?php
$sql_user = mysqli_query($conexion, "select * from users where id_users=1");
$rw_user  = mysqli_fetch_array($sql_user);
echo $rw_user['nombre_users'] . " " . $rw_user['apellido_users'];
?>
           </td>
          <!--<td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_factura)); ?></td>-->
           <td style="width:40%;" >
                <?php
         $condiciones=1;       
if ($condiciones == 1) {echo "Efectivo";} elseif ($condiciones == 2) {echo "Cheque";} elseif ($condiciones == 3) {echo "Transferencia bancaria";} elseif ($condiciones == 4) {echo "Crédito";}
?>
           </td>
        </tr>



    </table>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>Cant.</th>
            <th style="width: 50%" class='midnight-blue'>Descripción</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>Precio Unit.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>Total</th>

        </tr>

<?php
$id_factura = 466;
$nums          = 1;
//$impuesto      = get_row('perfil', 'impuesto', 'id_perfil', 1);
$sumador_total = 0;
$sum_total     = 0;
$t_iva         = 0;
$sql           = mysqli_query($conexion, "select * from productos, detalle_fact_ventas, facturas_ventas where productos.id_producto=detalle_fact_ventas.id_producto and detalle_fact_ventas.numero_factura=facturas_ventas.numero_factura and facturas_ventas.id_factura='" . $id_factura . "'");

while ($row = mysqli_fetch_array($sql)) {
    $id_producto     = $row["id_producto"];
    $codigo_producto = $row['codigo_producto'];
    $cantidad        = $row['cantidad'];
    $desc_tmp        = $row['desc_venta'];
    $nombre_producto = $row['nombre_producto'];
// control del impuesto por productos.
    if ($row['iva_producto'] == 0) {
        $p_venta   = $row['precio_venta'];
        $p_venta_f = number_format($p_venta, 2); //Formateo variables
        $p_venta_r = str_replace(",", "", $p_venta_f); //Reemplazo las comas
        $p_total   = $p_venta_r * $cantidad;
        //$f_items   = rebajas($p_total, $desc_tmp); //Aplicando el descuento
        /*--------------------------------------------------------------------------------*/
        //$p_total_f = number_format($f_items, 2); //Precio total formateado
        //$p_total_r = str_replace(",", "", $p_total_f); //Reemplazo las comas
$p_total_r=1;
$impuesto = 15;
        $sum_total += $p_total_r; //Sumador
        $t_iva = ($sum_total * $impuesto) / 100;
        $t_iva = number_format($t_iva, 2, '.', '');
    }
    //end impuesto
    $precio_venta   = $row['precio_venta'];
    $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
    $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
    $precio_total   = $precio_venta_r * $cantidad;
    //$final_items    = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
    $final_items = $precio_total;
    /*--------------------------------------------------------------------------------*/
    $precio_total_f = number_format($final_items, 2); //Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador
    if ($nums % 2 == 0) {
        $clase = "clouds";
    } else {
        $clase = "silver";
    }
    ?>

        <tr>
            <td class='<?php echo $clase; ?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 60%; text-align: left"><?php echo $nombre_producto; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: right"><?php echo $precio_total_f; ?></td>

        </tr>

    <?php

    $nums++;
}
$impuesto =15;
//$impuesto      = get_row('perfil', 'impuesto', 'id_perfil', 1);
$subtotal      = number_format($sumador_total, 2, '.', '');
$total_iva     = ($subtotal * $impuesto) / 100;
$total_iva     = number_format($total_iva, 2, '.', '') - number_format($t_iva, 2, '.', '');
$total_factura = $subtotal + $total_iva;
?>

        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL $</td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">IVA (<?php echo $impuesto; ?>)% $ </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_iva, 2); ?></td>
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL $ </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura, 2); ?></td>
        </tr>
    </table>



    <br>
    <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>




</page>

