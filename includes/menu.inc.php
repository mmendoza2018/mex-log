
<input style="display: none"  type="text" class="form-control" id="rutaraiz" name="rutaraiz" value=<?php print(RUTA_RAIZ); ?> >  
<li ><a href="./?View=Inicio"><i class="icon-home4"></i> <span>Inicio</span></a></li>
 
<?php  if($tipo_usuario == '1'){ ?>

 
    <!-- JCV MODELO DE JCV -->
   <!--
    <li>
            <a href="#"><i class="icon-cart"></i> <span>Modelo JCV</span></a>
            <ul>
                    <li><a href="./?View=CuentasBancos">Cuentas</a></li>
                    <li><a href="./?View=POS">Realizar Ventas</a></li>
                    <li><a href="./?View=Venta-Diaria">Consultar Ventas del Dia</a></li>
                    <li><a href="./?View=Ventas-Fecha">Consultar Ventas por Fecha</a></li>
                    <li><a href="./?View=Ventas-Mes">Consultar Ventas por Mes</a></li>
            </ul>
    </li>
    --> 
    <!-- /MODELO DE JCV -->
  
    
    
    
    <!-- JCV COMBOS JCV-->

    <li>
        <a href="#"><i class="icon-coins"></i> <span>Combos</span></a>
        <ul>
            <li><a href="./?View=Combos">Crear combos</a></li>
 
        </ul>
    </li>

    <!-- JCV VENTAS JCV-->
    
    
    
    
    

    <!-- JCV COTIZACIÓN JCV-->

    <!--<li class="active"> -->
    <li>   <!--MENUS-->
 
        <a href="#"><i class="icon-cart"></i> <span>Cotización Advance</span></a>
        <ul> <!-- SUBMENUS-->
            <!--<li><a href="./vistas/html/new_cotizacionJCV.php">Nueva cotización</a></li> -->
             
            <li><a class="submenu" href="./?View=NuevaCotizacionOK">Nueva cotización</a></li> 
            <li><a href="./?View=HistorialCotizacion">Historial de cotizaciones</a></li>

           <!-- JCV SIN USAR EL VIEW <li><a href="../admin/loginOKJCV.PHP">Nueva cotización2</a></li> -->
           <!-- JCV SI ES EL BUENO PERO YA LO SEPARÉ Y ESTÁ ABAJO EN CUENTAS X COBRAR 
           <li><a href="./?View=PagoCliente">Pagos de clientes</a></li>
           -->
           <!--JCV YA ESTÁ ABAJO DE ESTE <li><a href="./?View=HistorialVentas">Historial de ventas</a></li>-->
           <!-- 
           <li><a href="./?View=AbonosClientes">Abonos clientes</a></li> 
-->
        </ul>
    </li> 

    <!-- JCV COTIZACIÓN JCV-->


     <!-- JCV VENTAS JCV-->

    <li>
        <a href="#"><i class="icon-coins"></i> <span>Ventas</span></a>
        <ul>
            <li><a href="./?View=HistorialVentas">Historial de ventas</a></li>
 
        </ul>
    </li>

    <!-- JCV VENTAS JCV-->
          
    
    <!-- JCV ORDENES DE COMPRA JCV-->

    <li> 

            <a href="#"><i class="icon-clipboard"></i> <span>Órdenes de compra</span></a>
            <ul>
                <!--<li><a href="./?View=CotizacionJCV">CotizaciónJCV</a></li>-->
                <!--<li><a href="../admin/vistas/html/new_cotizacionOKJCV.PHP">CotizaciónJCV</a></li>-->

                <!--JCV ES TA ES LA BUENA OK:
                -->
                 <li><a href="./?View=NuevaOrdenCompraOK">Nueva orden de compra</a></li> 

                <!--<li><a href="./?View=NuevaOrdenCompra">Nueva orden de compra</a></li> -->

                <!--<li><a href="../admin/loginOKJCV.PHP">Nueva orden de compra</a></li>-->

                <!--
                <li><a href="../admin/vistas/html/bitacora_cotizacionCOT.php">Historial de cotizaciones</a></li>
                -->
               <li><a href="./?View=HistorialCompras">Historial de órdenes</a></li>

               <!-- JCV SIN ESTAR EN SOLO PANTALLA INTERNA<li><a href="./vistas/html/new_compraOKJCV2.php">OTRA orden de compra</a></li> -->

            </ul>
    </li>

          <!-- JCV ORDENES DE COMPRA JCV-->


     <!-- JCV EQUIPOS A COMPAR JCV-->

    <li>
          <a href="#"><i class="icon-calculator3"></i> <span>Equipos a comprar</span></a>
            <ul>
                
               <li><a href="./?View=HistorialEquiposaComprar">Historial de equipos a comprar</a></li>
               <li><a href="./?View=HistorialEquiposaComprar">Pagos a proveedores</a></li>

            </ul>
    </li>
    <!-- JCV EQUIPOS A COMPAR JCV-->


    <!-- JCV CUENTAS X COBRAR JCV-->

    <li>

        <a href="#"><i class="icon-coin-dollar"></i> <span>Cuentas x cobrar</span></a>
        <ul>
           
            <li><a href="./?View=PagoCliente">Pagos de clientes</a></li>
            
           <!-- <li><a href="./?View=AbonosClientes">Abonos clientes</a></li> -->

        </ul>
    </li> 

     <!-- JCV CUENTAS X COBRAR JCV--> 
    
    
      
     <!-- JCV LIBRO DIARIO-->

    <li>
            <a href="#"><i class="icon-book3"></i> <span>Libro diario</span></a>
            <ul>
                    <li><a href="./?View=LibroDiario">Movimientos</a></li>


            </ul>
    </li>

       <!-- JCV LIBRO DIARIO-->
     
     
       
        <!-- JCV FLUJO DE EFECTIVO-->

    <li>

            <a href="#"><i class="icon-cash3"></i> <span>Flujo de efectivo</span></a>
            <ul>
                    <li><a href="./?View=FlujoEfectivo">Análisis del flujo</a></li>
                    <li><a href="./?View=FlujoEfectivo">Al día</a></li>


            </ul>
    </li>

         <!-- JCV FLUJO DE EFECTIVO-->


    

    <!-- JCV REPORTES FINANCIEROS STORE MANAGER-->
<li class="list-header">Components</li>
    <li>

            <a href="#"><i class="icon-stats-dots"></i> <span>Store Manager</span></a>
            <ul>
                    <li><a href="./?View=ReporteMercadotecnia">Mercadotecnia</a></li>
                    <li><a href="./?View=ReporteEdoresultados">Estado de resultados</a></li>
                    <li><a href="./?View=ReporteFlujoefectivo">Flujo de efectivo</a></li>
                    <li><a href="./?View=ReporteCuentasxcobrar">Cuentas por cobrar</a></li>
                    <li><a href="./?View=ReporteInventario">Inventarios</a></li>
                    <li><a href="./?View=ReporteActivofijo">Activo fijo</a></li>
                    <li><a href="./?View=ReporteProveedores">Proveedores</a></li>
                    <li><a href="./?View=ReporteOtrospasivos">Otros pasivos</a></li>
                    <li><a href="./?View=ReporteComparativas">Comparativas</a></li>
                    <li><a href="./?View=ReporteEficiencia">Eficiencia, gestión, retorno, liquidez y solvencia</a></li>


            </ul>
    </li>

          <!-- JCV REPORTES FINANCIEROS-->






    <!-- JCV ESTADO DE RESULTADOS-->

    <li> 

            <a href="#"><i class="icon-sigma"></i> <span>Estado de resultados</span></a>
            <ul>
                    <li><a href="./?View=EstadoResultados1">Primer semestre</a></li>
                    <li><a href="./?View=EstadoResultados2">Segundo semestre</a></li>

                    <li><a href="./?View=CommonSize1">Common size 1 sem.</a></li>
                    <li><a href="./?View=EstadoResultados1">Common size 2 sem.</a></li>
            </ul>
    </li>

          <!-- JCV ESTADO DE RESULTADOS-->



   

    



    <!-- JCV CATALOGO DE CUENTAS-->

    <li>
            <a href="#"><i class="icon-books"></i> <span>Catálogo de cuentas</span></a>
            <ul>
                    <li><a href="./?View=CuentasDeregistro">Cuentas de registro</a></li>

                    <li><a href="./?View=CuentasAcumulativa">Cuentas acumulativas</a></li>
                    <li><a href="./?View=CuentasTipodegasto">Tipo de gasto</a></li>
                    <li><a href="./?View=CuentasAtributos">Atributos</a></li>
            </ul>
    </li>

    <!-- /JCV CATALOGO DE CUENTAS -->


    <!-- Cuentas de bancos OK -->

    <li>
            <a href="#"><i class="icon-library2"></i> <span>Cuentas de Bancos </span></a>
            <ul>
                    <li><a href="./?View=CuentasDebancos">Cuentas</a></li>
                    <!--<li><a href="./?View=POS">Tipo de gasto</a></li>-->
            <!--	<li><a href="./?View=Venta-Diaria">Consultar Ventas del Dia</a></li>
                    <li><a href="./?View=Ventas-Fecha">Consultar Ventas por Fecha</a></li>
                    <li><a href="./?View=Ventas-Mes">Consultar Ventas por Mes</a></li>
            -->
            </ul>
    </li>
    <!-- Cuentas de bancos OK -->


    <!-- JCV Cuentas de bancos DE JCV  COMO MODEL PARA LOS DEMAS -->

   <!--
    <li>
            <a href="#"><i class="icon-sphere"></i> <span>Cuentas de Bancos JCV</span></a>
            <ul>
                    <li><a href="./?View=CuentasdeBancosJCV">Cuentas</a></li>

            </ul>
    </li>
    -->
    <!-- /Cuentas de bancos DE JCV -->

    <!-- Pedidos -->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-cart"></i> <span>Pedidos</span></a>
            <ul>
                    <li><a href="./?View=Clientes">Prospectos</a></li>
                    <li><a href="./?View=Pedidos">Realizar Pedido</a></li>
                    <li><a href="./?View=#">Equipos a comprar</a></li>
                    <li><a href="./?View=#">Equipos comprados</a></li>
                    <li><a href="./?View=#">Categorias de pedidos</a></li>
            </ul>
    </li>
    -->
    <!-- /Pedidos -->

    
    
    <!-- Almacen JCV QUITARLO TEMPORALMENTE 23 OCT 2023-->
   
    <li>
            <a href="#"><i class="icon-box"></i> <span>Almacen</span></a>
            <ul>
                    <li><a href="./?View=Categoria">Categoria</a></li>
                    <li><a href="./?View=Presentacion">Presentacion</a></li>
                    <li><a href="./?View=Marca">Marca</a></li>
                    <li><a href="./?View=Producto">Producto</a></li>

                    <li><a href="./?View=Perecederos">Perecederos</a></li>
            </ul>
    </li>
    <!-- /Almacen -->

   
    
    <li>
            <a href="#"><i class="icon-cart"></i> <span>Equipos y refacciones</span></a>
            <ul>
                    <li><a href="./?View=Equipos">Equipos</a></li>
                    
            </ul>
    </li>
    
    
    
    <!-- Inventario JCV QUITARLO TEMPORALMENTE 23 OCT 2023-->
    <!--
    <li>
            <a href="#"><i class="icon-grid6"></i> <span>Inventario</span></a>
            <ul>
                    <li><a href="./?View=Abrir-Inventario">Abrir Nuevo Inventario</a></li>
                    <li><a href="./?View=Kardex">Kardex</a></li>
            </ul>
    </li>-->
    <!-- /Inventario -->

    <!-- Cotizaciones -->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-file-spreadsheet"></i> <span>Cotizaciones</span></a>
            <ul>
                    <li><a href="./?View=Cotizacion">Generar Cotizacion</a></li>
                    <li><a href="./?View=Cotizaciones">Ver Cotizaciones</a></li>
            </ul>
    </li>
    -->
    <!-- /Cotizaciones -->


    <!-- Compras -->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-truck"></i> <span>Compras</span></a>
            <ul>
                    <li><a href="./?View=Proveedor">Proveedores</a></li>
                    <li><a href="./?View=Compras">Realizar Compras</a></li>
                    <li><a href="./?View=Compras-Fecha">Consultar Compras por Fecha</a></li>
                    <li><a href="./?View=Compras-Mes">Consultar Compras por Mes</a></li>
                    <li><a href="./?View=Historico-Precios">Historial de Precios</a></li>
            </ul>
    </li>
-->

    <!-- Compras al Credito -->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-coins"></i> <span>Compras al Credito</span></a>
            <ul>
                    <li><a href="./?View=CreditosProveedor">Administrar Creditos</a></li>
            </ul>
    </li>
    -->
    <!-- /Compras -->

    <!-- Caja -->
<!--	<li>
            <a href="#"><i class="icon-cash3"></i> <span>Caja</span></a>
            <ul>
                    <li><a href="./?View=Caja">Administrar Caja</a></li>
                    <li><a href="./?View=Historico-Caja">Historial de Caja</a></li>
            </ul>
    </li>  -->
    <!-- /Caja -->

    <!-- Ventas JCV QUITARLO TEMPORALMENTE 23 OCT 2023-->
    
    <li>
            <a href="#"><i class="icon-cart"></i> <span>Clientes</span></a>
            <ul>
                    <li><a href="./?View=Clientes">Clientes</a></li>
                    <!--<li><a href="./?View=POS">Realizar Ventas</a></li>
                    <li><a href="./?View=Venta-Diaria">Consultar Ventas del Dia</a></li>
                    <li><a href="./?View=Ventas-Fecha">Consultar Ventas por Fecha</a></li>
                    <li><a href="./?View=Ventas-Mes">Consultar Ventas por Mes</a></li>
                    -->
            </ul>
    </li>
    <!-- /Ventas -->

    <!-- Ventas -->
<!-- JCV NO						<li>
            <a href="#"><i class="icon-price-tags2"></i> <span>Apartados</span></a>
            <ul>
                    <li><a href="./?View=POS-A">Apartar Productos</a></li>
                    <li><a href="./?View=Apartados-Diarios">Consultar Apartados del Dia</a></li>
                    <li><a href="./?View=Apartados-Fecha">Consultar Apartados por Fecha</a></li>
                    <li><a href="./?View=Apartados-Mes">Consultar Apartados por Mes</a></li>
            </ul>
    </li>

-->
<!-- /Ventas -->

    <!-- Creditos -->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-coins"></i> <span>Ventas al Credito</span></a>
            <ul>
                    <li><a href="./?View=Creditos">Administrar Creditos</a></li>
            </ul>
    </li>
    -->
    <!-- /Creditos -->




    <!-- Taller  --->
    <!--JCV LUEGO PONER
    <li>
            <a href="#"><i class="icon-hammer-wrench"></i> <span>Ordenes de servicio</span></a>
            <ul>
                    <li><a href="./?View=#">Generar</a></li>
                    <li><a href="./?View=Tecnicos">Ingenieros</a></li>
            </ul>
    </li>-->
    <!-- Taller --->

    <!-- Documentos JCV QUITARLO TEMPORALMENTE 23 OCT 2023-->
    <!--
    <li>
            <a href="#"><i class="icon-certificate"></i><span>Comprobantes</span></a>
            <ul>
                    <li><a href="./?View=Tipo-Comprobante">Tipo de Comprobante</a></li>
                    <li><a href="./?View=Tirajes">Tiraje de Comprobantes</a></li>
            </ul>
    </li>-->
    <!-- /Documentos -->



    <!-- Usuarios -->
    <li>
            <a href="#"><i class="icon-users"></i> <span>Usuarios</span></a>
            <ul>
                    <li><a href="./?View=Empleados">Empleados</a></li>
                    <li><a href="./?View=Usuario">Usuario</a></li>

            </ul>
    </li>
    <!-- /Usuarios -->

    <!-- Ajustes -->
    <li>
            <a href="#"><i class="icon-cog2"></i> <span>Parametros</span></a>
            <ul>
<!--JCV NO                                                                <li><a href="./?View=Monedas">Monedas</a></li>  -->
                    <li><a href="./?View=Parametros">Datos de la empresa</a></li>
            </ul>
    </li>
    <!-- /Ajustes -->

    <!-- /Acera de -->
    <li>
            <a href="./?View=Acerca-de"><i class="icon-info22"></i> <span> Acerca de </span></a>
    </li>
    <!--Acerca de  -->

<?php } else { ?>

    <!-- Almacen -->
    <li>
            <a href="#"><i class="icon-box"></i> <span>Almacen</span></a>
            <ul>
                    <li><a href="./?View=Producto">Producto</a></li>
            </ul>
    </li>
    <!-- /Almacen -->

    <!-- Cotizaciones -->
    <li>
            <a href="#"><i class="icon-file-spreadsheet"></i> <span>Cotizaciones</span></a>
            <ul>
                    <li><a href="./?View=Cotizacion">Generar Cotizacion</a></li>
                    <li><a href="./?View=Cotizaciones">Ver Cotizaciones</a></li>
            </ul>
    </li>
    <!-- /Cotizaciones -->

    <!-- Caja -->
    <li>
            <a href="#"><i class="icon-cash3"></i> <span>Caja</span></a>
            <ul>
                    <li><a href="./?View=Caja">Administrar Caja</a></li>
            </ul>
    </li>
    <!-- /Caja -->

    <!-- Ventas -->
    <li>
            <a href="#"><i class="icon-cart"></i> <span>Ventas</span></a>
            <ul>
                    <li><a href="./?View=Clientes">Clientes</a></li>
                    <li><a href="./?View=POS">Punto de Venta</a></li>
                    <li><a href="./?View=Venta-Diaria">Consultar Ventas del Dia</a></li>
                    <li><a href="./?View=Ventas-Fecha">Consultar Ventas por Fecha</a></li>
                    <li><a href="./?View=Ventas-Mes">Consultar Ventas por Mes</a></li>
            </ul>
    </li>
    <!-- /Ventas -->

    <!-- Creditos -->
    <li>
            <a href="#"><i class="icon-coins"></i> <span>Ventas al Credito</span></a>
            <ul>
                    <li><a href="./?View=Creditos">Administrar Creditos</a></li>
            </ul>
    </li>
    <!-- /Creditos -->

    <!-- Inventario -->
    <li>
            <a href="#"><i class="icon-grid6"></i> <span>Inventario</span></a>
            <ul>
                    <li><a href="./?View=Kardex">Kardex</a></li>
            </ul>
    </li>
    <!-- /Inventario -->

    <!-- /Acera de -->
    <li>
            <a href="./?View=Acerca-de"><i class="icon-info22"></i> <span> Acerca de </span></a>
    </li>
    <!--Acerca de  -->

<?php } ?>
