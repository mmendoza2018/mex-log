<?php 
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');
        
   
	class ReporteedoresultadosModel extends Conexion  
	{
             
                public function Insertar_datos_flujo()
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;

                     
                    $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=201 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                    
                    if($cuenta<=0){
                         echo '<span class="label label-danger label-block">Primero tiene que calcular el Análiis de flujo de efectivo.  Se encuentra dentro del menú principal en la ópción Flujo de efectivo y Análisis de flujo en el tab 2</span>';
                        exit();
                    }
                     
                        
                        $queryBorrar= "Select * from reporte_edoresultados";
                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                        $stmtBorrar->execute();
                        $count = $stmtBorrar->rowCount(); 
                        if($count > 0)
                        {
                                 
                
                   
                    
                    //JCV VENTAS (ES LA 11 DE LA TABLA reporte_mercadotecnia)
                    
                    $queryTotalEneVe="update reporte_edoresultados set enero = (select enero from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    $queryTotalFebVe="update reporte_edoresultados set febrero = (select febrero from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotFebVe = $dbconec->prepare($queryTotalFebVe);
                    $stmtTotFebVe->execute();
                    
                    $queryTotalMarVe="update reporte_edoresultados set marzo = (select marzo from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotMarVe = $dbconec->prepare($queryTotalMarVe);
                    $stmtTotMarVe->execute();
                    
                    //ABRIL
                    $queryTotalMarVe="update reporte_edoresultados set abril = (select abril from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotMarVe = $dbconec->prepare($queryTotalMarVe);
                    $stmtTotMarVe->execute();
                    
                    $queryTotalMarVe="update reporte_edoresultados set mayo = (select mayo from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotMarVe = $dbconec->prepare($queryTotalMarVe);
                    $stmtTotMarVe->execute();
                    
                    $queryTotalMarVe="update reporte_edoresultados set junio = (select junio from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotMarVe = $dbconec->prepare($queryTotalMarVe);
                    $stmtTotMarVe->execute();
                    
                    //JULIO
                    $queryTotalMarVe="update reporte_edoresultados set julio = (select julio from reporte_mercadotecnia where nivel = 11) where nivel = 51;";
                    $stmtTotMarVe = $dbconec->prepare($queryTotalMarVe);
                    $stmtTotMarVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                        
                    
                    
                    //JCV COSTO DE VENTAS (ES LA 203 DE LA TABLA flujo_de_efectivo)
                    
                    $queryTotalEneCoVe="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotEneCoVe = $dbconec->prepare($queryTotalEneCoVe);
                    $stmtTotEneCoVe->execute();
                    
                    $queryTotalFebCoVe="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotFebCoVe = $dbconec->prepare($queryTotalFebCoVe);
                    $stmtTotFebCoVe->execute();
                    
                    $queryTotalMarCoVe="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    //ABRIL
                    $queryTotalMarCoVe="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    $queryTotalMarCoVe="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    $queryTotalMarCoVe="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    //JULIO
                    $queryTotalMarCoVe="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 203) where nivel = 52;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                        


                     //JCV UTILIDAD BRUTA (ES LA SUMA DE LA 51 + 52 DE  reporte_edoresultados)
                    
                    $queryTotalEneUtBr="update reporte_edoresultados set enero = (select enero from reporte_edoresultados where nivel = 51)+(select enero from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                    $queryTotalFebUtBr="update reporte_edoresultados set febrero = (select febrero from reporte_edoresultados where nivel = 51)+(select febrero from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotFebUtBr = $dbconec->prepare($queryTotalFebUtBr);
                    $stmtTotFebUtBr->execute();
                    
                    $queryTotalMarUtBr="update reporte_edoresultados set marzo = (select marzo from reporte_edoresultados where nivel = 51)+(select marzo from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotMarUtBr = $dbconec->prepare($queryTotalMarUtBr);
                    $stmtTotMarUtBr->execute();
                    
                    //ABRIL
                    $queryTotalMarUtBr="update reporte_edoresultados set abril = (select abril from reporte_edoresultados where nivel = 51)+(select abril from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotMarUtBr = $dbconec->prepare($queryTotalMarUtBr);
                    $stmtTotMarUtBr->execute();
                    
                    $queryTotalMarUtBr="update reporte_edoresultados set mayo = (select mayo from reporte_edoresultados where nivel = 51)+(select mayo from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotMarUtBr = $dbconec->prepare($queryTotalMarUtBr);
                    $stmtTotMarUtBr->execute();
                    
                    $queryTotalMarUtBr="update reporte_edoresultados set junio = (select junio from reporte_edoresultados where nivel = 51)+(select junio from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotMarUtBr = $dbconec->prepare($queryTotalMarUtBr);
                    $stmtTotMarUtBr->execute();
                    
                    //JULIO
                    $queryTotalMarUtBr="update reporte_edoresultados set julio = (select julio from reporte_edoresultados where nivel = 51)+(select julio from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotMarUtBr = $dbconec->prepare($queryTotalMarUtBr);
                    $stmtTotMarUtBr->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                     
                    //JCV MARGEN BRUT0 (ES LA DIVISIÓN DE LA 53 / 51 DE  reporte_edoresultados)
                    
                    $queryTotalEneMaBr="update reporte_edoresultados set enero = ((select enero from reporte_edoresultados where nivel = 53)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 54;";
                    $stmtTotEneMaBr = $dbconec->prepare($queryTotalEneMaBr);
                    $stmtTotEneMaBr->execute();
                    
                    $queryTotalFebMaBr="update reporte_edoresultados set febrero = ((select febrero from reporte_edoresultados where nivel = 53)/(select febrero from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotFebMaBr = $dbconec->prepare($queryTotalFebMaBr);
                    $stmtTotFebMaBr->execute();
                    
                    $queryTotalMarMaBr="update reporte_edoresultados set marzo = ((select marzo from reporte_edoresultados where nivel = 53)/(select marzo from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotMarMaBr = $dbconec->prepare($queryTotalMarMaBr);
                    $stmtTotMarMaBr->execute();
                    
                    //ABRIL
                     $queryTotalMarMaBr="update reporte_edoresultados set abril = ((select abril from reporte_edoresultados where nivel = 53)/(select abril from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotMarMaBr = $dbconec->prepare($queryTotalMarMaBr);
                    $stmtTotMarMaBr->execute();
                    
                     $queryTotalMarMaBr="update reporte_edoresultados set mayo = ((select mayo from reporte_edoresultados where nivel = 53)/(select mayo from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotMarMaBr = $dbconec->prepare($queryTotalMarMaBr);
                    $stmtTotMarMaBr->execute();
                    
                     $queryTotalMarMaBr="update reporte_edoresultados set junio = ((select junio from reporte_edoresultados where nivel = 53)/(select junio from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotMarMaBr = $dbconec->prepare($queryTotalMarMaBr);
                    $stmtTotMarMaBr->execute();
                    
                    //JULIO
                     $queryTotalMarMaBr="update reporte_edoresultados set julio = ((select julio from reporte_edoresultados where nivel = 53)/(select julio from reporte_edoresultados where nivel = 51))*100  where nivel = 54;";
                    $stmtTotMarMaBr = $dbconec->prepare($queryTotalMarMaBr);
                    $stmtTotMarMaBr->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                    //JCV gastos DE VENTAS Y MKT(ES LA 206 DE LA TABLA FLUJO_DE_EFECTIVO)
                    $queryTotalEneGaVe="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                    $queryTotalFebGaVe="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotFebGaVe = $dbconec->prepare($queryTotalFebGaVe);
                    $stmtTotFebGaVe->execute();
                    
                    $queryTotalMarGaVe="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotMarGaVe = $dbconec->prepare($queryTotalMarGaVe);
                    $stmtTotMarGaVe->execute();
                    
                    //ABRIL
                    $queryTotalMarGaVe="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotMarGaVe = $dbconec->prepare($queryTotalMarGaVe);
                    $stmtTotMarGaVe->execute();
                    
                    $queryTotalMarGaVe="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotMarGaVe = $dbconec->prepare($queryTotalMarGaVe);
                    $stmtTotMarGaVe->execute();
                    
                    $queryTotalMarGaVe="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotMarGaVe = $dbconec->prepare($queryTotalMarGaVe);
                    $stmtTotMarGaVe->execute();
                    
                    //JULIO
                    $queryTotalMarGaVe="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 206) where nivel = 55;";
                    $stmtTotMarGaVe = $dbconec->prepare($queryTotalMarGaVe);
                    $stmtTotMarGaVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE... 
                    
                    
                    //JCV gastos DE OPERACIÓN(ES LA 205 DE LA TABLA FLUJO_DE_EFECTIVO)
                    $queryTotalEneGaOp="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    $queryTotalFebGaOp="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotFebGaOp = $dbconec->prepare($queryTotalFebGaOp);
                    $stmtTotFebGaOp->execute();
                    
                    $queryTotalMarGaOp="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotMarGaOp = $dbconec->prepare($queryTotalMarGaOp);
                    $stmtTotMarGaOp->execute();
                    
                    //ABRIL
                    $queryTotalMarGaOp="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotMarGaOp = $dbconec->prepare($queryTotalMarGaOp);
                    $stmtTotMarGaOp->execute();
                    
                    $queryTotalMarGaOp="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotMarGaOp = $dbconec->prepare($queryTotalMarGaOp);
                    $stmtTotMarGaOp->execute();
                    
                    $queryTotalMarGaOp="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotMarGaOp = $dbconec->prepare($queryTotalMarGaOp);
                    $stmtTotMarGaOp->execute();
                    
                    //JULIO
                    $queryTotalMarGaOp="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 205) where nivel = 56;";
                    $stmtTotMarGaOp = $dbconec->prepare($queryTotalMarGaOp);
                    $stmtTotMarGaOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //JCV gastos DE ADMON(ES LA 207 DE LA TABLA FLUJO_DE_EFECTIVO)
                    $queryTotalEneGaAd="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    $queryTotalFebGaAd="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotFebGaAd = $dbconec->prepare($queryTotalFebGaAd);
                    $stmtTotFebGaAd->execute();
                    
                    $queryTotalEneGaAd="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    //ABRIL
                     $queryTotalEneGaAd="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                     $queryTotalEneGaAd="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                     $queryTotalEneGaAd="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                     $queryTotalEneGaAd="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 207) where nivel = 57;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //JCV TOTAL GASTOS FIJOS (ES LA SUMA DE LA 55 + 56 + 57 DE  reporte_edoresultados)
                    
                    $queryTotalEneToGaFi="update reporte_edoresultados set enero = (select enero from reporte_edoresultados where nivel = 55)+(select enero from reporte_edoresultados where nivel = 56)+(select enero from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotEneToGaFi = $dbconec->prepare($queryTotalEneToGaFi);
                    $stmtTotEneToGaFi->execute();
                    
                    $queryTotalFebToGaFi="update reporte_edoresultados set febrero = (select febrero from reporte_edoresultados where nivel = 55)+(select febrero from reporte_edoresultados where nivel = 56)+(select febrero from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotFebToGaFi = $dbconec->prepare($queryTotalFebToGaFi);
                    $stmtTotFebToGaFi->execute();

                    $queryTotalMarToGaFi="update reporte_edoresultados set marzo = (select marzo from reporte_edoresultados where nivel = 55)+(select marzo from reporte_edoresultados where nivel = 56)+(select marzo from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotMarToGaFi = $dbconec->prepare($queryTotalMarToGaFi);
                    $stmtTotMarToGaFi->execute();
                    
                    //ABRIL
                    $queryTotalMarToGaFi="update reporte_edoresultados set abril = (select abril from reporte_edoresultados where nivel = 55)+(select abril from reporte_edoresultados where nivel = 56)+(select abril from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotMarToGaFi = $dbconec->prepare($queryTotalMarToGaFi);
                    $stmtTotMarToGaFi->execute();
                    
                    $queryTotalMarToGaFi="update reporte_edoresultados set mayo = (select mayo from reporte_edoresultados where nivel = 55)+(select mayo from reporte_edoresultados where nivel = 56)+(select mayo from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotMarToGaFi = $dbconec->prepare($queryTotalMarToGaFi);
                    $stmtTotMarToGaFi->execute();
                    
                    $queryTotalMarToGaFi="update reporte_edoresultados set junio = (select junio from reporte_edoresultados where nivel = 55)+(select junio from reporte_edoresultados where nivel = 56)+(select junio from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotMarToGaFi = $dbconec->prepare($queryTotalMarToGaFi);
                    $stmtTotMarToGaFi->execute();
                    
                    $queryTotalMarToGaFi="update reporte_edoresultados set julio = (select julio from reporte_edoresultados where nivel = 55)+(select julio from reporte_edoresultados where nivel = 56)+(select julio from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotMarToGaFi = $dbconec->prepare($queryTotalMarToGaFi);
                    $stmtTotMarToGaFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE... 
                    
                    
                    //JCV EBITDA (ES LA SUMA DE LA 53 + 58 DE  reporte_edoresultados)
                    
                    $queryTotalEneEBITDA="update reporte_edoresultados set enero = (select enero from reporte_edoresultados where nivel = 53)+(select enero from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    $queryTotalFebEBITDA="update reporte_edoresultados set febrero = (select febrero from reporte_edoresultados where nivel = 53)+(select febrero from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotFebEBITDA = $dbconec->prepare($queryTotalFebEBITDA);
                    $stmtTotFebEBITDA->execute();
                    
                    $queryTotalMarEBITDA="update reporte_edoresultados set marzo = (select marzo from reporte_edoresultados where nivel = 53)+(select marzo from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotMarEBITDA = $dbconec->prepare($queryTotalMarEBITDA);
                    $stmtTotMarEBITDA->execute();
                    
                    //ABRIL
                    $queryTotalMarEBITDA="update reporte_edoresultados set abril = (select abril from reporte_edoresultados where nivel = 53)+(select abril from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotMarEBITDA = $dbconec->prepare($queryTotalMarEBITDA);
                    $stmtTotMarEBITDA->execute();
                    
                    $queryTotalMarEBITDA="update reporte_edoresultados set mayo = (select mayo from reporte_edoresultados where nivel = 53)+(select mayo from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotMarEBITDA = $dbconec->prepare($queryTotalMarEBITDA);
                    $stmtTotMarEBITDA->execute();
                    
                    $queryTotalMarEBITDA="update reporte_edoresultados set junio = (select junio from reporte_edoresultados where nivel = 53)+(select junio from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotMarEBITDA = $dbconec->prepare($queryTotalMarEBITDA);
                    $stmtTotMarEBITDA->execute();
                    
                    //JULIO
                    $queryTotalMarEBITDA="update reporte_edoresultados set julio = (select julio from reporte_edoresultados where nivel = 53)+(select julio from reporte_edoresultados where nivel = 58) where nivel = 59;";
                    $stmtTotMarEBITDA = $dbconec->prepare($queryTotalMarEBITDA);
                    $stmtTotMarEBITDA->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...     
                    
                    
                    //JCV MARGEN DE OPERACIÓN (ES LA DIVISIÓN DE LA 53 / 51 DE  reporte_edoresultados)
                    
                    $queryTotalEneMaOp="update reporte_edoresultados set enero = ((select enero from reporte_edoresultados where nivel = 59)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotEneMaOp = $dbconec->prepare($queryTotalEneMaOp);
                    $stmtTotEneMaOp->execute();
                    
                     $queryTotalFebMaOp="update reporte_edoresultados set febrero = ((select febrero from reporte_edoresultados where nivel = 59)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotFebMaOp = $dbconec->prepare($queryTotalFebMaOp);
                    $stmtTotFebMaOp->execute();
                    
                     $queryTotalMarMaOp="update reporte_edoresultados set marzo = ((select marzo from reporte_edoresultados where nivel = 59)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotMarMaOp = $dbconec->prepare($queryTotalMarMaOp);
                    $stmtTotMarMaOp->execute();
                    
                    //abril
                     $queryTotalMarMaOp="update reporte_edoresultados set abril = ((select abril from reporte_edoresultados where nivel = 59)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotMarMaOp = $dbconec->prepare($queryTotalMarMaOp);
                    $stmtTotMarMaOp->execute();
                    
                     $queryTotalMarMaOp="update reporte_edoresultados set mayo = ((select mayo from reporte_edoresultados where nivel = 59)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotMarMaOp = $dbconec->prepare($queryTotalMarMaOp);
                    $stmtTotMarMaOp->execute();
                    
                     $queryTotalMarMaOp="update reporte_edoresultados set junio = ((select junio from reporte_edoresultados where nivel = 59)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotMarMaOp = $dbconec->prepare($queryTotalMarMaOp);
                    $stmtTotMarMaOp->execute();
                    
                    //julio
                     $queryTotalMarMaOp="update reporte_edoresultados set julio = ((select julio from reporte_edoresultados where nivel = 59)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotMarMaOp = $dbconec->prepare($queryTotalMarMaOp);
                    $stmtTotMarMaOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...     

                    
                    //JCV - INTERESES(ES LA 210 DE LA TABLA flujo_de_efectivo)
                    
                    $queryTotalEneIn="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotEneIn = $dbconec->prepare($queryTotalEneIn);
                    $stmtTotEneIn->execute();
                    
                    $queryTotalFebIn="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotFebIn = $dbconec->prepare($queryTotalFebIn);
                    $stmtTotFebIn->execute();
                    
                    $queryTotalMarIn="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute();
                    
                    //ABRIL
                     $queryTotalMarIn="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute();
                    
                     $queryTotalMarIn="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute();
                    
                     $queryTotalMarIn="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute();
                    
                    //JULIO
                     $queryTotalMarIn="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 210) where nivel = 61;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute();
                    
//JCV FALTA DE ABRIL A DICIEMBRE...      
                    
                    
                    //JCV - IMPUESTOS(ES LA 211 DE LA TABLA flujo_de_efectivo)
                    
                    $queryTotalEneIm="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalFebIm="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotFebIm = $dbconec->prepare($queryTotalFebIm);
                    $stmtTotFebIm->execute();
                    
                    $queryTotalMarIm="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    //ABRIL
                    $queryTotalMarIm="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    $queryTotalMarIm="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    $queryTotalMarIm="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    //JULIO
                    $queryTotalMarIm="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 211) where nivel = 62;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...    
                    
                    
                    //JCV UTILIDAD NETA (ES LA SUMA DE LA 59 + 61 + 62 DE  reporte_edoresultados) NO TENEMOS LA 61 PERO CON EL AND ARREGLAMOS AUNQUE NO TENGAN VALOR SI LO CONSIDERA,
                    // PORQUE CUANDO NO EXISTE LA CUENTA NO HACE LA SELECCION
                    
                    $queryTotalEneUtNe="update reporte_edoresultados set enero = (select enero from reporte_edoresultados where nivel = 59)+(select sum(enero) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotEneUtNe = $dbconec->prepare($queryTotalEneUtNe);
                    $stmtTotEneUtNe->execute();
                    
                    $queryTotalFebUtNe="update reporte_edoresultados set febrero = (select febrero from reporte_edoresultados where nivel = 59)+(select sum(febrero) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotFebUtNe = $dbconec->prepare($queryTotalFebUtNe);
                    $stmtTotFebUtNe->execute();
                    
                    $queryTotalMarUtNe="update reporte_edoresultados set marzo = (select marzo from reporte_edoresultados where nivel = 59)+(select sum(marzo) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotMarUtNe = $dbconec->prepare($queryTotalMarUtNe);
                    $stmtTotMarUtNe->execute();
                    
                    //ABRIL
                    $queryTotalMarUtNe="update reporte_edoresultados set abril = (select abril from reporte_edoresultados where nivel = 59)+(select sum(abril) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotMarUtNe = $dbconec->prepare($queryTotalMarUtNe);
                    $stmtTotMarUtNe->execute();
                    
                    $queryTotalMarUtNe="update reporte_edoresultados set mayo = (select mayo from reporte_edoresultados where nivel = 59)+(select sum(mayo) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotMarUtNe = $dbconec->prepare($queryTotalMarUtNe);
                    $stmtTotMarUtNe->execute();
                    
                    $queryTotalMarUtNe="update reporte_edoresultados set junio = (select junio from reporte_edoresultados where nivel = 59)+(select sum(junio) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotMarUtNe = $dbconec->prepare($queryTotalMarUtNe);
                    $stmtTotMarUtNe->execute();
                    
                    //JULIO
                    $queryTotalMarUtNe="update reporte_edoresultados set julio = (select julio from reporte_edoresultados where nivel = 59)+(select sum(julio) from reporte_edoresultados where nivel >= 61 and nivel<=62) where nivel = 63;";
                    $stmtTotMarUtNe = $dbconec->prepare($queryTotalMarUtNe);
                    $stmtTotMarUtNe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...    


                    //JCV MARGEN NETO (ES LA DIVISIÓN DE LA 63 / 51 DE  reporte_edoresultados)
                    
                    $queryTotalEneMaNe="update reporte_edoresultados set enero = ((select enero from reporte_edoresultados where nivel = 63)/(select enero from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotEneMaNe = $dbconec->prepare($queryTotalEneMaNe);
                    $stmtTotEneMaNe->execute();
                    
                    $queryTotalFebMaNe="update reporte_edoresultados set febrero = ((select febrero from reporte_edoresultados where nivel = 63)/(select febrero from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotFebMaNe = $dbconec->prepare($queryTotalFebMaNe);
                    $stmtTotFebMaNe->execute();
                    
                    $queryTotalMarMaNe="update reporte_edoresultados set marzo = ((select marzo from reporte_edoresultados where nivel = 63)/(select marzo from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotMarMaNe = $dbconec->prepare($queryTotalMarMaNe);
                    $stmtTotMarMaNe->execute();
                    
                    //ABRIL
                     $queryTotalMarMaNe="update reporte_edoresultados set abril = ((select abril from reporte_edoresultados where nivel = 63)/(select abril from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotMarMaNe = $dbconec->prepare($queryTotalMarMaNe);
                    $stmtTotMarMaNe->execute();
                    
                     $queryTotalMarMaNe="update reporte_edoresultados set mayo = ((select mayo from reporte_edoresultados where nivel = 63)/(select mayo from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotMarMaNe = $dbconec->prepare($queryTotalMarMaNe);
                    $stmtTotMarMaNe->execute();
                    
                     $queryTotalMarMaNe="update reporte_edoresultados set junio = ((select junio from reporte_edoresultados where nivel = 63)/(select junio from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotMarMaNe = $dbconec->prepare($queryTotalMarMaNe);
                    $stmtTotMarMaNe->execute();
                    
                    //JULIO
                     $queryTotalMarMaNe="update reporte_edoresultados set julio = ((select julio from reporte_edoresultados where nivel = 63)/(select julio from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotMarMaNe = $dbconec->prepare($queryTotalMarMaNe);
                    $stmtTotMarMaNe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    
                    
                    //JCV GASTOS EN GENTE COMISIÓN (ES LA 12 DE LA TABLA reporte_mercadotecnia)
                    
                    $queryTotalEneGaGeCo="update reporte_edoresultados set enero = (select enero from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotEneGaGeCo = $dbconec->prepare($queryTotalEneGaGeCo);
                    $stmtTotEneGaGeCo->execute();
                    
                    $queryTotalFebGaGeCo="update reporte_edoresultados set febrero = (select febrero from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotFebGaGeCo = $dbconec->prepare($queryTotalFebGaGeCo);
                    $stmtTotFebGaGeCo->execute();
                    
                    $queryTotalMarGaGeCo="update reporte_edoresultados set marzo = (select marzo from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotMarGaGeCo = $dbconec->prepare($queryTotalMarGaGeCo);
                    $stmtTotMarGaGeCo->execute();
                    
                    //ABRIL
                    $queryTotalMarGaGeCo="update reporte_edoresultados set abril = (select abril from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotMarGaGeCo = $dbconec->prepare($queryTotalMarGaGeCo);
                    $stmtTotMarGaGeCo->execute();
                    
                    $queryTotalMarGaGeCo="update reporte_edoresultados set mayo = (select mayo from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotMarGaGeCo = $dbconec->prepare($queryTotalMarGaGeCo);
                    $stmtTotMarGaGeCo->execute();
                    
                    $queryTotalMarGaGeCo="update reporte_edoresultados set junio = (select junio from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotMarGaGeCo = $dbconec->prepare($queryTotalMarGaGeCo);
                    $stmtTotMarGaGeCo->execute();
                    
                    $queryTotalMarGaGeCo="update reporte_edoresultados set julio = (select julio from reporte_mercadotecnia where nivel = 12) where nivel = 65;";
                    $stmtTotMarGaGeCo = $dbconec->prepare($queryTotalMarGaGeCo);
                    $stmtTotMarGaGeCo->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                     
                    //JCV GASTO DE GENTE NOMINA (ES LA 5 DE LA TABLA flujo_de_efectivo)
                    
                    $queryTotalEneGaGeNo="update reporte_edoresultados set enero = (select enero from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotEneGaGeNo = $dbconec->prepare($queryTotalEneGaGeNo);
                    $stmtTotEneGaGeNo->execute();
                    
                    $queryTotalFebGaGeNo="update reporte_edoresultados set febrero = (select febrero from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotFebGaGeNo = $dbconec->prepare($queryTotalFebGaGeNo);
                    $stmtTotFebGaGeNo->execute();
                    
                    $queryTotalMarGaGeNo="update reporte_edoresultados set marzo = (select marzo from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotMarGaGeNo = $dbconec->prepare($queryTotalMarGaGeNo);
                    $stmtTotMarGaGeNo->execute();
                    
                    //ABRIL
                    $queryTotalMarGaGeNo="update reporte_edoresultados set abril = (select abril from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotMarGaGeNo = $dbconec->prepare($queryTotalMarGaGeNo);
                    $stmtTotMarGaGeNo->execute();
                    
                    $queryTotalMarGaGeNo="update reporte_edoresultados set mayo = (select mayo from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotMarGaGeNo = $dbconec->prepare($queryTotalMarGaGeNo);
                    $stmtTotMarGaGeNo->execute();
                    
                    $queryTotalMarGaGeNo="update reporte_edoresultados set junio = (select junio from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotMarGaGeNo = $dbconec->prepare($queryTotalMarGaGeNo);
                    $stmtTotMarGaGeNo->execute();
                    
                    //JULIO
                    $queryTotalMarGaGeNo="update reporte_edoresultados set julio = (select julio from flujo_de_efectivo where nivel = 5) where nivel = 66;";
                    $stmtTotMarGaGeNo = $dbconec->prepare($queryTotalMarGaGeNo);
                    $stmtTotMarGaGeNo->execute();
                    
                    
  //JCV FALTA DE AGOSTO A DICIEMBRE...  
                    
                    
                    ////////////////////ACUMULADO//////////////
                    
                    
                    //JCV PARA ACUMULADO DE TODAS
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                   
                    //JCV PARA ACUMULADO UTILIDAD BRUTA 51 + 52
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = (select acumulado from reporte_edoresultados where nivel = 51)+(select acumulado from reporte_edoresultados where nivel = 52) where nivel = 53;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                     //JCV PARA ACUMULADO margen BRUTo 53 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = ((select acumulado from reporte_edoresultados where nivel = 53)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 54;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA ACUMULADO TOTAL GASTOS FIJOS: SUMA DE LA 55 A LA 57
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = (select acumulado from reporte_edoresultados where nivel = 55)+(select acumulado from reporte_edoresultados where nivel = 56)+(select acumulado from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA ACUMULADO margen DE OPERACIÓN 59 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = ((select acumulado from reporte_edoresultados where nivel = 59)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA ACUMULADO TOTAL UTILIDAD NETA: SUMA DE LA 59 + 61+62
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = (select acumulado from reporte_edoresultados where nivel = 59)+(select acumulado from reporte_edoresultados where nivel = 61)+(select acumulado from reporte_edoresultados where nivel = 62) where nivel = 63;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA ACUMULADO margen NETO 63 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set acumulado = ((select acumulado from reporte_edoresultados where nivel = 63)/(select acumulado from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                     
                    
                    
                    
                    
                    ////////////////////////// PROMEDIOS ////////////
                    
                    //JCV PARA PONER EL NUMERO DE MES, CON BASE AL MES ACTUAL
                    
                    $mes_actual = date('n');
                    
                    
                    //PARA SABERLOS VALORES DE LOS CAMPOS DEENERO ADICIEMBRE 
                    //EMPEZAMOS CON DICIEMBRE SI DICIEMBRE NO ES CERO (O SEA TIENE VALORES) ES 12, SINO SE VA HACIA NOVIEMBRE Y ASI SUCESIVAMENTE
                    
                   
                    //$dbconec = Conexion::Conectar();

                    try 
                    { 
                        $query = "SELECT * FROM reporte_edoresultados where nivel =51 ;";
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
                    $queryTotalMePr="update reporte_edoresultados set promedio = acumulado / $mes_actual ;";
                    $stmtTotMePr = $dbconec->prepare($queryTotalMePr);
                    $stmtTotMePr->execute(); 
                    
                    
                     //JCV PARA promedio margen BRUTo 53 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set promedio = ((select promedio from reporte_edoresultados where nivel = 53)/(select promedio from reporte_edoresultados where nivel = 51))*100 where nivel = 54;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA PROMEDIO TOTAL GASTOS FIJOS: SUMA DE LA 55 A LA 57
                    $queryTotalAcuGral="update reporte_edoresultados set promedio = (select promedio from reporte_edoresultados where nivel = 55)+(select promedio from reporte_edoresultados where nivel = 56)+(select promedio from reporte_edoresultados where nivel = 57) where nivel = 58;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV PARA PROMEDIO margen DE OPERACIÓN 59 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set promedio = ((select promedio from reporte_edoresultados where nivel = 59)/(select promedio from reporte_edoresultados where nivel = 51))*100 where nivel = 60;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA PROMEDIO TOTAL UTILIDAD NETA: SUMA DE LA 59 + 61+62
                    $queryTotalAcuGral="update reporte_edoresultados set promedio = (select promedio from reporte_edoresultados where nivel = 59)+(select promedio from reporte_edoresultados where nivel = 61)+(select promedio from reporte_edoresultados where nivel = 62) where nivel = 63;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA PROMEDIO margen NETO 63 / 51 *100
                    $queryTotalAcuGral="update reporte_edoresultados set promedio = ((select promedio from reporte_edoresultados where nivel = 63)/(select promedio from reporte_edoresultados where nivel = 51))*100 where nivel = 64;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                       
                     
                $dbconec = null;

            } else{
                
                //falta mensaje de que no hay registros 
            }// JCV DEL IF



                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                
                
                
                public function Listar_edoresultados()  
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    { 
                            $query = "SELECT * FROM reporte_edoresultados where nivel <999 order by nivel ;";
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
