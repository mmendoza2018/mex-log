<?php
    require '../model/Listarcampo_model.php'; //JCV HAY QUE PONER la ruta A PARTIR DE DONDE ESTA ESTE ARCHIVO
    /*$MU = new Modelo_Ubigeo();*/
    $MU = new Listar_Campo();
    $id_deregistro  = $_POST['id_deregistro'];
    $consulta = $MU->listar_combo_campo($id_deregistro);
    echo json_encode($consulta);
?>