<?php    
/*-------------------------
  
---------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$id_factura     = $_SESSION['id_factura'];
$numero_factura = $_SESSION['numero_factura'];
$session_id     = session_id();
   
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
$status_almacen="PENDIENTE"; 
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];} 
if (isset($_POST['costo_producto'])) {
    $precio_costo = $_POST['costo_producto'];}
     
    //jcv para el ID DE FACTURA DE VENTA 
if (isset($_POST['id_factura'])) {
    $id_factura_venta = $_POST['id_factura'];} 
  //jcv 2mayo23 para el numero_factura DE VENTA
if (isset($_POST['numero_factura_venta'])) {
    $numero_factura_venta = $_POST['numero_factura_venta'];}   
  
if (!empty($id) and !empty($cantidad) and !empty($precio_costo)) {
//Cmprobamos si agregamos un producto a la tabla detalle_fact_compra
    /* JCV SI FUNCIONA BIEN, PERO, EN ESTE CASO NECESITAMOS QUE SE INSERTE DE MANERA INDIVIDUAL, YA QUE EN LAS ORDENES DE COMPRA PUEDEN VENIR DE DIFERENTES VENTAS Y QUE CADA UNO VAYA PARA VENTA DIFERENTE:
    $comprobar = mysqli_query($conexion, "select * from detalle_fact_compra where id_producto='" . $id . "' and id_factura='" . $id_factura . "'"); 
    if ($row = mysqli_fetch_array($comprobar)) {
        $cant         = $row['cantidad'] + $cantidad;
        $update       = agregar_stock($id, $cantidad); //Agrega al  inventario
        //JCV SI FUNCIONA PERO SIN STATUS  $sql = "UPDATE detalle_fact_compra SET cantidad='" . $cant . "' WHERE id_producto='" . $id . "' and id_factura='" . $id_factura . "'";
        //JCV SI FUNCIONA PERO SIN id_factura_venta: $sql          = "UPDATE detalle_fact_compra SET cantidad='" . $cant . "', statusalmacen='" . $status_almacen . "' WHERE id_producto='" . $id . "' and id_factura='" . $id_factura . "'";
        $sql          = "UPDATE detalle_fact_compra SET cantidad='" . $cant . "', statusalmacen='" . $status_almacen . "', id_factura_venta='" . $id_factura_venta . "' WHERE id_producto='" . $id . "' and id_factura='" . $id_factura . "'";
        $query_update = mysqli_query($conexion, $sql);

    } else {
        //JCV SI FUNCIONA PERO SIN STATUS: $insert_tmp = mysqli_query($conexion, "INSERT INTO detalle_fact_compra (id_factura,numero_factura, id_producto,cantidad,precio_costo) VALUES ('$id_factura','$numero_factura','$id','$cantidad','$precio_costo')");
        //JCV SI FUNCIONA PERO SIN id_factura_venta: $insert_tmp = mysqli_query($conexion, "INSERT INTO detalle_fact_compra (id_factura,numero_factura, id_producto,cantidad,precio_costo,statusalmacen) VALUES ('$id_factura','$numero_factura','$id','$cantidad','$precio_costo','$status_almacen')");
        $insert_tmp = mysqli_query($conexion, "INSERT INTO detalle_fact_compra (id_factura,numero_factura, id_producto,cantidad,precio_costo,statusalmacen,id_factura_venta) VALUES ('$id_factura','$numero_factura','$id','$cantidad','$precio_costo','$status_almacen','$id_factura_venta')");
         
        $update     = agregar_stock($id, $cantidad); // Descuenta del inventario 
    }
 
    */
      
    
    $insert_tmp = mysqli_query($conexion, "INSERT INTO detalle_fact_compra (id_factura,numero_factura, id_producto,cantidad,precio_costo,statusalmacen,id_factura_venta,numero_factura_venta) VALUES ('$id_factura','$numero_factura','$id','$cantidad','$precio_costo','$status_almacen','$id_factura_venta','$numero_factura_venta')");
     
    
    $update     = agregar_stock($id, $cantidad); // Descuenta del inventario 
    
     
} 
if (isset($_GET['id'])) //codigo elimina un elemento del array
{
    $id_detalle = intval($_GET['id']);
    $id_detalle = intval($_GET['id']);
    $id_prod    = get_row('detalle_fact_compra', 'id_producto', 'id_detalle', $id_detalle);
    $quantity   = get_row('detalle_fact_compra', 'cantidad', 'id_detalle', $id_detalle);
    $update     = eliminar_stock($id_prod, $quantity); //Vuelve agregar al inventario
    $delete     = mysqli_query($conexion, "DELETE FROM detalle_fact_compra WHERE id_detalle='" . $id_detalle . "'");
}
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
?> 
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="thead-default">
            <tr>
                <th class='text-center'>VENTA</th>  
                <th class='text-center'>CANT.</th>
                <th>DESCRIP.</th>
                <th class='text-center'>COSTO</th>
                <th class='text-right'>TOTAL</th>
                <th></th>
                <th class='text-center'>OBSERVACIONES</th> 
                <th class='text-right'>ESTATUS INGR.</th>
                <th class='text-right'>INGRESAR</th> 
            </tr>
        </thead>
        <tbody>
 
            <?php
$sumador_total = 0;
$sql           = mysqli_query($conexion, "select * from productos, facturas_compras, detalle_fact_compra where facturas_compras.id_factura=detalle_fact_compra.id_factura and  facturas_compras.id_factura='$id_factura' and productos.id_producto=detalle_fact_compra.id_producto");
while ($row = mysqli_fetch_array($sql)) {
    $id_detalle      = $row["id_detalle"];
    $codigo_producto = $row['codigo_producto']; 
    $cantidad        = $row['cantidad'];
    $nombre_producto = $row['nombre_producto'];
    $precio_costo   = $row['precio_costo'];
    
    $numero_factura_venta =$row['numero_factura_venta'];
    
    $observaciones = $row['observaciones'];        
    $status_almacen = $row['statusalmacen'];  
    
    $precio_costo_f = number_format($precio_costo, 2); //Formateo variables
    $precio_costo_r = str_replace(",", "", $precio_costo_f); //Reemplazo las comas
    $precio_total   = $precio_costo_r * $cantidad;
    $precio_total_f = number_format($precio_total, 2); //Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador

    ?>
    <tr>
        <td class='text-center'><?php echo $numero_factura_venta; ?></td>
        <td class='text-center'><?php echo $cantidad; ?></td>
        <td><?php echo $nombre_producto; ?></td>
        <td align="right" width="11%">
            <input type="text" class="form-control txt_costo" value="<?php echo $precio_costo; ?>" id="<?php echo $id_detalle; ?>" style=" text-align: right" >
        </td>
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . $precio_total_f; ?></td>
        <td class='text-center'>
            <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_detalle ?>')"><i class="fa fa-remove"></i>
            </a>
        </td> 
        <td align="left" width="15%">
            <input type="text" class="form-control txt_observaciones" value="<?php echo $observaciones; ?>" id="<?php echo $id_detalle; ?> ">  
        </td>
        <td class='text-center'><?php echo $status_almacen; ?></td>  
        <td class='text-center'>
            <a href="#" class='btn btn-success btn-sm waves-effect waves-light' onclick="hola()"><i class="fa fa-info"></i> 
            </a>
        </td> 
    </tr>
    <?php
}
$impuesto      = get_row('perfil', 'impuesto', 'id_perfil', 1);
$nom_impuesto  = get_row('perfil', 'nom_impuesto', 'id_perfil', 1);
$subtotal      = number_format($sumador_total, 2, '.', '');
$total_iva     = ($subtotal * $impuesto) / 100;
$total_iva     = number_format($total_iva, 2, '.', '');
$total_factura = $subtotal;
$update        = mysqli_query($conexion, "update facturas_compras set monto_factura='$total_factura' where id_factura='$id_factura'");

?>
<tr>
    <td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda; ?></td>
    <td class='text-right'><b><?php echo number_format($subtotal, 2); ?></b></td>
    <td></td>
</tr>
<tr>
    <td class='text-right' colspan=4><?php echo $nom_impuesto; ?> (<?php echo $impuesto; ?>)% </td>
    <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format(0, 2); ?></td>
    <td></td>
</tr>
<tr>
    <td style="font-size: 14pt;" class='text-right' colspan=4><b>TOTAL <?php echo $simbolo_moneda; ?> </b></td>
    <td style="font-size: 14pt;" class='text-right'><b><?php echo number_format($total_factura, 2); ?></b></td>
    <td></td>
</tr>
</tbody>
</table>
</div> 
<script> 
    $(document).ready(function () {
        //$('.txt_costo').off('blur');
        $(document).off('blur', '#txt_costo');
        $('.txt_costo').on('blur',function(event){
            //alert('COSTO MODAL');
            var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_tmp = $(this).attr("id");
            costo = $(this).val();
             //Inicia validacion
             if (isNaN(costo)) {
                $.Notification.notify('error','bottom center','ERROR!', 'EL COSTO DIGITADO NO ES UN FORMATO VALIDO')
                $(this).focus();
                return false;
            }
    //Fin validacion
    $.ajax({
        type: "POST",
        //url: "../ajax/editar_costoOKJCV.php", 
        url: "./vistas/ajax/editar_costoOKJCV.php", 
        data: "id_tmp=" + id_tmp + "&costo=" + costo,
        success: function(datos) {
         //$("#resultados").load("../ajax/editar_tmp_compraOKJCV0.php"); 
          $("#resultados").load("./vistas/ajax/editar_tmp_compraOKJCV0.php");
         $.Notification.notify('success','bottom center','EXITO!', 'COSTO ACTUALIZADO CORRECTAMENTE') 
     }
 });
        // }
    });
    
    
    $(document).off('blur', '#txt_observaciones');
    //$('.txt_observaciones').off('blur');
    $('.txt_observaciones').on('blur',function(event){ 
           //alert('observaciones MODAL'); 
           var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_tmp2 = $(this).attr("id");
            observaciones = $(this).val();
                
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_costoOBSERVAOKJCV.php",
        data: "id_tmp=" + id_tmp2 + "&observaciones=" + observaciones,
        success: function(datos2) {
         $("#resultados").load("./vistas/ajax/editar_tmp_compraOKJCV0.php");
         $.Notification.notify('success','bottom center','EXITO!', 'OBSERVACIONES MODAL ACTUALIZADAS CORRECTAMENTE')
     }
 });
        // }
    });
     
    
    
    
    
    });
</script>

