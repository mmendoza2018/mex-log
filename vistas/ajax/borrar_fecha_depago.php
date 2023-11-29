<?php  
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor AQUI JCV*/ 



/*Inicia validacion del lado del servidor*/


/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Inicia Control de Permisos
//include "../permisosOKJCV.php";



if (empty($_POST['mod_id_borrar'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['mod_id_borrar'])

) { 
    // escaping, additionally removing everything that could be (html/javascript-) code
    $id_fecha_de_pago = intval($_POST['mod_id_borrar']);
    $query      = mysqli_query($conexion, "select * from fechas_de_pagos where id_fecha_de_pago='" . $id_fecha_de_pago . "'");
    $count      = mysqli_num_rows($query); 
    if ($count > 0) { 
        if ($delete1 = mysqli_query($conexion, "DELETE FROM fechas_de_pagos WHERE id_fecha_de_pago='" . $id_fecha_de_pago . "'")) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <strong>Aviso!</strong> Fecha de abono eliminada exitosamente.
          </div>
          <?php
} else {
            ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
      </div>
      <?php

        }

    } else {
        ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <strong>Error!</strong> No se pudo eliminar esta fecha. 
  </div>
  <?php
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
 
?>






