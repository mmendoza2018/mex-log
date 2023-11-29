<?php    
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php'); 
         
    
	class ReportecxcModel extends Conexion  
	{
               
                public function Insertar_datos_cxc() 
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                        
                    $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=1 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                    
                    if($cuenta<=0){
                         echo '<span class="label label-danger label-block">Primero tiene que calcular el Flujo de Efectivo.  Se encuentra dentro del menú principal en la ópción Flujo de efectivo y Análisis de flujo en el tab 1</span>';
                        exit();
                    }
                     
                    
                    /////////////////////////////////OJO////////////////////////////////
                    //JCV SALDO INICIAL DE CXC (ES LA 68 DE LA TABLA flujo_de_efectivo PERO SE METE MANUAL,  AQUI EN ESTA TABLA)
                
                    
                    //JCV COBROS DE CXC (ES LA 70 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneCoCxC="update reporte_store_cxc set enero = (select enero from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotEneCoCxC = $dbconec->prepare($queryTotalEneCoCxC);
                    $stmtTotEneCoCxC->execute();
                     
                     
                    $queryTotalFebCoCxC="update reporte_store_cxc set febrero = (select febrero from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotFebCoCxC = $dbconec->prepare($queryTotalFebCoCxC);
                    $stmtTotFebCoCxC->execute();
                    
                    $queryTotalMarCoCxC="update reporte_store_cxc set marzo = (select marzo from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                    $stmtTotMarCoCxC->execute();
                    
                    //ABRIL
                    $queryTotalMarCoCxC="update reporte_store_cxc set abril = (select abril from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                    $stmtTotMarCoCxC->execute();
                    
                    $queryTotalMarCoCxC="update reporte_store_cxc set mayo = (select mayo from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                    $stmtTotMarCoCxC->execute();
                    
                    $queryTotalMarCoCxC="update reporte_store_cxc set junio = (select junio from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                    $stmtTotMarCoCxC->execute();
                    
                    //JULIO
                    $queryTotalMarCoCxC="update reporte_store_cxc set julio = (select julio from flujo_de_efectivo where nivel = 70) where nivel = 202;";
                    $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                    $stmtTotMarCoCxC->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                        
                    
                     /////////////////////////////////OJO////////////////////////////////
                    //JCV NUEVAS VENTAS DE CXC (ES ahorita se mete manual PERO DEBERIA SER CON LAS VENTAS)
                     
                    
                    
                    //JCV NUEVAS VENTAS netas A CRÉDITO DE CXC (ES UNA CUENTA QUE YO CREE PORQUE EN ESTE REPORTE DEBE APARACER CON CANCELACIONES INCLUIDA Y EN EL FLUJO DE EFECTIVO
                    //// VAN SEPARADAS LAS NUEVAS DE LAS CANCELACIONES)
                    
                    
                    $queryTotalEneNuVeNe="update reporte_store_cxc set enero = (select enero from reporte_store_cxc where nivel = 203)-(select enero from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotEneNuVeNe = $dbconec->prepare($queryTotalEneNuVeNe);
                    $stmtTotEneNuVeNe->execute();
                    
                    $queryTotalFebNuVeNe="update reporte_store_cxc set febrero = (select febrero from reporte_store_cxc where nivel = 203)-(select febrero from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotFebNuVeNe = $dbconec->prepare($queryTotalFebNuVeNe);
                    $stmtTotFebNuVeNe->execute();
                    
                    $queryTotalMarNuVeNe="update reporte_store_cxc set marzo = (select marzo from reporte_store_cxc where nivel = 203)-(select marzo from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotMarNuVeNe = $dbconec->prepare($queryTotalMarNuVeNe);
                    $stmtTotMarNuVeNe->execute();
                    
                    //ABRIL
                    $queryTotalMarNuVeNe="update reporte_store_cxc set abril = (select abril from reporte_store_cxc where nivel = 203)-(select abril from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotMarNuVeNe = $dbconec->prepare($queryTotalMarNuVeNe);
                    $stmtTotMarNuVeNe->execute();
                    
                    $queryTotalMarNuVeNe="update reporte_store_cxc set mayo = (select mayo from reporte_store_cxc where nivel = 203)-(select mayo from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotMarNuVeNe = $dbconec->prepare($queryTotalMarNuVeNe);
                    $stmtTotMarNuVeNe->execute();
                    
                    $queryTotalMarNuVeNe="update reporte_store_cxc set junio = (select junio from reporte_store_cxc where nivel = 203)-(select junio from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotMarNuVeNe = $dbconec->prepare($queryTotalMarNuVeNe);
                    $stmtTotMarNuVeNe->execute();
                    
                    //julio
                    $queryTotalMarNuVeNe="update reporte_store_cxc set julio = (select julio from reporte_store_cxc where nivel = 203)-(select julio from reporte_store_cxc where nivel = 204) where nivel = 205;";
                    $stmtTotMarNuVeNe = $dbconec->prepare($queryTotalMarNuVeNe);
                    $stmtTotMarNuVeNe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...    

                    
                    //JCV SALDO FINAL DE CXC (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneSaFiC="update reporte_store_cxc set enero = (select enero from reporte_store_cxc where nivel = 201)-(select enero from reporte_store_cxc where nivel = 202)-(select enero from reporte_store_cxc where nivel = 204)+(select enero from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotEneSaFiC = $dbconec->prepare($queryTotalEneSaFiC);
                    $stmtTotEneSaFiC->execute();
                    
                    //JCV AHORA EL SALDO INICIAL DE FEBRERO ES EL SALDO FINAL DE ENERO (ES LA 206 DE ENERO)
                    $queryTotalFebSaInC="update reporte_store_cxc set febrero = (select enero from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotFebSaInC = $dbconec->prepare($queryTotalFebSaInC);
                    $stmtTotFebSaInC->execute();
                    
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE FEBRERO (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalFebSaFiC="update reporte_store_cxc set febrero = (select febrero from reporte_store_cxc where nivel = 201)-(select febrero from reporte_store_cxc where nivel = 202)-(select febrero from reporte_store_cxc where nivel = 204)+(select febrero from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotFebSaFiC = $dbconec->prepare($queryTotalFebSaFiC);
                    $stmtTotFebSaFiC->execute();
                    
                    
                     //JCV AHORA EL SALDO INICIAL DE MARZO DE FEBRERO ES EL SALDO FINAL DE FEBRERO (ES LA 206 DE ENERO)
                    $queryTotalMarSaInC="update reporte_store_cxc set marzo = (select febrero from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotMarSaInC = $dbconec->prepare($queryTotalMarSaInC);
                    $stmtTotMarSaInC->execute();
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE MARZO (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalMarSaFiC="update reporte_store_cxc set marzo = (select marzo from reporte_store_cxc where nivel = 201)-(select marzo from reporte_store_cxc where nivel = 202)-(select marzo from reporte_store_cxc where nivel = 204)+(select marzo from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotMarSaFiC = $dbconec->prepare($queryTotalMarSaFiC);
                    $stmtTotMarSaFiC->execute();
                    
                    //ABRIL
                     //JCV AHORA EL SALDO INICIAL DE ABRIL ES EL SALDO FINAL DE MARZO (ES LA 206 DE ENERO)
                    $queryTotalMarSaInC="update reporte_store_cxc set abril = (select marzo from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotMarSaInC = $dbconec->prepare($queryTotalMarSaInC);
                    $stmtTotMarSaInC->execute();
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE ABRIL (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalMarSaFiC="update reporte_store_cxc set abril = (select abril from reporte_store_cxc where nivel = 201)-(select abril from reporte_store_cxc where nivel = 202)-(select abril from reporte_store_cxc where nivel = 204)+(select abril from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotMarSaFiC = $dbconec->prepare($queryTotalMarSaFiC);
                    $stmtTotMarSaFiC->execute();
                    
                    //MAYO
                     //JCV AHORA EL SALDO INICIAL DE MAYO ES EL SALDO FINAL DE ABRIL (ES LA 206 DE ENERO)
                    $queryTotalMarSaInC="update reporte_store_cxc set mayo = (select abril from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotMarSaInC = $dbconec->prepare($queryTotalMarSaInC);
                    $stmtTotMarSaInC->execute();
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE MAYO (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalMarSaFiC="update reporte_store_cxc set mayo = (select mayo from reporte_store_cxc where nivel = 201)-(select mayo from reporte_store_cxc where nivel = 202)-(select mayo from reporte_store_cxc where nivel = 204)+(select mayo from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotMarSaFiC = $dbconec->prepare($queryTotalMarSaFiC);
                    $stmtTotMarSaFiC->execute();
                    
                    //junio
                     //JCV AHORA EL SALDO INICIAL DE JUNIO ES EL SALDO FINAL DE MAYO (ES LA 206 DE ENERO)
                    $queryTotalMarSaInC="update reporte_store_cxc set junio = (select mayo from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotMarSaInC = $dbconec->prepare($queryTotalMarSaInC);
                    $stmtTotMarSaInC->execute();
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE JUNIO (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalMarSaFiC="update reporte_store_cxc set junio = (select junio from reporte_store_cxc where nivel = 201)-(select junio from reporte_store_cxc where nivel = 202)-(select junio from reporte_store_cxc where nivel = 204)+(select junio from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotMarSaFiC = $dbconec->prepare($queryTotalMarSaFiC);
                    $stmtTotMarSaFiC->execute();
                    
                    //JULIO
                     //JCV AHORA EL SALDO INICIAL DE JULIO ES EL SALDO FINAL DE JUNIO (ES LA 206 DE ENERO)
                    $queryTotalMarSaInC="update reporte_store_cxc set julio = (select junio from reporte_store_cxc where nivel = 206) where nivel = 201;";
                    $stmtTotMarSaInC = $dbconec->prepare($queryTotalMarSaInC);
                    $stmtTotMarSaInC->execute();
                    
                    //JCV NUEVAMENTE EL SALDO FINAL DE CXC DE JULIO (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalMarSaFiC="update reporte_store_cxc set julio = (select julio from reporte_store_cxc where nivel = 201)-(select julio from reporte_store_cxc where nivel = 202)-(select julio from reporte_store_cxc where nivel = 204)+(select julio from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotMarSaFiC = $dbconec->prepare($queryTotalMarSaFiC);
                    $stmtTotMarSaFiC->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //JCV CAMBIO DE CXC (ES LA 206-201 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneCa="update reporte_store_cxc set enero = (select enero from reporte_store_cxc where nivel = 206)-(select enero from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotEneCa = $dbconec->prepare($queryTotalEneCa);
                    $stmtTotEneCa->execute();
                    
                    $queryTotalFebCa="update reporte_store_cxc set febrero = (select febrero from reporte_store_cxc where nivel = 206)-(select febrero from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotFebCa = $dbconec->prepare($queryTotalFebCa);
                    $stmtTotFebCa->execute();
                    
                    $queryTotalMarCa="update reporte_store_cxc set marzo = (select marzo from reporte_store_cxc where nivel = 206)-(select marzo from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotMarCa = $dbconec->prepare($queryTotalMarCa);
                    $stmtTotMarCa->execute();
                    
                    //ABRIL
                    $queryTotalMarCa="update reporte_store_cxc set abril = (select abril from reporte_store_cxc where nivel = 206)-(select abril from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotMarCa = $dbconec->prepare($queryTotalMarCa);
                    $stmtTotMarCa->execute();
                    
                    $queryTotalMarCa="update reporte_store_cxc set mayo = (select mayo from reporte_store_cxc where nivel = 206)-(select mayo from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotMarCa = $dbconec->prepare($queryTotalMarCa);
                    $stmtTotMarCa->execute();
                    
                    $queryTotalMarCa="update reporte_store_cxc set junio = (select junio from reporte_store_cxc where nivel = 206)-(select junio from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotMarCa = $dbconec->prepare($queryTotalMarCa);
                    $stmtTotMarCa->execute();
                    
                    $queryTotalMarCa="update reporte_store_cxc set julio = (select julio from reporte_store_cxc where nivel = 206)-(select julio from reporte_store_cxc where nivel = 201) where nivel = 207;";
                    $stmtTotMarCa = $dbconec->prepare($queryTotalMarCa);
                    $stmtTotMarCa->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                     
                    //JCV DÍAS DE COBRO DE CXC (ES: 30/(202/201) DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneDiCo="update reporte_store_cxc set enero = 30/((select enero from reporte_store_cxc where nivel = 202)/(select enero from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotEneDiCo = $dbconec->prepare($queryTotalEneDiCo);
                    $stmtTotEneDiCo->execute();
                    
                    $queryTotalFebDiCo="update reporte_store_cxc set febrero = 30/((select febrero from reporte_store_cxc where nivel = 202)/(select febrero from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotFebDiCo = $dbconec->prepare($queryTotalFebDiCo);
                    $stmtTotFebDiCo->execute();
                    
                     $queryTotalMarDiCo="update reporte_store_cxc set marzo = 30/((select marzo from reporte_store_cxc where nivel = 202)/(select marzo from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotMarDiCo = $dbconec->prepare($queryTotalMarDiCo);
                    $stmtTotMarDiCo->execute();
                    
                    //ABRIL
                    $queryTotalMarDiCo="update reporte_store_cxc set abril = 30/((select abril from reporte_store_cxc where nivel = 202)/(select abril from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotMarDiCo = $dbconec->prepare($queryTotalMarDiCo);
                    $stmtTotMarDiCo->execute();
                    
                    $queryTotalMarDiCo="update reporte_store_cxc set mayo = 30/((select mayo from reporte_store_cxc where nivel = 202)/(select mayo from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotMarDiCo = $dbconec->prepare($queryTotalMarDiCo);
                    $stmtTotMarDiCo->execute();
                    
                    $queryTotalMarDiCo="update reporte_store_cxc set junio = 30/((select junio from reporte_store_cxc where nivel = 202)/(select junio from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotMarDiCo = $dbconec->prepare($queryTotalMarDiCo);
                    $stmtTotMarDiCo->execute();
                    
                    $queryTotalMarDiCo="update reporte_store_cxc set julio = 30/((select julio from reporte_store_cxc where nivel = 202)/(select julio from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotMarDiCo = $dbconec->prepare($queryTotalMarDiCo);
                    $stmtTotMarDiCo->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                      
                    
                    //////////////////////////////ACUMULADO////////////////////
                    
                    ///////////////////////////ACUMULADO////////////////////
                    
                     //JCV PARA ACUMULADO DE TODAS
                    $queryTotalAcuGral="update reporte_store_cxc set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                      //JCV PARA ACUMULADO SALDO INICIAL: 101(LA MISMA) DE ENERO
                    $queryTotalAcuGral="update reporte_store_cxc set acumulado = enero where nivel = 201;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV SALDO FINAL DE CXC (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneSaFiC="update reporte_store_cxc set acumulado = (select acumulado from reporte_store_cxc where nivel = 201)-(select acumulado from reporte_store_cxc where nivel = 202)-(select acumulado from reporte_store_cxc where nivel = 204)+(select acumulado from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotEneSaFiC = $dbconec->prepare($queryTotalEneSaFiC);
                    $stmtTotEneSaFiC->execute();
                    
                    
                    //JCV DÍAS DE COBRO DE CXC (ES: 360/(202/201) DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneDiCo="update reporte_store_cxc set acumulado = 360/((select acumulado from reporte_store_cxc where nivel = 202)/(select acumulado from reporte_store_cxc where nivel = 201)) where nivel = 208;";
                    $stmtTotEneDiCo = $dbconec->prepare($queryTotalEneDiCo);
                    $stmtTotEneDiCo->execute();
                    
                     
                    
                    
                    ///////////////////////////PROMEDIOS/////////////////////
                    //JCV PARA PONER EL NUMERO DE MES, CON BASE AL MES ACTUAL
                    
                    $mes_actual = date('n');
                    
                    
                    //PARA SABER LOS VALORES DE LOS CAMPOS DE ENERO A DICIEMBRE 
                    //EMPEZAMOS CON DICIEMBRE SI DICIEMBRE NO ES CERO (O SEA TIENE VALORES) ES 12, SINO SE VA HACIA NOVIEMBRE Y ASI SUCESIVAMENTE
                   
                    try 
                    { 
                        $query = "SELECT * FROM reporte_store_cxc where nivel =202 ;";
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
                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, NO HAY REGISTROS EN ESTADO DE RESULTADOS</span>';
                    }
                    
                    
                    //////////////PROMEDIOS////////////////
                    
                    //JCV PARA PROMEDIOS DE TODAS
                    $queryTotalPromGral="update reporte_store_cxc set promedio = acumulado / $mes_actual ;";
                    $stmtTotPromGral = $dbconec->prepare($queryTotalPromGral);
                    $stmtTotPromGral->execute(); 
                    
                    
                     //JCV SALDO FINAL DE CXC (ES LA 201 -202-204+203 DE LA TABLA DE ESTA MISMA TABLA reporte_store_cxc
                    $queryTotalEneSaFiC="update reporte_store_cxc set promedio = (select promedio from reporte_store_cxc where nivel = 201)-(select promedio from reporte_store_cxc where nivel = 202)-(select promedio from reporte_store_cxc where nivel = 204)+(select promedio from reporte_store_cxc where nivel = 203) where nivel = 206;";
                    $stmtTotEneSaFiC = $dbconec->prepare($queryTotalEneSaFiC);
                    $stmtTotEneSaFiC->execute();
                    
                    
                     //JCV DÍAS DE COBRO DE CXC DEBE SER NULO PORQUE NO DEBE HABER DATO
                    $queryTotalEneDiCo="update reporte_store_cxc set promedio = 0  where nivel = 208;";
                    $stmtTotEneDiCo = $dbconec->prepare($queryTotalEneDiCo);
                    $stmtTotEneDiCo->execute();
                    
                    
                     
                     
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                
                
                public function Listar_cxc()   
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    {  
                            $query = "SELECT * FROM reporte_store_cxc order by nivel ;";
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
