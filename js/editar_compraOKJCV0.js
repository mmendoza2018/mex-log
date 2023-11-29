$(document).ready(function() {   
       // JCV PARA OBLIGAR A QUE EVENTO CHANGE SE LLEVE A CABO Y PUEDA SELECCIONAR EL NOMBRE DEL PROVVEDOR CORRECTO DEL SELECT CON BASE A SU ID
       $("#proveedorito").val($("#id_proveedor").val()).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el valor del id_proveedor 
       
       
    load(1);
    $("#resultados").load("./vistas/ajax/editar_tmp_compraOKJCV0.php"); 
    
           
});   
 
    
 
  
function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        //JCV ORIG url: './vistas/ajax/productos_modal_compras2OKJCV.php?action=ajax&page=' + page + '&q=' + q,
        url: './vistas/ajax/productos_modal_compras2OKJCVOK.php?action=ajax&page=' + page + '&q=' + q,
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
    var costo_producto = document.getElementById('costo_producto_' + id).value; 
    var cantidad = document.getElementById('cantidad_' + id).value;
    //JCV PARA EL ID DE LA FACTURA DE VENTA:
    var id_factura = document.getElementById('id_factura_' + id).value;
    
    var numero_factura_venta = document.getElementById('numero_factura_' + id).value; 
    //alert('numero de factura venta: ' + numero_factura_venta);
      
    //Inicia validacion
    if (isNaN(cantidad)) {
       $.Notification.notify('error','bottom center','ERROR!', 'LA CANTIDAD DIGITADA NO ES UN FORMATO VALIDO')
        document.getElementById('cantidad_' + id).focus();
        return false;
    }
    if (isNaN(costo_producto)) {
        $.Notification.notify('error','bottom center','ERROR!', 'EL COSTO DIGITADO NO ES UN FORMATO VALIDO')
        document.getElementById('costo_producto_' + id).focus();
        return false;
    }
    //Fin validacion 
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_tmp_modalcomprasOKJCV.php", 
         
        
        //JCV OK ORIGINAL data: "id=" + id + "&costo_producto=" + costo_producto + "&cantidad=" + cantidad,
        data: "id=" + id + "&costo_producto=" + costo_producto + "&cantidad=" + cantidad + "&id_factura=" + id_factura + "&numero_factura_venta=" + numero_factura_venta ,
       
          
        beforeSend: function(objeto) {
            $("#resultados").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados").html(datos);
            $.Notification.notify('success','bottom center','EXITO!', 'PRODUCTO AGREGADO A LA FACTURA CORRECTAMENTE')
        }
    });
}


function eliminar(id) {
    $.ajax({
        type: "GET",
        url: "./vistas/ajax/editar_tmp_compraOKJCV0.php",
        data: "id=" + id,
        beforeSend: function(objeto) {
            $("#resultados").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $.Notification.notify('warning','bottom center','NOTIFICACIÓN', 'LA CANTIDAD FUE DESCONTADA DEL INVENTARIO')
            $("#resultados").html(datos);
        }
    });
}  
$("#datos_factura").submit(function(event) { //El formulario envia los datos aqui
    //alert('datos_factura');
    var id_proveedor = $("#id_proveedorJCV").val(); 
    if (id_proveedor == "") {
        swal('Oops...', 'Seleccionar Proveedor. Inténtalo de nuevo!', 'info')
        $("#proveedorito").focus();
        return false;
    }
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/editar_fact_compraOKJCV.php", 
        data: parametros,
        beforeSend: function(objeto) {
            $(".editar_factura").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $(".editar_factura").html(datos);
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
        url: "./vistas/ajax/editar_tmp_compraOKJCV0.php",
        data: parametros,
        beforeSend: function(objeto) {
             $.Notification.notify('warning','bottom center','NOTIFICACIÓN', 'LA CANTIDAD FUE AGREGADA AL INVENTARIO')
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
$("#guardar_proveedor").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/nuevo_proveedorOKJCV.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
        },
        success: function(datos) {
            $("#resultados_ajax").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
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



 
function imprimir_factura(id_factura) { 
    //JCV CHECAR CUAL DE LAS DOS: VentanaCentrada('../pdf/documentos/ver_facturaOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');
    VentanaCentrada('./vistas/pdf/documentos/ver_facturaOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');
}


function hola(){
 
    alert('hola');  
  }
  
  
  function obtener_datos(id) {
      //alert('hola');
		    //var $id_detalle = id; 
                    var id_detalle = $("#id_detalle" + id).val();
                    var nombre_producto = $("#nombre_producto" + id).val();
		    var observaciones = $("#observaciones" + id).val();
                    var marca = $("#marca" + id).val();
		    var modelo = $("#modelo" + id).val();
		   // var email_cliente = $("#email_cliente" + id).val();
		    var nodeserie = $("#nodeserie" + id).val();
		    var statuscompra = $("#statuscompra" + id).val();
		    $("#mod_nombre").val(observaciones); 
		    $("#mod_fiscal").val(marca);
                    $("#mod_produ").val(nombre_producto);
		    $("#mod_telefono").val(modelo);
		   // $("#mod_email").val(email_cliente);
		    $("#mod_direccion").val(nodeserie);
		    $("#mod_estado").val(statuscompra);
		   $("#mod_id").val(id);
		}