$(document).ready(function() { 
    //$("#widgets").load("../ajax/carga_widgetsOKJCV.php");
    loadjcv(1);
});
 
function loadjcv(page) { 
    var range = $("#range").val();
    var parametros = {
        "action": "ajax",
        "page": page,
        'range': range
    };
    $("#loader").fadeIn('slow');
    $.ajax({
        /*url: '../ajax/ver_agregarfecha.php',*/
        url: './vistas/ajax/ver_agregarfecha.php',
        data: parametros,
        beforeSend: function(objeto) {
            /*$("#loader").html("<img src='../../img/ajax-loaderOKJCV.gif'>");*/
             $("#loader").html("<img src='./img/ajax-loaderOKJCV.gif'>");
        },
        success: function(data) {
            $(".outer_divjcv").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}
$("#add_fecha").submit(function(event) {
    $('#guardar_datos').attr("disabled", true); 
    var abono = $("#abono").val();
    //Inicia validacion
    if (isNaN(abono)) {
        $.Notification.notify('error','bottom center','NOTIFICACIÓN', 'EL ABONO NO ES UN DATO VALIDO, INTENTAR DE NUEVO') 
        $("#abono").focus();
        $('#guardar_datos').attr("disabled", false);
        return false;
    }
    //Fin validacion
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        /*url: "../ajax/agregar_fecha.php",*/
        url: "./vistas/ajax/agregar_fecha.php",
        data: parametros,
        /*
        url: './vistas/ajax/productos_modal_compras2OKJCV.php?action=ajax&page=' + page + '&q=' + q,
        beforeSend: function(objeto) {
            $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        */
        
         
        beforeSend: function(objeto) {
            $("#resultados_ajaxjcv").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            
            $("#resultados_ajaxjcv").html(datos);
            
            $(".alert-success").delay(400).show(10, function() {
                $(this).delay(2000).hide(10, function() {
                    $(this).remove();
                });
            }); // /.alert
             
            
            $('#guardar_datos').attr("disabled", false);
            //load(1);
            $("#fecha_resultado").remove();  //PARA BORRAR EL ANTERIOR RESULTADO DE FECHAS
            loadjcv(1);
            //$("#add-stock")[0].reset(); 
             //$('#add-stock').modal('hide');
            //resetea el formulario
            $("#add_fecha")[0].reset(); 
            
            //cierra la Modal
             
            /*$("#outer_divjcv").load("../ajax/ver_agregarfecha.php");*/
            $("#outer_divjcv").load("./vistas/ajax/ver_agregarfecha.php");
             //$("#widgets").load("../ajax/carga_widgetsOKJCV.php");
            $('#add-stock').modal('hide');
            //desaparecer la alerta
            /*
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);*/
            
          /*  success: function(datos) {
            $(".editar_factura").html(datos);
            //desaparecer la alerta
            $(".alert-success").delay(400).show(10, function() {
                $(this).delay(2000).hide(10, function() {
                    $(this).remove();
                });
            }); // /.alert
        }*/
            
            
            
        }
        
        
    });
    event.preventDefault();
})
  
 
$("#editar_fecha").submit(function(event) { 
    $('#editarfecha').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST", 
        url: "./vistas/ajax/editar_fecha_depago.php", 
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax2").html('<img src="./img/ajax-loader.gif"> Cargando...');
        }, 
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#actualizar_datos').attr("disabled", false);
            loadjcv(1);
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(200, 0).slideUp(200, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
    event.preventDefault();
});

 

$("#borrar_fecha").submit(function(event) {  
    
    $('#actualizar_datos2').attr("disabled", false);
    $('#borrarfecha').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST", 
        url: "./vistas/ajax/borrar_fecha_depago.php", 
        data: parametros,
        beforeSend: function(objeto) {
            
            $("#resultados_ajax22").html('<img src="./img/ajax-loader.gif"> Cargando...');
        }, 
        success: function(datos) {
            $("#resultados_ajax22").html(datos);
            $('#actualizar_datos2').attr("disabled", true);
            loadjcv(1);
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(200, 0).slideUp(200, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
    event.preventDefault();
});





  
 
$("#dataDelete").on('show.bs.modal', function(event) { 
    alert("data delete"); 
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extraer la información de atributos de datos
    
    var modal = $(this);
    modal.find('#id_factura').val(id);
    
}); 
 
$("#eliminarDatos").submit(function(event) {
   alert("Eliminar Datos");
    var parametros = $(this).serialize();
    $.ajax({ 
        type: "POST", 
        url: "./vistas/ajax/eliminar_fecha_depago.php",
        data: parametros,
        beforeSend: function(objeto) {
            $(".resultados_ajaxjcv").html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success: function(datos) {
            $(".resultados_ajaxjcv").html(datos);
            $('#dataDelete').modal('hide');
            loadjcv(1);
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(200, 0).slideUp(200, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
    event.preventDefault();
});
 




//JCV ES EL ORIGINAL remove_stock, LO TENGHO DE RESPALDO PORQUE VOY A MODIFICAR EL DE ARRIBA, #remove_stock Y #eliminar_datos
//jcv YO VOY A USAR EL DE CLIENTES
$("#remove_stock").submit(function(event) {
    alert("remover");
    $('#eliminar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/eliminar_stockOKJCV.php",
        data: parametros, 
        beforeSend: function(objeto) {
             $("#resultados_ajax2").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#eliminar_datos').attr("disabled", false);
            $("#outer_divjcv").load("./vistas/ajax/ver_historialOKJCV.php");
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
  
  
  
 
function obtener_datos_fechas(id) {
    var fecha = $("#fecha" + id).val();
    //var fecha = new Date(fecha0);
    //alert (fecha);
    var total = $("#total" + id).val();
    var estado = $("#estado" + id).val();
    var concepto_abono = $("#concepto_abono" + id).val();
    //var direccion_cliente = $("#direccion_cliente" + id).val();
    //var status_cliente = $("#status_cliente" + id).val();
    $("#mod_fecha_depago").val(fecha); 
    $("#mod_abono").val(total);
    $("#mod_concepto").val(concepto_abono);
    $("#mod_estado").val(estado);
   // $("#mod_email").val(email_cliente);
     
    $("#mod_id").val(id);  
}



function obtener_datos_fechas_borrar(id) { 
    var fecha = $("#fecha" + id).val();
    //var fecha = new Date(fecha0);
    //alert (fecha);
    var total = $("#total" + id).val();
    var estado = $("#estado" + id).val();
    var concepto_abono = $("#concepto_abono" + id).val();
    //var direccion_cliente = $("#direccion_cliente" + id).val();
    //var status_cliente = $("#status_cliente" + id).val();
    $("#mod_fecha_depago_borrar").val(fecha); 
    $("#mod_abono_borrar").val(total);
    $("#mod_concepto_borrar").val(concepto_abono);
    $("#mod_estado_borrar").val(estado);
   // $("#mod_email").val(email_cliente);
     
    $("#mod_id_borrar").val(id);  
    $('#actualizar_datos2').attr("disabled", false);//JCV PARA QUE ACTIVE EL BOTON DE BORRAR, PORQUE SE DESACTIVO EN LA PARTE QUE EJECUTA LO DEL BOTON
}
 