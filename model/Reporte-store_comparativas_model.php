<?php      
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');  
         
    
	class ReportecomparativasModel extends Conexion  
	{
                  
                public function Insertar_datos_comparativas()   
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                        
                             
                    
                     //JCV FLUJO LIBRE COMPARATIVAS(LA 113 DE LA TABLA reporte_store_flujoefectivo)
                     
                    $queryTotalEneFlLiCom="update reporte_store_comparativas set enero = (select enero from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotEneFlLiCom = $dbconec->prepare($queryTotalEneFlLiCom);
                    $stmtTotEneFlLiCom->execute();
                    
                    $queryTotalFebFlLiCom="update reporte_store_comparativas set febrero = (select febrero from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotFebFlLiCom = $dbconec->prepare($queryTotalFebFlLiCom);
                    $stmtTotFebFlLiCom->execute();
                    
                    $queryTotalMarFlLiCom="update reporte_store_comparativas set marzo = (select marzo from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotMarFlLiCom = $dbconec->prepare($queryTotalMarFlLiCom);
                    $stmtTotMarFlLiCom->execute();
                    
                    //ABRIL
                    $queryTotalMarFlLiCom="update reporte_store_comparativas set abril = (select abril from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotMarFlLiCom = $dbconec->prepare($queryTotalMarFlLiCom);
                    $stmtTotMarFlLiCom->execute();
                    
                    $queryTotalMarFlLiCom="update reporte_store_comparativas set mayo = (select mayo from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotMarFlLiCom = $dbconec->prepare($queryTotalMarFlLiCom);
                    $stmtTotMarFlLiCom->execute();
                    
                    $queryTotalMarFlLiCom="update reporte_store_comparativas set junio = (select junio from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotMarFlLiCom = $dbconec->prepare($queryTotalMarFlLiCom);
                    $stmtTotMarFlLiCom->execute();
                    
                    //JULIO
                    $queryTotalMarFlLiCom="update reporte_store_comparativas set julio = (select julio from reporte_store_flujoefectivo where nivel = 113) where nivel = 551;";
                    $stmtTotMarFlLiCom = $dbconec->prepare($queryTotalMarFlLiCom);
                    $stmtTotMarFlLiCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  

                    /*
                    //JCV ACUMULADO
                    $queryTotalAcuFlLiCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 551;";
                    $stmtTotAcuFlLiCom = $dbconec->prepare($queryTotalAcuFlLiCom);
                    $stmtTotAcuFlLiCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProFlLiCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 551;";
                    $stmtTotProFlLiCom = $dbconec->prepare($queryTotalProFlLiCom);
                    $stmtTotProFlLiCom->execute();
                    */  
                     
                     //JCV UTILIDAD NETA COMPARATIVAS(LA 63 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneUtNeCom="update reporte_store_comparativas set enero = (select enero from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotEneUtNeCom = $dbconec->prepare($queryTotalEneUtNeCom);
                    $stmtTotEneUtNeCom->execute();
                    
                    $queryTotalFebUtNeCom="update reporte_store_comparativas set febrero = (select febrero from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotFebUtNeCom = $dbconec->prepare($queryTotalFebUtNeCom);
                    $stmtTotFebUtNeCom->execute();
                    
                    $queryTotalMarUtNeCom="update reporte_store_comparativas set marzo = (select marzo from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotMarUtNeCom = $dbconec->prepare($queryTotalMarUtNeCom);
                    $stmtTotMarUtNeCom->execute();
                    
                    //ABRIL
                    $queryTotalMarUtNeCom="update reporte_store_comparativas set abril = (select abril from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotMarUtNeCom = $dbconec->prepare($queryTotalMarUtNeCom);
                    $stmtTotMarUtNeCom->execute();
                    
                    $queryTotalMarUtNeCom="update reporte_store_comparativas set mayo = (select mayo from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotMarUtNeCom = $dbconec->prepare($queryTotalMarUtNeCom);
                    $stmtTotMarUtNeCom->execute();
                    
                    $queryTotalMarUtNeCom="update reporte_store_comparativas set junio = (select junio from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotMarUtNeCom = $dbconec->prepare($queryTotalMarUtNeCom);
                    $stmtTotMarUtNeCom->execute();
                    
                    //JULIO
                    $queryTotalMarUtNeCom="update reporte_store_comparativas set julio = (select julio from reporte_edoresultados where nivel = 63) where nivel = 552;";
                    $stmtTotMarUtNeCom = $dbconec->prepare($queryTotalMarUtNeCom);
                    $stmtTotMarUtNeCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                   /* 
                    //JCV ACUMULADO
                    $queryTotalAcuUtNeCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 552;";
                    $stmtTotAcuUtNeCom = $dbconec->prepare($queryTotalAcuUtNeCom);
                    $stmtTotAcuUtNeCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProUtNeCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 552;";
                    $stmtTotProUtNeCom = $dbconec->prepare($queryTotalProUtNeCom);
                    $stmtTotProUtNeCom->execute();
                  */  
                    
                    //JCV CAMBIO EN CxC COMPARATIVAS(LA 207 DE LA TABLA reporte_store_cxc)
                     
                    $queryTotalEneCaCxCCom="update reporte_store_comparativas set enero = (select enero from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotEneCaCxCCom = $dbconec->prepare($queryTotalEneCaCxCCom);
                    $stmtTotEneCaCxCCom->execute();
                    
                    $queryTotalFebCaCxCCom="update reporte_store_comparativas set febrero = (select febrero from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotFebCaCxCCom = $dbconec->prepare($queryTotalFebCaCxCCom);
                    $stmtTotFebCaCxCCom->execute();
                    
                    $queryTotalMarCaCxCCom="update reporte_store_comparativas set marzo = (select marzo from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotMarCaCxCCom = $dbconec->prepare($queryTotalMarCaCxCCom);
                    $stmtTotMarCaCxCCom->execute();
                    
                    //ABRIL
                    $queryTotalMarCaCxCCom="update reporte_store_comparativas set abril = (select abril from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotMarCaCxCCom = $dbconec->prepare($queryTotalMarCaCxCCom);
                    $stmtTotMarCaCxCCom->execute();
                    
                    $queryTotalMarCaCxCCom="update reporte_store_comparativas set mayo = (select mayo from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotMarCaCxCCom = $dbconec->prepare($queryTotalMarCaCxCCom);
                    $stmtTotMarCaCxCCom->execute();
                    
                    $queryTotalMarCaCxCCom="update reporte_store_comparativas set junio = (select junio from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotMarCaCxCCom = $dbconec->prepare($queryTotalMarCaCxCCom);
                    $stmtTotMarCaCxCCom->execute();
                    
                    //JULIO
                    $queryTotalMarCaCxCCom="update reporte_store_comparativas set julio = (select julio from reporte_store_cxc where nivel = 207) where nivel = 553;";
                    $stmtTotMarCaCxCCom = $dbconec->prepare($queryTotalMarCaCxCCom);
                    $stmtTotMarCaCxCCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
               /*     
                    //JCV ACUMULADO
                    $queryTotalAcuCaCxCCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 553;";
                    $stmtTotAcuCaCxCCom = $dbconec->prepare($queryTotalAcuCaCxCCom);
                    $stmtTotAcuCaCxCCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProCaCxCCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 553;";
                    $stmtTotProCaCxCCom = $dbconec->prepare($queryTotalProCaCxCCom);
                    $stmtTotProCaCxCCom->execute();
                                        
                 */   
                    
                    //JCV CAMBIO EN INVENTARIOS COMPARATIVAS(LA 305 DE LA TABLA reporte_store_inventarios)
                     
                    $queryTotalEneCaInvCom="update reporte_store_comparativas set enero = (select enero from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotEneCaInvCom = $dbconec->prepare($queryTotalEneCaInvCom);
                    $stmtTotEneCaInvCom->execute();
                    
                    $queryTotalFebCaInvCom="update reporte_store_comparativas set febrero = (select febrero from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotFebCaInvCom = $dbconec->prepare($queryTotalFebCaInvCom);
                    $stmtTotFebCaInvCom->execute();
                    
                    $queryTotalMarCaInvCom="update reporte_store_comparativas set marzo = (select marzo from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotMarCaInvCom = $dbconec->prepare($queryTotalMarCaInvCom);
                    $stmtTotMarCaInvCom->execute();
                    
                    //ABRIL
                    $queryTotalMarCaInvCom="update reporte_store_comparativas set abril = (select abril from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotMarCaInvCom = $dbconec->prepare($queryTotalMarCaInvCom);
                    $stmtTotMarCaInvCom->execute();
                    
                    $queryTotalMarCaInvCom="update reporte_store_comparativas set mayo = (select mayo from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotMarCaInvCom = $dbconec->prepare($queryTotalMarCaInvCom);
                    $stmtTotMarCaInvCom->execute();
                    
                    $queryTotalMarCaInvCom="update reporte_store_comparativas set junio = (select junio from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotMarCaInvCom = $dbconec->prepare($queryTotalMarCaInvCom);
                    $stmtTotMarCaInvCom->execute();
                    
                    //JULIO
                    $queryTotalMarCaInvCom="update reporte_store_comparativas set julio = (select julio from reporte_store_inventarios where nivel = 305) where nivel = 554;";
                    $stmtTotMarCaInvCom = $dbconec->prepare($queryTotalMarCaInvCom);
                    $stmtTotMarCaInvCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
               /*     
                    //JCV ACUMULADO
                    $queryTotalAcuCaInvCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 554;";
                    $stmtTotAcuCaInvCom = $dbconec->prepare($queryTotalAcuCaInvCom);
                    $stmtTotAcuCaInvCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProCaInvCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 554;";
                    $stmtTotProCaInvCom = $dbconec->prepare($queryTotalProCaInvCom);
                    $stmtTotProCaInvCom->execute();                    
                    
                    */
                    
                    ////////////////////////////// OJO ////////////////////////////////////
                    //JCV CAMBIO EN INVERSIONES COMPARATIVAS(LA 354-351 DE LA TABLA: NO LA TENEMOS)
                    
                    
                    
                    
                    //JCV CAMBIO EN PROVEEDORES COMPARATIVAS(LA 407 DE LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneCaProCom="update reporte_store_comparativas set enero = (select enero from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    $queryTotalFebCaProCom="update reporte_store_comparativas set febrero = (select febrero from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotFebCaProCom = $dbconec->prepare($queryTotalFebCaProCom);
                    $stmtTotFebCaProCom->execute();
                    
                    $queryTotalMarCaProCom="update reporte_store_comparativas set marzo = (select marzo from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotMarCaProCom = $dbconec->prepare($queryTotalMarCaProCom);
                    $stmtTotMarCaProCom->execute();
                    
                    //ABRIL
                    $queryTotalMarCaProCom="update reporte_store_comparativas set abril = (select abril from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotMarCaProCom = $dbconec->prepare($queryTotalMarCaProCom);
                    $stmtTotMarCaProCom->execute();
                    
                    $queryTotalMarCaProCom="update reporte_store_comparativas set mayo = (select mayo from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotMarCaProCom = $dbconec->prepare($queryTotalMarCaProCom);
                    $stmtTotMarCaProCom->execute();
                    
                    $queryTotalMarCaProCom="update reporte_store_comparativas set junio = (select junio from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotMarCaProCom = $dbconec->prepare($queryTotalMarCaProCom);
                    $stmtTotMarCaProCom->execute();
                    
                    //JULIO
                    $queryTotalMarCaProCom="update reporte_store_comparativas set julio = (select julio from reporte_store_proveedores where nivel = 407) where nivel = 556;";
                    $stmtTotMarCaProCom = $dbconec->prepare($queryTotalMarCaProCom);
                    $stmtTotMarCaProCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                 /*   
                    //JCV ACUMULADO
                    $queryTotalAcuCaProCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 556;";
                    $stmtTotAcuCaProCom = $dbconec->prepare($queryTotalAcuCaProCom);
                    $stmtTotAcuCaProCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProCaProCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 556;";
                    $stmtTotProCaProCom = $dbconec->prepare($queryTotalProCaProCom);
                    $stmtTotProCaProCom->execute();                    
                    
                 */   
                    
                     ////////////////////////////// OJO ////////////////////////////////////
                    //JCV CAMBIO EN PASIVOS DE LARGO PLAZO COMPARATIVAS(LA 503-500 DE LA TABLA: NO LA TENEMOS)
                    
                    
                    
                     //JCV COSTO DE VENTAS EN ESTADO DE RESULTADOS COMPARATIVAS(LA 52 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneCoVeCom="update reporte_store_comparativas set enero = (select enero from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotEneCoVeCom = $dbconec->prepare($queryTotalEneCoVeCom);
                    $stmtTotEneCoVeCom->execute();
                    
                     $queryTotalFebCoVeCom="update reporte_store_comparativas set febrero = (select febrero from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotFebCoVeCom = $dbconec->prepare($queryTotalFebCoVeCom);
                    $stmtTotFebCoVeCom->execute();
                    
                     $queryTotalMarCoVeCom="update reporte_store_comparativas set marzo = (select marzo from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotMarCoVeCom = $dbconec->prepare($queryTotalMarCoVeCom);
                    $stmtTotMarCoVeCom->execute();
                    
                    //ABRIL
                     $queryTotalMarCoVeCom="update reporte_store_comparativas set abril = (select abril from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotMarCoVeCom = $dbconec->prepare($queryTotalMarCoVeCom);
                    $stmtTotMarCoVeCom->execute();
                    
                     $queryTotalMarCoVeCom="update reporte_store_comparativas set mayo = (select mayo from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotMarCoVeCom = $dbconec->prepare($queryTotalMarCoVeCom);
                    $stmtTotMarCoVeCom->execute();
                    
                     $queryTotalMarCoVeCom="update reporte_store_comparativas set junio = (select junio from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotMarCoVeCom = $dbconec->prepare($queryTotalMarCoVeCom);
                    $stmtTotMarCoVeCom->execute();
                    
                    //JULIO
                     $queryTotalMarCoVeCom="update reporte_store_comparativas set julio = (select julio from reporte_edoresultados where nivel = 52) where nivel = 558;";
                    $stmtTotMarCoVeCom = $dbconec->prepare($queryTotalMarCoVeCom);
                    $stmtTotMarCoVeCom->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
               /*       
                    //JCV ACUMULADO
                    $queryTotalAcuCoVeCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre  where nivel = 558;";
                    $stmtTotAcuCoVeCom = $dbconec->prepare($queryTotalAcuCoVeCom);
                    $stmtTotAcuCoVeCom->execute();
                    //JCV PROMEDIO                     
                    $queryTotalProCoVeCom="update reporte_store_comparativas set promedio = acumulado / meses_promedio  where nivel = 558;";
                    $stmtTotProCoVeCom = $dbconec->prepare($queryTotalProCoVeCom);
                    $stmtTotProCoVeCom->execute();                     
                    
                 */    
                    
                    //JCV COMPRAS EN PROVEEDORES COMPARATIVAS(LA 402 DE LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneCaProCom="update reporte_store_comparativas set enero = (select enero from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    $queryTotalEneCaProCom="update reporte_store_comparativas set febrero = (select febrero from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    $queryTotalEneCaProCom="update reporte_store_comparativas set marzo = (select marzo from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    //ABRIL
                    $queryTotalEneCaProCom="update reporte_store_comparativas set abril = (select abril from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    $queryTotalEneCaProCom="update reporte_store_comparativas set mayo = (select mayo from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    $queryTotalEneCaProCom="update reporte_store_comparativas set junio = (select junio from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                    
                    //JULIO
                    $queryTotalEneCaProCom="update reporte_store_comparativas set julio = (select julio from reporte_store_proveedores where nivel = 402) where nivel = 559;";
                    $stmtTotEneCaProCom = $dbconec->prepare($queryTotalEneCaProCom);
                    $stmtTotEneCaProCom->execute();
                     
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    
                    ///////////////////////////ACUMULADO/////////////////////
                    
                    
                    
                    //JCV ACUMULADO
                    $queryTotalAcuCoVeCom="update reporte_store_comparativas set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre;";
                    $stmtTotAcuCoVeCom = $dbconec->prepare($queryTotalAcuCoVeCom);
                    $stmtTotAcuCoVeCom->execute();
                    
                   
                    
                    
                    
                    
                    ///////////////////////////PROMEDIOS/////////////////////
                    //JCV PARA PONER EL NUMERO DE MES, CON BASE AL MES ACTUAL
                    
                    $mes_actual = date('n');
                    
                    
                    //PARA SABER LOS VALORES DE LOS CAMPOS DE ENERO A DICIEMBRE 
                    //EMPEZAMOS CON DICIEMBRE SI DICIEMBRE NO ES CERO (O SEA TIENE VALORES) ES 12, SINO SE VA HACIA NOVIEMBRE Y ASI SUCESIVAMENTE
                   
                    try 
                    { 
                        $query = "SELECT * FROM reporte_store_comparativas where nivel =551 ;";
                        $stmt = $dbconec->prepare($query);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        if($count > 0)
                        { 
                            $filas3 = $stmt->fetchAll();
                            if (is_array($filas3) || is_object($filas3))
                            {
                                foreach ($filas3 as $row => $column)
                                {
                                    $dic =$column['diciembre'];
                                    $nov =$column['noviembre'];
                                    $oct =$column['octubre'];
                                    $sep =$column['septiembre'];
                                    $ago =$column['agosto'];
                                    $jul =$column['julio'];
                                    $jun =$column['junio'];
                                    $may =$column['mayo'];
                                    $abr =$column['abril'];
                                    $mar =$column['marzo'];
                                    $feb =$column['febrero'];
                                    $ene =$column['enero'];

                                }    
                            }
                            
                            if($dic !=0){
                                $mes_actual=12;
                            }
                            elseif ($nov !=0) {
                                $mes_actual=11;
                            }
                            elseif ($oct !=0) {
                                $mes_actual=10;
                            }
                            elseif ($sep !=0) {
                                $mes_actual=9;
                            }
                            elseif ($ago !=0) {
                                $mes_actual=8;
                            }
                            elseif ($jul !=0) {
                                $mes_actual=7;
                            }
                            elseif ($jun !=0) {
                                $mes_actual=6;
                            }
                            elseif ($may !=0) {
                                $mes_actual=5;
                            }
                            elseif ($abr !=0) {
                                $mes_actual=4;
                            }
                            elseif ($mar !=0) {
                                $mes_actual=3;
                            }
                            elseif ($feb !=0) {
                                $mes_actual=2;
                            }
                            elseif ($ene !=0) {
                                $mes_actual=1;
                            }
                            else{
                                $mes_actual=12;
                            }
                            
                            
                        }
                    } catch (Exception $e) {
                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, NO HAY REGISTROS EN COMPARATIVAS</span>';
                    }
                    
                    
                    
                     //JCV PROMEDIO                     
                    $queryTotalProCoVeCom="update reporte_store_comparativas set promedio = acumulado / $mes_actual  ;";
                    $stmtTotProCoVeCom = $dbconec->prepare($queryTotalProCoVeCom);
                    $stmtTotProCoVeCom->execute();                           
                    
                    
                     
                    
                    
                     
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                
                
                public function Listar_comparativas()    
		{ 
                            $dbconec = Conexion::Conectar();
 
                    try 
                    {  
                            $query = "SELECT * FROM reporte_store_comparativas where nivel >= 551 and nivel <=559 order by nivel ;";
                            $stmt = $dbconec->prepare($query);
                            $stmt->execute();
                            $count = $stmt->rowCount();

                            if($count > 0)
                            {
                                    return $stmt->fetchAll();
                            }


                            $dbconec = null;
                    } catch (Exception $e) {

                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
                    }
		}
                
                
            
                
                
                
                
                
                
                		
                
                
                
		

	}


 ?>
