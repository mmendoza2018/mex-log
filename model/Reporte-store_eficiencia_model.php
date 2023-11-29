<?php       
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');  
         
    
	class ReporteeficienciaModel extends Conexion  
	{
                  
                public function Insertar_datos_eficiencia()     
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                        
                                
                    
                     //JCV MARGEN BRUTO EFICIENCIA(LA 53/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_edoresultados where nivel = 53)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_edoresultados where nivel = 53)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_edoresultados where nivel = 53)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    //ABRIL
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_edoresultados where nivel = 53)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_edoresultados where nivel = 53)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_edoresultados where nivel = 53)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    //JULIO
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_edoresultados where nivel = 53)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                    
                    $queryTotalEneMaBrEfi="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_edoresultados where nivel = 53)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 601;";
                    $stmtTotEneMaBrEfi = $dbconec->prepare($queryTotalEneMaBrEfi);
                    $stmtTotEneMaBrEfi->execute();
                    
                    
                    
                    
                                 
                    
                    
                     
                    //JCV MARGEN DE OPERACIÓN EFICIENCIA(LA 59/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_edoresultados where nivel = 59)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_edoresultados where nivel = 59)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                                              
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_edoresultados where nivel = 59)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    //ABRIL
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_edoresultados where nivel = 59)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_edoresultados where nivel = 59)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_edoresultados where nivel = 59)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    //JULIO
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_edoresultados where nivel = 59)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                    $queryTotalEneMaOpEfi="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_edoresultados where nivel = 59)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 602;";
                    $stmtTotEneMaOpEfi = $dbconec->prepare($queryTotalEneMaOpEfi);
                    $stmtTotEneMaOpEfi->execute();
                    
                    
                                   
                                                                  
                                              
                    
                    //JCV MARGEN NETO EFICIENCIA(LA 63/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_edoresultados where nivel = 63)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                    $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_edoresultados where nivel = 63)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                    $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_edoresultados where nivel = 63)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                    //ABRIL
                     $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_edoresultados where nivel = 63)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                     $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_edoresultados where nivel = 63)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                     $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_edoresultados where nivel = 63)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                    //JULIO
                     $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_edoresultados where nivel = 63)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                     $queryTotalEneManEEfi="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_edoresultados where nivel = 63)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 603;";
                    $stmtTotEneMaNeEfi = $dbconec->prepare($queryTotalEneManEEfi);
                    $stmtTotEneMaNeEfi->execute();
                    
                    
                    
                    //JCV INVERSIÓN EN GENTE COMISIÓN EFICIENCIA(LA 12 de reporte_mercadotecnia/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_mercadotecnia where nivel = 12)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();
                    
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_mercadotecnia where nivel = 12)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();
                    
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_mercadotecnia where nivel = 12)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();

                    //ABRIL
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_mercadotecnia where nivel = 12)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();
                    
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_mercadotecnia where nivel = 12)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();
                    
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_mercadotecnia where nivel = 12)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();
                    
                    //JULIO
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_mercadotecnia where nivel = 12)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();

//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                    $queryTotalEneInCoEfi="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_mercadotecnia where nivel = 12)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 604;";
                    $stmtTotEneInCoEfi = $dbconec->prepare($queryTotalEneInCoEfi);
                    $stmtTotEneInCoEfi->execute();    
                                        
                    
                    
                    //JCV INVERSIÓN EN GENTE EFICIENCIA(LA 66/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_edoresultados where nivel = 66)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_edoresultados where nivel = 66)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_edoresultados where nivel = 66)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    //ABRIL
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_edoresultados where nivel = 66)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_edoresultados where nivel = 66)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_edoresultados where nivel = 66)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
                    //JULIO
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_edoresultados where nivel = 66)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                    $queryTotalEneInGeEfi="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_edoresultados where nivel = 66)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 605;";
                    $stmtTotEneInGeEfi = $dbconec->prepare($queryTotalEneInGeEfi);
                    $stmtTotEneInGeEfi->execute();     
                    
                    
                    
                    //JCV INVERSIÓN EN MARKETING EFICIENCIA(LA (55*-1)/51 DE LA TABLA reporte_edoresultados)
                     
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set enero = (((select enero from reporte_edoresultados where nivel = 55)*-1)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set febrero = (((select febrero from reporte_edoresultados where nivel = 55)*-1)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set marzo = (((select marzo from reporte_edoresultados where nivel = 55)*-1)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    //ABRIL
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set abril = (((select abril from reporte_edoresultados where nivel = 55)*-1)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set mayo = (((select mayo from reporte_edoresultados where nivel = 55)*-1)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set junio = (((select junio from reporte_edoresultados where nivel = 55)*-1)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
                    //JULIO
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set julio = (((select julio from reporte_edoresultados where nivel = 55)*-1)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO
                    $queryTotalEneInMaEfi="update reporte_store_eficienciaaliquidez set acumulado = (((select acumulado from reporte_edoresultados where nivel = 55)*-1)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 606;";
                    $stmtTotEneInMaEfi = $dbconec->prepare($queryTotalEneInMaEfi);
                    $stmtTotEneInMaEfi->execute();                       
                    
                    
                     //JCV PUNTO DE EQUILIBRIO MENSUAL EFICIENCIA((LA 58 reporte_edoresultados/601 DE LA TABLA reporte_store_eficienciaaliquidez)*-1)
                     
                    $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set enero = (((select enero from reporte_edoresultados where nivel = 58)/(select enero from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set febrero = (((select febrero from reporte_edoresultados where nivel = 58)/(select febrero from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set marzo = (((select marzo from reporte_edoresultados where nivel = 58)/(select marzo from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                    //ABRIL
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set abril = (((select abril from reporte_edoresultados where nivel = 58)/(select abril from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set mayo = (((select mayo from reporte_edoresultados where nivel = 58)/(select mayo from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set junio = (((select junio from reporte_edoresultados where nivel = 58)/(select junio from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();
                    
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set julio = (((select julio from reporte_edoresultados where nivel = 58)/(select julio from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();


//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEnePuEqMeEfi="update reporte_store_eficienciaaliquidez set acumulado = (((select acumulado from reporte_edoresultados where nivel = 58)/(select acumulado from reporte_store_eficienciaaliquidez where nivel = 601))*-1) *100 where nivel = 607;";
                    $stmtTotEnePuEqMeEfi = $dbconec->prepare($queryTotalEnePuEqMeEfi);
                    $stmtTotEnePuEqMeEfi->execute();                        
                    
                    
                    
                    //JCV PUNTO DE EQUILIBRIO SEMANAL EFICIENCIA(LA 607/4.33 DE LA TABLA reporte_store_eficienciaaliquidez)
                     
                    $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                    //ABRIL
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEnePuEqSeEfi="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_store_eficienciaaliquidez where nivel = 607)/4.33 where nivel = 608;";
                    $stmtTotEnePuEqSeEfi = $dbconec->prepare($queryTotalEnePuEqSeEfi);
                    $stmtTotEnePuEqSeEfi->execute();
                    
                     
                    
                    
                    //JCV ROTACIÓN DE ACTIVOS OPERATIVOS ACTIVIDAD(LA 51 reporte_edoresultados/(206 DE LA TABLA reporte_store_cxc + 304 DE reporte_store_inventarios))
                     
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_edoresultados where nivel = 51)/((select enero from reporte_store_cxc where nivel = 206)+(select enero from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_edoresultados where nivel = 51)/((select febrero from reporte_store_cxc where nivel = 206)+(select febrero from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_edoresultados where nivel = 51)/((select marzo from reporte_store_cxc where nivel = 206)+(select marzo from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    //ABRIL
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_edoresultados where nivel = 51)/((select abril from reporte_store_cxc where nivel = 206)+(select abril from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_edoresultados where nivel = 51)/((select mayo from reporte_store_cxc where nivel = 206)+(select mayo from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_edoresultados where nivel = 51)/((select junio from reporte_store_cxc where nivel = 206)+(select junio from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    //JULIO
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_edoresultados where nivel = 51)/((select julio from reporte_store_cxc where nivel = 206)+(select julio from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_edoresultados where nivel = 51)/((select acumulado from reporte_store_cxc where nivel = 206)+(select acumulado from reporte_store_inventarios where nivel = 304)) where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    
                    //JCV PROMEDIO      
                    $queryTotalEneRoAcAct="update reporte_store_eficienciaaliquidez set promedio = ((select promedio from reporte_edoresultados where nivel = 63)/((select promedio from reporte_store_cxc where nivel = 201)+(select promedio from reporte_store_inventarios where nivel = 301)))*12 where nivel = 610;";
                    $stmtTotEneRoAcAct = $dbconec->prepare($queryTotalEneRoAcAct);
                    $stmtTotEneRoAcAct->execute();
                    
                    
                     //JCV DÍAS DE COBRANZA ACTIVIDAD: 30/(LA 51 reporte_edoresultados/((201 DE LA TABLA reporte_store_cxc + 206 DE reporte_store_cxc)/2))
                     
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set enero = 30/((select enero from reporte_edoresultados where nivel = 51)/(((select enero from reporte_store_cxc where nivel = 201)+(select enero from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set febrero = 30/((select febrero from reporte_edoresultados where nivel = 51)/(((select febrero from reporte_store_cxc where nivel = 201)+(select febrero from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set marzo = 30/((select marzo from reporte_edoresultados where nivel = 51)/(((select marzo from reporte_store_cxc where nivel = 201)+(select marzo from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    //ABRIL
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set abril = 30/((select abril from reporte_edoresultados where nivel = 51)/(((select abril from reporte_store_cxc where nivel = 201)+(select abril from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set mayo = 30/((select mayo from reporte_edoresultados where nivel = 51)/(((select mayo from reporte_store_cxc where nivel = 201)+(select mayo from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set junio = 30/((select junio from reporte_edoresultados where nivel = 51)/(((select junio from reporte_store_cxc where nivel = 201)+(select junio from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    //JULIO
                    $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set julio = 30/((select julio from reporte_edoresultados where nivel = 51)/(((select julio from reporte_store_cxc where nivel = 201)+(select julio from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set acumulado = 30/((select acumulado from reporte_edoresultados where nivel = 51)/(((select acumulado from reporte_store_cxc where nivel = 201)+(select acumulado from reporte_store_cxc where nivel = 206))/2)) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();
                    
                    
                    //JCV PROMEDIO  
                     $queryTotalEneDiCoAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_store_cxc where nivel = 201)/((select promedio from reporte_store_cxc where nivel = 203)/30) where nivel = 611;";
                    $stmtTotEneDiCoAct = $dbconec->prepare($queryTotalEneDiCoAct);
                    $stmtTotEneDiCoAct->execute();


                    //JCV DÍAS DE COBRO ACTIVIDAD: 30 / (LA 202 reporte_store_cxc/201 DE LA TABLA reporte_store_cxc)
                     
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set enero = 30/((select enero from reporte_store_cxc where nivel = 202)/(select enero from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set febrero = 30/((select febrero from reporte_store_cxc where nivel = 202)/(select febrero from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set marzo = 30/((select marzo from reporte_store_cxc where nivel = 202)/(select marzo from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    //ABRIL
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set abril = 30/((select abril from reporte_store_cxc where nivel = 202)/(select abril from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set mayo = 30/((select mayo from reporte_store_cxc where nivel = 202)/(select mayo from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set junio = 30/((select junio from reporte_store_cxc where nivel = 202)/(select junio from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    //JULIO
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set julio = 30/((select julio from reporte_store_cxc where nivel = 202)/(select julio from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set acumulado = 30/((select acumulado from reporte_store_cxc where nivel = 202)/(select acumulado from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    
                    //JCV PROMEDIO  
                    $queryTotalEneDiCobAct="update reporte_store_eficienciaaliquidez set promedio = 30/((select promedio from reporte_store_cxc where nivel = 202)/(select promedio from reporte_store_cxc where nivel = 201)) where nivel = 612;";
                    $stmtTotEneDiCobAct = $dbconec->prepare($queryTotalEneDiCobAct);
                    $stmtTotEneDiCobAct->execute();
                    
                    
                    
                    //JCV DÍAS DE INVENTARIO ACTIVIDAD: (LA 306 reporte_store_inventarios)
                     
                    $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                    //ABRIL
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                    //JULIO
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_store_inventarios where nivel = 306) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();
                    
                    
                    //JCV PROMEDIO 
                     $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_store_inventarios where nivel = 301)/((select promedio from reporte_edoresultados where nivel = 52)/30) where nivel = 613;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();


                    
                    //JCV DÍAS DE PAGO ACTIVIDAD: (LA 408 reporte_store_proveedores)
                     
                    $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                    $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();

                    $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                    //ABRIL
                     $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                     $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                     $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                    //JULIO
                     $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEneDiPaAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_store_proveedores where nivel = 408) where nivel = 614;";
                    $stmtTotEneDiPaAct = $dbconec->prepare($queryTotalEneDiPaAct);
                    $stmtTotEneDiPaAct->execute();
                    
                    
                    //JCV PROMEDIO 
                    $queryTotalEneDiInAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_store_proveedores where nivel = 401)/((select promedio from reporte_edoresultados where nivel = 51)/30) where nivel = 614;";
                    $stmtTotEneDiInAct = $dbconec->prepare($queryTotalEneDiInAct);
                    $stmtTotEneDiInAct->execute();

 

                    //JCV DÍAS DE RECUPERACIÓN DEL EFECTIVO ACTIVIDAD(LA 612+613-614 DE LA TABLA reporte_store_eficienciaaliquidez)
                     
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_store_eficienciaaliquidez where nivel = 612)+(select enero from reporte_store_eficienciaaliquidez where nivel = 613)-(select enero from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_store_eficienciaaliquidez where nivel = 612)+(select febrero from reporte_store_eficienciaaliquidez where nivel = 613)-(select febrero from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_store_eficienciaaliquidez where nivel = 612)+(select marzo from reporte_store_eficienciaaliquidez where nivel = 613)-(select marzo from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    //ABRIL
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_store_eficienciaaliquidez where nivel = 612)+(select marzo from reporte_store_eficienciaaliquidez where nivel = 613)-(select marzo from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_store_eficienciaaliquidez where nivel = 612)+(select marzo from reporte_store_eficienciaaliquidez where nivel = 613)-(select marzo from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_store_eficienciaaliquidez where nivel = 612)+(select marzo from reporte_store_eficienciaaliquidez where nivel = 613)-(select marzo from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    //JULIO
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_store_eficienciaaliquidez where nivel = 612)+(select marzo from reporte_store_eficienciaaliquidez where nivel = 613)-(select marzo from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_store_eficienciaaliquidez where nivel = 612)+(select acumulado from reporte_store_eficienciaaliquidez where nivel = 613)-(select acumulado from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    
                    //JCV PROMEDIO                     
                    $queryTotalEneReEfEfi="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_store_eficienciaaliquidez where nivel = 611)+(select promedio from reporte_store_eficienciaaliquidez where nivel = 613)-(select promedio from reporte_store_eficienciaaliquidez where nivel = 614) where nivel = 615;";
                    $stmtTotEneReEfEfi = $dbconec->prepare($queryTotalEneReEfEfi);
                    $stmtTotEneReEfEfi->execute();
                    
                    
                    
                    //JCV ROI EN GENTE RETORNO: LA 63 reporte_edoresultados/66 DE LA TABLA reporte_edoresultados 
                     
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_edoresultados where nivel = 63)/(select enero from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_edoresultados where nivel = 63)/(select febrero from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_edoresultados where nivel = 63)/(select marzo from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    //ABRIL
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_edoresultados where nivel = 63)/(select abril from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_edoresultados where nivel = 63)/(select mayo from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_edoresultados where nivel = 63)/(select junio from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    //JULIO
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_edoresultados where nivel = 63)/(select julio from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_edoresultados where nivel = 63)/(select acumulado from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();
                    
                    
                    //JCV PROMEDIO             
                    $queryTotalEneROGeAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_edoresultados where nivel = 63)/(select promedio from reporte_edoresultados where nivel = 66) where nivel = 617;";
                    $stmtTotEneROGeAct = $dbconec->prepare($queryTotalEneROGeAct);
                    $stmtTotEneROGeAct->execute();

                    
                    
                    
                    //JCV ROI DE MARKETING RETORNO: LA 63 reporte_edoresultados/(55 DE LA TABLA reporte_edoresultados*-1) 
                     
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_edoresultados where nivel = 63)/((select enero from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_edoresultados where nivel = 63)/((select febrero from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_edoresultados where nivel = 63)/((select marzo from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    //ABRIL
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_edoresultados where nivel = 63)/((select abril from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_edoresultados where nivel = 63)/((select mayo from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_edoresultados where nivel = 63)/((select junio from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    //JULIO
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_edoresultados where nivel = 63)/((select julio from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_edoresultados where nivel = 63)/((select acumulado from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();
                    
                    
                    //JCV PROMEDIO 
                     $queryTotalEneROMaAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_edoresultados where nivel = 63)/((select promedio from reporte_edoresultados where nivel = 55)*-1) where nivel = 618;";
                    $stmtTotEneROMaAct = $dbconec->prepare($queryTotalEneROMaAct);
                    $stmtTotEneROMaAct->execute();


                    
                    //JCV ROI DE ACTIVOS OPERATIVOS RETORNO: LA 63 reporte_edoresultados/(201 DE LA TABLA reporte_store_cxc + 301 DE reporte_store_inventarios) 
                     
                    $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set enero = (select enero from reporte_edoresultados where nivel = 63)/((select enero from reporte_store_cxc where nivel = 201)+(select enero from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                    $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set febrero = (select febrero from reporte_edoresultados where nivel = 63)/((select febrero from reporte_store_cxc where nivel = 201)+(select febrero from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                    $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set marzo = (select marzo from reporte_edoresultados where nivel = 63)/((select marzo from reporte_store_cxc where nivel = 201)+(select marzo from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                    //ABRIL
                     $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set abril = (select abril from reporte_edoresultados where nivel = 63)/((select abril from reporte_store_cxc where nivel = 201)+(select abril from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                     $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set mayo = (select mayo from reporte_edoresultados where nivel = 63)/((select mayo from reporte_store_cxc where nivel = 201)+(select mayo from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                     $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set junio = (select junio from reporte_edoresultados where nivel = 63)/((select junio from reporte_store_cxc where nivel = 201)+(select junio from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                    //JULIO
                     $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set julio = (select julio from reporte_edoresultados where nivel = 63)/((select julio from reporte_store_cxc where nivel = 201)+(select julio from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                     $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set acumulado = (select acumulado from reporte_edoresultados where nivel = 63)/((select acumulado from reporte_store_cxc where nivel = 201)+(select acumulado from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                    
                    
                    //JCV PROMEDIO          
                    $queryTotalEneROAcOpAct="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_edoresultados where nivel = 63)/((select promedio from reporte_store_cxc where nivel = 201)+(select promedio from reporte_store_inventarios where nivel = 301)) where nivel = 619;";
                    $stmtTotEneROAcOpAct = $dbconec->prepare($queryTotalEneROAcOpAct);
                    $stmtTotEneROAcOpAct->execute();
                     
                    
                    
                    //JCV LIQUIDEZ LIQUIDEZ Y SOLVENCIA: (LA 206 reporte_store_cxc + 304 DE LA TABLA reporte_store_inventarios) / 406 DE reporte_store_proveedores
                     
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_store_cxc where nivel = 206)+(select enero from reporte_store_inventarios where nivel = 304))/(select enero from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_store_cxc where nivel = 206)+(select febrero from reporte_store_inventarios where nivel = 304))/(select febrero from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_store_cxc where nivel = 206)+(select marzo from reporte_store_inventarios where nivel = 304))/(select marzo from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    //ABRIL
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_store_cxc where nivel = 206)+(select abril from reporte_store_inventarios where nivel = 304))/(select abril from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set mayo = ((select marzo from reporte_store_cxc where nivel = 206)+(select mayo from reporte_store_inventarios where nivel = 304))/(select mayo from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_store_cxc where nivel = 206)+(select junio from reporte_store_inventarios where nivel = 304))/(select junio from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    //JULIO
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_store_cxc where nivel = 206)+(select julio from reporte_store_inventarios where nivel = 304))/(select julio from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                     
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_store_cxc where nivel = 206)+(select acumulado from reporte_store_inventarios where nivel = 304))/(select acumulado from reporte_store_proveedores where nivel = 406) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    
                    //JCV PROMEDIO          
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set promedio = ((select promedio from reporte_store_cxc where nivel = 201)+(select promedio from reporte_store_inventarios where nivel = 301))/(select promedio from reporte_store_proveedores where nivel = 401) where nivel = 620;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    
                    
                    //JCV VALOR DEL CAPITAL DE TRABAJO LIQUIDEZ Y SOLVENCIA: (LA 206 reporte_store_cxc + 304 DE LA TABLA reporte_store_inventarios) - 406 DE reporte_store_proveedores
                     
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set enero = ((select enero from reporte_store_cxc where nivel = 206)+(select enero from reporte_store_inventarios where nivel = 304))-(select enero from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                     $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set febrero = ((select febrero from reporte_store_cxc where nivel = 206)+(select febrero from reporte_store_inventarios where nivel = 304))-(select febrero from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                     $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set marzo = ((select marzo from reporte_store_cxc where nivel = 206)+(select marzo from reporte_store_inventarios where nivel = 304))-(select marzo from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    //ABRIL
                      $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set abril = ((select abril from reporte_store_cxc where nivel = 206)+(select abril from reporte_store_inventarios where nivel = 304))-(select abril from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                      $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set mayo = ((select mayo from reporte_store_cxc where nivel = 206)+(select mayo from reporte_store_inventarios where nivel = 304))-(select mayo from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                      $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set junio = ((select junio from reporte_store_cxc where nivel = 206)+(select junio from reporte_store_inventarios where nivel = 304))-(select junio from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                    //JULIO
                      $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set julio = ((select julio from reporte_store_cxc where nivel = 206)+(select julio from reporte_store_inventarios where nivel = 304))-(select julio from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    //JCV ACUMULADO 
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set acumulado = ((select acumulado from reporte_store_cxc where nivel = 206)+(select acumulado from reporte_store_inventarios where nivel = 304))-(select acumulado from reporte_store_proveedores where nivel = 406) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                    
                        
                    //JCV PROMEDIO          
                    $queryTotalEneLiSol="update reporte_store_eficienciaaliquidez set promedio = (select promedio from reporte_store_cxc where nivel = 201)+(select promedio from reporte_store_inventarios where nivel = 301)-(select promedio from reporte_store_proveedores where nivel = 401) where nivel = 621;";
                    $stmtTotEneLiSol = $dbconec->prepare($queryTotalEneLiSol);
                    $stmtTotEneLiSol->execute();
                                                            
                     
                    
                    
                     
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                 
                
                public function Listar_eficiencia()    
		{ 
                            $dbconec = Conexion::Conectar();
 
                    try  
                    {   
                            $query = "SELECT * FROM reporte_store_eficienciaaliquidez  where nivel >= 601 and nivel <=621 order by nivel ;";
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
