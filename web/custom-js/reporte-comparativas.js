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

       //Print_Report('Vigentes');
       //e.preventDefault();
  //     alert('filtro');
       // alert('filtro: '+$('#cbDecuentabanco').val());
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


/*JCV function openCuentasdebancos(action, id_debancos, codigo_debancos, nombre, saldo, estado)*/


/*JCV

function enviar_frm() */


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



//JCV PARA QUE CARGUE EL RESULTADO CON EL ARCHIVO RELOAD
function buscar_datos() 
{
    
  //var fecha1 = $("#txtF1A").val();
  //var fecha2 = $("#txtF2").val();
  var id_debancosL = "PRUEBITA";
  
  /*
 if(fecha1=="" || fecha2=="" ){  //JCV POR SI PONEN FECHAS UNA U OTRA SE ASUME DE TODO LO QUE VA DEL AÑO DESDE PRIMER DÍA HASTA LA FECHA
     
     var d = new Date(); 
     var month = d.getMonth()+1; 
     var day = d.getDate(); 
     
     fecha1 = d.getFullYear() + '-' + '01'  + '-' + '01';  //JCV PRIMER DIA DEL AÑO EN CURSO
     fecha2 = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day; //FECHA ACTUAL
     
    // alert ('primer dia del año   ' + fecha1);
     //alert ('fecha actual   ' + fecha2);
     
 }
 */

    /*if(id_debancosL!="")
    {   
        var vacio=1;
        limpiarsaldototal();*/
        $.ajax({

           type:"GET",
           //DEL DE VENTAS url:"web/ajax/reload-ventas_fecha.php?fecha1="+fecha1+"&fecha2="+fecha2,
           //JCV OK SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
           /*url:"web/ajax/reload-estadoresultados1.php",*/
           /*JCV SI FUNCIONA CON FLUJO DE EFECTIVOurl:"web/ajax/reload-flujoefectivojcv.php",  */
           
           url:"web/ajax/reload-estadoresultados1.php",
           success: function(data){
              $('#reload-div').html(data);
           }

       });
    /*} else {
             var vacio=0;

        id_debancosL=0;
        limpiarsaldototal();
        
      $.ajax({

           type:"GET",
           // JCV SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
           url:"web/ajax/reload-flujoefectivojcv.php",
           success: function(data){
              $('#reload-div').html(data);
           }

       });

   }*/

}


