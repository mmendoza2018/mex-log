$(function() {

  $(document).on('click', '#print_activos', function(e){

       Print_Report('Activos');
       e.preventDefault();
  });

  $(document).on('click', '#print_inactivos', function(e){

       Print_Report('Inactivos');
       e.preventDefault();
 });


$(document).off('click', '#cargar_datos'); ///JCV PARA QUE NO ESTE RECICLEANDO LA FUNCION Y SE VAYA INVREMENTANDOEL NUMERO DE VECESQUE SE REPITE CADA VEZ QUE SE ELIJE
 $(document).on('click', '#cargar_datos', function(e){

       
       buscar_datos();
       
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
            search: '<span>:</span> _INPUT_',
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
       
        
              
        txtNombre:{
        required: true,
         maxlength:45
        },
        
        txtSaldo:{
        required: true,
         
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




/* JCV JCV PARA BORRAR
$(document).on('click', '#delete_cuentasdebancos', function(e){

       var productId = $(this).data('id');
       SwalDelete(productId);
       e.preventDefault();
  });
*/


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

/* JCV function newCuentasdebancos()
 {
     
    openCuentasdebancos('nuevo',null,null,null);
    $('#modal_iconified').modal('show');
 }
*/


/*JCV
function openCuentasdebancos(action, id_debancos, codigo_debancos, nombre, saldo, estado)
 {
     
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
      $('#txtNombre').val('');
      $('#txtSaldo').val('');
      

      setSwitchery(mySwitch, true);

      
      $('#txtNombre').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
      $('#chkEstado').prop( "disabled" , true);


      $('#btnEditar').hide();
      $('#btnGuardar').show();
      limpiarform();
      
      modal.find('.title-form').text('Ingresar debancos');
     }else if(action=='editar') {

      $('#modal_iconified').modal('show');

      $('#txtProceso').val('Edicion');
      $('#txtID').val(id_debancos);
      $('#txtCodigo').val(codigo_debancos);
      $('#txtNombre').val(nombre);
      $('#txtSaldo').val(saldo);
     


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


      $('#txtNombre').prop( "disabled" , false);
      $('#txtSaldo').prop( "disabled" , false);
      $('#chkEstado').prop( "disabled" , false);


      $('#btnEditar').show();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Actualizar Cliente');
     } else if(action=='ver'){
      $('#txtProceso').val('');
      $('#txtID').val(id_debancos);
      $('#txtNombre').val(nombre);
      $('#txtSaldo').val(saldo);
      

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

      
      $('#txtNombre').prop( "disabled" , true);
      $('#txtSaldo').prop( "disabled" , true);
      $('#chkEstado').prop( "disabled" , true);



      $('#btnEditar').hide();
      $('#btnGuardar').hide();

      modal.find('.title-form').text('Ver Cliente');
     }

  });

}

*/

/*JCV

function enviar_frm()
{
  var urlprocess = 'web/ajax/ajxcuentasdebancos.php';
  var proceso = $("#txtProceso").val();
  var id_debancos = $("#txtID").val();
  var nombre =$("#txtNombre").val();
  var saldo =$("#txtSaldo").val();
  var estado = $('#chkEstado').is(':checked') ? 1 : 0;
  

  var dataString='proceso='+proceso+'&id_debancos='+id_debancos+'&estado='+estado;
  dataString+='&nombre='+nombre+'&saldo='+saldo ;
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
                  text: "debancos registrado",
                  confirmButtonColor: "#66BB6A",
                  type: "success"
              });

              $('#modal_iconified').modal('toggle');

              cargarDiv("#reload-div","web/ajax/reload-cuentasdebancos.php");
              limpiarform();

              } else if(proceso == "Edicion") {


                  swal({
                      title: "Exito!",
                      text: "debancos modificado",
                      confirmButtonColor: "#2196F3",
                      type: "info"
                  });
                   $('#modal_iconified').modal('toggle');
                  cargarDiv("#reload-div","web/ajax/reload-cuentasdebancos.php");

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

*/

function cargarDiv(div,url)
{
      $(div).load(url);
}

function Print_Report(Criterio)
{

  if(Criterio == 'Activos')
  {
       window.open('reportes/Cuentasdebancos_Activos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=800,height=800,directories=no,location=no'+
      'fullscreen=yes');

  } else if (Criterio == 'Inactivos') {

       window.open('reportes/Cuentasdebancos_Inactivos.php',
      'win2',
      'status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes,'+
      'resizable=yes,width=600,height=600,directories=no,location=no'+
      'fullscreen=yes');
  }

}



/*JCV PARA BORRAR*/

/*JCV
function SwalDelete(productId){
              swal({
                title: "¿Está seguro que desea borrar el debancos?",
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
                        url: 'web/ajax/ajxcuentasdebancos.php',
                        type: 'POST',
                        data: 'proceso=Borrar&numero_transaccion='+productId,
                        dataType: 'json'
                        })
                        .done(function(response){
                         swal('Borrado!', response.message, response.status);
                          //JCV ORIG buscar_datos();
                          cargarDiv("#reload-div","web/ajax/reload-cuentasdebancos.php"); // JCV PARA QUE RECARGUE LOS DATOS ACTUALIZADOS
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

*/



//JCV PARA QUE CARGUE EL RESULTADO CON EL ARCHIVO RELOAD
function buscar_datos() 
{
    
  //var fecha1 = $("#txtF1A").val();
  //var fecha2 = $("#txtF2").val();
  
        $.ajax({

           type:"GET",
           
           url:"web/ajax/reload-mercadotecnia.php", 
           success: function(data){
              $('#reload-div').html(data);
           }

       });
      

}


