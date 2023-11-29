<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$objLibrodiario =  new Librodiario();

 ?>

                            
					<div id="reload-div"> 
                                            <!--JCV ES LA ORIGINAL LA MODIFIQUE PARA FILTRO POR CURNTAS DE BANCO <table class="table datatable-basic table-xxs table-hover">-->
                                            <!-- JCV EL id="-->
					<table id="tablaparabuscarporbancos" class="display-block table table-xxs table-hover " >
						<thead>
							<tr>
								<th>No</th>
								<th>Fecha</th>
								<th>Cuenta de registro</th>
								<th>Ingreso</th>
                                                                <th>Egreso</th>
                                                                <th style="visibility:collapse; display:none;">Saldo</th>
                                                                <th>Observaciones</th>
								<th>Cta acumulativa</th>
                                                                <th>Cta. de banco</th>
                                                                <th style="visibility:collapse; display:none;">Id-R</th>  
                                                                <!--<th style="visibility:collapse; display:none;">Id-R</th> -->
                                                                <th style="visibility:collapse; display:none;">Id-B</th> 
                                                                <th>Naturaleza</th> 
                                                                <th style="visibility:collapse; display:none;">Id-Acum</th> 
                                                                <th>Estado</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>

						<tbody>

						  <?php
								$filas = $objLibrodiario->Listar_Librodiario(); 
								$sumaingresos=0;
                                                                $sumaegresos=0;
                                                                $saldototal=0;
                                                                if (is_array($filas) || is_object($filas))
								{
                                                                    
								foreach ($filas as $row => $column)
								{
								?>
									<tr>
					                	<td><?php print($column['id_librodiario']); ?></td>
					                	<td><?php print($column['fecha']); ?></td>
					                	<td><?php print($column['nombre_cuentaderegistro']); ?></td>
					                	<td style=" text-align: right"><?php print(number_format($column['ingreso'],2)); ?></td>
                                                             
                                                                <?php
                                                                    
                                                                    $sumaingresos+= $column['ingreso'];
                                                                    $sumaegresos+= $column['egreso']
                                                                ?>
                                                                
                                                                <td style=" text-align: right"><?php print(number_format($column['egreso'],2)); ?></td>
                                                                <td style="visibility:collapse; display:none;"><?php print($column['saldo']); ?></td>
                                                                <td><?php print($column['observaciones']); ?></td>
                                                                <td><?php print($column['nombre_cuentaacumulativa']); ?></td>
                                                                <td><?php print($column['nombre_cuentadebanco']); ?></td>
                                                                <td style="visibility:collapse; display:none;"><?php print($column['id_deregistroR']); ?></td>
                                                                <td style="visibility:collapse; display:none;"><?php print($column['id_debancosL']); ?></td>
                                                                <td><?php print($column['naturalezaL']); ?></td>
                                                                <td style="visibility:collapse; display:none;"><?php print($column['id_acumulativa']); ?></td>
                                                                <!--<td style="visibility:collapse; display:none;"></td>-->
                                                                <!--<td style="visibility:collapse; display:none;"></td>-->
                                                                
					                	<td><?php if($column['estado'] == '1')
					                		echo '<span class="label label-success label-rounded"><span
					                		class="text-bold">VIGENTE</span></span>';
					                		else
					                		echo '<span class="label label-default label-rounded">
					                	<span
					                	    class="text-bold">DESCONTINUADO</span></span>'
						                ?></td>
					                	<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a
													href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
													onclick="openLibrodiario('editar',
								                     '<?php print($column["id_librodiario"]); ?>',
								                     '<?php print($column["codigo_librodiario"]); ?>',
								                     '<?php print($column["fecha"]); ?>',
								                     '<?php print($column["nombre_cuentaderegistro"]); ?>',
                                                                                    '<?php print($column["ingreso"]); ?>',
								                     
								                     '<?php print($column["egreso"]); ?>',
								                     '<?php print($column["saldo"]); ?>',
                                                                                    '<?php print($column["observaciones"]); ?>',
                                                                                    '<?php print($column["nombre_cuentaacumulativa"]); ?>',
                                                                                    '<?php print($column["nombre_cuentadebanco"]); ?>',
                                                                                    '<?php print($column["id_deregistroR"]); ?>',
                                                                                    '<?php print($column["id_debancosL"]); ?>',
                                                                                    '<?php print($column["naturalezaL"]); ?>',
                                                                                    '<?php print($column["id_acumulativa"]); ?>',
								                     '<?php print($column["estado"]); ?>')">
												   <i class="icon-pencil6">
											       </i> Editar</a></li>
													<li><a
													href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
													onclick="openLibrodiario('ver',
																		'<?php print($column["id_librodiario"]); ?>',
																		'<?php print($column["codigo_librodiario"]); ?>',
																		'<?php print($column["fecha"]); ?>',
																		'<?php print($column["nombre_cuentaderegistro"]); ?>',
																		'<?php print($column["ingreso"]); ?>',
																		
																		'<?php print($column["egreso"]); ?>',
																		'<?php print($column["saldo"]); ?>',
																		'<?php print($column["observaciones"]); ?>',
																		'<?php print($column["nombre_cuentaacumulativa"]); ?>',
                                                                                                                                                '<?php print($column["nombre_cuentadebanco"]); ?>',
                                                                                                                                                '<?php print($column["id_deregistroR"]); ?>',
                                                                                                                                                '<?php print($column["id_debancosL"]); ?>',
                                                                                                                                                '<?php print($column["naturalezaL"]); ?>',
                                                                                                                                                '<?php print($column["id_acumulativa"]); ?>',
																		'<?php print($column["estado"]); ?>')">
													<i class=" icon-eye8">
													</i> Ver</a></li>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                        <li><a id="delete_librodiario"
                                                                                                        data-id="<?php print($column['id_librodiario']); ?>"
                                                                                                        href="javascript:void(0)">
                                                                                                        <i class=" icon-trash">
                                                                                                        </i> Borrar</a></li>

                                                                                                        
												</ul>
											</li>
										</ul>
									</td>
					                </tr>
								<?php
								}
                                                                $saldototal=$sumaingresos-$sumaegresos;
							}
							?>

						</tbody>
                                                
                                                 <!--  JCV PARA QUE SALGA EL TOTAL AL FINAL DE LA COLUMNA EL TOTAL-->  
                                                <tfoot>
                                                        <tr>
                                                            <th colspan="4" style="text-align:right; width: 150px;">Total jcv:</th>
                                                            <th style="text-align:right"></th>
                                                        </tr>

                                                </tfoot>  
                                                
                                                
					</table>
					</div>
                            
                            
                                         <div class="row" style=" display: flex; justify-content: center; align-items: center; " id="saldototal">

                                    <div class="col-sm-6 col-md-2">
                                        <div class="panel panel-body bg-blue-400 has-bg-image">
                                            <div class="media no-margin">
                                                <div class="media-body">
                                                    <h3 class="no-margin"><?php echo ' '.number_format($sumaingresos, 2, '.', ','); ?></h3>
                                                    <!--<h3 class="no-margin">Saldo</h3>-->
                                                    <span class="info-box-text">Ingresos normal R</span>
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
                                                    <!--<h3 class="no-margin">Saldo</h3>-->
                                                    <span class="info-box-text">Egresos normal R</span>
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
                                                    <!--<h3 class="no-margin">Saldo</h3>-->
                                                    <span class="info-box-text">Saldo total R</span>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-cash icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>  
                            
                            
                            
			



 
<script type="text/javascript" src="web/custom-js/librodiario.js"></script>



<script>
    
  
  
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
        
        /*JCV ESTO ES PARA QUE CADA VEZ QUE CAMBIE EL FITRO DE BUSQUEDA SUME LA COLUMNA INGRESOS LA IMPLEMENTÉ AQUI*/
        
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
                   
               ///JCV SI FUNCIONA 
             //$(api2.column(4).footer()).html('$' + pageTotalEgresos + ' ( $' + totalEgresos + ' total Egresos)'); //JCV LO AGREGA AL FINAL DE LA COLUMNA   
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