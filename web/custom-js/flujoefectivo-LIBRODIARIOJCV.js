$(function() {

  $(document).on('click', '#print_activos', function(e){

       Print_Report('Activos');
       e.preventDefault();
  });

  $(document).on('click', '#print_inactivos', function(e){

       Print_Report('Inactivos');
       e.preventDefault();
 });
 
 
 
 
 
 $(document).off('click', '#filtro_bancos'); ///JCV PARA QUE NO ESTE RECICLEANDO LA FUNCION Y SE VAYA INVREMENTANDOEL NUMERO DE VECESQUE SE REPITE CADA VEZ QUE SE ELIJE
 $(document).on('click', '#filtro_bancos', function(e){

       //Print_Report('Vigentes');
       //e.preventDefault();
  //     alert('filtro');
       // alert('filtro: '+$('#cbDecuentabanco').val());
       buscar_datos();
       
  });
 
 ///JCV EL DEL FILTRO
$(".js-example-placeholder-single").select2({
    placeholder: "SelecCCIONEE UNA CUENTA DE BANCO",
    allowClear: true
});


    // Table setup
    // ------------------------------

    // Configuración de la datatable JCV CON EL SEARCHING ACTIVO O DESACTIVO LA OPCIÓN
   $.extend( $.fn.dataTable.defaults, {
        searching: false,
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px'
        }],
        dom: '<"datatable-header"fpl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Buscar:</span> _INPUT_',
            lengthMenu: '<span>Ver:</span> _MENU_',
            emptyTable: "No existen registros",
            sZeroRecords:    "No se encontraron resultados",
            sInfoEmpty:      "No existen registros que contabilizar",
            sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
            sInfo:           "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ datos",  
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }

        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic datatable
    $('.datatable-basic').DataTable();

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Escriba para filtrar...');
    //$('.dataTables_filter input[type=search]').val('BBVA').trigger("change");


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

/*JCV PARA FECHAS, DE PRUEBA*/
    $('#txtF1').datetimepicker({
        locale: 'es',
        /*format: 'DD/MM/YYYY',*/
        format: 'YYYY/MM/DD',
        useCurrent:true,
        viewDate: moment()

  });
  
  $('#txtF1A').datetimepicker({
       
         locale: 'es',
        //format: 'DD/MM/YYYY',
         format: 'YYYY/MM/DD',
        useCurrent:true,
        viewDate: moment()
        
  });

  $('#txtF2').datetimepicker({
        locale: 'es',
        //format: 'DD/MM/YYYY',
        format: 'YYYY/MM/DD',
        useCurrent: false
  });

    $("#txtF1A").on("dp.change", function (e) {
                $('#txtF2').data("DateTimePicker").minDate(e.date);
            });
    $("#txtF2").on("dp.change", function (e) {
        $('#txtF1A').data("DateTimePicker").maxDate(e.date);
    });

/* JCV HASTA AQUI PARA 2 FECHAS DE PRUEBA*/


    jQuery.validator.addMethod("greaterThan",function (value, element, param) {
      /*alert('hola1');*/
        var $min = $(param);
      if (this.settings.onfocusout) {
          
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
          $(element).valid();
        });
      }return parseInt(value) > parseInt($min.val());}, "Maximo debe ser mayor a minimo");

    jQuery.validator.addMethod("lettersonly", function(value, element) {
       /* alert('hola2lettersonly');*/
        return this.optional(element) || /^[a-z\s 0-9, / # . ()]+$/i.test(value);
    }, "No se permiten caracteres especiales");


     var validator = $("#frmModal").validate({

      ignore: '.select2-search__field', // ignore hidden fields
      errorClass: 'validation-error-label',
      successClass: 'validation-valid-label',

      highlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      unhighlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      // Different components require proper error label placement
      errorPlacement: function(error, element) {
//alert('hola3errorelement');
// Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }

      },

      rules: {
       /* txtFecha:{
          maxlength:20,
          minlength: 6,
          required: true,
          /*date:true,*/
            /*format: 'DD/MM/YYYY'*/
        /*viewDate: moment()*/
              
        
              
        txtF1:{
            required: true
        },
          
        /*txtRegistro:{
         maxlength:70,
         required: true
        },*/
        txtIngreso:{
          /*maxlength:15,*/
          number:true,
          required: true
          /*min:1*/
                  
        },
        txtSaldo:{
          number:true
        },
        txtEgreso:{
          number:true
        }, 
        txtObservaciones:{
          maxlength:120,
          required: true
        },
        
        cbDebanco:{
          
          required: true
        },
        cbDeregistro:{
          
          required: true
        }
        
      },
    
     validClass: "validation-valid-label",
     success: function(label) {
          label.addClass("validation-valid-label").text("Correcto")
      },

       submitHandler: function (form) {
           //alert('enviarfrm');
           enviar_frm();
        }
     });

    /* $("#txtCuenta").TouchSpin({
         min: 0.00,
         max: 1000000,
         step: 1.00,
         decimals: 2,
         prefix: '$'
     });*/

    $('#btnEditar').hide();

    

    $('.select-search').select2();  // JCV PARA QUE APAREZCA  BUSCAR EN EL COMBO BOX



        /*Evento change de ChkEstado en el cual al chequear o deschequear cambia el label*/
    $("#chkEstado").change(function() {
        if(this.checked) {
           $("#chkEstado").val(true);
           document.getElementById("lblchk").innerHTML = 'VIGENTE';
        } else {
          $("#chkEstado").val(false);
          document.getElementById("lblchk").innerHTML = 'DESCONTINUADO';
        }
    });

  $.fn.modal.Constructor.prototype.enforceFocus = function() {};




/*JCV PARA BORRAR*/
$(document).on('click', '#delete_librodiario', function(e){

       var productId = $(this).data('id');
       SwalDelete(productId);
       e.preventDefault();
  });



});

  function limpiarform(){

    var form = $( "#frmModal" ).validate();
    form.resetForm();

  }

  function setSwitchery(switchElement, checkedBool) {
      
    if((checkedBool && !switchElement.isChecked()) || (!checkedBool && switchElement.isChecked())) {
        switchElement.setPosition(true);
        switchElement.handleOnchange(true);
    }
}

    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });

function newLibrodiario()
 {
     
    openLibrodiario('nuevo',null,null,null,null,null,null,null,null,null,null,null,null);
    $('#modal_iconified').modal('show');
 }
function openLibrodiario(action, id_librodiario, codigo_librodiario, fecha, nombre_cuentaderegistro, ingreso, egreso, saldo, observaciones, nombre_cuentaacumulativa, nombre_cuentadebanco, id_deregistroR, id_debancosL, naturalezaL, estado)
 {
     //alert('holaopenLibrodiario()');
     //alert(action);
      var mySwitch = new Switchery($('#chkEstado')[0], {
          size:"small",
          color: '#0D74E9'
      });
      
      
          
    $('#modal_iconified').off('shown.bs.modal');  //JCV IMPORTANTISIMO APAGAR O REINICIAR EL EVENTO HANDLER O CHANGE PARA QUE NO SE REPITAN LOS VALORES CADA VEZ QUE SE EJECUNTA EL EVENTO
    // CHANGE, ESO ME PUEDE OCASIONAR QUE NO BUSQUE LA CUENTA ACUMULATICA CORRECTA
    $('#modal_iconified').on('shown.bs.modal', function () {
     var modal = $(this);
     if (action == 'nuevo'){

      $('#txtProceso').val('Registro');
      $('#txtID').val('');
      $('#txtCodigo').val('');
      $('#txtF1').val('');
      $('#txtIngreso').val('');
      /*$('#txtRegistro').val('');*/
      $('#txtEgreso').val('');
      $('#txtSaldo').val('');
      $('#txtObservaciones').val('');
      $('#txtAcumulativa').val('');
      $('#txtidderegistroR').val('');
      $('#txtNaturaleza').val('');
      
      $('#txtiddebancosL').val('');
      
       /*JCV PARA LLENAR COMBOBOX*/
      
      $("#cbDeregistro").select2("val", "All");
      $("#cbDebanco").select2("val", "All");
      
      $("#sel_departamento").select2("val", "All");
      
      
      setSwitchery(mySwitch, true);

      $('#txtF1').prop( "disabled" , false);
      $('#txtIngreso').prop( "disabled" , false);
     /*JCV $('#txtRegistro').prop( "disabled" , false);*/
      $('#txtEgreso').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
      $('#txtObservaciones').prop( "disabled" , false);
       $('#txtAcumulativa').prop("disabled",true);
      $('#txtNaturaleza').prop("disabled",true);
      $('#txtidderegistroR').prop("disabled",true);
      $('#txtiddebancosL').prop("disabled",true);
      
      $('#cbDeregistro').prop("disabled",false);
      $('#cbDebanco').prop("disabled",false);
      
      $('#chkEstado').prop( "disabled" , true);


      $('#btnEditar').hide();
      $('#btnGuardar').show();
      limpiarform();
      
      modal.find('.title-form').text('Ingresar Movimiento');
     }else if(action=='editar') {

        
      $('#modal_iconified').modal('show');

      $('#txtProceso').val('Edicion');
      //alert('editar cuenta acumulativa '+ nombre_cuentaacumulativa);
      
      $('#txtidderegistroR').val(id_deregistroR);
     // $("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
      
      $('#txtID').val(id_librodiario);
      $('#txtCodigo').val(codigo_librodiario);
      $('#txtF1').val(fecha);
      
      
      
      $('#txtIngreso').val(ingreso);
      
      
     /* JCV $('#txtRegistro').val(nombre_cuentaderegistro);*/
     /* $('#txtDireccion').val(direccion);*/
      $('#txtEgreso').val(egreso);
      $('#txtSaldo').val(saldo);
      
        $('#txtObservaciones').val(observaciones);
      //alert('id de bancos l   '+id_debancosL);
      $('#txtiddebancosL').val(id_debancosL);
      $('#txtNaturaleza').val(naturalezaL);
     
      $("#sel_departamento").val(id_deregistroR).trigger("change");  
      //alert('cta de registro de editar   '+nombre_cuentaderegistro);
    
      //alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
      //alert('Modo editar. El nombre de la cuenta de registro:  '+ nombre_cuentaderegistro);
      
        //$("#cbDeregistro").val(nombre_cuentaderegistro).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE
        $("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
        
        
        
        
         //alert('naturaleza en .js en edicion 1: '+ $("#txtNaturaleza").val());
         //alert('ide de registro cuenta de banco R en js: ' + id_deregistroR);
  //jcv ok alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
         // alert('el val de nombre_cuentadebanco  '+nombre_cuentadebanco );
       $("#cbDebanco").val(id_debancosL).trigger("change");
        //alert('despues de evento change editar, cuenta acumulativa '+ nombre_cuentaacumulativa);
        $('#txtAcumulativa').val(nombre_cuentaacumulativa);
    //$("#cbDeregistro").val(id_deregistroR).trigger("change"); 
//listar_campo(id_deregistroR);
        //alert('naturaleza en .js en edicion 2: '+ $("#txtNaturaleza").val());
        
      if($("#txtNaturaleza").val()=="EGRESO"){
         $("#txtIngreso").val(egreso);
        
      }else{
         $("#txtIngreso").val(ingreso);
        
        } 
       

      if (estado == '1')
        {
          $("#chkEstado").val(true);
          setSwitchery(mySwitch, true);
          document.getElementById("chkEstado").checked = true;
          document.getElementById("lblchk").innerHTML = 'VIGENTE';
        }else {
          $("#chkEstado").val(false);
          setSwitchery(mySwitch, false);
          document.getElementById("chkEstado").checked = false;
          document.getElementById("lblchk").innerHTML = 'DESCONTINUADO';
        }


      $('#txtF1').prop( "disabled" , false);
      $('#txtIngreso').prop( "disabled" , false);
     /*JCV $('#txtRegistro').prop( "disabled" , false);*/
      $('#txtEgreso').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
     $('#txtObservaciones').prop( "disabled" , false);
       $('#txtAcumulativa').prop("disabled",true);
      $('#txtNaturaleza').prop("disabled",true);
      $('#txtidderegistroR').prop("disabled",true);
      $('#txtiddebancosL').prop("disabled",true);
            
      
      $('#cbDeregistro').prop( "disabled" , false);
      $('#cbDebanco').prop( "disabled" , false);
      
      $('#chkEstado').prop( "disabled" , false);


      $('#btnEditar').show();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Actualizar Movimiento');
     } else if(action=='ver'){
      $('#txtProceso').val('');
      $('#txtID').val(id_librodiario);
      $('#txtCodigo').val(codigo_librodiario);
      $('#txtF1').val(fecha);
      $('#txtIngreso').val(ingreso);
      /*JCV$('#txtRegistro').val(nombre_cuentaderegistro);*/
      $('#txtEgreso').val(egreso);
      $('#txtSaldo').val(saldo);
      $('#txtObservaciones').val(observaciones);
      $('#txtAcumulativa').val(nombre_cuentaacumulativa);
      $('#txtidderegistroR').val(id_deregistroR);
      $('#txtiddebancosL').val(id_debancosL);
      
      $('#txtNaturaleza').val(naturalezaL);
      
      $("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
      //$("#cbDeregistro").val(nombre_cuentaderegistro).trigger("change");
      //$("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
        //  alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
      //$("#cbDeregistro").val(id_deregistroR).trigger("change");
      //$("#cbDebanco").val(nombre_cuentadebanco).trigger("change");
      $("#cbDebanco").val(id_debancosL).trigger("change");
      
      
      if($("#txtNaturaleza").val()=="EGRESO"){
         $("#txtIngreso").val(egreso);
        
      }else{
         $("#txtIngreso").val(ingreso);
        
        } 
      
      
      if (estado == '1')
        {
          $("#chkEstado").val(true);
          setSwitchery(mySwitch, true);
          document.getElementById("chkEstado").checked = true;
          document.getElementById("lblchk").innerHTML = 'VIGENTE';
        }else {
          $("#chkEstado").val(false);
          setSwitchery(mySwitch, false);
          document.getElementById("chkEstado").checked = false;
          document.getElementById("lblchk").innerHTML = 'DESCONTINUADO';
        }



      $('#txtF1').prop( "disabled" , true);
      $('#txtIngreso').prop( "disabled" , true);
     /* $('#txtRegistro').prop( "disabled" , true);*/
      $('#txtEgreso').prop( "disabled" , true);
      $('#txtSaldo').prop( "disabled" , true);
      $('#txtObservaciones').prop( "disabled" , true);
      $('#txtAcumulativa').prop("disabled",true);
      $('#txtNaturaleza').prop("disabled",true);
      $('#txtidderegistroR').prop("disabled",true);
      $('#txtiddebancosL').prop("disabled",true);
      
      $('#cbDeregistro').prop( "disabled" , true);
      $('#cbDebanco').prop( "disabled" , true);
      
      $('#chkEstado').prop( "disabled" , true);



      $('#btnEditar').hide();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Ver Movimiento');
     }

  });

}

function enviar_frm()
{
    //limpiarhoja();
    limpiarsaldototal();
     $("#cbDecuentabanco").val('').trigger("change");
  var urlprocess = 'web/ajax/ajxlibrodiario.php';
  var proceso = $("#txtProceso").val();
  var id_librodiario = $("#txtID").val();
  var fecha =$("#txtF1").val();
  var ingreso=0;
  var egreso=0;
  //alert('NATURALEZA: '+ $("#txtNaturaleza").val() );
  if($("#txtNaturaleza").val()=="EGRESO"){
      egreso = $("#txtIngreso").val();
      ingreso = 0;
  }else{
       ingreso = $("#txtIngreso").val();
        egreso = 0;
  }
  
  //var ingreso =$('#txtIngreso').val();
  //var egreso =$('#txtEgreso').val();
  //var saldo =$('#txtSaldo').val();
 
 var saldo=0;
 
  /*JCV ORIG ANTES DEL COMBO BOXvar nombre_cuentaderegistro =$("#txtRegistro").val();*/
  var nombre_cuentaderegistro=$('select[name="cbDeregistro"] option:selected').text();
  //var nombre_cuentaderegistro =$("#cbDeregistro").val();  //JCV AQUI DA DE ALTA EL VAL QUE ES EL NUMERO DE LA CUENTA CON LA LINEA DE ARRIBA DA DE ALTA EL TEXTO QUE APARECE EN EL SELECT
  //var saldo =$("#txtSaldo").val();
  
  var observaciones =$("#txtObservaciones").val();
  var estado = $('#chkEstado').is(':checked') ? 1 : 0;
  var nombre_cuentaacumulativa = $('#txtAcumulativa').val();
  //var nombre_cuentadebanco =$("#cbDebanco").val();
  var naturalezaL =$('#txtNaturaleza').val();
  
  var nombre_cuentadebanco=$('select[name="cbDebanco"] option:selected').text();

    var id_deregistroR =$("#txtidderegistroR").val();
  
//    var id_debancosL =$("#txtiddebancosL").val();
var id_debancosL =$("#cbDebanco").val();  

  var dataString='proceso='+proceso+'&id_librodiario='+id_librodiario+'&fecha='+fecha+'&ingreso='+ingreso+'&egreso='+egreso+'&estado='+estado;
  dataString+='&nombre_cuentaderegistro='+nombre_cuentaderegistro+'&saldo='+saldo+'&nombre_cuentaacumulativa='+nombre_cuentaacumulativa+'&observaciones='+observaciones+'&nombre_cuentadebanco='+nombre_cuentadebanco+'&id_deregistroR='+id_deregistroR+'&id_debancosL='+id_debancosL+'&naturalezaL='+naturalezaL ;
//alert('holaenviarfrm');
  $.ajax({
     type:'POST',
     url:urlprocess,
     data: dataString,
     dataType: 'json',
     success: function(data){

        if(data=="Validado"){

             if(proceso=="Registro"){

              swal({
                  title: "Exito!",
                  text: "Movimiento registrado",
                  confirmButtonColor: "#66BB6A",
                  type: "success"
              });

              $('#modal_iconified').modal('toggle');

              cargarDiv("#reload-div","web/ajax/reload-librodiario.php");
              limpiarform();

              } else if(proceso == "Edicion") {


                  swal({
                      title: "Exito!",
                      text: "Movimiento modificado",
                      confirmButtonColor: "#2196F3",
                      type: "info"
                  });
                   $('#modal_iconified').modal('toggle');
                  cargarDiv("#reload-div","web/ajax/reload-librodiario.php");

              }

        } else if (data=="Duplicado"){

           swal({
                  title: "Ops!",
                  text: "El dato que ingresaste ya existe",
                  confirmButtonColor: "#EF5350",
                  type: "warning"
           });


        } else if(data =="Error"){

               swal({
                title: "Lo sentimos...",
                text: "No procesamos bien tus datos!",
                confirmButtonColor: "#EF5350",
                type: "error"
            });
        }

     },error: function() {

         swal({
            title: "Lo sentimos...",
            text: "Algo sucedio mal!",
            confirmButtonColor: "#EF5350",
            type: "error"
        });


     }

  });

}

function cargarDiv(div,url)
{
      $(div).load(url);
}

function Print_Report(Criterio)
{

  if(Criterio == 'Activos')
  {
       window.open('reportes/Librodiario_Activos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=800,height=800,directories=no,location=no'+
      'fullscreen=yes');

  } else if (Criterio == 'Inactivos') {

       window.open('reportes/Librodiario_Inactivos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=600,height=600,directories=no,location=no'+
      'fullscreen=yes');
  }

}

/*JCV PARA BORRAR*/

function SwalDelete(productId){
              swal({
                title: "¿Está seguro que desea borrar el movimiento?",
                text: "Este proceso es irreversible!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, volver atras",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                     return new Promise(function(resolve) {
                        $.ajax({
                        url: 'web/ajax/ajxlibrodiario.php',
                        type: 'POST',
                        data: 'proceso=Borrar&numero_transaccion='+productId,
                        dataType: 'json'
                        })
                        .done(function(response){
                         swal('Borrada!', response.message, response.status);
                          //JCV ORIG buscar_datos();
                          //limpiarhoja();
                          limpiarsaldototal();
                          $("#cbDecuentabanco").val('').trigger("change");
                          cargarDiv("#reload-div","web/ajax/reload-librodiario.php"); // JCV PARA QUE RECARGUE LOS DATOS ACTUALIZADOS
                        })
                        .fail(function(){
                         swal('Oops...', 'Algo salio mal al procesar tu peticion!', 'error');
                        });
                     });
                }
                else {
                    swal({
                        title: "Esta bien",
                        text: "Puedes seguir donde te quedaste",
                        confirmButtonColor: "#2196F3",
                        type: "info"
                    });
                }
            });

 }



function limpiarhoja(){

   //var form = $( "#inicialpagina" ).validate();
   //form.resetForm();
   // "#inicialpagina".innerHTML="";
   //alert('hola');
   var inicialpagina = document.getElementById("inicialpagina");

 while (inicialpagina.hasChildNodes())
   inicialpagina.removeChild(inicialpagina.firstChild);
   
   
  }
  
  
  function limpiarsaldototal(){

   //var form = $( "#inicialpagina" ).validate();
   //form.resetForm();
   // "#inicialpagina".innerHTML="";
   //alert('hola');
   var saldototal = document.getElementById("saldototal");

 while (saldototal.hasChildNodes())
   saldototal.removeChild(saldototal.firstChild);
   
   
  }
  
  function formato(n) { 
      //var sep = (0).toFixed(1)[1];
      
/*      sep = sep || "."; // Default to period as decimal separator 
      alert ('sep  '+sep);
    decimals = decimals || 2; // Default to 2 decimals 
    return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; 
  */  
    
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
   }


//También puedes buscar el separador decimal de la configuración regional con:
// var sep = (0).toFixed(1)[1];

//Fuente: https://www.iteramos.com/pregunta/106380/agregar-un-separador-de-miles-a-un-total-con-javascript-o-jquery



//JCV PARA QUE AL SELECCIONAR EL COMBO SELECT UNA CUENTA DE BANCO EJECUTE LA FUNCIÓN QUE NO ES OTRA COSA
// QUE HACER UNA CONSULTA CON EL NUMERO DE CUENTA DE BANCO EN LA TABLA LIBRODIARIO
function buscar_datos()
{
    
  var fecha1 = $("#txtF1A").val();
  var fecha2 = $("#txtF2").val();
  var id_debancosL = $("#cbDecuentabanco").val();
  //alert ('fecha 1 ' + fecha1);
//alert('de buscar datos valor de id_debancosL  '+ id_debancosL);
 if(fecha1=="" || fecha2=="" ){  //JCV POR SI PONEN FECHAS UNA U OTRA SE ASUME DE TODO LO QUE VA DEL AÑO DESDE PRIMER DÍA HASTA LA FECHA
     
     var d = new Date(); 
     var month = d.getMonth()+1; 
     var day = d.getDate(); 
     
     fecha1 = d.getFullYear() + '-' + '01'  + '-' + '01';  //JCV PRIMER DIA DEL AÑO EN CURSO
     fecha2 = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day; //FECHA ACTUAL
     
    // alert ('primer dia del año   ' + fecha1);
     //alert ('fecha actual   ' + fecha2);
     
 }
 
    if(id_debancosL!="")
    {   
        var vacio=1;
        limpiarsaldototal();
        $.ajax({

           type:"GET",
           //DEL DE VENTAS url:"web/ajax/reload-ventas_fecha.php?fecha1="+fecha1+"&fecha2="+fecha2,
           //JCV OK SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
           url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL+"&fecha1="+fecha1+"&fecha2="+fecha2+"&vacio="+vacio,
           success: function(data){
              $('#reload-div').html(data);
           }

       });
    } else {
             var vacio=0;

        id_debancosL=0;
        limpiarsaldototal();
        //alert('no:  '+ id_debancosL );
      $.ajax({

           type:"GET",
           // JCV SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
           url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL+"&fecha1="+fecha1+"&fecha2="+fecha2+"&vacio="+vacio,
           success: function(data){
              $('#reload-div').html(data);
           }

       });

    }

}
