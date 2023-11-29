<?php
    require '../model/Listarcampo_model.php'; //JCV HAY QUE PONER la ruta A PARTIR DE DONDE ESTA ESTE ARCHIVO
    /*$MU = new Modelo_Ubigeo();*/
    $MU = new Listar_Campo();
    $id_debancos  = $_POST['id_debancos'];
    $consulta = $MU->listar_combo_cuentadebancos($id_debancos);
    echo json_encode($consulta);
?>