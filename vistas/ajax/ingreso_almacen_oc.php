<?php
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['mod_id'])) { 
    $errors[] = "ID vacío";
} else if (empty($_POST['mod_nombre'])) {
    $errors[] = "Nombre vacío";
} else if ($_POST['mod_estado'] == "") {
    $errors[] = "Selecciona el estado de la compra";
} else if (
    !empty($_POST['mod_id']) &&
    !empty($_POST['mod_nombre']) &&
    $_POST['mod_estado'] != ""
) {
    /* Connect To Database*/
    require_once "../dbOKJCV.php";
    require_once "../php_conexionOKJCV.php"; 
    include "../funcionesOKJCV.php"; 
    
    // escaping, additionally removing everything that could be (html/javascript-) code
    $observaciones    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_nombre"], ENT_QUOTES)));
    $marca    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_fiscal"], ENT_QUOTES)));
    $modelo  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_telefono"], ENT_QUOTES)));
   // $email     = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_email"], ENT_QUOTES)));
    $noserie = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_direccion"], ENT_QUOTES)));
    
    $statuscompra    = $_POST['mod_estado'];
    $statusalmacen = "INGRESADO"; 
    $date             = date("Y-m-d H:i:s");
     
    $id_detalle = intval($_POST['mod_id']);
    $sihayfecha = get_row('detalle_fact_compra', 'fechaingreso', 'id_detalle', $id_detalle); 
    
    if ($sihayfecha==""){
        $fechaingreso = $date;
    } else {
        $fechaingreso = $sihayfecha;
    }
    
    $sql        = "UPDATE detalle_fact_compra SET observaciones='" . $observaciones . "',
                                        marca='" . $marca . "',
                                        modelo='" . $modelo . "',
                                        
                                        nodeserie='" . $noserie . "',
                                        statusalmacen='" . $statusalmacen . "',
                                        statuscompra='" . $statuscompra . "',
                                        fechaingreso='" . $fechaingreso . "'
                                        WHERE id_detalle='" . $id_detalle . "'";  
    $query_update = mysqli_query($conexion, $sql);
    if ($query_update) {
        $messages[] = "El producto ha sido ingresado al almacén con éxito.";
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