<?php

if (isset($_REQUEST['utilidad'])) {
    $utilidad     = intval($_REQUEST['utilidad']);
    $costo        = floatval($_REQUEST['costo']);
    
    // JCV ORIGINAL $utilidad     = ($costo * $utilidad) / 100;
    //jcv MARG IN:
    $utilidad     = $utilidad / 100;
    $precio_venta = $costo/(1-$utilidad);
    
    // JCV ORIGINAL SIN MARG IN$precio_venta = $costo + $utilidad;
    $precio_venta = number_format($precio_venta, 2, '.', '');
 
    $price[] = array('precio' => $precio_venta);
    //Creamos el JSON
    $json_string = json_encode($price);
    echo $json_string;
} elseif (isset($_REQUEST['mod_utilidad'])) {
    $utilidad     = intval($_REQUEST['mod_utilidad']);
    $costo        = floatval($_REQUEST['mod_costo']);
    
    //JCV ORIGINAL SIN MARG IN $utilidad     = ($costo * $utilidad) / 100;
   //JCV ORIGINAL SIN MARG IN $precio_venta = $costo + $utilidad;
    $utilidad     = $utilidad / 100;
    $precio_venta = $costo/(1-$utilidad);
    
    
    $precio_venta = number_format($precio_venta, 2, '.', '');

    $price[] = array('mod_precio' => $precio_venta);
    //Creamos el JSON
    $json_string = json_encode($price);
    echo $json_string;
}
 