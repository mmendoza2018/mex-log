<?php 
/*-------------------------
Punto de Ventas
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

//JCV NO REQUIERE CHECAR AQUÍ EXISTENCIAS, ESO SE MANEJA AL GENERAR ORDEN DE COMPRA
/*
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
*/
 //JCV CHECAR SI VA ESTO: 
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
<div class="table-responsive" > 
    <table class="table table-sm" >
        <thead class="thead-default" > 
            <tr>
                <!--<th class='text-center' width="5%" >Cod</th>-->
                <th class='text-center'  width="10%">No. pedido</th>
                <th class='text-center'  width="15%">Fecha venta</th>
                <th class='text-center'  width="1%">Cant.</th>
                <th class='text-center'  width="20%">Producto</th>
                <th class='text-center'  width="15%">Fecha compra</th>
                <th class='text-center'  width="20%">Proveedor</th>
                <th class='text-center'  width="20%">Precio de Compra</th>
                <th class='text-right'  width="15%">Importe compra</th>
                <th class='text-center'  width="20%">Precio Venta <?php echo $simbolo_moneda; ?></th>
                <th class='text-center'  width="15%">Orden de Compra</th>
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
//JCV LA ORIGINAL SÍ FUNCIONA $sql            = mysqli_query($conexion, "select * from productos, facturas_ventas, detalle_fact_ventas where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura='$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto");
 
//$sqlGeneral            = mysqli_query($conexion, "select * from productos, facturas_ventas, detalle_fact_ventas where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura='$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto");

//JCV OK $sql = mysqli_query($conexion, "select * from productos, facturas_ventas, detalle_fact_ventas where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura='$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto");
//JCV OK LA BUENA PERO SALEN SOLO LAS COMPRAS, NO TODAS $sql = mysqli_query($conexion, "select productos.id_producto, productos.codigo_producto, productos.nombre_producto, productos.iva_producto, facturas_ventas.id_factura, facturas_ventas.numero_factura AS numero_pedido, facturas_ventas.fecha_factura as fecha_factura_ventas, detalle_fact_ventas.id_detalle, detalle_fact_ventas.id_factura, detalle_fact_ventas.cantidad, detalle_fact_ventas.precio_venta, detalle_fact_ventas.precio_compra, detalle_fact_ventas.desc_venta, detalle_fact_ventas.importe_venta, detalle_fact_ventas.id_factura_compra, detalle_fact_ventas.numero_factura_compra, facturas_compras.id_factura, facturas_compras.numero_factura, facturas_compras.fecha_factura AS fecha_factura_compras, proveedores.id_proveedor, proveedores.nombre_proveedor, proveedores.id_proveedor, proveedores.nombre_proveedor from productos, facturas_ventas, detalle_fact_ventas, facturas_compras, proveedores where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura= '$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto and detalle_fact_ventas.numero_factura_compra=facturas_compras.numero_factura and facturas_compras.id_proveedor=proveedores.id_proveedor");





$sqlCompra = mysqli_query($conexion, "select productos.id_producto, productos.codigo_producto, productos.nombre_producto, productos.iva_producto, facturas_ventas.id_factura, facturas_ventas.numero_factura AS numero_pedido, facturas_ventas.fecha_factura as fecha_factura_ventas, detalle_fact_ventas.id_detalle, detalle_fact_ventas.id_factura, detalle_fact_ventas.cantidad, detalle_fact_ventas.precio_venta, detalle_fact_ventas.precio_compra, detalle_fact_ventas.desc_venta, detalle_fact_ventas.importe_venta, detalle_fact_ventas.id_factura_compra, detalle_fact_ventas.numero_factura_compra, facturas_compras.id_factura, facturas_compras.numero_factura, facturas_compras.fecha_factura AS fecha_factura_compras, proveedores.id_proveedor, proveedores.nombre_proveedor, proveedores.id_proveedor, proveedores.nombre_proveedor from productos, facturas_ventas, detalle_fact_ventas, facturas_compras, proveedores where facturas_ventas.id_factura=detalle_fact_ventas.id_factura and  facturas_ventas.id_factura= '$id_factura' and productos.id_producto=detalle_fact_ventas.id_producto and detalle_fact_ventas.numero_factura_compra=facturas_compras.numero_factura and facturas_compras.id_proveedor=proveedores.id_proveedor");

while ($row = mysqli_fetch_array($sqlCompra)) {
    $id_detalle      = $row["id_detalle"];
    $id_producto     = $row["id_producto"];
    $codigo_producto = $row['codigo_producto'];
    //$cantidad        = $row['cantidad'];
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
    
    $fecha_de_compra = $row['fecha_factura_compras'];
    $fecha_de_venta = $row['fecha_factura_ventas'];
    $numero_pedido = $row['numero_pedido'];
    $nombre_proveedor = $row['nombre_proveedor'];
    $precio_compra = $row['precio_compra'];
    $importe_compra   = $precio_compra * $cantidad;
    $orden_compra = $row['numero_factura_compra'];
    ?>
             
    <tr>
        <!--<td class='text-center'><?php echo $numero_pedido; ?></td>-->
        <td class='text-center'><?php echo $numero_pedido; ?></td>
        <td><?php echo $fecha_de_venta; ?></td>
        <td class='text-center'><?php echo $cantidad; ?></td>
        <td><?php echo $nombre_producto; ?></td>
        <td><?php echo $fecha_de_compra; ?></td>
        <td><?php echo $nombre_proveedor; ?></td>
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($precio_compra, 2); ?></td>
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($importe_compra, 2); ?></td>
        <!--
        <td class='text-center'>
            <div class="input-group">
                <select id="<?php echo $id_detalle; ?>" class="form-control employee_id"> 
                    <?php
$sql1 = mysqli_query($conexion, "select * from productos where id_producto='" . $id_producto . "'");
    while ($rw1 = mysqli_fetch_array($sql1)) {
        ?>
                        <option selected disabled value="<?php echo $precio_venta ?>"><?php echo number_format($precio_venta, 2); ?></option>
                        <option value="<?php echo $rw1['valor1_producto'] ?>">PV <?php echo number_format($rw1['valor1_producto'], 2); ?></option>
                        <option value="<?php echo $rw1['valor2_producto'] ?>">PM <?php echo number_format($rw1['valor2_producto'], 2); ?></option>
                        <option value="<?php echo $rw1['valor3_producto'] ?>">PE <?php echo number_format($rw1['valor3_producto'], 2); ?></option>
                        <?php
}
    ?>
                </select>
            </div>
        </td>
        -->
        <!--
        <td align="right" >
            <input type="text" class="form-control txt_desc" style="text-align:center" value="<?php echo $desc_tmp; ?>" id="<?php echo $id_detalle; ?>">
        </td>
        -->
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($precio_total, 2); ?></td>
        
        <td class='text-center'><?php echo $orden_compra; ?></td> 
        
        <!--
        <td class='text-center'>
            <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_detalle ?>')"><i class="fa fa-remove"></i>
            </a>
        </td>
        -->
    </tr>
    <?php
}
$total_factura = $subtotal + $total_impuesto;
$update        = mysqli_query($conexion, "update facturas_ventas set monto_factura='$total_factura' where id_factura='$id_factura'");

?>
<tr>
    <td class='text-right' colspan=5>SUBTOTAL <?php echo $simbolo_moneda; ?></td>
    <td class='text-right'><b><?php echo number_format($subtotal, 2); ?></b></td>
    <td></td>
</tr>
<tr>
    <td class='text-right' colspan=5><?php echo $nom_impuesto; ?> (<?php echo $impuesto; ?>)% </td>
    <td class='text-right'><?php echo $simbolo_moneda . ' ' . number_format($total_impuesto, 2); ?></td>
    <td></td>
</tr>
<tr>
    <td style="font-size: 12pt;" class='text-right' colspan=5><b>TOTAL <?php echo $simbolo_moneda; ?></b></td>
    <!--<td style="font-size: 16pt;" class='text-right'><span class="label label-danger"><b><?php echo number_format($total_factura, 2); ?></b></span></td>-->
    <td style="font-size: 12pt;" class='text-right'><b><?php echo number_format($total_factura, 2); ?></b></td>
    <td></td>
</tr>
</tbody>
</table>
</div>
<script>
    $(document).ready(function () {
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
        url: "./vistas/ajax/editar_descuentoOKJCV.php",
        data: "id_detalle=" + id_detalle + "&desc=" + desc,
        success: function(datos) {
         $("#resultados").load("./vistas/ajax/editar_tmpOKJCV2.php");
         $.Notification.notify('success','bottom center','EXITO!', 'DESCUENTO ACTUALIZADO CORRECTAMENTE')
     }
 });
        // }
    });

          $(".employee_id").on("change", function(event) {
         id_detalle = $(this).attr("id");
        precio = $(this).val();
        $.ajax({
            type: "POST",
            url: "./vistas/ajax/editar_precioOKJCV.php",
            data: "id_detalle=" + id_detalle + "&precio=" + precio,
            success: function(datos) {
               $("#resultados").load("./vistas/ajax/editar_tmpOKJCV2.php");
               $.Notification.notify('success','bottom center','EXITO!', 'PRECIO ACTUALIZADO CORRECTAMENTE')
           }
       });
    });

    });
</script>

