$(document).ready(function() {     
    // JCV PARA OBLIGAR A QUE EVENTO CHANGE SE LLEVE A CABO Y PUEDA SELECCIONAR EL NOMBRE DEL PROVVEDOR CORRECTO DEL SELECT CON BASE A SU ID
       $("#id_clientejcv").val($("#id_cliente").val()).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el valor del id_proveedor 
       $("#condiciones").val($("#id_pago").val()).trigger("change");
    load(1); 
    $("#resultados").load("./vistas/ajax/editar_tmp_cotOKJCVOK.php");
    $("#resultados3").load("./vistas/ajax/carga_resibidoOKJCVOK.php");
    $("#resultados4").load("./vistas/ajax/tipo_docOKJCV.php"); /*JCV SON ASI LOS ARCHIVOS SI EL OK AL FINAL*/
    $("#resultados5").load("./vistas/ajax/carga_num_transOKJCV.php");/*JCV SON ASI LOS ARCHIVOS SI EL OK AL FINAL*/
});
   
function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url: './vistas/ajax/productos_modal_ventasJCV.php?action=ajax&page=' + page + '&q=' + q,
        /*url: './vistas/ajax/productos_modal_ventasOKJCV.php?action=ajax&page=' + page + '&q=' + q,*/
        beforeSend: function(objeto) {
            $('#loader').html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');
        }
    })
}

function agregar(id) {
    var precio_venta = document.getElementById('precio_venta_' + id).value;
    var cantidad = document.getElementById('cantidad_' + id).value;
    //Inicia validacion
    if (isNaN(cantidad)) {
        $.Notification.notify('error', 'bottom center', 'NOTIFICACIÓN', 'LA CANTIDAD NO ES UN NUMERO. INTENTELO DE NUEVO')
        document.getElementById('cantidad_' + id).focus();
        return false;
    }
    if (isNaN(precio_venta)) {
        $.Notification.notify('error', 'bottom center', 'NOTIFICACIÓN', 'ESTO NO ES UN NUMERO. INTENTELO DE NUEVO')
        document.getElementById('precio_venta_' + id).focus();
        return false;
    }
    //Fin validacion
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_tmp_modalcotOKJCVOK.php",
        data: "id=" + id + "&precio_venta=" + precio_venta + "&cantidad=" + cantidad,
        beforeSend: function(objeto) {
            $("#resultados").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $.Notification.notify('success', 'bottom center', 'NOTIFICACIÓN', 'PRODUCTO AGREGADO A LA FACTURA CORRECTAMENTE')
            $("#resultados").html(datos);
        }
    });
}

function eliminar(id) {
    $.ajax({
        type: "GET",
        url: "./vistas/ajax/editar_tmp_cotOKJCVOK.php",
        data: "id=" + id,
        beforeSend: function(objeto) {
            $("#resultados").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $.Notification.notify('warning', 'bottom center', 'NOTIFICACIÓN', 'PRODCUTO ELIMINADO DE LA DATA')
            $("#resultados").html(datos);
        }
    });
}
//GUARDAMOS LA ACTUALIZACION DEL CLIENTE
$("#btn_actualizar").off("click");
$("#btn_actualizar").on("click", function(e) {

    $('#btn_actualizar').attr("disabled", true);
    var id_cliente = $("#id_cliente").val();
    
    var condiciones = $("#condiciones").val();
    var validez = $("#validez").val();
    var id_vendedor = $("#id_vendedor").val();
    //alert("vendedor " + id_vendedor); //jcv solo para probar que si pasa el ID_VENDEDOR
    if (id_cliente == "") {
        $.Notification.notify('error', 'bottom center', 'NOTIFICACIÓN', 'SELECCIONAR UN CLIENTE VALIDO')
        $("#nombre_cliente").focus();
        return false;
    } 
    parametros = {
        'id_cliente': id_cliente,
        'condiciones': condiciones,
        'validez': validez,
        'id_vendedor': id_vendedor
    };
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_fact_cotOKJCVOK.php", 
        data: parametros,
        beforeSend: function(objeto) {
            $(".editar_factura").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $(".editar_factura").html(datos);
            $('#btn_actualizar').attr("disabled", false);
            $("#resultados").load("./vistas/ajax/editar_tmp_cotOKJCVOK.php"); // carga los datos nuevamente
            $("#barcode").focus();
            load(1);
            //desaparecer la alerta
            $(".alert-success").delay(400).show(10, function() {
                $(this).delay(2000).hide(10, function() {
                    $(this).remove();
                });
            }); // /.alert
        }
    });
    event.preventDefault();
});
//CONTROLA EL FORMULARIO DEL CODIGO DE BARRA
$("#barcode_form").submit(function(event) {
    var id = $("#barcode").val();
    var cantidad = $("#barcode_qty").val();
    var id_factura = $("#factura").val();
    var id_sucursal = 0;
    //Inicia validacion
    if (isNaN(cantidad)) {
        swal('Oops...', 'La Cantidad no es un numero. Inténtalo de nuevo!', 'error')
        $("#barcode_qty").focus();
        $('#btn_guardar').attr("disabled", false);
        return false;
    }
    //Fin validacion
    parametros = {
        'id': id,
        'id_sucursal': id_sucursal,
        'cantidad': cantidad
    };
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_tmp_cotOKJCVOK.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados").html(datos);
            $("#id").val("");
            $("#id").focus();
            $("#barcode").val("");
        }
    });
    event.preventDefault();
})
$("#guardar_cliente").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/nuevo_clienteOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
            //resetea el formulario
            $("#guardar_cliente")[0].reset();
            $("#nombre").focus();
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(200, 0).slideUp(200, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
    event.preventDefault();
})
$("#guardar_producto").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/nuevo_productoOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax_productos").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax_productos").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})  
//COVERTIMOS LA COTIZACION A VENTA
$("#btn_guardar").off("click");  
$("#btn_guardar").on("click", function(e) {
    $('#btn_guardar').attr("disabled", true); 
    var id_cliente = $("#id_cliente").val();
    var cotizacion = $("#cotizacion").val();
    var factura = $("#factura").val();
    var id_comp = $("#id_comp").val();
    var tip_doc = $("#tip_doc").val();
    var trans = $("#trans").val();
    var condiciones = $("#condiciones").val();  
    var resibido = $("#resibido").val();
    if (id_cliente == "") {
        $.Notification.notify('error', 'bottom center', 'NOTIFICACIÓN', 'SELECCIONAR UN CLIENTE VALIDO')
        $("#nombre_cliente").focus();
        $('#btn_guardar').attr("disabled", false);
        return false;
    }
    /*JCV PARA QUE NO SE QUEDE SIN Y VALIDE EL COMPROBANTE:*/
    if (id_comp == "") {
        $.Notification.notify('error', 'bottom center', 'NOTIFICACIÓN', 'SELECCIONAR UN COMPROBANTE VALIDO')
        $("#id_comp").focus();
        $('#btn_guardar').attr("disabled", false); 
        return false;
    }
    parametros = {
        'id_cliente': id_cliente,
        'cotizacion': cotizacion,
        'factura': factura,
        'id_comp': id_comp,
        'tip_doc': tip_doc,
        'trans': trans,
        'condiciones': condiciones,
        'resibido': resibido
    }; 
    $.ajax({     
        type: "POST",
        url: "./vistas/ajax/guardar_venta_cotOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            
            $("#resultados_ajaxf").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },   
        success: function(datos) {
            $("#resultados_ajaxf").html(datos);
            $('#btn_guardar').attr("disabled", true);
            $('#btn_actualizar').attr("disabled", true); 
            $('#busquedajcv').attr("disabled", true); 
            
            $('#datos_factura')[0].reset(); //Recet al formilario de el cliente
            //$('#resultados')[0].reset(); //Recet al formilario de el cliente
            $('#barcode_form')[0].reset(); //Recet al formilario de el cliente
            $('#busquedajcv').attr("disabled", true); 
            //$('#regresar').attr("visible", true); 
            $("#regresar").css("display", "block");
            //$('#resultados')[0].reset();
            //document.getElementById("datos_factura").reset();  
            //$("#datos_factura")[0].reset(); //Recet al formilario de el cliente
           // $("#barcode_form")[0].reset(); // Recet al formulario de la fatura
            //$("#resultados").load("./vistas/ajax/editar_tmp_cotOKJCVOK.php"); // carga los datos nuevamente
            //$("#barcode").focus();
           // load(1);
            //desaparecer la alerta 
            $(".alert-success").delay(400).show(10, function() {
                $(this).delay(2000).hide(10, function() {
                    $(this).remove();
                });
            }); // /.alert 
            //window.location.href = "http://localhost/admin/?View=HistorialCotizacion";
        }
    });
    event.preventDefault();
});

function imprimir_factura(id_factura) {
    VentanaCentrada('./vistas/pdf/documentos/ver_facturaOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');
}