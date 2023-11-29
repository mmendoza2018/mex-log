<?php 
include "is_loggedOKJCV.php"; //Archivo comprueba si el usuario esta logueado
$numero_factura = $_SESSION['numero_factura']; 
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
#require_once "../libraries/inventory.php"; //Contiene funcion que controla stock en el inventario
//Inicia Control de Permisos
include "../permisosOKJCV.php";
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
 
//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
$action         = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
      
    
    $tables    = "fechas_de_pagos";
    $campos    = "*";
    //$sWhere    = "numero_factura='" . $numero_factura . "'" ;
    $sWhere    = "numero_factura='" . $numero_factura . "'" . "order by  fecha_promesa_pago desc " ;
    
    

    include 'paginationOKJCV.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    

//Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $tables where $sWhere ");
    if ($row = mysqli_fetch_array($count_query)) {$numrows = $row['numrows'];} else {echo mysqli_error($conexion);}
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../ver_agregarfecha.php';
    //main query to fetch the data
    $query = mysqli_query($conexion, "SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
    //loop through fetched data

    $id_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);   
    
    
    if ($numrows > 0) {
        ?>
    <div class="row" > 
        
        <div class="table-responsive"> 
            
            <div class="col-lg-12">
              <!--<div class="portlet">--> 
                  
        
                <div class="portlet" > 
                  <div class="portlet-heading " style=" background-color:#ECEEEF"> 
                    <h3 class="portlet-title" style="color:#000">
                    Promesa de pago 
                  </h3>
                  <div class="portlet-widgets">
                    
                    <!--<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>-->
                    <span class="divider"></span>
                    <!--<a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary"><i class="ion-minus-round"></i></a>-->
                    <span class="divider"></span>
                    <!--<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>-->
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div id="bg-primary" class="panel-collapse collapse show">
                  <div class="portlet-body">
                    <div class="table-responsive">
                      <table class="table table-sm no-margin table-striped"> 
                        <thead>
                          <tr>
                            <!--<th>No. Factura</th>
                            <th>ID</th>--> 
                            <th class="text-center">Fecha abono</th> 
                            <th class="text-center">Monto</th>
                            <th class="text-center">Estatus</th>
                            <th class="text-center">Op.</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $numero_fac = $numero_factura;
                          $sql = mysqli_query($conexion, "select * from fechas_de_pagos where numero_factura ='" . $numero_fac . "'" . "order by  fecha_promesa_pago desc ");
                          $finales = 0;
    while ($rw = mysqli_fetch_array($sql)) {
        $id_factura     = $rw['id_fecha_de_pago'];
        $numero_factura = $rw['numero_factura'];
        $concepto_abono = $rw['concepto_abono'];

        $supplier_id       = $rw['id_cliente'];
        $sql_s             = mysqli_query($conexion, "select nombre_cliente from clientes where id_cliente='" . $supplier_id . "'");
        $rw_s              = mysqli_fetch_array($sql_s);
        $supplier_name     = $rw_s['nombre_cliente'];
        $date_added        = $rw['fecha_promesa_pago'];
        //list($date, $hora) = explode(" ", $date_added); //JCV NO ES NECESARIO SEPARAR LA HORA DE LA FECHA PORQUE EL FORMATO ES PURA FECHA
        list($Y, $m, $d)   = explode("-", $date_added);//JCV SEPARA EL DÍA, MES Y AÑO Y OS ALMACENA EN LAS RESPECTIVAS VARIABLES EN ESE ORDEN: AÑO-MES-DÍA
        //list($d, $m, $Y)   = explode("-", $date_added);
        $fecha             = $Y . "-" . $m . "-" . $d;
        $fecha_imprimir             = $d . "-" . $m . "-" . $Y;//JCV PARA QUE ASI LO MUESTRE PERO EL VALOR REAL ES EN AÑOS-MES-DIA ASÍ CON GUIO (-) NO CON DIAGONAL(/)
        //$fecha =$date_added;
        $total             = number_format($rw['monto_abono'], 2);
        
        $estatus           = $rw['estatus'];
        if($estatus==0){
            $estado="PENDIENTE";
        }else{
            $estado="PAGADO";
        } 
             
        ?> 
            <!--JCV PARA QUE SE PUEDA SELECCIOAR UN ELEMENTO Y DE AHÍ EDITARLO, EN REALIDAD SE EDITA CON ESTOS DATOS OCULTO Y NO CON LOS QUE PRESENTA LA TABLA. POR ESO SE LES PONE UN ID CON EL $id_factura                   -->
         <!--<input type="" value="<?php echo $id_factura; ?>" id="id_factura<?php echo $id_factura; ?>">--> 
        <input type="hidden" value="<?php echo $fecha; ?>" id="fecha<?php echo $id_factura; ?>">
        <input type="hidden" value="<?php echo $total; ?>" id="total<?php echo $id_factura; ?>">
        <input type="hidden" value="<?php echo $concepto_abono; ?>" id="concepto_abono<?php echo $id_factura; ?>">
        <input type="hidden" value="<?php echo $estatus; ?>" id="estado<?php echo $id_factura; ?>"> 
        
                  
                             
                            
        <tr> 
            <!--<td><a data-toggle="tooltip" title="Número de Factura"><label class='badge badge-primary'><?php echo $numero_factura; ?></label></a></td>-->
            <!--<td><span class="badge badge-purple"><?php echo $id_factura; ?></span></td> -->
            <td class ='text-center'><?php echo $fecha_imprimir; ?></td>
            <td class='text-right'><b><?php echo $id_moneda . '' . $total; ?></b></td>
            <td class ='text-center'><?php echo $estado; ?></td>
            
            <td> 
                <!-- jcv si funciona PERO PARA CAMBIAR DE ICONO EN ACCIONE HICE LO OTRO:
                <div class="btn-group dropdown pull-right"> 
                    <button type="button" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editarfecha" onclick="obtener_datos_fechas('<?php echo $id_factura; ?>');"><i class='fa fa-edit'></i> Editar</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $id_factura; ?>"><i class='fa fa-trash'></i> Borrar</a>
                     </div>
                </div>  
                -->
                 
                <ul class="icons-list">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editarfecha" onclick="obtener_datos_fechas('<?php echo $id_factura; ?>');"><i class='fa fa-edit'></i> Editar</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#borrarfecha" onclick="obtener_datos_fechas_borrar('<?php echo $id_factura; ?>');"><i class='fa fa-edit'></i> Borrar</a>
                                <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $id_factura; ?>"><i class='fa fa-trash'></i> Borrar</a>-->
                                  
                            </li>
                        </ul> 
                    </li>
                </ul> 
               
                <!--
                <div class="btn-group dropdown pull-right">
                                <button type="button" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                 
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editarfecha" onclick="obtener_datos('<?php echo $id_factura; ?>');"><i class='fa fa-edit'></i> Editar</a>
                                
            
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $id_factura; ?>"><i class='fa fa-trash'></i> Borrar</a>
                                 


                             </div>
                </div>
                
                -->
                
            </td>
             
            
            
        </tr>
        <?php

    }
                          
    ?>
        
                        </tbody>
                        
                      </table>
                        <br>
                        <br> <!--jcv PARA QUE HAYA ESPACIO Y AL MOMENTO DE EDITAR NO APAREZCA LOS SLIDE BAR-->
                    </div><!-- /.table-responsive -->
                   
                 
                  </div>
                </div>
              
             <!-- </div> portlet--> 
              
                
            </div>
            
            
            
            
            
            
            </div> <!--table responsive-->

    </div>
                   
            <!-- JCV PARA LAS PAGINAS <div class="box-footer clearfix" align="right"> -->

                <?php
/*$inicios = $offset + 1;
        $finales += $inicios - 1;
        echo "Mostrando $inicios al $finales de $numrows registros";
        echo paginate($reload, $page, $total_pages, $adjacents);*/?>

           <!-- JCV DE LAS PAGINAS </div>-->

            <?php
}
}
?>

