$(document).ready(function() {
    $("#widgets").load("../ajax/carga_widgetsOKJCV.php");
    load(1);
});
  
function load(page) {
    var range = $("#range").val();
    var parametros = {
        "action": "ajax",
        "page": page,
        'range': range
    };
    $("#loader").fadeIn('slow');
    $.ajax({
        url: '../ajax/ver_cxcOKJCV.php',
        data: parametros,
        beforeSend: function(objeto) {
            $("#loader").html("<img src='../../img/ajax-loaderOKJCV.gif'>");
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
} 
$("#add_abono").submit(function(event) { 
    $('#guardar_datos').attr("disabled", true);
    var abono = $("#abono").val();
    //Inicia validacion
    if (isNaN(abono)) {
        $.Notification.notify('error','bottom center','NOTIFICACIÓN', 'El ABONO NO ES UN DATO VALIDO, INTENTAR DE NUEVO')
        $("#abono").focus();
        $('#guardar_datos').attr("disabled", false);
        return false;
    }
    //Fin validacion
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../ajax/agregar_abonoOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax").html('<img src="../../img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
            //resetea el formulario
            $("#add_abono")[0].reset(); 
            //cierra la Modal
            $("#outer_div").load("../ajax/ver_cxcOKJCV.php");
             $("#widgets").load("../ajax/carga_widgetsOKJCV.php");
            $('#add-stock').modal('hide');
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);
        }
    });
    event.preventDefault();
})
$("#remove_stock").submit(function(event) {
    $('#eliminar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../ajax/eliminar_stockOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax2").html('<img src="../../img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#eliminar_datos').attr("disabled", false);
            $("#outer_div").load("../ajax/ver_historialOKJCV.php");
            load(1);
            //resetea el formulario
            $("#remove_stock")[0].reset();
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);
        }
    });
    event.preventDefault();
})