		$(document).ready(function() {  
		    load(1);
		}); 
   
		function load(page) { 
		    var q = $("#q").val();
		    $("#loader").fadeIn('slow'); 
		    $.ajax({
		        /*url: '../ajax/buscar_cotizacionOKJCV.php?action=ajax&page=' + page + '&q=' + q,*/ /*JCV ORIGINAL*/
                        url: './vistas/ajax/buscar_cotizacionOKJCV.php?action=ajax&page=' + page + '&q=' + q,
		        beforeSend: function(objeto) {
		            /*$('#loader').html('<img src="../../img/ajax-loaderOKJCV.gif"> CargandoJCV...');*/
                            $('#loader').html('<img src="./img/ajax-loaderOKJCV.gif"> CargandoJCV...');
		        },
		        success: function(data) {
		            $(".outer_div").html(data).fadeIn('slow');
		            $('#loader').html('');
		            $('[data-toggle="tooltip"]').tooltip({
		                html: true
		            });
		        }
		    })
		}
		$('#dataDelete').on('show.bs.modal', function(event) {
		    var button = $(event.relatedTarget) // Botón que activó el modal
		    var id = button.data('id') // Extraer la información de atributos de datos
		    var modal = $(this)
		    modal.find('#id_factura').val(id)
		})
		$("#eliminarDatos").submit(function(event) {
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        /*url: "../ajax/eliminar_facturaOKJCV.php",*/ /*JCV ORIGINAL*/
                        url: "./vistas/ajax/eliminar_facturaOKJCV.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            /*$(".datos_ajax_delete").html('<img src="../../img/ajax-loaderOKJCV.gif"> Cargando...');*/ /*JCV ORIGINAL*/
                            $(".datos_ajax_delete").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando...');
		        },
		        success: function(datos) {
		            $(".datos_ajax_delete").html(datos);
		            $('#dataDelete').modal('hide');
		            //desaparecer la alerta
		            $(".alert-success").delay(400).show(10, function() {
		                $(this).delay(2000).hide(10, function() {
		                    $(this).remove();
		                });
		            }); // /.alert
		            load(1);
		        }
		    });
		    event.preventDefault();
		});

		function imprimir_factura(id_factura) {
		    /*VentanaCentrada('../pdf/documentos/ver_cotizacionOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');*/ /*JCV ORIGINAL*/
                    VentanaCentrada('./vistas/pdf/documentos/ver_cotizacionOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');
		} 
		
                  function pdf_cotizacion(id_factura) {
		    /*VentanaCentrada('../pdf/documentos/ver_cotizacionOKJCV.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');*/ /*JCV ORIGINAL*/
                    VentanaCentrada('./vistas/pdf/documentos/pdf_cotizacion.php?id_factura=' + id_factura, 'Factura', '', '724', '568', 'true');
		}
		
                   
                
                function imprimir_cotizacion(id_factura) { 
	$('#modal_vuelto').modal('hide');
	if (id_factura) {
		$.ajax({
			url: './vistas/pdf/documentos/imprimir_cotizacionOKJCVOK.php',  //JCV PARA PROBAR CON COTIZACION: 
                       // JCV OK EL BUENO PARA FACTURA url: './vistas/pdf/documentos/imprimir_factura_cot-ventaOKJCVOK.php',
			type: 'post',
			data: {
				id_factura: id_factura
			},
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Facturación</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                //mywindow.close(); //jcv se separen las ventanas de imprimir y la del formato de cotizacion
              
                
                //JCV OK window.location.href = 'http://localhost/admin/?View=HistorialCotizacion';
                //window.location.href = './?View=HistorialCotizacion';
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
                
                
                
                
                // print order function
		function printOrder(id_factura) {
		    if (id_factura) {
		        $.ajax({
		            /*url: '../pdf/documentos/imprimir_facturaOKJCV.php',*/
                            url: './vistas/pdf/documentos/imprimir_facturaOKJCV.php',
		            type: 'post',
		            data: {
		                id_factura: id_factura
		            },
		            dataType: 'text',
		            success: function(response) {
		                var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
		                mywindow.document.write('<html><head><title>Facturación</title>');
		                mywindow.document.write('</head><body>');
		                mywindow.document.write(response);
		                mywindow.document.write('</body></html>');
		                mywindow.document.close(); // necessary for IE >= 10
		                mywindow.focus(); // necessary for IE >= 10
		                mywindow.print();
		                mywindow.close();
		            } // /success function
		        }); // /ajax function to fetch the printable order
		    } // /if orderId
		} // /print order function
		// print order function
		function print_ticket(id_factura) {
		    if (id_factura) {
		        $.ajax({
		            /*url: '../pdf/documentos/imprimir_venta_editOKJCV.php',*/
                            url: './vistas/pdf/documentos/imprimir_venta_editOKJCV.php',
		            type: 'post',
		            data: {
		                id_factura: id_factura
		            },
		            dataType: 'text',
		            success: function(response) {
		                var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
		                mywindow.document.write('<html><head><title>Facturación</title>');
		                mywindow.document.write('</head><body>');
		                mywindow.document.write(response);
		                mywindow.document.write('</body></html>');
		                mywindow.document.close(); // necessary for IE >= 10
		                mywindow.focus(); // necessary for IE >= 10
		                mywindow.print();
		                mywindow.close();
		            } // /success function
		        }); // /ajax function to fetch the printable order
		    } // /if orderId
		} // /print order function