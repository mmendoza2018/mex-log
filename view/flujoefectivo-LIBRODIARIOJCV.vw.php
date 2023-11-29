<?php

	$objLibrodiario =  new Librodiario();

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat" >
                            
                            <div class="panel panel-flat" id="inicialpagina" >
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Flujo de efectivo</a></li>
						<li class="active">Análisis del flujo</li>
					</ul>
				</div>
                                
                                
                                
                                <div class="panel-heading"  >
                                    
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <h5 class="panel-title">Flujo de efectivo / Análisis del flujo</h5>
                                        </div>
                                        
                                        
                                    
                                    
                                    
                                        <div class="heading-elements">
<!--
                                            <button type="button" class="btn btn-primary heading-btn"
                                                onclick="newLibrodiario()">
                                                <i class="icon-database-add"></i> Agregar Registro
                                            </button>
-->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-printer2 position-left"></i> Imprimir Reporte
                                                <span class="caret"></span></button>
                                                
                                                <!--
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a id="print_activos" href="javascript:void(0)"
                                                    ><i class="icon-file-pdf"></i> Movimientos Activos</a></li>
                                                    <li class="divider"></li>
                                                    <li><a id="print_inactivos" href="javascript:void(0)">
                                                    <i class="icon-file-pdf"></i> Movimientos Inactivos</a></li>
                                                </ul>  
-->
                                            </div>

                                        </div>
                                        
                                       
                                    </div>
                                   
                                    
                                </div>
                                
 <!--                               
                                <div class="row" style=" display: flex; justify-content: flex-start  ; align-items: center; " >

                                    <div class="col-sm-5 col-md-3" style="width: 28rem" >
                                        <div class="panel panel-body bg-blue-400 has-bg-image" style="padding: 1rem; margin-left: 2.5rem;" ;>
                                            <div class="media no-margin">
                                                <div class="media-body" >
                                                    
                                                    <h3 class="no-margin">Saldo</h3> 
                                                    <span class="info-box-text" id="saldito">Cuentas</span>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-cash icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!--  ///JCV TODO LO PUSE EN COMENTARIO LO GRIS PARA QUE QUEDE EVIDENCIA DE LOS FILTROS EN JQUERY QUE ESTÁ ABAJO EN GRIS Y ESTA PARTE QUE ES PARA QUE AQUI APAREZCA EL SELECT, SI FUNCIONAN PERO CREO QUE ES MEJOR EN PHP
                                        ///LOS FILTROS PORQUE TENGO MAS CONTROL CON LAS BASES DE DATOS, ME GUSTA MÁS SOBRE TODO DE LAS ACTUALIZACIONES DE DATOS EN LINEA
                                    
                                    <div class="col-sm-6 col-md-5" id="busqueda"  >
                                        <label>Filtrar por una cuenta de banco   </label>

                                    </div>
                                    
                                    -->
                                    
                                    
<!--                                    
                                    <label style="margin-left: 10rem; width: 15rem">Cuentas de banco</label>
                                    <div class="col-sm-6 col-md-3" style="margin-left: 1rem">
                                        
                                        <select  data-placeholder="Seleccione una cuenta de banco..." id="cbDecuentabanco" name="cbDecuentabanco"
                                                 class="js-example-placeholder-single js-states form-control" style="text-transform:uppercase; margin-left: 3rem"

                                                 onkeyup="javascript:this.value = this.value.toUpperCase();">
                                            <option></option>
                                                     <?php
                                                    $filas = $objLibrodiario->Listar_Debancos();
                                                    if (is_array($filas) || is_object($filas)) {
                                                        foreach ($filas as $row => $column) {
                                                            ?>

                                                            <option value="<?php print ($column["id_debancos"]) ?>">
                                                            <?php print ($column["nombre"]) ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                        </select>
                                    </div> 
                                    
                                    
                                    
                                    <div class="col-sm-2" >
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                            <input type="text" id="txtF1A" name="txtF1A" placeholder=""
                                             class="form-control input-sm" style="text-transform:uppercase;"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                            <input type="text" id="txtF2" name="txtF2" placeholder=""
                                             class="form-control input-sm" style="text-transform:uppercase;"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-sm-6 col-md-3">
                                        <button type="button" id="filtro_bancos"
                                        class="btn bg-danger-400 heading-btn" id="btnPrint" value="vigentes">
                                        <i class="icon-search4"></i> Consulta</button>
                                    </div>
                                    
                                    
                                    
                                </div>    
                            
                                
    -->                            
                                
                                
                                
                            </div>
                                        
                           
                                                
                            
					<div id="reload-div"> 
                                            <!--JCV ES LA ORIGINAL LA MODIFIQUE PARA FILTRO POR CURNTAS DE BANCO <table class="table datatable-basic table-xxs table-hover">-->
                                            <!-- JCV EL id="-->
					<table id="tablaparabuscarporbancos" class="display-block table table-xxs table-hover " >
						<thead>
							<tr>
                                                            <th style="width: 25%; text-align: center">Cuentas</th>
								<th>Enero</th>
								<th>Febrero</th>
								<th>Marzo</th>
                                                                <th>Abril</th>
                                                                <th>Mayo</th>
                                                                <th>Junio</th>
								<th>Julio</th>
                                                                <th>Agosto</th>
                                                                <th>Sept</th> 
                                                                <th>Oct</th>   
                                                                <!--<th style="visibility:collapse; display:none;">Id-R</th> -->
                                                                <th>Nov</th>
                                                                <th>Dic</th>
                                                                
							<!--	<th class="text-center">Opciones</th>-->
							</tr>
						</thead>

                                        <tbody>

						  

                                        </tbody>
                                                
                                    <!--  JCV PARA QUE SALGA EL TOTAL AL FINAL DE LA COLUMNA EL TOTAL-->  
                                    
                                    <!--
                                    <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align:right; width: 150px;">Total jcv:</th>
                                                <th style="text-align:right"></th>
                                            </tr>
                                            
                                    </tfoot>        
                                                                                
                                        -->
                                        
					</table>
					</div>
                            
                            
  <!--     JCV LOS PONGO EN COMENTARIO PARA QUE NO APAREZCAN OS SALDO SDE INGRESOS, EGRESOS Y SALDO TOTAL SI QUIERO QUE APAREZCAN QUITO EL COMENTARIO SI FUNCIONAN                     -->
<!--                            <div class="row" style=" display: flex; justify-content: center; align-items: center; " id="saldototal">

                                    <div class="col-sm-6 col-md-2">
                                        <div class="panel panel-body bg-blue-400 has-bg-image">
                                            <div class="media no-margin">
                                                <div class="media-body">
                                                    <h3 class="no-margin"><?php echo ' '.number_format($sumaingresos, 2, '.', ','); ?></h3>
                                                    
                                                    <span class="info-box-text">Ingresos normal</span>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-cash icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                                <div class="col-sm-6 col-md-2">
                                        <div class="panel panel-body bg-blue-400 has-bg-image">
                                            <div class="media no-margin">
                                                <div class="media-body">
                                                    <h3 class="no-margin"><?php echo ' '.number_format($sumaegresos, 2, '.', ','); ?></h3>
                                                    
                                                    <span class="info-box-text">Egresos normal</span>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-cash icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                                <div class="col-sm-6 col-md-2">
                                        <div class="panel panel-body bg-blue-400 has-bg-image">
                                            <div class="media no-margin">
                                                <div class="media-body">
                                                    <h3 class="no-margin"><?php echo ' '.number_format($saldototal, 2, '.', ','); ?></h3>
                                                    
                                                    <span class="info-box-text">Saldo total</span>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-cash icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>  
                            
-->
                   
                            
			<!-- Iconified modal  JCV PARA AGREGAR MAS CUENTAS -->
				
				<!-- /iconified modal -->
                                
                                
                                
                                
				<?php include('./includes/footer.inc.php'); ?>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>


<!--<script type="text/javascript" src="web/custom-js/listar_campo.js"></script> -->  <!-- jcv PONER LA RUTA DE DONDE ESTA EL ARCHIVO A PARTIR DEL ROOT NO IMPORTA DONDE SE ENCUETRE ESTE ARCHIVO-->
<script type="text/javascript" src="web/custom-js/flujoefectivo.js"></script>


<script>
    /*function hola(){
        
        
        var valor =$('#cbDeregistro').val();
        $('#txtAcumulativa').val(valor);

        
    }*/
    
    $("#cbDeregistro").change(function(){
         var id_deregistro=0;
         id_deregistro = $("#cbDeregistro").val();
            //alert('EL ID_DEREGISTRO EN CHANGE:  '+ id_deregistro);
            listar_campo(id_deregistro);
            
            
        
        
        })
    
    
    
            
        /*FUE DE PRUEBA PARA PROBAR OTRO SELECT*/
        $("#sel_departamento").change(function(){
            var id_deregistro=0;
            id_deregistro = $("#sel_departamento").val();
           // alert('EL sel depto EN CHANGE:  '+ id_deregistro);
            listar_campo(id_deregistro);
           
        })
    
    
    
    $("#cbDebanco").change(function(){
         var id_debancos=0;
            id_debancos = $("#cbDebanco").val();
            //alert('EL ID_DEREGISTRO de banco EN CHANGE:  '+ id_debancos);
            listar_cuentadeBancos(id_debancos);
        
        })
    
    
    
    ///JCV EL SELECT DEL FILTRO DE CUENTAS DE BANCOS
    $("#cbDecuentabanco").change(function(){
         var id_debancos=0;
            id_debancos = $("#cbDecuentabanco").val();
            //alert('EL ID_DEREGISTRO de banco EN CHANGE:  '+ id_debancos);
            //listar_cuentadeBancos(id_debancos);
        ///JCV SI FUNCIONA AL CAMBIAR LA OPCIÓN ELEJIDA DEL SELECT 
        //buscar_datos();
        })
    
    
    
    
     
    
  
 ///JCV PARA FILTROS SON SELELCT, EN ESTE CASO PARA QUE APAREZCAN LAS CUENTAS DE BANCOS Y PODER FILTRAR LAS CUENTAS,
 // ADEMÁS AGREGUE QUE SUME LOS TOTALES DE INGRESO, EGRESOS Y SU SALDO FINAL DE LA CUENTA
   $(document).ready(function () {
    $('#tablaparabuscarporbancos').DataTable({
        ///JCV TODO LO PUSE EN COMENTARIO LO GRIS PARA QUE QUEDE EVIDENCIA DE LOS FILTROS EN JQUERY, SI FUNCIONAN PERO CREO QUE ES MEJOR EN PHP
        ///LOS FILTROS PORQUE TENGO MAS CONTROL CON LAS BASES DE DATOS, ME GUSTA MÁS SOBRE TODO DE LAS ACTUALIZACIONES DE DATOS EN LINEA
            
            /*initComplete: function () {
            //this.api().columns([0, 1, 9]).every( function () { jcv esta es la original para que salgan TODAS LAS COLUMNAS CON FILTRO
            this.api().columns([8]).every( function () { //jcv solo para la columna 8 o sea la de bancos
            
                    var column = this;
                    var nombre = "Seleccione la cuenta de banco: Todas"; //
                    var select = $('<select><option value="">'+ nombre + '</option></select>')
                        .appendTo( '#busqueda' ) //JCV PARA QUE APAREZCA EN la posición dEL <DIV> id="busqueda"
            //.appendTo($(column.footer()).empty()) // JCV APARECE AL FINAL DE LA TABLA
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        }).css("padding", "5px" ).css("background-color", "#F0F8FF").css("margin-left", "1%").css("border-radius", "3px") ;
                        //$("#hola").css("background-color", "#333");
                        //$("#hola").css("padding", "10px");
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
        */
        
        /*JCV ESTO ES PARA QUE CADA VEZ QUE CAMBIE EL FITRO DE BUSQUEDA SUME LA COLUMNA INGRESOS Y EGRESOS LA IMPLEMENTÉ AQUI*/
        
        footerCallback: function (row, data, start, end, display) { 
            var api = this.api();
            
 
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            
            
            //JCV PARA INGRESOS
 
            // Total over all pages
            totalIngresos = api
                .column(3)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                
                
               
 
            // Total over this page de ingresos
            pageTotalIngresos = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                
              
            //  SI FUNCIONA
            //$(api.column(3).footer()).html('$' + pageTotalIngresos + ' ( $' + totalIngresos + ' total Ingresos)'); //JCV LO AGREGA AL FINAL DE LA COLUMNA
            $(api.column(3).footer()).html('$' + formato(totalIngresos) ); //JCV LO AGREGA AL FINAL DE LA COLUMNA
            
            
            //JCV PARA EGRESOS
            var api2 = this.api();
            var intVal2 = function (e) {
                return typeof e === 'string' ? e.replace(/[\$,]/g, '') * 1 : typeof e === 'number' ? e : 0;
            };
            
            totalEgresos = api2
                .column(4)
                .data()
                .reduce(function (a, b) {
                    return intVal2(a) + intVal2(b);
                }, 0); 
                
                
             // Total over this page de Egresos
            pageTotalEgresos = api2
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal2(a) + intVal2(b);
                }, 0);
                   
                
             $(api2.column(4).footer()).html('$' + formato(totalEgresos) ); //JCV LO AGREGA AL FINAL DE LA COLUMNA   
                
                
                //JCV PARA EL SALDO TOTAL. COMO ES CON JQUERY LO HACE DE LOS REGISTROS QUE APAREZCAN, ES DECIR SI LO HACE CON BASE AL FILTRO EN PHP
                saldazo= totalIngresos-totalEgresos;
                //alert('saldazo   '+ saldazo);
                //alert('page totalIngresos   '+ pageTotalIngresos);
                $("#saldito").html(formato(saldazo));// PARA QUE LO AGREGUE AL PRINCIPIO DE LA TABLA EN "SALDITO"
                
            
        },
        
        
        
        
        
        
        
    });
});



/*

$(document).ready(function () {
    $('#tablaparabuscarporbancos').DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(3)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(3).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        },
    });
});

  
  */
  
  
  
    
</script>