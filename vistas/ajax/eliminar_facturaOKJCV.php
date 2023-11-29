<?php 
 
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
require_once "../funcionesOKJCV.php";
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id_factura'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['id_factura'])
  
) {  
    if (isset($_POST['id_factura'])) {
        //$users        = intval($_SESSION['id_users']);//posvax
        $users        = intval($_SESSION['user_id']);//posvax
        $id_factura = intval($_POST['id_factura']);
        
        $fecha        = date("Y-m-d H:i:s");
        
        $tipo        = 6; //JCV EL 6 ES CANCELACIÓN 
        
        $detalle_venta = "select * from detalle_fact_ventas where id_factura='" . $id_factura . "'";
        $ejecuta_detalle_venta = mysqli_query($conexion, $detalle_venta);
        while ($regisstro = mysqli_fetch_array($ejecuta_detalle_venta)) {
            $cantidad_producto = $regisstro['cantidad'];
            $id_producto_venta = $regisstro['id_producto'];
            $precio_venta = $regisstro['precio_venta']; 
            $importe_venta = $regisstro['importe_venta']; 
            
            $sql_kardex  = mysqli_query($conexion, "select * from kardex where producto_kardex='" . $id_producto_venta . "' order by id_kardex DESC LIMIT 1");
            $rww         = mysqli_fetch_array($sql_kardex);
            //$id_producto = $rww['producto_kardex'];
            $costo_saldo = $rww['costo_saldo'];
            $cant_saldo  = $rww['cant_saldo'] + $cantidad_producto;
            //$nueva_cantidad = $cant_saldo - $cantidad;
           // $nuevo_saldo = $cant_saldo * $costo_producto;
            $saldo_full     = ($rww['total_saldo'] + $importe_venta);
            $costo_promedio = ($rww['total_saldo'] + $importe_venta) / $cant_saldo;
            //JCV ACTUALIZA KARDEX
            guardar_entradas($fecha, $id_producto_venta, $cantidad_producto, $precio_venta, $importe_venta, $cant_saldo, $costo_promedio, $saldo_full, $fecha, $users, $tipo);
            //JCV ACTUALIZA STOCK
            $update_stock  = mysqli_query($conexion, "UPDATE productos SET stock_producto=stock_producto+'" . $cantidad_producto . "' WHERE id_producto='" . $id_producto_venta . "' and inv_producto=0"); //Actualizo la nueva cantidad en el inventario

        }
         
        
        //JCV PARA OBTENER QUE COTIZACION GENERÓ LA VENTA Y PODER ACTUALIZAR EL ESTADO, DE VENTA A COTIZACIÓN NUEVAMENTE 
        $origen   = "select * from facturas_ventas where id_factura='" . $id_factura . "'";
        $origenverdadero = mysqli_query($conexion, $origen);
       while ($row = mysqli_fetch_array($origenverdadero)) {
            $origen_factura       = $row['origen'];
       }
       $estado_cotizacion= 0;
        $actualiza  = "UPDATE facturas_cot SET estado_cotizacion='" . $estado_cotizacion . "' WHERE numero_factura='" . $origen_factura . "'" ;
        $actualizar = mysqli_query($conexion, $actualiza);
        
        //TENGO QUE BORRAR EN detalle_fact_compra uno por uno de los registro ya que ANTES DE BORRARLOS HAY QUE ACTUALIZAR EL monto_factura DE LA TABLA facturas_compras
        //RESTANDOLE EL IMPORTE DEL REGISTRO, Y HAY QUE OBTENER EL id_detalle PARA PODER BORARR EL REGISTRO 
        
        $borra_detalle = "select * from detalle_fact_compra where id_factura_venta='" . $id_factura . "'";
        $borra_detalle_ejecuta = mysqli_query($conexion, $borra_detalle);
        while ($regiss = mysqli_fetch_array($borra_detalle_ejecuta)) {
          //  $id_detalle_borrar      = $regiss['id_detalle'];
            $importe = $regiss['cantidad'] * $regiss['precio_costo'];
            $id_factura_compra = $regiss['id_factura'];
           // $cantidad_producto = $regiss['cantidad'];
            
            
            //JCV PARA SABER CUANTOS REGISTROS DE LA ORDEN DE COMPRA HAY EN detalle_fact_compra CON EL id_factura Y ADEMAS SE CONTARÁ CUANTOS REGISTROS HAY CON EL 
            // id_factura_venta y AND CON id_factura SE COMPARA EL RESULTADO DE LOS DOS CONTEOS, SI ES IGUL SE BORRA EL REGISTRO DE facturas_compras
            //SI NO ES IGUAL, NO SE BORRA Y SOLO SE ACTUALIZA EL monto_factura
             
            $registros_id_factura =  mysqli_query($conexion, "select count(*) as numregs_id_factura from detalle_fact_compra where id_factura='" . $id_factura_compra . "'");
            $cuantos_id_factura = mysqli_fetch_array($registros_id_factura);
            $numero_cuantos_id_factura = $cuantos_id_factura['numregs_id_factura'];
             
             
            $registros_detalle_compra = mysqli_query($conexion, "select count(*) as numregs from detalle_fact_compra where id_factura_venta='" . $id_factura . "'AND id_factura='" . $id_factura_compra . "'");
            $cuantos         = mysqli_fetch_array($registros_detalle_compra);
            $numregistros_venta     = $cuantos['numregs'];
              
            if($numero_cuantos_id_factura==$numregistros_venta){ //BORRAR REGISTRO DE LA TABLA facturas_compras SINO SOLO ACTUALIZA EL monto_factura
                 $borra_facturas_compras    = "delete from facturas_compras where id_factura='" . $id_factura_compra . "'";
                 $borrar_facturas_compras = mysqli_query($conexion, $borra_facturas_compras);
                 //echo "borrado la factura id: $id_factura_compra ";
                 
            }else {
                //ACTUALIZA EL IMPORTE
                $sql2    = mysqli_query($conexion, "select * from facturas_compras where id_factura='" . $id_factura_compra . "'");
                $rw3      = mysqli_fetch_array($sql2);  
                $importe_anterior = $rw3['monto_factura']; //
                $nuevo_importe = $importe_anterior - $importe; //

                //JCV PARA ACTUALIZAR EL IMPORTE DE factura_compras 
                $acuali_factura_compra = "UPDATE facturas_compras SET monto_factura='" . $nuevo_importe . "' WHERE id_factura='" . $id_factura_compra . "'" ;
                $actualizar_factura_compra = mysqli_query($conexion, $acuali_factura_compra);
            }
            
       }
                
        $borraOC    = "delete from detalle_fact_compra where id_factura_venta='" . $id_factura . "'";
        $borra_OC = mysqli_query($conexion, $borraOC);
        
        $del1       = "delete from facturas_ventas where id_factura='" . $id_factura . "'";
        $del2       = "delete from detalle_fact_ventas where id_factura='" . $id_factura . "'";
        $delete1 = mysqli_query($conexion, $del1);
        $delete2 = mysqli_query($conexion, $del2);
        
        if (($delete1 and $delete2 ) or $borra_OC ) {
            //if (($delete1 = mysqli_query($conexion, $del1) and $delete2 = mysqli_query($conexion, $del2)) or $borra_OC = mysqli_query($conexion, $borraOC)) {
            ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Aviso!</strong> Todos los registro de la venta y de la O.C. fueron eliminados exitosamente
      </div>
      <?php
} else {
            ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> No se puedo eliminar los datos
      </div>
      <?php

        }
    }

} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {

    ?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong>
    <?php
foreach ($errors as $error) {
        echo $error;
    }
    ?>
  </div>
  <?php
}

?>