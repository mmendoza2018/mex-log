<?php
/*-------------------------

---------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id = session_id();
$id_factura = $_SESSION['id_factura'];
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];}

/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";

if (!empty($id) and !empty($cantidad)) {
    $id_producto    = get_row('productos', 'id_producto', 'codigo_producto', $id);
    $numero_factura = get_row('facturas_ventas', 'numero_factura', 'id_factura', $id_factura);
    $precio_venta   = get_row('productos', 'valor1_producto', 'id_producto', $id_producto);
    $importe        = $cantidad * $precio_venta;

    // consulta para comparar el stock con la cantidad resibida
    $query = mysqli_query($conexion, "select stock_producto, inv_producto from productos where id_producto = '$id_producto'");
    $rw    = mysqli_fetch_array($query);
    $stock = $rw['stock_producto'];
    $inv   = $rw['inv_producto'];

    //Comprobamos si ya agregamos un producto a la tabla tmp_compra
    $comprobar = mysqli_query($conexion, "select * from detalle_fact_ventas where id_producto='" . $id_producto . "' and id_factura='" . $id_factura . "'");

    if ($row = mysqli_fetch_array($comprobar)) {
        $cant     = $row['cantidad'] + $cantidad;
        $importe2 = $cant * $precio_venta;
        // condicion si el stock e menor que la cantidad requerida
        if ($cant > $stock and $inv == 0) {
            echo "<script>swal('LA CANTIDAD SUPERA AL STOCK', 'INTENTELO DE NUEVO', 'error')</script>";
        } else {

            $sql          = "UPDATE detalle_fact_ventas SET cantidad='" . $cant . "', importe_venta='" . $importe2 . "' WHERE id_producto='" . $id_producto . "' and id_factura='" . $id_factura . "'";
            $query_update = mysqli_query($conexion, $sql);
            $update       = eliminar_stock($id_producto, $cantidad); // Descuenta del inventario
        }
        // fin codicion cantaidad

    } else {
        // condicion si el stock e menor que la cantidad requerida
        if ($cantidad > $stock and $inv == 0) {
            echo "<script>swal('LA CANTIDAD SUPERA AL STOCK', 'INTENTELO DE NUEVO', 'error')</script>";
        } else {

            $insert_tmp = mysqli_query($conexion, "INSERT INTO detalle_fact_ventas (id_factura,numero_factura, id_producto,cantidad,precio_venta,importe_venta) VALUES ('$id_factura','$numero_factura','$id_producto','$cantidad','$precio_venta','$importe')");
            $update     = eliminar_stock($id_producto, $cantidad); // Descuenta del inventario
        }
        // fin codicion cantaidad
    }

}
if (isset($_GET['id'])) //codigo elimina un elemento del array
{
    $id_detalle = intval($_GET['id']);
    $id_prod    = get_row('detalle_fact_ventas', 'id_producto', 'id_detalle', $id_detalle);
    $quantity   = get_row('detalle_fact_ventas', 'cantidad', 'id_detalle', $id_detalle);
    $update     = agregar_stock($id_prod, $quantity); //Vuelve agregar al inventario
    $delete     = mysqli_query($conexion, "DELETE FROM detalle_fact_ventas WHERE id_detalle='" . $id_detalle . "'");
}
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
?>
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="thead-default">
            <tr> 
                <th class='text-center' width="5%" >Cod.</th> 
                <th class='text-center'  width="1%">Cant.</th>
                <th class='text-center'  width="50%">Producto</th>
                <th class='text-center'  width="23%">Precio <?php echo $simbolo_moneda; ?></th>
                <!--<th class='text-center'  width="2%">Desc %</th>-->
                <th class='text-right'  width="15%">Importe</th> 
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
$subtotal =0;
$sql            = mysqli_query($conexion, "select * from productos, facturas_ventas, detalle_fact_ventas where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura='$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto");
while ($row = mysqli_fetch_array($sql)) {
    $id_detalle      = $row["id_detalle"];
    $id_producto     = $row["id_producto"];
    $codigo_producto = $row['codigo_producto'];
    $cantidad        = $row['cantidad'];
    $desc_tmp        = $row['desc_venta'];
    $nombre_producto = $row['nombre_producto'];

    $precio_venta   = $row['precio_venta'];
    $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
    $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
    $precio_total   = $precio_venta_r * $cantidad;
    $final_items    = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
    /*--------------------------------------------------------------------------------*/
    $precio_total_f = number_format($final_items, 2); //Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador
    $subtotal = number_format($sumador_total, 2, '.', '');
    if ($row['iva_producto'] == 1) {
        $total_iva = iva($precio_venta);
    } else {
        $total_iva = 0;
    }
    $total_impuesto += rebajas($total_iva, $desc_tmp) * $cantidad;
    ?>
    <tr>
        <td class='text-center'><?php echo $codigo_producto; ?></td>
        <td class='text-center'><?php echo $cantidad; ?></td>
        <td><?php echo $nombre_producto; ?></td>
        
        <td align="right" width="15%">
            <input style=" text-align:right" type="text" class="form-control  txt_costo" value="<?php echo $precio_venta_r; ?>" id="<?php echo $id_detalle; ?>">
        </td>
           
        <!--
        <td align="right" width="15%">
            <input type="text" class="form-control txt_desc" style="text-align:center" value="<?php echo $desc_tmp; ?>" id="<?php echo $id_detalle; ?>">
        </td>
        -->
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($final_items, 2); ?></td>
        <td class='text-center'>
            <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_detalle ?>')"><i class="fa fa-remove"></i>
            </a>
        </td>
    </tr>
    <?php
}
$total_factura = $subtotal + $total_impuesto;
$update        = mysqli_query($conexion, "update facturas_ventas set monto_factura='$total_factura' where id_factura='$id_factura'");

?>
<tr>
    <<td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda; ?></td>
    <td class='text-right'><b><?php echo number_format($subtotal, 2); ?></b></td> 
    <td></td>
</tr>
<tr>
    <td class='text-right' colspan=4><?php echo $nom_impuesto; ?> (<?php echo $impuesto; ?>)% </td>
    <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($total_impuesto, 2); ?></td>
    <td></td>
</tr> 
<tr>
    <td style="font-size: 12pt;" class='text-right' colspan=4><b>TOTAL <?php echo $simbolo_moneda; ?></b></td>
      
    <td style="font-size: 12pt;" class='text-right'><b><?php echo number_format($total_factura, 2); ?></b></td>
    <td></td>
</tr>
</tbody>
</table>
</div>
<script>
    $(document).ready(function () {
        
         $('.txt_costo').off('blur'); 
        $('.txt_costo').on('blur',function(event){  
            //alert('costo TMP');  
            var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_detalle = $(this).attr("id");
            precio = $(this).val();
             //Inicia validacion 
             //alert('precio:  ' + precio2 ); 
             if (isNaN(precio)) {
                $.Notification.notify('error','bottom center','ERROR!', 'EL PRECIO DIGITADO NO ES UN FORMATO VALIDO')
                $(this).focus();
                return false;
            } 
    //Fin validacion    
    $.ajax({     
        type: "POST",
        url: "./vistas/ajax/editar_tmp_precio_ventaOKJCV2.php",
        data: "id_detalle=" + id_detalle + "&precio=" + precio,
        success: function(datos) { 
         $("#resultados").load("./vistas/ajax/editar_tmpOKJCV2.php"); 
         //$.Notification.notify('success','bottom center','EXITO!', 'PRECIO ACTUALIZADO CORRECTAMENTE')
     }
 });
        // }
    }); 
          
        
        
        
        $('.txt_desc').off('blur');
        $('.txt_desc').on('blur',function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_detalle = $(this).attr("id");
            desc = $(this).val();
             //Inicia validacion
             if (isNaN(desc)) {
                $.Notification.notify('error','bottom center','ERROR', 'DIGITAR UN DESCUENTO VALIDO')
                $(this).focus();
                return false;
            }
    //Fin validacion
    $.ajax({
        type: "POST",
        url: "../ajax/editar_descuentoOKJCV.php",
        data: "id_detalle=" + id_detalle + "&desc=" + desc,
        success: function(datos) {
         $("#resultados").load("../ajax/editar_tmpOKJCV.php");
         $.Notification.notify('success','bottom center','EXITO!', 'DESCUENTO ACTUALIZADO CORRECTAMENTE')
     }
 });
        // }
    });

           

    });
</script>

