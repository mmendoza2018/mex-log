<?php 

    /*session_start();

    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
    header("location: ../index.php");
    exit;
    }
*/
    /*Inicia validacion del lado del servidor*/
    if (isset($_POST['id_clientejcv']) && $_POST['id_clientejcv']!=null) 
    {

        /* Connect To Database*/ 
require_once "../dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos

         
        //include "../config/config.php";//Contiene funcion que conecta a la base de datos
        //include "class.upload.php";

        $id_clientejcv = $_POST["id_clientejcv"];;
        $id_clientejcv = (int)$id_clientejcv;

        
        $query_cliente = mysqli_query($conexion, "select nombre_cliente, email_cliente, fiscal_cliente from clientes where id_cliente=$id_clientejcv order by nombre_cliente");
        $rows = mysqli_fetch_array($query_cliente);
        
        /*
        $consulta = "select nombre_cliente, email_cliente, fiscal_cliente from clientes where id_cliente=$id_clientejcv";
        $sql = mysqli_query($con, $consulta);
        $rows=mysqli_fetch_array($sql);
*/
        $nombre_completo = $rows["nombre_cliente"];
        $email = $rows["email_cliente"];
        $rfc= $rows["fiscal_cliente"];
        //$celular = $rows["celular"];

    }
    else
    {
        $nombre_completo = "";
        $email = "";
        $rfc = "";
        //$celular = "";
    } 
?>
<!--
<input id="id_cliente" name="id_cliente" type=''>
<div class="row">
    <div class="col-12" >

        <div class="form-group" > 
            <label for="id_clientejcv" class="control-label">Proveedor</label> 

            <select class='form-control' name='id_clientejcv' id='id_clientejcv' required onkeyup="javascript:this.value = this.value.toUpperCase();">
                <option value="">-- Selecciona --</option>
                <?php 

                $query_cliente = mysqli_query($conexion, "select * from clientes order by nombre_cliente");
                while ($rw = mysqli_fetch_array($query_cliente)) {
                ?>
                <option value="<?php echo $rw['id_cliente']; ?>"><?php echo $rw['nombre_cliente']; ?></option>
                <?php
                } 
                ?> 
            </select>

        </div>

    </div> <!-- row DEL SELECT DELÑ PROVEEDOR-->
<!--
</div>
-->

<div class="row">
    <!--<div class="col-md-12">
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" autocomplete="off" id="em" disabled="true">
            </div>
    </div> 
    --> 
    <div class="form-group">
        <label class="control-label" for="email">E-mail <span class="required">*</span>
        </label>
        <input type="email" name="em" id="em" class="form-control" placeholder="E-mail" value="<?php echo $email; ?>" required readonly>
    </div>
    
    
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
                <label for="fiscal"> RFC</label>
                <input type="text" class="form-control" autocomplete="off" id="tel1" disabled="true">
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="condiciones">Pago</label>
            <select class="form-control input-sm condiciones" id="condiciones" name="condiciones" onchange="showDiv(this)">
                    <option value="1">Contado</option>
                    <option value="4">Crédito</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="validez">Periodo de Validez</label>
            <select class="form-control" id="validez" name="validez">
                <option value="1">5 días</option>
                <option value="2">10 días</option>
                <option value="3">15 días</option>
                <option value="4">30 días</option>
                <option value="5">60 días</option>

            </select>
        </div>
    </div>
</div>



