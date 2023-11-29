<?php     
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/ 
if (empty($_POST['id_tmp'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['id_tmp'])
) {
    /* Connect To Database*/
    require_once "../dbOKJCV.php";
    require_once "../php_conexionOKJCV.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $id_tmp = intval($_POST['id_tmp']);
    $costo  = floatval($_POST['costo']);
  
    $sql          = "UPDATE tmp_cotizacion SET  precio_tmp='" . $costo . "' WHERE id_tmp='" . $id_tmp . "'";
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