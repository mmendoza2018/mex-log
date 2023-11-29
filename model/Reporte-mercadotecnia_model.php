<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');
        

	class ReportemercadotecniaModel extends Conexion 
	{
            
                public function Insertar_datos_flujo()
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;

                    
                        
                        $queryBorrar= "Select * from reporte_mercadotecnia";
                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                        $stmtBorrar->execute();
                        $count = $stmtBorrar->rowCount(); 
                        if($count > 0)
                        {
                                 
                
                ////JCV PARA ACTUALIZAR EGRESOS OPERATIVOS PORQUE EL ORDEN DEL REPORTE ES ANTES DE QUE PASEN CADA CUENTA
                // PORLO QUE PRIMERO INSERTA EN CEROS ESTA CUENTA Y AL FINAL ACTUALIZA (UPDATE) CON LAS CUENTAS YA INSERTADAS CON REGISTROS Y VALORES
                
                   /* $queryTotalEneEgOp="UPDATE reporte_mercadotecnia SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotEneEgOp = $dbconec->prepare($queryTotalEneEgOp);
                    $stmtTotEneEgOp->execute();
                    
                    $queryTotalFebEgOp="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotFebEgOp = $dbconec->prepare($queryTotalFebEgOp);
                    $stmtTotFebEgOp->execute();
                    
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                   */
                
//JCV FALTA DE ABRIL A DICIEMBRE..
                    
                    //JCV PORCENTAJE DE CONVERSIÓN
                    
                    $queryTotalEnePoCo="update reporte_mercadotecnia set enero = ((select enero from reporte_mercadotecnia where nivel = 3)/(select enero from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotEnePoCo = $dbconec->prepare($queryTotalEnePoCo);
                    $stmtTotEnePoCo->execute();
                    
                    $queryTotalFebPoCo="update reporte_mercadotecnia set febrero = ((select febrero from reporte_mercadotecnia where nivel = 3)/(select febrero from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotFebPoCo = $dbconec->prepare($queryTotalFebPoCo);
                    $stmtTotFebPoCo->execute();
                    
                    $queryTotalMarPoCo="update reporte_mercadotecnia set marzo = ((select marzo from reporte_mercadotecnia where nivel = 3)/(select marzo from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarPoCo = $dbconec->prepare($queryTotalMarPoCo);
                    $stmtTotMarPoCo->execute();
                    
                    //ABRIL
                    $queryTotalMarPoCo="update reporte_mercadotecnia set abril = ((select abril from reporte_mercadotecnia where nivel = 3)/(select abril from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarPoCo = $dbconec->prepare($queryTotalMarPoCo);
                    $stmtTotMarPoCo->execute();
                    
                    $queryTotalMarPoCo="update reporte_mercadotecnia set mayo = ((select mayo from reporte_mercadotecnia where nivel = 3)/(select mayo from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarPoCo = $dbconec->prepare($queryTotalMarPoCo);
                    $stmtTotMarPoCo->execute();
                    
                    $queryTotalMarPoCo="update reporte_mercadotecnia set junio = ((select junio from reporte_mercadotecnia where nivel = 3)/(select junio from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarPoCo = $dbconec->prepare($queryTotalMarPoCo);
                    $stmtTotMarPoCo->execute();
                    
                    //JULIO
                    $queryTotalMarPoCo="update reporte_mercadotecnia set julio = ((select julio from reporte_mercadotecnia where nivel = 3)/(select julio from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarPoCo = $dbconec->prepare($queryTotalMarPoCo);
                    $stmtTotMarPoCo->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                     //JCV CLIENTES TOTALES enero TIENE QUE SER UNO Y UNO ENTRE TOTALES Y ESXISTENTES
                    
                    $queryTotalEneClTo="update reporte_mercadotecnia set enero = (select enero from reporte_mercadotecnia where nivel = 3)+(select enero from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotEneClTo = $dbconec->prepare($queryTotalEneClTo);
                    $stmtTotEneClTo->execute();
                    
                    
                     //JCV CLIENTES EXISTENTES FEBRERO
                    $queryTotalEneClEx="update reporte_mercadotecnia set febrero = (select enero from reporte_mercadotecnia where nivel = 3)+(select enero from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotEneClEx = $dbconec->prepare($queryTotalEneClEx);
                    $stmtTotEneClEx->execute();
                    
                    
                    //JCV CLIENTES TOTALES FEBRERO
                    
                    $queryTotalFebClTo="update reporte_mercadotecnia set febrero = (select febrero from reporte_mercadotecnia where nivel = 3)+(select febrero from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotFebClTo = $dbconec->prepare($queryTotalFebClTo);
                    $stmtTotFebClTo->execute();
                    
                    
                     //JCV CLIENTES EXISTENTES MARZO
                    $queryTotalMarClEx="update reporte_mercadotecnia set marzo = (select febrero from reporte_mercadotecnia where nivel = 3)+(select febrero from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES MARZO
                    $queryTotalMarClTo="update reporte_mercadotecnia set marzo = (select marzo from reporte_mercadotecnia where nivel = 3)+(select marzo from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    //ABRIL
                     //JCV CLIENTES EXISTENTES ABRIL
                    $queryTotalMarClEx="update reporte_mercadotecnia set abril = (select marzo from reporte_mercadotecnia where nivel = 3)+(select marzo from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                     
                    //JCV CLIENTES TOTALES ABRIL
                    $queryTotalMarClTo="update reporte_mercadotecnia set abril = (select abril from reporte_mercadotecnia where nivel = 3)+(select abril from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                     //JCV CLIENTES EXISTENTES MAYO
                    $queryTotalMarClEx="update reporte_mercadotecnia set mayo = (select abril from reporte_mercadotecnia where nivel = 3)+(select abril from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES MAYO
                    $queryTotalMarClTo="update reporte_mercadotecnia set mayo = (select mayo from reporte_mercadotecnia where nivel = 3)+(select mayo from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                     //JCV CLIENTES EXISTENTES JUNIO
                    $queryTotalMarClEx="update reporte_mercadotecnia set junio = (select mayo from reporte_mercadotecnia where nivel = 3)+(select mayo from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES JUNIO
                    $queryTotalMarClTo="update reporte_mercadotecnia set junio = (select junio from reporte_mercadotecnia where nivel = 3)+(select junio from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    //JULIO
                     //JCV CLIENTES EXISTENTES JULIO
                    $queryTotalMarClEx="update reporte_mercadotecnia set julio = (select junio from reporte_mercadotecnia where nivel = 3)+(select junio from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES JULIO
                    $queryTotalMarClTo="update reporte_mercadotecnia set julio = (select julio from reporte_mercadotecnia where nivel = 3)+(select julio from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    //AGOSTO
                     //JCV CLIENTES EXISTENTES AGOSTO
                    $queryTotalMarClEx="update reporte_mercadotecnia set agosto = (select julio from reporte_mercadotecnia where nivel = 3)+(select julio from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES AGOSTO
                    $queryTotalMarClTo="update reporte_mercadotecnia set agosto = (select agosto from reporte_mercadotecnia where nivel = 3)+(select agosto from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    
                      //SEPTIEMBRE
                     //JCV CLIENTES EXISTENTES SEPTIEMBRE
                    $queryTotalMarClEx="update reporte_mercadotecnia set septiembre = (select agosto from reporte_mercadotecnia where nivel = 3)+(select agosto from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES SEPTIEMBRE
                    $queryTotalMarClTo="update reporte_mercadotecnia set septiembre = (select septiembre from reporte_mercadotecnia where nivel = 3)+(select septiembre from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    //OCTUBRE
                     //JCV CLIENTES EXISTENTES OCTUBRE
                    $queryTotalMarClEx="update reporte_mercadotecnia set octubre = (select septiembre from reporte_mercadotecnia where nivel = 3)+(select septiembre from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES OCTUBRE
                    $queryTotalMarClTo="update reporte_mercadotecnia set octubre = (select octubre from reporte_mercadotecnia where nivel = 3)+(select octubre from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                     //NOVIEMBRE
                     //JCV CLIENTES EXISTENTES NOVIEMBRE
                    $queryTotalMarClEx="update reporte_mercadotecnia set noviembre = (select octubre from reporte_mercadotecnia where nivel = 3)+(select octubre from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES NOVIEMBRE
                    $queryTotalMarClTo="update reporte_mercadotecnia set noviembre = (select noviembre from reporte_mercadotecnia where nivel = 3)+(select noviembre from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                    //DICIEMBRE
                     //JCV CLIENTES EXISTENTES DICIEMBRE
                    $queryTotalMarClEx="update reporte_mercadotecnia set diciembre = (select noviembre from reporte_mercadotecnia where nivel = 3)+(select noviembre from reporte_mercadotecnia where nivel = 4) where nivel = 4;";
                    $stmtTotMarClEx = $dbconec->prepare($queryTotalMarClEx);
                    $stmtTotMarClEx->execute();
                    
                    //JCV CLIENTES TOTALES DICIEMBRE
                    $queryTotalMarClTo="update reporte_mercadotecnia set diciembre = (select diciembre from reporte_mercadotecnia where nivel = 3)+(select diciembre from reporte_mercadotecnia where nivel = 4) where nivel = 5;";
                    $stmtTotMarClTo = $dbconec->prepare($queryTotalMarClTo);
                    $stmtTotMarClTo->execute();
                    
                   

                    
 
                     //JCV TRANSACCIONES PROMEDIO
                    
                    $queryTotalEneTrPr="update reporte_mercadotecnia set enero = ((select enero from reporte_mercadotecnia where nivel = 6)/(select enero from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotEneTrPr = $dbconec->prepare($queryTotalEneTrPr);
                    $stmtTotEneTrPr->execute();
                    
                    $queryTotalFebTrPr="update reporte_mercadotecnia set febrero = ((select febrero from reporte_mercadotecnia where nivel = 6)/(select febrero from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotFebTrPr = $dbconec->prepare($queryTotalFebTrPr);
                    $stmtTotFebTrPr->execute();
                    
                    $queryTotalMarTrPr="update reporte_mercadotecnia set marzo = ((select marzo from reporte_mercadotecnia where nivel = 6)/(select marzo from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                     
                    //ABRIL
                     $queryTotalMarTrPr="update reporte_mercadotecnia set abril = ((select abril from reporte_mercadotecnia where nivel = 6)/(select abril from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                    
                     $queryTotalMarTrPr="update reporte_mercadotecnia set mayo = ((select mayo from reporte_mercadotecnia where nivel = 6)/(select mayo from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                    
                     $queryTotalMarTrPr="update reporte_mercadotecnia set junio = ((select junio from reporte_mercadotecnia where nivel = 6)/(select junio from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                    
                    //JULIO
                     $queryTotalMarTrPr="update reporte_mercadotecnia set julio = ((select julio from reporte_mercadotecnia where nivel = 6)/(select julio from reporte_mercadotecnia where nivel = 5))*100 where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  


                    //JCV VENTAS NETAS (la 9 + 10), PRIMERO SE CALCALA ESTE Y DESPUES MONTO PROMEDIO DE VENTA, PARA TENER LOS DATOS COMPLETOS
                    
                    $queryTotalEneVeNe="update reporte_mercadotecnia set enero = (select enero from reporte_mercadotecnia where nivel = 9)+(select enero from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotEneVeNe = $dbconec->prepare($queryTotalEneVeNe);
                    $stmtTotEneVeNe->execute();
                    
                    $queryTotalFebVeNe="update reporte_mercadotecnia set febrero = (select febrero from reporte_mercadotecnia where nivel = 9)+(select febrero from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotFebVeNe = $dbconec->prepare($queryTotalFebVeNe);
                    $stmtTotFebVeNe->execute();
                    
                    $queryTotalMarVeNe="update reporte_mercadotecnia set marzo = (select marzo from reporte_mercadotecnia where nivel = 9)+(select marzo from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
                    //ABRIL
                    $queryTotalMarVeNe="update reporte_mercadotecnia set abril = (select abril from reporte_mercadotecnia where nivel = 9)+(select abril from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
                    $queryTotalMarVeNe="update reporte_mercadotecnia set mayo = (select mayo from reporte_mercadotecnia where nivel = 9)+(select mayo from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
                    $queryTotalMarVeNe="update reporte_mercadotecnia set junio = (select junio from reporte_mercadotecnia where nivel = 9)+(select junio from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
                    //JULIO
                    $queryTotalMarVeNe="update reporte_mercadotecnia set julio = (select julio from reporte_mercadotecnia where nivel = 9)+(select julio from reporte_mercadotecnia where nivel = 10) where nivel = 11;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  


                    //JCV MONTO PROMEDIO DE VENTA (LA 11 ENTRE LA 7 ENTRE LA 5) 
                    $queryTotalEnePrVe="update reporte_mercadotecnia set enero = (select enero from reporte_mercadotecnia where nivel = 11)/((select enero from reporte_mercadotecnia where nivel = 7)/100)/(select enero from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotEnePrVe = $dbconec->prepare($queryTotalEnePrVe);
                    $stmtTotEnePrVe->execute();
                    
                    $queryTotalFebPrVe="update reporte_mercadotecnia set febrero = (select febrero from reporte_mercadotecnia where nivel = 11)/((select febrero from reporte_mercadotecnia where nivel = 7)/100)/(select febrero from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotFebPrVe = $dbconec->prepare($queryTotalFebPrVe);
                    $stmtTotFebPrVe->execute();
                    
                     $queryTotalMarPrVe="update reporte_mercadotecnia set marzo = (select marzo from reporte_mercadotecnia where nivel = 11)/((select marzo from reporte_mercadotecnia where nivel = 7)/100)/(select marzo from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                    
                    //ABRIL
                     $queryTotalMarPrVe="update reporte_mercadotecnia set abril = (select abril from reporte_mercadotecnia where nivel = 11)/((select abril from reporte_mercadotecnia where nivel = 7)/100)/(select abril from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                     $queryTotalMarPrVe="update reporte_mercadotecnia set mayo = (select mayo from reporte_mercadotecnia where nivel = 11)/((select mayo from reporte_mercadotecnia where nivel = 7)/100)/(select mayo from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                     $queryTotalMarPrVe="update reporte_mercadotecnia set junio = (select junio from reporte_mercadotecnia where nivel = 11)/((select junio from reporte_mercadotecnia where nivel = 7)/100)/(select junio from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                    //JULIO
                     $queryTotalMarPrVe="update reporte_mercadotecnia set julio = (select julio from reporte_mercadotecnia where nivel = 11)/((select julio from reporte_mercadotecnia where nivel = 7)/100)/(select julio from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                      
                      
                    //////////////////ACUMULADO///////////////
                    
                    //JCV PARA ACUMULADO DE TODAS
                    $queryTotalMarPrVe="update reporte_mercadotecnia set acumulado = enero + febrero + marzo + abril + mayo + junio + julio +agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                     
                     ///JCV PARA ACUMULADO % DE CONVERSION
                    $queryTotalMarVeNe="update reporte_mercadotecnia set acumulado = ((select acumulado from reporte_mercadotecnia where nivel = 3)/(select acumulado from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotMarVeNe = $dbconec->prepare($queryTotalMarVeNe);
                    $stmtTotMarVeNe->execute();
                    
                    //JCV PARA ACUMULADO CLIENTES NIEVOS Y EXISTENTES
                    $queryTotalMarPrVe="update reporte_mercadotecnia set acumulado = diciembre where nivel>=4 and nivel<=5 ;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                      
                    
                   //JCV PARA ACUMULADO transacciones promedio
                     $queryTotalMarTrPr="update reporte_mercadotecnia set acumulado = (select acumulado from reporte_mercadotecnia where nivel = 6)/(select acumulado from reporte_mercadotecnia where nivel = 5) where nivel = 7;";
                    $stmtTotMarTrPr = $dbconec->prepare($queryTotalMarTrPr);
                    $stmtTotMarTrPr->execute();
                    
                    
                    //JCV  PARA ACUMULADO MONTO PROMEDIO DE VENTA (LA 11 ENTRE LA 7 ENTRE LA 5) 
                    $queryTotalEnePrVe="update reporte_mercadotecnia set acumulado = (select acumulado from reporte_mercadotecnia where nivel = 11)/(select acumulado from reporte_mercadotecnia where nivel = 7)/(select acumulado from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotEnePrVe = $dbconec->prepare($queryTotalEnePrVe);
                    $stmtTotEnePrVe->execute();
                     
                    
                    ////////////////////////// PROMEDIOS ////////////
                    
                    //JCV PARA PONER EL NUMERO DE MES, CON BASE AL MES ACTUAL
                    
                    $mes_actual = date('n');
                    
                    
                    //PARA SABERLOS VALORES DE LOS CAMPOS DEENERO ADICIEMBRE 
                    //EMPEZAMOS CON DICIEMBRE SI DICIEMBRE NO ES CERO (O SEA TIENE VALORES) ES 12, SINO SE VA HACIA NOVIEMBRE Y ASI SUCESIVAMENTE
                    
                   
                    //$dbconec = Conexion::Conectar();

                    try 
                    { 
                        $query = "SELECT * FROM reporte_mercadotecnia where nivel =1 ;";
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
                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, NO HAY REGISTROS EN MERCADOTECNIA</span>';
                    }
                    
               
                    
                    
                    //JCV PARA messes promedio
                    $queryTotalMarPrVe="update reporte_mercadotecnia set meses_promedio = $mes_actual ;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                    
                    //JCV PARA PROMEDIOS DE TODAS
                    $queryTotalMarPrVe="update reporte_mercadotecnia set promedio = acumulado / meses_promedio ;";
                    $stmtTotMarPrVe = $dbconec->prepare($queryTotalMarPrVe);
                    $stmtTotMarPrVe->execute();
                    
                    
                    //JCV PARA PROMEDIOS DE % de conversion
                    $queryTotalEnePoCo="update reporte_mercadotecnia set promedio = ((select promedio from reporte_mercadotecnia where nivel = 3)/(select promedio from reporte_mercadotecnia where nivel = 1))*100 where nivel = 2;";
                    $stmtTotEnePoCo = $dbconec->prepare($queryTotalEnePoCo);
                    $stmtTotEnePoCo->execute();
                    
                      //JCV PARA TRANSACCIONES PROMEDIO
                    $queryTotalEneTrPr="update reporte_mercadotecnia set promedio = (select promedio from reporte_mercadotecnia where nivel = 6)/(select promedio from reporte_mercadotecnia where nivel = 5) where nivel = 7;";
                    $stmtTotEneTrPr = $dbconec->prepare($queryTotalEneTrPr);
                    $stmtTotEneTrPr->execute();
                    
                    //JCV MONTO PROMEDIO DE VENTA (LA 11 ENTRE LA 7 ENTRE LA 5) 
                     $queryTotalEnePrVe="update reporte_mercadotecnia set promedio = (select promedio from reporte_mercadotecnia where nivel = 11)/(select promedio from reporte_mercadotecnia where nivel = 7)/(select promedio from reporte_mercadotecnia where nivel = 5) where nivel = 8;";
                    $stmtTotEnePrVe = $dbconec->prepare($queryTotalEnePrVe);
                    $stmtTotEnePrVe->execute();
                    
                    
                    
                $dbconec = null;

            } else{
                
                //falta mensaje de que no hay registros 
            }// JCV DEL IF



                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                
                
                
                public function Listar_mercadotecnia() 
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    { 
                            $query = "SELECT * FROM reporte_mercadotecnia where nivel <999 order by nivel ;";
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
                
                
                
                
                public function Saber_mes_decalculo_mercadotecnia() 
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    { 
                            $query = "SELECT * FROM reporte_mercadotecnia where nivel =1 ;";
                            $stmt = $dbconec->prepare($query);
                            $stmt->execute();
                            $count = $stmt->rowCount();

                            if($count > 0)
                            {
                                    return $stmt->fetchAll();
                            }
                    


                            $dbconec = null;
                    } catch (Exception $e) {

                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, NO HAY REGISTROS EN MERCADOTECNIA</span>';
                    }
		}
                
            
                
                
                
                
                
                
                		
                
                
                
		

	}


 ?>
