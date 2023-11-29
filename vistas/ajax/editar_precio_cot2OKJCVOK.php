<?php  
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id_detalle'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['id_detalle'])
) {
    /* Connect To Database*/
    require_once "../dbOKJCV.php";
    require_once "../php_conexionOKJCV.php";  
    // escaping, additionally removing everything that could be (html/javascript-) code
    $id_detalle = intval($_POST['id_detalle']); 
    $precio     = floatval($_POST['precio']); 

    $sql          = "UPDATE detalle_fact_cot SET  precio_venta='" . $precio . "' WHERE id_detalle='" . $id_detalle . "'";
    $query_update = mysqli_query($conexion, $sql);
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