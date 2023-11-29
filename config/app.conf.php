<?php

    //app.conf.php es el archivo que maneja toda la aplicacion.
    define("DEFAULT_VIEW","Login");  // layout vista si no ha iniciado sesion
    define("DEFAULT_LAYOUT","general.lyt.php");// default para el resto del contenido
    define("PATH_VIEW",realpath("./view/"));// carpeta de vista
    define("PATH_LAYOUT",realpath("./layout"));// carpeta de layout
    
    /*JCV*/
    define("RUTA_RAIZ",realpath("./"));// carpeta RAIZ 
 
    //esto lo necesito en el index

    $conf["Login"] = array(
        "file" => "login.vw.php",
        "layout" => "login.lyt.php"
    );

    $conf["error_404"] = array(

        "file" => "404.vw.php",
        "layout" => "error.lyt.php"
    );

    $conf["Inicio"] = array(
        "file" => "home.vw.php",
        "layout" => "home.lyt.php"
    );

    $conf["Acerca-de"] = array(
        "file" => "info.vw.php",
        "layout" => "home.lyt.php"
    );

    // Almacen

    $conf["Categoria"] = array(
        "file" => "categoria.vw.php"
    );

    $conf["Presentacion"] = array(
        "file" => "presentacion.vw.php"
    );

    $conf["Marca"] = array(
        "file" => "marca.vw.php"
    );

    $conf["Producto"] = array(
        "file" => "producto.vw.php"
    );

     
    
    $conf["Perecederos"] = array(
        "file" => "perecedero.vw.php"
    );
    // Almacen

    // Cotizaciones

    $conf["Cotizacion"] = array(
        "file" => "cotizacion.vw.php",
        "layout" => "pos.lyt.php"
    );

    $conf["Cotizaciones"] = array(
        "file" => "cotizaciones.vw.php"
    );

    // Cotizaciones


    // Compras

    $conf["Proveedor"] = array(
        "file" => "proveedor.vw.php"
    );

    $conf["Compras"] = array(
        "file" => "compra.vw.php",
        "layout" => "pos.lyt.php"
    );

    $conf["Compras-Fecha"] = array(
        "file" => "comprasfecha.vw.php"
    );

    $conf["Compras-Mes"] = array(
        "file" => "comprasmes.vw.php"
    );

    $conf["Historico-Precios"] = array(
        "file" => "historico.vw.php"
    );

    // Compras

    // Caja

    $conf["Caja"] = array(
        "file" => "caja.vw.php"
    );

    $conf["Historico-Caja"] = array(
        "file" => "historicocaja.vw.php"
    );

    // Caja

    // Ventas

    $conf["Clientes"] = array(
        "file" => "cliente.vw.php"
    );


    $conf["POS"] = array(
        "file" => "pos.vw.php",
        "layout" => "pos.lyt.php"
    );

    $conf["Venta-Diaria"] = array(
        "file" => "ventadiaria.vw.php"
    );

    $conf["Ventas-Fecha"] = array(
        "file" => "ventasfecha.vw.php"
    );

    $conf["Ventas-Mes"] = array(
        "file" => "ventasmes.vw.php"
    );

    // Ventas

    // Inventario

    $conf["Abrir-Inventario"] = array(
        "file" => "abririnventario.vw.php"
    );

    $conf["Kardex"] = array(
        "file" => "kardex.vw.php"
    );
    // Inventario

    // Documentos

    $conf["Tipo-Comprobante"] = array(
        "file" => "tipocomprobante.vw.php"
    );

    $conf["Tirajes"] = array(
        "file" => "tirajes.vw.php"
    );
    // Documentos


    // Usuarios

    $conf["Empleados"] = array(
        "file" => "empleados.vw.php"
    );

    $conf["Usuario"] = array(
        "file" => "usuario.vw.php"
    );

    // Usuarios

    // Ajustes

    $conf["Parametros"] = array(
        "file" => "parametros.vw.php"
    );

    $conf["Monedas"] = array(
        "file" => "monedas.vw.php"
    );

    $conf["Backup"] = array(
        "file" => "respaldos.vw.php"
    );

    $conf["Do-Backup"] = array(
        "file" => "makebu.vw.php"
    );

    // Ajustes

    // Creditos

    $conf["Creditos"] = array(
        "file" => "credito.vw.php"
    );
    $conf["CreditosProveedor"] = array(
        "file" => "creditoproveedor.vw.php"
    );
    // Creditos

    // Taller

    $conf["Taller"] = array(
        "file" => "taller.vw.php"
    );

    $conf["Tecnicos"] = array(
        "file" => "tecnicos.vw.php"
    );

    // Taller

    // Apartados

    $conf["POS-A"] = array(
        "file" => "pos-a.vw.php",
        "layout" => "pos.lyt.php"
    );

    $conf["Apartados-Diarios"] = array(
        "file" => "apartadodiario.vw.php"
    );

    $conf["Apartados-Fecha"] = array(
        "file" => "apartadosfecha.vw.php"
    );

    $conf["Apartados-Mes"] = array(
        "file" => "apartadosmes.vw.php"
    );

    // Apartados
    
    
    // Modelo JCV Bancos

    $conf["CuentasBancos"] = array(
        "file" => "cuentasbancos.vw.php"
    );
     // Modelo JCV Bancos
    
    
    // Cuentas de BancosJCV DE PRUEBA EN REALIDAD LIBRO DIARIO DE PRUEBA

    $conf["CuentasdeBancosJCV"] = array(
        "file" => "cuentasdebancosJCV.vw.php"
    );
    
    
    $conf["CuentasDebancos"] = array(
        
        "file" => "cuentasdebancos.vw.php"
    );
    
    
    // CATALOGOS DE CUENTAS
    // Atributos
    
    $conf["CuentasAtributos"] = array(
        "file" => "cuentasatributos.vw.php"
    );
    
    // Tipo de gasto
    $conf["CuentasTipodegasto"] = array(
        "file" => "cuentastipodegasto.vw.php"
    );
    
    //Acumulativas
    
    $conf["CuentasAcumulativa"] = array(
        "file" => "cuentasacumulativa.vw.php"
    );

    //De Registro
    
    $conf["CuentasDeregistro"] = array(
        "file" => "cuentasderegistro.vw.php"
    );
        
    // CATALOGOS DE CUENTAS
    
    
    //LIBRO DIARIO
    $conf["LibroDiario"] = array(
        "file" => "librodiario.vw.php"
    );
    
    //LIBRO DIARIO
    
    
     
    //FLUJO DE EFECTIVO
    
    $conf["FlujoEfectivo"] = array(
        "file" => "flujoefectivo.vw.php"
    );
    
    //FLUJO DE EFECTIVO
    
    
     //PEDIDOS
    
    $conf["Pedidos"] = array(
        "file" => "pedidos.vw.php",
        "layout" => "pos.lyt.php"
    );
    
    //PEDIDOS
    
    
    
    //ESTADO DE RESULTADOS
    
    $conf["EstadoResultados1"] = array(
        "file" => "estado_de_resultados1s.vw.php"
    );
    
    $conf["EstadoResultados2"] = array(
        "file" => "estadoresultados2.vw.php"
    );
    
    
    //COMMON SIZE
    $conf["CommonSize1"] = array(
        "file" => "common_size1s.vw.php"
    );
    
    
      //ESTADO DE RESULTADOS
    
    
    
    
    //REPORTES FINANCIEROS
    
    $conf["ReporteMercadotecnia"] = array(
        "file" => "reporte-mercadotecnia.vw.php"
    );
    
    $conf["ReporteEdoresultados"] = array(
        "file" => "reporte-edoresultados.vw.php"
    );
    
    $conf["ReporteFlujoefectivo"] = array(
        "file" => "reporte-store-flujoefectivo.vw.php"
    );
    
    $conf["ReporteCuentasxcobrar"] = array(
        "file" => "reporte-store-cxc.vw.php"
    );
    
    $conf["ReporteInventario"] = array(
        "file" => "reporte-store-inventarios.vw.php" 
    );
    
    $conf["ReporteActivofijo"] = array(
        "file" => "reporte-activofijo.vw.php"
    );
    
    $conf["ReporteProveedores"] = array(
        "file" => "reporte-store-proveedores.vw.php"
    );
    
    $conf["ReporteOtrospasivos"] = array(
        "file" => "reporte-otrospasivos.vw.php"
    );
    
    $conf["ReporteComparativas"] = array(
        "file" => "reporte-store-comparativas.vw.php"
    );
    
     $conf["ReporteEficiencia"] = array(
        "file" => "reporte-store-eficiencia.vw.php"
    );
    
    
      //REPORTES FINANCIEROS
    
    
 
         //COTIZACIÓNJCV
    
    $conf["CotizacionJCV"] = array(
        "file" => "../vistas/html/principalCOT.php"
    );
    
     $conf["HistorialCotizacion"] = array(
        "file" => "../vistas/html/bitacora_cotizacionCOT.php"
    );
     
      
     $conf["PagoCliente"] = array(
        "file" => "../vistas/html/cxcCOT.php"
    );
     
     
          $conf["HistorialVentas"] = array(
        "file" => "../vistas/html/bitacora_ventasCOT.php"
    );
     
     
          $conf["EditarVenta"] = array(
        "file" => "../vistas/html/editar_ventaOKJCV2.php"
    );
    
             
           
          $conf["AbonosClientes"] = array( 
        /*"file" => "../vistas/html/abonos_cxcCOT.php" */ 
              "file" => "../vistas/html/abonos_cxcJCV.php" 
    ); 
          
          
          /*
      $conf["NuevaCotizacionOK"] = array(
         "file" => "../vistas/html/new_cotizacionOKJCVOK.php"
              );   
     
        */  
           
       $conf["NuevaCotizacionOK"] = array(
         "file" => "../vistas/html/new_cotizacionJCV.php"
              );  
       
       
       $conf["EditarCotizacion"] = array(
         "file" => "../vistas/html/editar_cotizacionOKJCVOK.php"
              );  
     
       
        
       
      //COTIZACIÓNJCV
    

     //ORDENES DE COMPRA
     
          $conf["NuevaOrdenCompra"] = array(
        "file" => "../vistas/html/new_compraOKJCV.php"
              );
          
          
          $conf["HistorialCompras"] = array(
        "file" => "../vistas/html/bitacora_comprasOKJCV.php" 
    );
          
          
          $conf["EditarCompras"] = array(
        "file" => "../vistas/html/editar_compraOKJCV0.php"       
    
              );
           
           
           $conf["NuevaOrdenCompraOK"] = array(
        "file" => "../vistas/html/new_compraOKJCVOK.php"
              );
          
          
           
    //EQUIPOS A COMPRAR
          
          
          //ORDENES DE COMPRA
     
          $conf["HistorialEquiposaComprar"] = array(
        "file" => "../vistas/html/bitacora_equipos_a_comprar.php"
              );
           
          
         $conf["EditarEquiposaComprar"] = array(
        "file" => "../vistas/html/editar_equipos_a_comprar.php"
          );  
           
           
   //EQUIPOS A COMPRAR
       
         
         
         //EQUIPOS y refacciones
         $conf["Equipos"] = array(
        "file" => "../vistas/html/productosOKJCV.php"
             
        //EQUIPOS y refacciones
    );
         
         
         
          //Combos
         $conf["Combos"] = array(
        /*"file" => "../restaurante/forcombo.php"*/
          "file" => "../vistas/html/new_combo.php"   
        //Combos
    );
         
     
 ?>
