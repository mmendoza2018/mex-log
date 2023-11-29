$(function() {

  $(document).on('click', '#print_activos', function(e){

       Print_Report('Activos');
       e.preventDefault();
  });

  $(document).on('click', '#print_inactivos', function(e){

       Print_Report('Inactivos');
       e.preventDefault();
 });


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
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

  $('#txtF2').datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY',
        useCurrent: false
  });

    $("#txtF1").on("dp.change", function (e) {
                $('#txtF2').data("DateTimePicker").minDate(e.date);
            });
    $("#txtF2").on("dp.change", function (e) {
        $('#txtF1').data("DateTimePicker").maxDate(e.date);
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
          
        txtConcepto:{
         maxlength:70
        },
        txtIngreso:{
          /*maxlength:15,*/
          number:true
          /*min:1*/
                  
        },
        txtSaldo:{
          number:true
        },
        txtEgreso:{
          number:true
        },
        txtObservaciones:{
          maxlength:100
        },
        txtDireccion:{
          maxlength:100,
          minlength: 4
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
$(document).on('click', '#delete_clientes', function(e){

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

function newCliente()
 {
     //alert('holabewcliente()');
    openCliente('nuevo',null,null,null,null,null,null,null,null,null);
    $('#modal_iconified').modal('show');
 }
function openCliente(action, idcliente, codigo_cliente, fecha, concepto, ingreso, direccion, egreso, saldo, observaciones ,cuenta ,estado)
 {
     //alert('holaopencliente()');
     //alert(action);
      var mySwitch = new Switchery($('#chkEstado')[0], {
          size:"small",
          color: '#0D74E9'
      });

    $('#modal_iconified').on('shown.bs.modal', function () {
     var modal = $(this);
     if (action == 'nuevo'){

      $('#txtProceso').val('Registro');
      $('#txtID').val('');
      $('#txtCodigo').val('');
      $('#txtF1').val('');
      $('#txtIngreso').val('');
      $('#txtConcepto').val('');
      $('#txtDireccion').val('');
      $('#txtEgreso').val('');
      $('#txtSaldo').val('');
      $('#txtObservaciones').val('');
      $('#txtCuenta').val('');

      setSwitchery(mySwitch, true);

      $('#txtF1').prop( "disabled" , false);
      $('#txtIngreso').prop( "disabled" , false);
      $('#txtConcepto').prop( "disabled" , false);
      $('#txtEgreso').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
      $('#txtObservaciones').prop( "disabled" , false);
      $('#txtDireccion').prop( "disabled" , false);
      $('#txtCuenta').prop("disabled",false);
      $('#chkEstado').prop( "disabled" , true);


      $('#btnEditar').hide();
      $('#btnGuardar').show();
      limpiarform();
      
      modal.find('.title-form').text('Ingresar Cuenta');
     }else if(action=='editar') {

      $('#modal_iconified').modal('show');

      $('#txtProceso').val('Edicion');
      $('#txtID').val(idcliente);
      $('#txtCodigo').val(codigo_cliente);
      $('#txtF1').val(fecha);
      $('#txtIngreso').val(ingreso);
      $('#txtConcepto').val(concepto);
      $('#txtDireccion').val(direccion);
      $('#txtEgreso').val(egreso);
      $('#txtSaldo').val(saldo);
      $('#txtObservaciones').val(observaciones);
      $('#txtCuenta').val(cuenta);


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
      $('#txtConcepto').prop( "disabled" , false);
      $('#txtEgreso').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
      $('#txtDireccion').prop( "disabled" , false);
      $('#txtObservaciones').prop( "disabled" , false);
      $('#txtCuenta').prop("disabled",false);
      $('#chkEstado').prop( "disabled" , false);


      $('#btnEditar').show();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Actualizar Cliente');
     } else if(action=='ver'){
      $('#txtProceso').val('');
      $('#txtID').val(idcliente);
      $('#txtCodigo').val(codigo_cliente);
      $('#txtF1').val(fecha);
      $('#txtIngreso').val(ingreso);
      $('#txtDireccion').val(direccion);
      $('#txtConcepto').val(concepto);
      $('#txtEgreso').val(egreso);
      $('#txtSaldo').val(saldo);
      $('#txtObservaciones').val(observaciones);
      $('#txtCuenta').val(cuenta);

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
      $('#txtConcepto').prop( "disabled" , true);
      $('#txtEgreso').prop( "disabled" , true);
      $('#txtSaldo').prop( "disabled" , true);
      $('#txtLimitC').prop( "disabled" , true);
      $('#txtDireccion').prop( "disabled" , true);
      $('#txtObservaciones').prop( "disabled" , true);
      $('#txtCuenta').prop("disabled",true);
      $('#chkEstado').prop( "disabled" , true);



      $('#btnEditar').hide();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Ver Cliente');
     }

  });

}

function enviar_frm()
{
  var urlprocess = 'web/ajax/ajxcuentasbancos.php';
  var proceso = $("#txtProceso").val();
  var id = $("#txtID").val();
  var fecha =$("#txtF1").val();
  var ingreso =$("#txtIngreso").val();
  var egreso =$("#txtEgreso").val();
  var concepto =$("#txtConcepto").val();
  var direccion =$("#txtDireccion").val();
  var saldo =$("#txtSaldo").val();
  var observaciones =$("#txtObservaciones").val();
  var estado = $('#chkEstado').is(':checked') ? 1 : 0;
  var cuenta = $('#txtCuenta').val();

  var dataString='proceso='+proceso+'&id='+id+'&fecha='+fecha+'&ingreso='+ingreso+'&egreso='+egreso+'&estado='+estado;
  dataString+='&concepto='+concepto+'&saldo='+saldo+'&direccion='+direccion+'&cuenta='+cuenta+'&observaciones='+observaciones;
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
                  text: "Cliente registrado",
                  confirmButtonColor: "#66BB6A",
                  type: "success"
              });

              $('#modal_iconified').modal('toggle');

              cargarDiv("#reload-div","web/ajax/reload-cuentasbancos.php");
              limpiarform();

              } else if(proceso == "Edicion") {


                  swal({
                      title: "Exito!",
                      text: "Cliente modificado",
                      confirmButtonColor: "#2196F3",
                      type: "info"
                  });
                   $('#modal_iconified').modal('toggle');
                  cargarDiv("#reload-div","web/ajax/reload-cuentasbancos.php");

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
       window.open('reportes/Cuentasbancos_Activos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=800,height=800,directories=no,location=no'+
      'fullscreen=yes');

  } else if (Criterio == 'Inactivos') {

       window.open('reportes/Cuentasbancos_Inactivos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=600,height=600,directories=no,location=no'+
      'fullscreen=yes');
  }

}

/*JCV PARA BORRAR*/

function SwalDelete(productId){
              swal({
                title: "¿Está seguro que desea borrar la cuenta de banco?",
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
                        url: 'web/ajax/ajxcuentasbancos.php',
                        type: 'POST',
                        data: 'proceso=Borrar&numero_transaccion='+productId,
                        dataType: 'json'
                        })
                        .done(function(response){
                         swal('Borrada!', response.message, response.status);
                          //JCV ORIG buscar_datos();
                          cargarDiv("#reload-div","web/ajax/reload-cuentasbancos.php"); // JCV PARA QUE RECARGUE LOS DATOS ACTUALIZADOS
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
