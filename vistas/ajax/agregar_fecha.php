<?php
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$numero_factura = $_SESSION['numero_factura'];
/*Inicia validacion del lado del servidor*/
if (empty($_POST['abono'])) {
    $errors[] = "Cantidad vacía";
} else if (!empty($_POST['abono'])) {
    /* Connect To Database*/
    require_once "../dbOKJCV.php";
    require_once "../php_conexionOKJCV.php";
    require_once "../funcionesOKJCV.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $abono    = floatval($_POST['abono']);
    $concepto = mysqli_real_escape_string($conexion, (strip_tags($_POST["concepto"], ENT_QUOTES)));
    
    //$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
    $user_id = $_SESSION['user_id'];
    
    
    // jcv original$fecha    = date("Y-m-d H:i:s");
    //$fecha    = $_POST['fecha_abono'];
    $fecha    = date("Y-m-d", strtotime($_POST['fecha_abono']));
    
                            

   
    // JCV Consulta para Extraer los datos de la venta
    $consultar     = mysqli_query($conexion, "select * from facturas_ventas where numero_factura='" . $numero_factura . "'");
    $rw            = mysqli_fetch_array($consultar);
    $id_cliente    = $rw['id_cliente'];
    $monto_factura = $rw['monto_factura'];
    $saldo         = $rw['monto_factura'] - $rw['dinero_resibido_fac'];
    // verificamos si el monto esta cancelado
    /*if ($rw['saldo_credito'] == 0) {
        echo "<script>
        $.Notification.notify('info','bottom center','NOTIFICACIÓN', 'EL CREDITO YA FUE CANCELADO EN SU TOTALIDAD')
        </script>";
        exit;
    }
    */
     
    // verificamos si el abono es mayor a la deunda
    /*
    if ($abono > $rw['saldo_credito']) {
        echo "<script>
        $.Notification.notify('error','bottom center','NOTIFICACIÓN', 'EL ABONO ES MAYOR A LA DEUDA, INTENTAR NUEVAMENTE')
        </script>";
        exit;
    }
    */
    
    // guardamos los datos la tabla de abonos
    
   //JCV LA ORIGINALOK $sql = "INSERT INTO creditos_abonos (numero_factura, fecha_abono, id_cliente, monto_abono, abono, saldo_abono, id_users_abono, id_sucursal, concepto_abono)
  //VALUES ('$numero_factura', '$fecha', '$id_cliente', '$monto_credito', '$abono', '$saldo', '$user_id','1','$concepto');";
    
    $sql = "INSERT INTO fechas_de_pagos (numero_factura, fecha_promesa_pago, id_cliente, monto_abono, id_users_abono, concepto_abono)
  VALUES ('$numero_factura', '$fecha', '$id_cliente', '$abono', '$user_id', '$concepto');";
    
    
    $query = mysqli_query($conexion, $sql);
    
// actualizamos el saldo del cliente de la factura correspondiente
//jcv    $update_saldo = mysqli_query($conexion, "update creditos set saldo_credito=saldo_credito-'$abono' where numero_factura='$numero_factura'");

//    // Actualizamos el estado de la facturas si el crédito es cancelado en su totalidad
//    $comprobar = mysqli_query($conexion, "select * from creditos where numero_factura='" . $numero_factura . "'");
//    $rww       = mysqli_fetch_array($comprobar);
//    if ($rww['saldo_credito'] == 0) {
//        $up_credito = mysqli_query($conexion, "update creditos set estado_credito=2 where numero_factura='$numero_factura'");
//        $up_factura = mysqli_query($conexion, "update facturas_ventas set estado_factura=1 where numero_factura='$numero_factura'");
//        echo "<script>
//        $.Notification.notify('info','bottom center','NOTIFICACIÓN', 'EL CREDITO SE HA CANCELADO EN SU TOTALIDAD')
//        </script>";
//    }
    if ($sql) {
        $messages[] = "La fecha de promesa de pago de la factura:  " . $numero_factura . "  ha sido ingresada satisfactoriamente."  ;
    } else {
        $errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($conexion);
    }
} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {

    ?>
    <div class="alert alert-danger" role="alert">
        <strong>Error!</strong>
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