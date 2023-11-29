<?php   
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id_cliente'])) { 
    $errors[] = " Debe poner un código de combo"; 
    
} else if (!empty($_POST['id_cliente'])) {
    /* Connect To Database*/
    require_once "../dbOKJCV.php";
    require_once "../php_conexionOKJCV.php";
    //Archivo de funciones PHP
    require_once "../funcionesOKJCV.php";
    $session_id     = session_id(); 
    $simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
//Comprobamos si hay archivos en la tabla temporal
  //$sql_count = mysqli_query($conexion, "select * from tmp_cotizacion where session_id='" . $session_id . "'");
    $sql_count = mysqli_query($conexion, "select * from tmp_combo where session_id='" . $session_id . "'");
    $count     = mysqli_num_rows($sql_count);
    if ($count == 0) {
        echo "<script>
        swal({
          title: 'No hay productos agregados en la cotización',
          text: 'Intentar nuevamente',
          type: 'error',
          confirmButtonText: 'ok'
      })</script>";
        exit; 
    } 
    // escaping, additionally removing everything that could be (html/javascript-) code
    $id_cliente     = intval($_POST['id_cliente']);
    $id_vendedor    = intval($_SESSION['user_id']); //user_id
    $users          = intval($_SESSION['user_id']);
    
    $codigo_combo = ($_POST['codigo_combo']);
    $nombre_combo = ($_POST['nombre_combo']);
    $existencia =  intval($_POST['existencia']);
    $precio_compra = intval($_POST['precio_compra']);
    $precio_venta1 = intval($_POST['precio_venta1']);
    $precio_venta2 = intval($_POST['precio_venta2']);
    $precio_venta3 = intval($_POST['precio_venta3']);
    $stock_minimo = intval($_POST['stock_minimo']);
    $stock_maximo = intval($_POST['stock_maximo']);  
    
    
    //$id_vendedor    = intval($_SESSION['id_users']); //user_id
    //$users          = intval($_SESSION['id_users']);
    
   
    $date_added     = date("Y-m-d H:i:s");
      
 
    // consulta principal
    $nums          = 1;
    $impuesto      = get_row('perfil', 'impuesto', 'id_perfil', 1);
    $sumador_total = 0;
    $sum_total     = 0;
    $t_iva         = 0;
    //$sql           = mysqli_query($conexion, "select * from productos, tmp_cotizacion where productos.id_producto=tmp_cotizacion.id_producto and tmp_cotizacion.session_id='" . $session_id . "'");
   
    //JCV27NOV PARA EXTRAER LOS DATOS DE LA TMP Y PASARLOS A LA TABLA DE COMBOS 
    
    //JCV ORIG$sql           = mysqli_query($conexion, "select * from productos, tmp_combo where productos.id_producto=tmp_combo.id_producto and tmp_combo.session_id='" . $session_id . "'");
    //$sql           = mysqli_query($conexion, "select * from productos, tmp_combo where productos.id_producto=tmp_combo.id_producto and tmp_combo.session_id='" . $session_id . "'");
   /* //JCV ORIG
    while ($row = mysqli_fetch_array($sql)) {
        $id_tmp          = $row["id_tmp"];
        $id_producto     = $row['id_producto'];
        $codigo_producto = $row['codigo_producto'];
        $cantidad        = $row['cantidad_tmp'];
        $desc_tmp        = $row['desc_tmp'];
        $nombre_producto = $row['nombre_producto'];
        // control del impuesto por productos.
        if ($row['iva_producto'] == 0) {
            $p_venta   = $row['precio_tmp'];
            $p_venta_f = number_format($p_venta, 2); //Formateo variables
            $p_venta_r = str_replace(",", "", $p_venta_f); //Reemplazo las comas
            $p_total   = $p_venta_r * $cantidad;
            $f_items   = rebajas($p_total, $desc_tmp); //Aplicando el descuento
            
    
            $p_total_f = number_format($f_items, 2); //Precio total formateado
            $p_total_r = str_replace(",", "", $p_total_f); //Reemplazo las comas

            $sum_total += $p_total_r; //Sumador
            $t_iva = ($sum_total * $impuesto) / 100;
            $t_iva = number_format($t_iva, 2, '.', '');
        }
        //end impuesto

        $precio_venta   = $row['precio_tmp'];
        $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
        $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
        $precio_total   = $precio_venta_r * $cantidad;
        $final_items    = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
        
    
        $precio_total_f = number_format($final_items, 2); //Precio total formateado
        $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
        $sumador_total += $precio_total_r; //Sumador

        //Insert en la tabla detalle_factura
        $insert_detail = mysqli_query($conexion, "INSERT INTO detalle_fact_cot VALUES (NULL,'$id_factura','$factura','$id_producto','$cantidad','$desc_tmp','$precio_venta_r')");
    }
    */ 
    
    //jcv para INSERTAR EN COMBO_DATOS
    $insert        = mysqli_query($conexion, "INSERT INTO combos_datos VALUES (NULL,'$codigo_combo','$nombre_combo','$precio_compra','$precio_venta1','$precio_venta2','$precio_venta3','$existencia','$stock_minimo','$stock_maximo','$impuesto','$date_added','1')"); //JCV YA AGREGADO EL ESTADO DE LA COTIZACION (0) ES COTIZACION (1) ES YA VENTA
    
    //Seleccionamos el ultimo id_combo insertado
    $sql        = mysqli_query($conexion, "select LAST_INSERT_ID(id_combo_datos) as last from combos_datos order by id_combo_datos desc limit 0,1 ");
    $rw         = mysqli_fetch_array($sql);
    $id_combos_datos = $rw['last'];
    
    
    
    $sql           = mysqli_query($conexion, "select * from productos, tmp_combo where productos.id_producto=tmp_combo.id_producto and tmp_combo.session_id='" . $session_id . "'");
    while ($row = mysqli_fetch_array($sql)) {
        $id_tmp          = $row["id_tmp"];
        $id_producto     = $row['id_producto'];
        $codigo_producto = $row['codigo_producto'];
        $cantidad        = $row['cantidad_tmp'];
        $desc_tmp        = $row['desc_tmp'];
        $nombre_producto = $row['nombre_producto'];
        
        $costo_producto = $row['costo_producto'];
        
        // control del impuesto por productos.
        if ($row['iva_producto'] == 0) {
            $p_venta   = $row['precio_tmp'];
            $p_venta_f = number_format($p_venta, 2); //Formateo variables
            $p_venta_r = str_replace(",", "", $p_venta_f); //Reemplazo las comas
            $p_total   = $p_venta_r * $cantidad;
            $f_items   = rebajas($p_total, $desc_tmp); //Aplicando el descuento
            /*--------------------------------------------------------------------------------*/
            $p_total_f = number_format($f_items, 2); //Precio total formateado
            $p_total_r = str_replace(",", "", $p_total_f); //Reemplazo las comas

            $sum_total += $p_total_r; //Sumador
            $t_iva = ($sum_total * $impuesto) / 100;
            $t_iva = number_format($t_iva, 2, '.', '');
        }
        //end impuesto

        $precio_venta   = $row['precio_tmp'];
        $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
        $precio_venta_r = str_replace(",", "", $precio_venta_f); //Reemplazo las comas
        $precio_total   = $precio_venta_r * $cantidad;
        $final_items    = rebajas($precio_total, $desc_tmp); //Aplicando el descuento
        /*--------------------------------------------------------------------------------*/
        $precio_total_f = number_format($final_items, 2); //Precio total formateado
        $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
        $sumador_total += $precio_total_r; //Sumador
 
        //Insert en la tabla detalle_factura
        //JCV ORIG27NOV $insert_detail = mysqli_query($conexion, "INSERT INTO detalle_fact_cot VALUES (NULL,'$id_factura','$factura','$id_producto','$cantidad','$desc_tmp','$precio_venta_r')");
        //JCV GENERICO OK $insert_detail = mysqli_query($conexion, "INSERT INTO combos VALUES (NULL,'0','0','0','descripcion','1','1','1','1','0','1','100','1','1','$precio_venta_r','$precio_venta_r','$precio_venta_r','10','1','$date_added','imagen','1')");
        //jcv ok anterior tabla$insert_detail = mysqli_query($conexion, "INSERT INTO combos VALUES (NULL,'0','0','0','descripcion','1','1','1','1','0','1','100','1','1','$precio_venta_r','$precio_venta_r','$precio_venta_r','10','1','$date_added','imagen','1')");
        
        $insert_detail = mysqli_query($conexion, "INSERT INTO combos VALUES (NULL,'$id_combos_datos','$codigo_combo','$codigo_producto','$costo_producto','$cantidad')");
    }
     
     
    
    // Fin de la consulta Principal 
    $subtotal      = number_format($sumador_total, 2, '.', '');
    $total_iva     = ($subtotal * $impuesto) / 100;
    $total_iva     = number_format($total_iva, 2, '.', '') - number_format($t_iva, 2, '.', '');
    $total_factura = $subtotal + $total_iva;
    
    
    //JCVORIG27NOV $insert        = mysqli_query($conexion, "INSERT INTO facturas_cot VALUES (NULL,'$factura','$date_added','$id_cliente','$id_vendedor','$condiciones','$total_factura','$estado','$users','$validez','1','0')"); //JCV YA AGREGADO EL ESTADO DE LA COTIZACION (0) ES COTIZACION (1) ES YA VENTA
    //
//JCV GENERICOOK 27NOV    $insert        = mysqli_query($conexion, "INSERT INTO combos_datos VALUES (NULL,'1','descripcion','100','$precio_venta_r','$precio_venta_r','$precio_venta_r','10','1','1','0','fecha','1')"); //JCV YA AGREGADO EL ESTADO DE LA COTIZACION (0) ES COTIZACION (1) ES YA VENTA
    
    // checar lugar$insert        = mysqli_query($conexion, "INSERT INTO combos_datos VALUES (NULL,'$codigo_combo','$nombre_combo','$precio_compra','$precio_venta1','$precio_venta2','$precio_venta3','$existencia','$stock_minimo','$stock_maximo','$impuesto','$date_added','1')"); //JCV YA AGREGADO EL ESTADO DE LA COTIZACION (0) ES COTIZACION (1) ES YA VENTA
    
    //$delete        = mysqli_query($conexion, "DELETE FROM tmp_cotizacion WHERE session_id='" . $session_id . "'");
    $delete        = mysqli_query($conexion, "DELETE FROM tmp_combo WHERE session_id='" . $session_id . "'");
    // SI TODO ESTA CORRECTO
   
    if ($insert_detail) {
        echo "<script>
    $('#modal_cot').modal('show');
</script>"; 
          
         
        $messages[] = "Cotización  ha sido Guardada satisfactoriamente.";
        
       echo "<script>
       swal('COMBO GUARDADO CON EXITO', ' ', 'success')
  </script>";
     
        
        exit; 
        
         
       
        
        
    } else {
        $errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($conexion);
    }
} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {

    ?>
    <div class="alert alert-danger" role="alert">
        <strong>Error! </strong>
        <?php
foreach ($errors as $error) {
        echo $error;
    }
    ?>
    </div>
    <?php
}
if (isset($messages)) { 

    ?>
    <div class="alert alert-success" role="alert">
        <strong>¡Bien hecho!</strong>
        <?php
foreach ($messages as $message) {
        echo $message;
    }
    ?>
    </div>
    <?php
}
  
?> 
 
 



