<?php       
/*-------------------------
Punto de Ventas 
---------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id = session_id();
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];}
if (isset($_POST['precio_venta'])) {$precio_venta = $_POST['precio_venta'];}
//jcv AGREGUÉ
if (isset($_POST['costo_producto'])) {$costo_producto = $_POST['costo_producto'];}
  
 
if (!empty($id) and !empty($cantidad) and !empty($precio_venta)) {
    // consulta para comparar el stock con la cantidad resibida
    $query = mysqli_query($conexion, "select stock_producto, inv_producto from productos where id_producto = '$id'");
    $rw    = mysqli_fetch_array($query);
    $stock = $rw['stock_producto'];
    $inv   = $rw['inv_producto'];
 
    //Comprobamos si agregamos un producto a la tabla tmp_combo
    //$comprobar = mysqli_query($conexion, "select * from tmp_cotizacion, productos where productos.id_producto = tmp_cotizacion.id_producto and tmp_cotizacion.id_producto='" . $id . "' and tmp_cotizacion.session_id='" . $session_id . "'");
    $comprobar = mysqli_query($conexion, "select * from tmp_combo, productos where productos.id_producto = tmp_combo.id_producto and tmp_combo.id_producto='" . $id . "' and tmp_combo.session_id='" . $session_id . "'");
    if ($row = mysqli_fetch_array($comprobar)) {
        $cant = $row['cantidad_tmp'] + $cantidad;
// condicion si el stock es menor que la cantidad requerida 
        //$sql          = "UPDATE tmp_cotizacion SET cantidad_tmp='" . $cant . "', precio_tmp='" . $precio_venta . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
        
        //JCV GENERICAOK 27NOV $sql          = "UPDATE tmp_combo SET cantidad_tmp='" . $cant . "', precio_tmp='" . $precio_venta . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
        
        $sql          = "UPDATE tmp_combo SET cantidad_tmp='" . $cant . "', costo_producto_tmp='" . $costo_producto . "', precio_tmp='" . $precio_venta . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
         
        $query_update = mysqli_query($conexion, $sql);
        echo "<script> $.Notification.notify('success','bottom center','NOTIFICACIÓN', 'PRODUCTO AGREGADO CORRECTAMENTE')</script>";
    } else {
        //$insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_cotizacion (id_producto,cantidad_tmp,precio_tmp,desc_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','0','$session_id')");
        
        //JCV GENERICAOK 27NOV $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_combo (id_producto,cantidad_tmp,precio_tmp,desc_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','0','$session_id')");
        $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_combo (id_producto,cantidad_tmp,costo_producto_tmp,precio_tmp,desc_tmp,session_id) VALUES ('$id','$cantidad','$costo_producto','$precio_venta','0','$session_id')");

        echo "<script> $.Notification.notify('success','bottom center','NOTIFICACIÓN', 'PRODUCTO AGREGADO CORRECTAMENTE')</script>";
    }
 
} 
if (isset($_GET['id'])) //codigo elimina un elemento del array
{ 
    $id_tmp = intval($_GET['id']);
    //$delete = mysqli_query($conexion, "DELETE FROM tmp_cotizacion WHERE id_tmp='" . $id_tmp . "'");
    $delete = mysqli_query($conexion, "DELETE FROM tmp_combo WHERE id_tmp='" . $id_tmp . "'");
}
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
?> 
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="thead-default"> 
            <tr>
                <th class='text-center'>COD. tmp_modal_combo</th> 
                <th class='text-center'>CANT.</th>
                <th class='text-center'>DESCRIPCIÓN</th>
                <th class='text-center'>PRECIO COMPRA UNI.</th>
                <th class='text-center'>PRECIO VENTA UNI. </th>
                <!-- <th class='text-center'>DESC %</th>-->
                <th class='text-right'>IMPORTE VTA.</th>
                <th></th>
            </tr>
        </thead>
        <tbody> 
            <?php
$impuesto       = get_row('perfil', 'impuesto', 'id_perfil', 1);
$nom_impuesto   = get_row('perfil', 'nom_impuesto', 'id_perfil', 1);
$sumador_total  = 0;
$total_iva      = 0;
$total_impuesto = 0; 
$subtotal       = 0;
$costo_total_compra =0; 
//$sql            = mysqli_query($conexion, "select * from productos, tmp_cotizacion where productos.id_producto=tmp_cotizacion.id_producto and tmp_cotizacion.session_id='" . $session_id . "'");
$sql            = mysqli_query($conexion, "select * from productos, tmp_combo where productos.id_producto=tmp_combo.id_producto and tmp_combo.session_id='" . $session_id . "'");
while ($row = mysqli_fetch_array($sql)) {
    $id_tmp          = $row["id_tmp"];
    $codigo_producto = $row['codigo_producto'];
    $id_producto     = $row['id_producto'];
    $cantidad        = $row['cantidad_tmp'];
    $desc_tmp        = $row['desc_tmp'];
    $nombre_producto = $row['nombre_producto'];
    $costo_producto_tmp =$row['costo_producto_tmp'];
    
    $importe_compra = $cantidad * $costo_producto_tmp;
    $costo_total_compra = $costo_total_compra + $importe_compra;  
    
    $precio_venta   = $row['precio_tmp'];
    $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
    $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
    $precio_total   = $precio_venta_r * $cantidad;
    $final_items    = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
    /*--------------------------------------------------------------------------------*/
    $precio_total_f = number_format($final_items, 2); //Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador
    $final_items = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
    $subtotal    = number_format($sumador_total, 2, '.', '');
    if ($row['iva_producto'] == 1) {
        $total_iva = iva($precio_venta) * $cantidad;
    } else {
        $total_iva = 0;  
    }
    $total_impuesto += rebajas($total_iva, $desc_tmp);
    ?>
    <tr> 
        <td class='text-center'><?php echo $codigo_producto; ?></td> 
        <td class='text-center'><?php echo $cantidad; ?></td>
        <td><?php echo $nombre_producto; ?></td>
         
        
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($costo_producto_tmp, 2); ?></td>
        
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($precio_venta_r, 2); ?></td>
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($final_items, 2); ?></td>
        <td class='text-center'>
            <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_tmp ?>')"><i class="fa fa-remove"></i>
            </a>
        </td>
    </tr>
    <?php 
}
$total_factura = $subtotal + $total_impuesto;
?>
  <!--
<tr> 
    <td class='text-right' colspan=4>SUBTOTAL</td>
    <td class='text-right'><b><?php echo $simbolo_moneda . ' ' . number_format($subtotal, 2); ?></b></td>
    <td></td>
</tr>
<tr>
    <td class='text-right' colspan=4><?php echo $nom_impuesto; ?> (<?php echo $impuesto; ?>)% </td>
    <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($total_impuesto, 2); ?></td>
    <td></td>
</tr>
<tr>
    <td style="font-size: 14pt;" class='text-right' colspan=4><b>TOTAL <?php echo $simbolo_moneda; ?></b></td>
    <td style="font-size: 16pt;" class='text-right'><b><?php echo number_format($total_factura, 2); ?></b></td>
    <td></td>
</tr>
  -->
          
<?php  

echo "<script> document.getElementById('precio_venta1').value = $total_factura  </script>";

echo "<script> document.getElementById('precio_compra').value = $costo_total_compra  </script>";
 
?>
 
</tbody>
</table> 
</div>  

 