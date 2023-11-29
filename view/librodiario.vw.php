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
                                    
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <h5 class="panel-title">Libro Diario / Movimientos</h5>
                                        </div>
                                        
                                        <div class="col-md-2">
                                                    <span ></span>
                                        </div>
 
                                        <div class="col-md-3">
                                            <span id="loader"></span>
                                        </div>
                                    
                                    
                                    
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
                                   
                                    
                                </div>
                                
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
                                                                <th style="visibility:collapse; display:none;">Saldo</th>
                                                                <th>Observaciones</th>
								<th>Cta acumulativa</th>
                                                                <th>Cta. de banco</th>
                                                                <th style="visibility:collapse; display:none;"> Id-R</th> 
                                                                <th style="visibility:collapse; display:none;">Id-B</th>   
                                                                <!--<th style="visibility:collapse; display:none;">Id-R</th> -->
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
                            
                            
  <!--     JCV LOS PONGO EN COMENTARIO PARA QUE NO APAREZCAN OS SALDO SDE INGRESOS, EGRESOS Y SALDO TOTAL SI QUIERO QUE APAREZCAN QUITO EL COMENTARIO SI FUNCIONAN                     -->
                            <div class="row" style=" display: flex; justify-content: center; align-items: center; " id="saldototal">

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
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                            
                                                                <div class="form-group">
                                                                    <div class="row">

                                                    
                                                                        <div class="col-sm-3">
                                                                                <label>Monto $</label>
                                                                                <input type="text" id="txtIngreso" name="txtIngreso" placeholder="EJ. 10350"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                           
                                                                        <!-- SÓLO DEBE HABER UNA CANTIDAD DE MONTO INGRESO O EGRESO, NI SALDO
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
                                                                        -->
                                                                        
                                                                        <div class="col-sm-9">
                                                                                <label>Observaciones</label>
                                                                                <input type="text" id="txtObservaciones" name="txtObservaciones" placeholder="EJ. CARGO AUTOMÁTICO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        
                                                                    </div>
                                                                </div>

                                                                <!--
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

                                                            -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                                <!--<label>Id de registro-R</label>--> <!--JCV PARA OCULTA TAMBIÉN LA ETIQUETA-->
                                                                                <!--<input type="text" id="txtidderegistroR" name="txtidderegistroR" placeholder="EL ID CTAS REGISTRO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">-->
                                                                                
                                                                                <input type="hidden" id="txtidderegistroR" name="txtidderegistroR" class="form-control" value="">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                                <!--<label>Id de bancos-L</label>--> <!--JCV PARA OCULTA TAMBIÉN LA ETIQUETA-->
                                                                                <!--<input type="text" id="txtiddebancosL" name="txtiddebancosL" placeholder="EL ID CTAS REGISTRO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">-->
                                                                                
                                                                                <input type="hidden" id="txtiddebancosL" name="txtiddebancosL" class="form-control" value="">
                                                                        </div>
                                                                        
                                                                        <div class="col-sm-4">
                                                                                <!--<label>Id de bancos-L</label>--> <!--JCV PARA OCULTA TAMBIÉN LA ETIQUETA-->
                                                                                <!--<input type="text" id="txtiddebancosL" name="txtiddebancosL" placeholder="EL ID CTAS REGISTRO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">-->
                                                                                
                                                                                <input type="text" id="txtidacumulativa" name="txtidacumulativa" class="form-control" value="">
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