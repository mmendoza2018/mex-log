<?php 
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/ 
if (empty($_POST['mod_id_borrar'])) { 
    $errors[] = "ID vacío";
} else if (empty($_POST['mod_fecha_depago_borrar'])) {
    $errors[] = "Selecciona una fecha";
} else if ($_POST['mod_estado_borrar'] == "") {
    $errors[] = "Selecciona el estado de la fecha de abono";
} else if (
    !empty($_POST['mod_id_borrar']) &&
    !empty($_POST['mod_fecha_depago_borrar']) &&
    $_POST['mod_estado_borrar'] != ""
) {     
    /* Connect To Database*/ 
    require_once "../db.php";
    require_once "../php_conexion.php"; 
    // escaping, additionally removing everything that could be (html/javascript-) code
    $fecha_promesa    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_fecha_depago_borrar"], ENT_QUOTES)));
    $monto_abono    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_abono_borrar"], ENT_QUOTES)));
    $concepto_abono  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_concepto_borrar"], ENT_QUOTES)));
    $estado    = intval($_POST['mod_estado_borrar']);

    $id_fecha_de_pago = intval($_POST['mod_id_borrar']); 
    /*$sql        = "UPDATE fechas_de_pagos SET fecha_promesa_pago='" . $fecha_promesa . "',
                                        monto_abono='" . $monto_abono . "',
                                        concepto_abono='" . $concepto_abono . "',
                                        estatus='" . $estado . "'
                                        WHERE id_fecha_de_pago='" . $id_fecha_de_pago . "'";*/
    $sql        = "UPDATE fechas_de_pagos SET fecha_promesa_pago='" . $fecha_promesa . "',
                                        monto_abono='" . $monto_abono . "',
                                        concepto_abono='" . $concepto_abono . "',
                                        estatus='" . $estado . "'
                                        WHERE id_fecha_de_pago='" . $id_fecha_de_pago . "'";
    $query_borrar = mysqli_query($conexion, $sql);
    if ($query_borrar) {
        $messages[] = "Fecha de abono ha sido borrada con éxito.";
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