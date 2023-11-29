<?php
/*-------------------------
Punto de Ventas
---------------------------*/
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../db.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexion.php"; //Contiene funcion que conecta a la base de datos
//Archivo de funciones PHP
require_once "../funciones.php";
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q      = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $sTable = "facturas_compras, proveedores, users";
    $sWhere = "";
    $sWhere .= " WHERE facturas_compras.id_proveedor=proveedores.id_proveedor and facturas_compras.id_vendedor=users.id_users";
    if ($_GET['q'] != "") {
        $sWhere .= " and  (proveedores.nombre_proveedor like '%$q%' or facturas_compras.numero_factura like '%$q%')";

    }

    $sWhere .= " order by facturas_compras.id_factura desc";
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row         = mysqli_fetch_array($count_query);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../html/bitacoras_compras.php';
    //main query to fetch the data
    $sql   = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($conexion);
        ?>
        <div class="table-responsive">
          <table class="table table-sm table-striped">
             <tr  class="info">
                <th># Factura</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th class='text-center'>Total</th>
                <th class='text-center'>Acciones</th>

            </tr>
            <?php
while ($row = mysqli_fetch_array($query)) {
            $id_factura         = $row['id_factura'];
            $numero_factura     = $row['numero_factura'];
            $fecha              = date("d/m/Y", strtotime($row['fecha_factura']));
            $nombre_proveedor   = $row['nombre_proveedor'];
            $telefono_proveedor = $row['telefono_proveedor'];
            $email_proveedor    = $row['email_proveedor'];
            $contacto_proveedor = $row['contacto_proveedor'];
            $nombre_vendedor    = $row['nombre_users'] . " " . $row['apellido_users'];
            $estado_factura     = $row['estado_factura'];
            if ($estado_factura == 1) {
                $text_estado = "Pagada";
                $label_class = 'badge-success';} else {
                $text_estado = "Pendiente";
                $label_class = 'badge-warning';}
            $total_venta    = $row['monto_factura'];
            $simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
            ?>
                        <tr>
                         <td><label class='badge badge-purple'><?php echo $numero_factura; ?></label></td>
                         <td><?php echo $fecha; ?></td>
                         <td><?php echo $nombre_proveedor; ?></td>
                         <td><?php echo $nombre_vendedor; ?></td>
                         <td><span class="badge <?php echo $label_class; ?>"><?php echo $text_estado; ?></span></td>
                         <td class='text-left'><b><?php echo $simbolo_moneda . '' . number_format($total_venta, 2); ?></b></td>
                         <td class="text-center">
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                            <div class="dropdown-menu dropdown-menu-right">
                               <?php if ($permisos_editar == 1) {?>
                               <a class="dropdown-item" href="editar_compra.php?id_factura=<?php echo $id_factura; ?>"><i class='fa fa-edit'></i> Editar</a>
                               <a class="dropdown-item" href="#" onclick="printOrder('<?php echo $row['id_factura']; ?>')"><i class='fa fa-print'></i> Imprimir</a>
                               <a class="dropdown-item" href="#" onclick="imprimir_factura('<?php echo $id_factura; ?>');"><i class='fa fa-download'></i> PDF</a>
                               <?php }
            if ($permisos_eliminar == 1) {?>
                               <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id_factura']; ?>"><i class='fa fa-trash'></i> Eliminar</a>-->
                               <?php }?>


                           </div>
                       </div>

                   </td>

               </tr>
               <?php
}
        ?>
           <tr>
              <td colspan=7><span class="pull-right"><?php
echo paginate($reload, $page, $total_pages, $adjacents);
        ?></span></td>
            </tr>
        </table>
    </div>
    <?php
}
//Este else Fue agregado de Prueba de prodria Quitar
    else {
        ?>
    <div class="alert alert-warning alert-dismissible" role="alert" align="center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Aviso!</strong> No hay Registro de Facturas
  </div>
  <?php
}
// fin else
}
?>