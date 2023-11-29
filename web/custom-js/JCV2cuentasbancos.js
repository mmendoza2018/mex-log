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


    jQuery.validator.addMethod("greaterThan",function (value, element, param) {
      alert('hola1');
        var $min = $(param);
      if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
          $(element).valid();
        });
      }return parseInt(value) > parseInt($min.val());}, "Maximo debe ser mayor a minimo");

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        alert('hola2lettersonly');
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
        alert('hola3errorelement');
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
        
              
        txtFecha:{
          maxlength:90,
          minlength: 4,
          required: true,
          lettersonly:true
          
        },
        txtConcepto:{
         maxlength:80,
          minlength: 1,
          required: true,
          lettersonly:true
        },
        txtIngreso:{
          maxlength:7
        },
        txtEgreso:{
          maxlength:7
        },
        txtSaldo:{
          maxlength:10,
          minlength: 1
        },
        txtObservaciones:{
          maxlength:80
        },
        txtTipoCuenta:{
          maxlength:100,
          minlength: 1
        }
      },
    
        
     validClass: "validation-valid-label",
     success: function(label) {
          label.addClass("validation-valid-label").text("Correcto")
      },

       submitHandler: function (form) {
           alert('enviarfrm');
           enviar_frm();
        }
     });

     $("#txtLimitC").TouchSpin({
         min: 0.00,
         max: 100000,
         step: 0.01,
         decimals: 2,
         prefix: 'Q'
     });

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


});

  function limpiarform(){

    var form = $( "#frmModal" ).validate();
    form.resetForm();

  }

  function setSwitchery(switchElement, checkedBool) {
      alert('setSwitchery');
    if((checkedBool && !switchElement.isChecked()) || (!checkedBool && switchElement.isChecked())) {
        switchElement.setPosition(true);
        switchElement.handleOnchange(true);
    }
}

    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });

function newCuentasBancos()
 {
     alert('holanewcuentas()');
    openCuentasbancos('nuevo',null,null,null,null,null,null,null,null);
     $('#modal_iconified').modal('show');
    
 }
function openCuentasbancos(action, idcuenta, fecha, concepto, ingreso, egreso, saldo, observaciones, tipocuenta)
 {
     alert('holaopenCuentasbancos()');
     alert(action);
      var mySwitch = new Switchery($('#chkEstado')[0], {
          size:"small",
          color: '#0D74E9'
      });

    $('#modal_iconified').on('shown.bs.modal', function () {
     var modal = $(this);
     if (action == 'nuevo'){

      $('#txtProceso').val('Registro');
      $('#txtIdcuenta').val('');
      $('#txtFecha').val('');
      $('#txtConcepto').val('');
      $('#txtIngreso').val('');
      $('#txtEgreso').val('');
      $('#rxrSaldo').val('');
      $('#txtObservaciones').val('');
      $('#txtTipocuenta').val('');
     

      setSwitchery(mySwitch, true);

      $('#txtIdcuenta').prop( "disabled" , false);
      $('#txtFecha').prop( "disabled" , false);
      $('#txtConcepto').prop( "disabled" , false);
      $('#txtIngreso').prop( "disabled" , false);
      $('#txtEgreso').prop( "disabled" , false);
      $('#rxrSaldo').prop( "disabled" , false);
      $('#txtObservaciones').prop( "disabled" , false);
      $('#txtTipocuenta').prop("disabled",false);
      


      $('#btnEditar').hide();
      $('#btnGuardar').show();
      limpiarform();

      modal.find('.title-form').text('Ingresar Cliente');
     }else if(action=='editar') {

      $('#modal_iconified').modal('show');

      $('#txtProceso').val('Edicion');
      $('#txtIdcuenta').val(idcuenta);
      $('#txtFecha').val(fecha);
      $('#txtConcepto').val(concepto);
      $('#txtIngreso').val(ingreso);
      $('#txtEgreso').val(egreso);
      $('#rxrSaldo').val(saldo);
      $('#txtObservaciones').val(observaciones);
      $('#txtTipocuenta').val(tipocuenta);
      


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



    $('#txtIdcuenta').prop( "disabled" , false);
      $('#txtFecha').prop( "disabled" , false);
      $('#txtConcepto').prop( "disabled" , false);
      $('#txtIngreso').prop( "disabled" , false);
      $('#txtEgreso').prop( "disabled" , false);
      $('#rxrSaldo').prop( "disabled" , false);
      $('#txtObservaciones').prop( "disabled" , false);
      $('#txtTipocuenta').prop("disabled",false);




      $('#btnEditar').show();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Actualizar Cliente');
     } else if(action=='ver'){
      $('#txtProceso').val('');
      
       $('#txtIdcuenta').val(idcuenta);
      $('#txtFecha').val(fecha);
      $('#txtConcepto').val(concepto);
      $('#txtIngreso').val(ingreso);
      $('#txtEgreso').val(egreso);
      $('#rxrSaldo').val(saldo);
      $('#txtObservaciones').val(observaciones);
      $('#txtTipocuenta').val(tipocuenta);
      
      
      

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



        $('#txtIdcuenta').prop( "disabled" , true);
      $('#txtFecha').prop( "disabled" , true);
      $('#txtConcepto').prop( "disabled" , true);
      $('#txtIngreso').prop( "disabled" , true);
      $('#txtEgreso').prop( "disabled" , true);
      $('#rxrSaldo').prop( "disabled" , true);
      $('#txtObservaciones').prop( "disabled" , true);
      $('#txtTipocuenta').prop("disabled",true);


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
  var idcuenta = $("#txtIdcuenta").val();
  var fecha =$("#txtFecha").val();
  var concepto =$("#txtConcepto").val();
  var ingreso =$("#txtIngreso").val();
  var egreso =$("#txtEgreso").val();
  var saldo =$("#txtSaldo").val();
  var observaciones =$("#txtObservaciones").val();
  var tipocuenta =$("#txtTipocuenta").val();
  
  

  var dataString='proceso='+proceso+'&idcuenta='+idcuenta+'&fecha='+fecha+'&concepto='+concepto+'&ingreso='+ingreso+'&egreso='+egreso;
  dataString+='&saldo='+saldo+'&observaciones='+observaciones+'&tipocuenta='+tipocuenta;

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

              cargarDiv("#reload-div","web/ajax/reload-cuenta_bancos.php");
              limpiarform();

              } else if(proceso == "Edicion") {


                  swal({
                      title: "Exito!",
                      text: "Cliente modificado",
                      confirmButtonColor: "#2196F3",
                      type: "info"
                  });
                   $('#modal_iconified').modal('toggle');
                  cargarDiv("#reload-div","web/ajax/reload-cuenta_bancos.php");

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
       window.open('reportes/Clientes_Activos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=800,height=800,directories=no,location=no'+
      'fullscreen=yes');

  } else if (Criterio == 'Inactivos') {

       window.open('reportes/Clientes_Inactivos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=600,height=600,directories=no,location=no'+
      'fullscreen=yes');
  }

}
