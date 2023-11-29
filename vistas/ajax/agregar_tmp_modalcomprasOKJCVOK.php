<?php   
/*------------------------- 
      
---------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id = session_id();
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
$status_almacen="PENDIENTE"; 
//$date             = date("Y-m-d H:i:s");
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];}
if (isset($_POST['costo_producto'])) {
    $precio_venta = $_POST['costo_producto'];} 
//jcv para el ID DE FACTURA DE VENTA 
if (isset($_POST['id_factura'])) {
    $id_factura = $_POST['id_factura'];} 
 //jcv 1mayo23 para el numero_factura DE VENTA
if (isset($_POST['numero_factura'])) {
    $numero_factura = $_POST['numero_factura'];} 
     
//jcvif (isset($_POST['observaciones'])) {$observaciones = $_POST['observaciones'];}
/* JCV NO
    if (isset($_POST['oc'])) {$oc = $_POST['oc'];}
if ($oc != ""){
    $session_id = $oc;
} 
    */  
if (!empty($id) and !empty($cantidad) and !empty($precio_venta)) {
//Cmprobamos si agregamos un producto a la tabla tmp_compra
  /* JCV SI FUNCIONA BIEN, PERO, EN ESTE CASO NECESITAMOS QUE SE INSERTE DE MANERA INDIVIDUAL, YA QUE EN LAS ORDENES DE COMPRA PUEDEN VENIR DE DIFERENTES VENTAS Y QUE CADA UNO VAYA PARA VENTA DIFERENTE:
   *  $comprobar = mysqli_query($conexion, "select * from tmp_compra where id_producto='" . $id . "' and session_id='" . $session_id . "'");
    if ($row = mysqli_fetch_array($comprobar)) { 
        $cant = $row['cantidad_tmp'] + $cantidad;
        $date =NULL;
        //JCV SI FUNCIONA PERO SIN STATUS $sql = "UPDATE tmp_compra SET cantidad_tmp='" . $cant . "', costo_tmp='" . $precio_venta . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
        // JCV OK $sql  = "UPDATE tmp_compra SET cantidad_tmp='" . $cant . "', costo_tmp='" . $precio_venta . "', statusalmacen='" . $status_almacen . "', fechaingreso='" . $date . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
        $sql  = "UPDATE tmp_compra SET cantidad_tmp='" . $cant . "', costo_tmp='" . $precio_venta . "', statusalmacen='" . $status_almacen . "', fechaingreso='" . $date . "' ,id_factura_venta='" . $id_factura . "'  WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
        $query_update = mysqli_query($conexion, $sql);
 
    } else {
  
        //JCV SI FUNCIONA PERO SIN STATUS $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");
        //jcv ok si jala pero sin id_factura de compra $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id,statusalmacen) VALUES ('$id','$cantidad','$precio_venta','$session_id','$status_almacen')");
        $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id,statusalmacen,id_factura_venta) VALUES ('$id','$cantidad','$precio_venta','$session_id','$status_almacen','$id_factura')");
         
         
         // JCV DE PRUEBA 
        //echo "<script> $.Notification.notify('success','bottom center','NOTIFICACIÓN', 'PRODUCTO AGREGADO A LA FACTURA CORRECTAMENTE JCV5')</script>";
    }
    */
    //JCV 1MAYO23 SI FUNCIONA PERO SIN numero_factura DE VENTA $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id,statusalmacen,id_factura_venta) VALUES ('$id','$cantidad','$precio_venta','$session_id','$status_almacen','$id_factura')");
    $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id,statusalmacen,id_factura_venta,numero_factura_venta) VALUES ('$id','$cantidad','$precio_venta','$session_id','$status_almacen','$id_factura','$numero_factura')");
  
}
 
if (isset($_GET['id'])) //codigo elimina un elemento del array
{
    $id_tmp = intval($_GET['id']);
    $delete = mysqli_query($conexion, "DELETE FROM tmp_compra WHERE id_tmp='" . $id_tmp . "'");
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
                
            </tr>
        </thead>
        <tbody> 
 
            <?php
$sumador_total = 0;
$sql           = mysqli_query($conexion, "select * from productos, tmp_compra where productos.id_producto=tmp_compra.id_producto and tmp_compra.session_id='" . $session_id . "'");
while ($row = mysqli_fetch_array($sql)) {
    $id_tmp          = $row["id_tmp"];
    $codigo_producto = $row['codigo_producto'];
    $cantidad        = $row['cantidad_tmp'];
    $nombre_producto = $row['nombre_producto'];
    $numero_factura_venta = $row['numero_factura_venta'];
    
    $precio_costo   = $row['costo_tmp'];
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
        
        <td align="right" style="width: 10vw" >
            <input style=" text-align: right; " type="text" class="form-control txt_costo" value="<?php echo $precio_costo; ?>" id="<?php echo $id_tmp; ?>">
             
        </td>
        <td class='text-right'><?php echo $simbolo_moneda . ' ' . $precio_total_f; ?></td>
        <td class='text-center'>
            <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_tmp ?>')"><i class="fa fa-remove"></i>
            </a>
        </td> 
        <td align="left" >
            <input type="text" class="form-control txt_observaciones" value="<?php echo $observaciones; ?>" id="<?php echo $id_tmp; ?> ">  
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
 
?>
<tr>
    <td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda; ?></td>
    <td class='text-right'><b><?php echo number_format($subtotal, 2); ?></b></td>
    <td></td>
</tr>
<tr>
    <td class='text-right' colspan=4><?php echo $nom_impuesto; ?>(<?php echo $impuesto; ?>)% </td>
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
        $('.txt_costo').off('blur');
        $('.txt_costo').on('blur',function(event){ 
            //alert('costo MODAL'); 
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
                url: "./vistas/ajax/editar_costo_compraOKJCV.php", 
                data: "id_tmp=" + id_tmp + "&costo=" + costo,
                success: function(datos) {
                   $("#resultados").load("./vistas/ajax/agregar_tmp_compraOKJCVOK.php");
                   $.Notification.notify('success','bottom center','EXITO!', 'COSTO ACTUALIZADO CORRECTAMENTE')
               }
           });
        // }
    });
     
   
       
      
    //$(document).off('blur', '#txt_observaciones');  
    $('.txt_observaciones').off('blur'); 
    $('.txt_observaciones').on('blur',function(event){
            //alert('observaciones MODAL');
            var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_tmp2 = $(this).attr("id");
            observaciones = $(this).val();
               
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_costo_observaOKJCV.php",
        data: "id_tmp=" + id_tmp2 + "&observaciones=" + observaciones,
        success: function(datos2) {
         $("#resultados").load("./vistas/ajax/agregar_tmp_compraOKJCVOK.php");
         $.Notification.notify('success','bottom center','EXITO!', 'OBSERVACIONES MODAL ACTUALIZADAS CORRECTAMENTE')
     }
 });
               
    
        // }
    });
    
    
    
    
    
    
    });
</script>
