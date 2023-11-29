<!-- Top Bar Start -->
<div class="topbar">

	<!-- LOGO -->
	<div class="topbar-left">
		<div class="text-center">
			<a href="#" class="logo"><i class="mdi mdi-radar"></i> <span>Punto de Venta GT</span></a>
		</div>
	</div>

	<!-- Button mobile view to collapse sidebar menu -->
	<nav class="navbar-custom">

		<ul class="list-inline float-right mb-0">
			<li class="list-inline-item notification-list hide-phone">
				<a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
					<i class="mdi mdi-crop-free noti-icon"></i>
				</a>
			</li>

			<li class="list-inline-item dropdown notification-list">
				<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
				aria-haspopup="false" aria-expanded="false">
				<img src="../../assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

				<!-- item-->
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<i class="mdi mdi-account-star-variant"></i> <span>Perfil</span>
				</a>

				<!-- item-->
				<a href="../../login.php?logout" class="dropdown-item notify-item">
					<i class="mdi mdi-logout"></i> <span>Cerrar Sesión</span>
				</a>

			</div>
		</li>

	</ul>

	<ul class="list-inline menu-left mb-0">
		<li class="float-left">
			<button class="button-menu-mobile open-left waves-light waves-effect">
				<i class="mdi mdi-menu"></i>
			</button>
		</li>
	</ul>

</nav>

</div>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<!--- Divider -->
		<div id="sidebar-menu">
			<ul>
				<li>
					<a href="principal.php" class="waves-effect waves-primary"><img src="../../img/025-arquitectura-y-ciudad.png" alt="inicio" width="30"> </i><span> Inicio </span></a>
					</li>
					<li>
						<a href="../html/clientes.php" class="waves-effect waves-primary"><img src="../../img/003-equipo-1.png" alt="clientes" width="30"></i><span> Clientes </span></a>
						</li>
						<li>
							<a href="../html/proveedores.php" class="waves-effect waves-primary"><img src="../../img/002-manufacturing.png" alt="proveedores" width="30"></i><span> Proveedores </span></a>
							</li>
							<li class="has_sub">
								<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/016-coche-2.png" alt="autos" width="30"></i><span> Productos </span>
									<span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="../html/lineas.php"><img src="../../img/marcas2.png" alt="exit" height="20" width="20">Categorias</a></li>
										<li><a href="../html/productos.php"><img src="../../img/016-coche-2.png" alt="exit" height="20" width="20">Productos</a></li>
										<li><a href="../html/kardex.php"><img src="../../img/001-red.png" alt="exit" height="20" width="20">Kardex</a></li>
										<li><a href="../html/ajustes.php"><img src="../../img/009-manual.png" alt="exit" height="20" width="20">Ajuste de Inventario</a></li>
									</ul>
								</li>

								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/015-automovil.png" alt="compras" width="30"></i><span> Compras </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="../html/new_compra.php"><img src="../../img/007-bag.png" alt="exit" height="20" width="20">Nueva Compra</a></li>
										<li><a href="../html/bitacora_compras.php"><img src="../../img/marcs.png" alt="exit" height="20" width="20">Historial de Compras</a></li>
									</ul>
								</li>

								<!--<li>
									<a href="../html/traslados.php" class="waves-effect waves-primary"><i
										class="ti-truck"></i><span> Traslados </span></a>
									</li>-->

									<li class="has_sub">
										<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/034-dinero.png" alt="ventas" width="30"></i><span> Ventas
										</span> <span class="menu-arrow"></span></a>
										<ul class="list-unstyled">
											<li><a href="../html/new_venta.php"><img src="../../img/008-shopping-online-1.png" alt="nueva venta" height="20" width="20">Nueva Venta</a></li>
											<li><a href="../html/bitacora_ventas.php"><img src="../../img/013-bill.png" alt="listado" height="20" width="20">Historial de Ventas</a></li>
											<!--<li><a href="../html/caja.php">Caja</a></li>-->
										</ul>
									</li>
									<li class="has_sub">
										<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/012-files-and-folders.png" alt="presupuestos" width="30"></i><span> Cotización
										</span> <span class="menu-arrow"></span></a>
										<ul class="list-unstyled">
											<li><a href="../html/new_cotizacion.php"><img src="../../img/015-diploma.png" alt="nuevo" height="20" width="20">Nueva Cotización</a></li>
											<li><a href="../html/bitacora_cotizacion.php"><img src="../../img/016-car-2.png" alt="listado" height="20" width="20">Historial de Cotizacíon</a></li>
										</ul>
									</li>
										<li class="has_sub">
										<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/012-business-and-finance.png" alt="recibos" width="30"></i><span> Cobros y Pagos </span>
												<span class="menu-arrow"></span></a>
												<ul class="list-unstyled">
													<li><a href="../html/cxc.php"><img src="../../img/010-ticket.png" alt="recibos" height="20" width="20">Pago Cliente</a></li>
													<li><a href="../html/cxp.php"><img src="../../img/009-almacenar.png" alt="pagoproveedores" height="20" width="20">Pago Proveedor</a></li>
												</ul>
											</li>

											<li class="has_sub">
												<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/026-diagrama.png" alt="reportes" width="30"><span> Reportes </span> <span class="menu-arrow"></span></a>
												<ul class="list-unstyled">
													<a href="../html/rep_producto.php"><img src="../../img/016-coche-2.png" alt="exit" height="20" width="20"> Productos</a></li>
													<li><a href="../html/rep_ventas.php"><img src="../../img/005-compras.png" alt="exit" height="20" width="20"> Ventas</a></li>
													<li><a href="../html/rep_ventas_users.php"><img src="../../img/035-costo.png" alt="exit" height="20" width="20"> Usuarios</a></li>
													<li><a href="../html/rep_compras.php"><img src="../../img/015-automovil.png" alt="exit" height="20" width="20"> Compras</a></li>
													<!--<li><a href="../html/rep_caja_chica.php">Reporte Caja chica</a></li>-->
													<li><a href="../html/rep_caja_general.php"><img src="../../img/005-analitica.png" alt="exit" height="20" width="20">Corte Generales</a></li>
													<li><a href="../html/rep_financiero.php"><img src="../../img/006-analitica-1.png" alt="exit" height="20" width="20"> Financiero</a></li>
												</ul>
											</li>

											<li class="has_sub">
												<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/022-gear.png" alt="opciones" width="30"></i><span> Configuración </span> <span class="menu-arrow"></span></a>
												<ul class="list-unstyled">
													<li><a href="../html/empresa.php"><img src="../../img/empresa.png" alt="exit" height="20" width="20">Empresa</a></li>
													<!--<li><a href="../html/sucursales.php"><img src="../../img/direccion.png" alt="exit" height="20" width="20">Sucursales</a></li>-->
													<li><a href="../html/comprobantes.php"><img src="../../img/010-ticket.png" alt="exit" height="20" width="20">Comprobantes</a></li>
													<!--<li><a href="../html/impuestos.php">Impuestos</a></li>-->
													<li><a href="../html/grupos.php"><img src="../../img/clientes.png" alt="exit" height="20" width="20">Grupos de Usuarios</a></li>
													<li><a href="../html/usuarios.php"><img src="../../img/acceso.png" alt="exit" height="20" width="20">Usuario</a></li>
													<li><a href="../html/backup.php"><img src="../../img/002-base-de-datos-1.png" alt="exit" height="20" width="20">Backup</a></li>
													<li><a href="../html/restore.php"><img src="../../img/001-base-de-datos.png" alt="exit" height="20" width="20">Restore</a></li>
												</ul>
											</li>
										<li class="has_sub">
												<a href="javascript:void(0);" class="waves-effect waves-primary"><img src="../../img/021-exit.png" alt="exit" width="30"><span> Salir </span> <span class="menu-arrow"></span></a>
												<ul class="list-unstyled">
												<a href="../../login.php?logout" class="dropdown-item notify-item">
													<img src="../../img/021-exit.png" alt="exit" height="20" width="20"><span>Cerrar Sesión</span>
												</a>
												</ul>
											</li>

										</ul>

										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<!-- Left Sidebar End -->
