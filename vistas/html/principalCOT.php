<?php

session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: ../../loginOKJCV.php");
    exit;
}


/* Connect To Database*/
require_once "../dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
//Inicia Control de Permisos


include "../permisosOKJCV.php"; 

$user_id = $_SESSION['id_users'];
/*$user_id = 1;*/
get_cadena($user_id);
$modulo = "Inicio";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$title  = "Inicio";
$Inicio = 1;
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
$usu            = $_SESSION['id_users'];
$users_users    = get_row('users', 'usuario_users', 'id_users', $usu);
$cargo_users    = get_row('users', 'cargo_users', 'id_users', $usu);
$nombre_users   = get_row('users', 'nombre_users', 'id_users', $usu);
$apellido_users = get_row('users', 'apellido_users', 'id_users', $usu);
$email_users    = get_row('users', 'email_users', 'id_users', $usu);
?>
<?php require 'includes/header_startOKJCV.php';?>
<!-- grafico -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<?php require 'includes/header_endOKJCV.php';?>

<!-- Begin page -->
<div id="wrapper">



<?php require 'new_cotizacionOKJCV.php';?>


  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  
  
  
  
  <!-- ============================================================== -->
  <!-- End Right content here -->
  <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<?php require 'includes/footer_startOKJCV.php'
?>
<!-- ============================================================== -->
<!-- Todo el codigo js aqui-->
<!-- ============================================================== -->
<script>
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function errorHandler(errorMessage) {
            //curisosity, check out the error in the console
            console.log(errorMessage);
            //simply remove the error, the user never see it
            google.visualization.errors.removeError(errorMessage.id);
          }

          function drawVisualization() {
        // Some raw data (not necessarily accurate)
    var periodo=$("#periodo").val();//Datos que enviaremos para generar una consulta en la base de datos
    var jsonData= $.ajax({
      url: 'chart.php',
      data: {'periodo':periodo,'action':'ajax'},
      dataType: 'json',
      async: false
    }).responseText;

    var obj = jQuery.parseJSON(jsonData);
    var data = google.visualization.arrayToDataTable(obj);



    var options = {
      title : 'BALANCE GENERAL VENTAS Y COMPRAS ' +periodo,
      vAxis: {title: 'Monto'},
      hAxis: {title: 'Meses'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    google.visualization.events.addListener(chart, 'error', errorHandler);
    chart.draw(data, options);
  }

  // Haciendo los graficos responsivos
  jQuery(document).ready(function(){
    jQuery(window).resize(function(){
     drawVisualization();
   });
  });

</script>

<?php require 'includes/footer_endOKJCV.php'
?>