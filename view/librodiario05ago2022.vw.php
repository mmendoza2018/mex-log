<?php

	$objLibrodiario =  new Librodiario();

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat" >
                            
                            <div class="panel panel-flat" id="inicialpagina" >
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Libro Diario</a></li>
						<li class="active">Movimientos</li>
					</ul>
				</div>
                                
                                
                                
                                <div class="panel-heading"  >

                                    <h5 class="panel-title">Libro Diario / Movimientos</h5>

                                    <div class="heading-elements">

                                        <button type="button" class="btn btn-primary heading-btn"
                                            onclick="newLibrodiario()">
                                            <i class="icon-database-add"></i> Agregar Registro</button>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-printer2 position-left"></i> Imprimir Reporte
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a id="print_activos" href="javascript:void(0)"
                                                ><i class="icon-file-pdf"></i> Movimientos Activos</a></li>
                                                <li class="divider"></li>
                                                <li><a id="print_inactivos" href="javascript:void(0)">
                                                <i class="icon-file-pdf"></i> Movimientos Inactivos</a></li>
                                            </ul>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="panel-body" id="busqueda" style=" width: 90%; display: flex; justify-content: center; align-items: center; "  >
                                    <label>Filtrar por una cuenta de banco   </label>

                                </div>
                                
                            
                            </div>
                                        
                           
                                                
                            
                            
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
                                                                <th>Saldo</th>
                                                                <th>Observaciones</th>
								<th>Cta acumulativa</th>
                                                                <th>Cta. de banco</th>
                                                                <th>Id-R</th> 
                                                                <th>Id-B</th>   
                                                                <!--<th style="visibility:collapse; display:none;">Id-R</th> -->
                                                                <th>Estado</th>
                                                                
								<th class="text-center">Opciones</th>
							</tr>
						</thead>

						<tbody>

						  <?php
								$filas = $objLibrodiario->Listar_Librodiario();
								if (is_array($filas) || is_object($filas))
								{
								foreach ($filas as $row => $column)
								{
								?>
									<tr>
					                	<td><?php print($column['id_librodiario']); ?></td>
					                	<td><?php print($column['fecha']); ?></td>
					                	<td><?php print($column['nombre_cuentaderegistro']); ?></td>
					                	<td><?php print($column['ingreso']); ?></td>
                                                             
                                                                <td><?php print($column['egreso']); ?></td>
                                                                <td><?php print($column['saldo']); ?></td>
                                                                <td><?php print($column['observaciones']); ?></td>
                                                                <td><?php print($column['nombre_cuentaacumulativa']); ?></td>
                                                                <td><?php print($column['nombre_cuentadebanco']); ?></td>
                                                                <td><?php print($column['id_deregistroR']); ?></td>
                                                                <td><?php print($column['id_debancosL']); ?></td>
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
							}
							?>

						</tbody>
                                                
                                                
                                                
					</table>
					</div>
                            
                            
                                        <div class="col-md-3 col-sm-6 col-xs-12 "> 

                                            <div class="box-footer" style="border-width: 4px;" >
							            <div class="inner">
							              <h3>{{ number_format($totalf, 2, '.', ',') }}</h3>

							              <p>{{$divisa->value}}</p>
							            </div>
							            <div class="icon">
                                                                        <i class="bi-alarm"></i>
							              <!--<i class="fa  fa-money"></i>-->
							            </div>
							            <label class="small-box-footer">
							              Saldo Total 
							            </label>
							          </div>
							    </div>
                            
                            
                            <div class="row">
  <div class="col-sm-6">
    <div class="card border-success mb-3" style="max-width: 18rem;">
  <div class="card-header bg-transparent border-success">Header</div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-footer bg-transparent border-success">Footer</div>
</div>
  </div>
                            
                            
				</div>

			<!-- Iconified modal  JCV PARA AGREGAR MAS CUENTAS -->
				<div id="modal_iconified" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title"><i class="icon-pencil7"></i> &nbsp; <span class="title-form"></span></h5>
							</div>

					        <form role="form" autocomplete="off" class="form-validate-jquery" id="frmModal">
                                                        <div class="modal-body" id="modal-container">

								<div class="alert alert-info alert-styled-left text-blue-800 content-group">
                                                                    <span class="text-semibold">Estimable usuario</span>
                                                                    Los campos remarcados con <span class="text-danger"> * </span> son necesarios.
                                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                                    <input type="hidden" id="txtID" name="txtID" class="form-control" value="">
                                                                    <input type="hidden" id="txtProceso" name="txtProceso" class="form-control" value="">
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                                <!--<label>Codigo</label>-->
                                                                                <input type="hidden" id="txtCodigo" name="txtCodigo" placeholder="AUTOGENERADO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="" disabled="disabled">
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>    
                                                                    
                                                                    
                                                                 <div class="form-group">
                                                                    <div class="row">                        
                                                                        <div class="col-sm-4">
                                                                            <label>Fecha de la operación <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                                                                <input type="text" id="txtF1" name="txtF1" placeholder="AAAA/MM/DD"
                                                                                 class="form-control input-sm" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                            </div>
                                                                        
                                                                                                                                                 
                                                                        
                                                                         </div>
                                                                        
                                                                        
                                                                        
                                                                        <div class="col-sm-8">
                                                                            <label>Cuentas de banco<span class="text-danger">*</span></label>
                                                                            <select  data-placeholder="Seleccione una cuenta de banco..." id="cbDebanco" name="cbDebanco"
                                                                                     class="select-search" style="text-transform:uppercase;"
                                                                                     
                                                                                     onkeyup="javascript:this.value = this.value.toUpperCase();">
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
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                              
                                                                                
                                                                <div class="form-group">
                                                                    <div class="row">     
                                                             
                                                                         <div class="col-sm-12">
                                                                            <label>Cuenta de registro <span class="text-danger">*</span></label>
                                                                            <select  data-placeholder="Seleccione una cuenta de registro..." id="cbDeregistro" name="cbDeregistro"
                                                                                     class="select-search" style="text-transform:uppercase;"
                                                                                     onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                                         <?php
                                                                                        $filas = $objLibrodiario->Listar_Deregistro();
                                                                                        if (is_array($filas) || is_object($filas)) {
                                                                                            foreach ($filas as $row => $column) {
                                                                                                ?>
                                                                                                <option value="<?php print ($column["id_deregistro"]) ?>">
                                                                                                
                                                                                                <?php print ($column["nombre"]) ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                
                                                                            </select>
                                                                        </div>   
                                                                        
                                                                        <!--
                                                                        <div class="col-sm-6">
                                                                            <label for="">Departamento:</label>
                                                                             <select data-placeholder="Seleccione una cuenta de registro..." class="select-search" name="state" id="sel_departamento" style="width:100%">
                                                                                         <?php
                                                                                        $filas = $objLibrodiario->Listar_Deregistro();
                                                                                        if (is_array($filas) || is_object($filas)) {
                                                                                            foreach ($filas as $row => $column) {
                                                                                                ?>
                                                                                                <option value="<?php print ($column["id_deregistro"]) ?>">
                                                                                                
                                                                                                <?php print ($column["nombre"]) ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                
                                                                            </select>
                                                                           </div>
                                                                        -->
                                                                        
                                                                    </div>
                                                                </div>        
                                                                
                                                            
                                                            
                                                            <div class="form-group">
                                                                    <div class="row">

                                                                        
                                                                        <div class="col-sm-6">
                                                                                <label>Cuenta acumulativa</label>
                                                                                <input type="text" id="txtAcumulativa" name="txtAcumulativa" placeholder="Automática de cta. de registro"
                                                                                class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="col-sm-6">
                                                                                <label>Naturaleza</label>
                                                                                <input type="text" id="txtNaturaleza" name="txtNaturaleza" placeholder="Automática de cta. de registro"
                                                                                class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        

                                                                    </div>
                                                                </div>
                                                            
                                                            
                                                                <div class="form-group">
                                                                    <div class="row">

                                                    
                                                                        <div class="col-sm-4">
                                                                                <label>Ingreso</label>
                                                                                <input type="text" id="txtIngreso" name="txtIngreso" placeholder="EJ. 10350"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                                                        
                                                                        <div class="col-sm-4">
                                                                                <label>Egreso</label>
                                                                                <input type="text" id="txtEgreso" name="txtEgreso" placeholder="EJ. 15000"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                                <label>Saldo</label>
                                                                                <input type="text" id="txtSaldo" name="txtSaldo" placeholder="EJ. 25000"
                                                                                 class="form-control">
                                                                        </div>
                                                    
                                                    
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">

                                                                        <div class="col-sm-12">
                                                                                <label>Observaciones</label>
                                                                                <input type="text" id="txtObservaciones" name="txtObservaciones" placeholder="EJ. CARGO AUTOMÁTICO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        

                                                                    </div>
                                                                </div>

                                                            
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                                <!--<label>Id de registro-R</label>--> <!--JCV PARA OCULTA TAMBIÉN LA ETIQUETA-->
                                                                                <!--<input type="text" id="txtidderegistroR" name="txtidderegistroR" placeholder="EL ID CTAS REGISTRO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">-->
                                                                                
                                                                                <input type="text" id="txtidderegistroR" name="txtidderegistroR" class="form-control" value="">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <!--<label>Id de registro-R</label>--> <!--JCV PARA OCULTA TAMBIÉN LA ETIQUETA-->
                                                                                <!--<input type="text" id="txtidderegistroR" name="txtidderegistroR" placeholder="EL ID CTAS REGISTRO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">-->
                                                                                
                                                                                <input type="text" id="txtiddebancosL" name="txtiddebancosL" class="form-control" value="">
                                                                        </div>
                                                                        

                                                                    </div>
                                                                </div>
                                                            

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="checkbox checkbox-switchery switchery-sm">
                                                                                    <label>
                                                                                    <input type="checkbox" id="chkEstado" name="chkEstado"
                                                                                     class="switchery" checked="checked" >
                                                                                     <span id="lblchk">VIGENTE</span>
                                                                                 </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                        </div>

								<div class="modal-footer">
									<button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
									<button id="btnEditar" type="submit" class="btn btn-warning">Editar</button>
									<button  type="reset" class="btn btn-default" id="reset"
									class="btn btn-link" data-dismiss="modal">Cerrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
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
<script type="text/javascript" src="web/custom-js/listar_campo.js"></script>   <!-- jcv PONER LA RUTA DE DONDE ESTA EL ARCHIVO A PARTIR DEL ROOT NO IMPORTA DONDE SE ENCUETRE ESTE ARCHIVO-->
<script type="text/javascript" src="web/custom-js/librodiario.js"></script>


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
    
    
    
    
    
     $('.dataTables_filter').change(function(){
          
           //alert('hola');
            //listar_campo(id_deregistro);
           
        })
    
  
  
   $(document).ready(function () {
    $('#tablaparabuscarporbancos').DataTable({
        initComplete: function () {
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
    });
});
  
  
  
  
  
    
</script>