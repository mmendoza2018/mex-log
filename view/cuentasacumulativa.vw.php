<?php

	$objCuentasacumulativa =  new Cuentasacumulativa();

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Catálogo de cuentas</a></li>
						<li class="active">Cuentas acumulativas</li>
					</ul>
				</div>
					<div class="panel-heading">
						<h5 class="panel-title">Cuentas acumulativas</h5>

						<div class="heading-elements">
							<button type="button" class="btn btn-primary heading-btn"
							onclick="newCuentasacumulativa()">
							<i class="icon-database-add"></i> Agregar Nueva</button>

							<div class="btn-group">
		                    	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
		                    	<i class="icon-printer2 position-left"></i> Imprimir Reporte
		                    	<span class="caret"></span></button>
		                    	<ul class="dropdown-menu dropdown-menu-right">
									<li><a id="print_activos" href="javascript:void(0)"
									><i class="icon-file-pdf"></i> Cuentas acumulativas Activas</a></li>
									<li class="divider"></li>
									<li><a id="print_inactivos" href="javascript:void(0)">
									<i class="icon-file-pdf"></i> Cuentas acumulativas Inactivas</a></li>
								</ul>
							</div>


						</div>
					</div>
					<div class="panel-body">
					</div>
					<div id="reload-div">
					<table class="table datatable-basic table-xxs table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Código</th>
                                                                <th>Nombre</th>
                                                                 <th>Orden flujo efectivo</th>
                                                                 <!--<th>id Tipo de gasto</th>-->
                                                                 <th>Tipo de gasto</th>
                                                                 <!--<th>id Atributo</th> -->
                                                                 <th>Nombre atributo</th>
								<th>Estado</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>

						<tbody>

						  <?php
								$filas = $objCuentasacumulativa->Listar_Cuentasacumulativa();
								if (is_array($filas) || is_object($filas))
								{
								foreach ($filas as $row => $column)
								{
								?>
									<tr>
					                	<td><?php print($column['id_acumulativa']); ?></td>
                                                                <td><?php print($column['codigo_acumulativa']); ?></td>
					                	<td><?php print($column['nombre']); ?></td>
                                                                <td><?php print($column['nivel']); ?></td>
                                                                <!--<td><?php/* print($column['id_tipodegasto']);*/ ?></td>-->
                                                                <td><?php print($column['nombre_tipodegasto']); ?></td>
                                                                <!--<td><?php /*print($column['id_atributo']);*/ ?></td>-->
                                                                <td><?php print($column['nombre_atributo']); ?></td>
                                                                
					                	
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
													onclick="openCuentasacumulativa('editar',
								                     '<?php print($column["id_acumulativa"]); ?>',
                                                                                     '<?php print($column["codigo_acumulativa"]); ?>',
								                     '<?php print($column["nombre"]); ?>',
                                                                                     '<?php print($column["nivel"]); ?>',
                                                                                     '<?php /*print($column["id_tipodegasto"]);*/ ?>',
                                                                                     '<?php print($column["nombre_tipodegasto"]); ?>',
                                                                                     '<?php /*print($column["id_atributo"]);*/ ?>',
                                                                                     '<?php print($column["nombre_atributo"]); ?>',
								                     
								                     '<?php print($column["estado"]); ?>')">
												   <i class="icon-pencil6">
											       </i> Editar</a></li>
													<li><a
													href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
													onclick="openCuentasacumulativa('ver',
																		'<?php print($column["id_acumulativa"]); ?>',
                                                                                                                                                '<?php print($column["codigo_acumulativa"]); ?>',
																		'<?php print($column["nombre"]); ?>',
                                                                                                                                                '<?php print($column["nivel"]); ?>',
                                                                                                                                                '<?php /*print($column["id_tipodegasto"]); */?>',
                                                                                                                                                '<?php print($column["nombre_tipodegasto"]); ?>',
                                                                                                                                                '<?php /*print($column["id_atributo"]);*/ ?>',
                                                                                                                                                '<?php print($column["nombre_atributo"]); ?>',
																		
																		'<?php print($column["estado"]); ?>')">
													<i class=" icon-eye8">
													</i> Ver</a></li>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                        <li><a id="delete_cuentasacumulativa"
                                                                                                        data-id="<?php print($column['id_acumulativa']); ?>"
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
				</div>

			<!-- Iconified modal  JCV PARA AGREGAR MAS acumulativa CRUD DE acumulativa -->
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
                                                                    <span class="text-semibold">Estimado usuario</span>
                                                                    Los campos remarcados con <span class="text-danger"> * </span> son necesarios.
                                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                                    <input type="hidden" id="txtID" name="txtID" class="form-control" value="">
                                                                    <input type="hidden" id="txtProceso" name="txtProceso" class="form-control" value="">
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            
                                                                                <label>Codigo <span class="text-danger">*</span> </label>
                                                                                <input type="text" id="txtCodigo" name="txtCodigo" placeholder="EJ. 1010"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        
                                                                        <div class="col-sm-8">
                                                                                <label>Nombre <span class="text-danger">*</span></label>
                                                                                <input type="text" id="txtNombre" name="txtNombre" placeholder="OPERATIVO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="col-sm-2">
                                                                                <label>Orden para flujo de efectivo <span class="text-danger">*</span></label>
                                                                                <input type="text" id="txtNivel" name="txtNivel" placeholder="EJ. 01"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                           
                                                                

                                                                <div class="form-group">
                                                                    <div class="row">

                                                                        

                                                                        <div class="col-sm-3">
                                                                            <!--<label>id Tipo de gasto <span class="text-danger">*</span></label> -->
                                                                            <input type="hidden" id="txtTipodegasto" name="txtTipodegasto" placeholder="EJ 1"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                
                                                                        </div>
                                                                        
                                                                        <div class="col-sm-6">
                                                                            <!--<label>Nombre de tipo de gasto <span class="text-danger">*</span></label>-->
                                                                            <input type="hidden" id="txtNombretipodegasto" name="txtNombretipodegasto" placeholder="EJ. VARIABLE"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                        <div class="col-sm-6">
                                                                            <label>Tipo de gasto <span class="text-danger">*</span></label>
                                                                            <select  data-placeholder="Seleccione un tipo de gasto..." id="cbTipodegasto" name="cbTipodegasto"
                                                                                     class="select-search" style="text-transform:uppercase;"
                                                                                     onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                                        <?php
                                                                                        $filas = $objCuentasacumulativa->Listar_Tipodegasto();
                                                                                        if (is_array($filas) || is_object($filas)) {
                                                                                            foreach ($filas as $row => $column) {
                                                                                                ?>
                                                                                                <option value="<?php print ($column["nombre"]) ?>">
                                                                                                <?php print ($column["nombre"]) ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                        <div class="col-sm-6">
                                                                            <label>Atributo <span class="text-danger">*</span></label>
                                                                            <select  data-placeholder="Seleccione un Atributo..." id="cbAtributo" name="cbAtributo"
                                                                                     class="select-search" style="text-transform:uppercase;"
                                                                                     onkeyup="javascript:this.value = this.value.toUpperCase();">
                                                                                        <?php
                                                                                        $filas = $objCuentasacumulativa->Listar_Atributo();
                                                                                        if (is_array($filas) || is_object($filas)) {
                                                                                            foreach ($filas as $row => $column) {
                                                                                                ?>
                                                                                                <option value="<?php print ($column["nombre"]) ?>">
                                                                                                <?php print ($column["nombre"]) ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>

                                                                
                                                                
                                                                <!--jcv ejemplo de combobox-->
                                                            
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                                <div class="form-group">
                                                                    <div class="row">

                                                                        <div class="col-sm-3">
                                                                                <!--<label>id de Atributo <span class="text-danger">*</span></label>-->
                                                                                <input type="hidden" id="txtidAtributo" name="txtidAtributo" placeholder="EJ 1"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-9">
                                                                            <!--<label>Nombre de atributo <span class="text-danger">*</span></label>-->
                                                                                <input type="hidden" id="txtNombreatributo" name="txtNombreatributo" placeholder="EJ. ADMINISTRATIVO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                
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
<script type="text/javascript" src="web/custom-js/cuentasacumulativa.js"></script>
