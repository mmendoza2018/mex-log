<?php
/*-----------------------
Punto de Ventas
----------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
//Inicia Control de Permisos
include "../permisosOKJCV.php";

//$user_id = $_SESSION['id_users'];/JCV nov242023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id); 

//$user_id = $_SESSION['id_users'];
//get_cadena($user_id); 
$modulo = "Clientes";
permisos($modulo, $cadena_permisos);
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id_producto'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['id_producto'])

) {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $id_producto = intval($_POST['id_producto']);
    //jcv prig$query       = mysqli_query($conexion, "select * from facturas where id_producto='" . $id_producto . "'");
    $query       = mysqli_query($conexion, "select * from detalle_fact_ventas where id_producto='" . $id_producto . "'");
    $count       = mysqli_num_rows($query);
    if ($count == 0) {
        if ($delete1 = mysqli_query($conexion, "DELETE FROM productos WHERE id_producto='" . $id_producto . "'")) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <strong>Aviso!</strong> Datos eliminados exitosamente.
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
      <strong>Error!</strong> No se pudo eliminar éste Producto. Existe Información vinculadas.
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