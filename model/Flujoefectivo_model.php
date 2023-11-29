<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/ 
	require_once('Conexion.php');
        
  
class CuentasdebancosModel extends Conexion 
{

        public function Insertar_datos_flujo()
        { 
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;

                    //JCV YA ESTÁ CON EL CICLO PARA TODAS LAS CUENTAS PARA TODOS LOS MESES

   
                //try 
                //{  
                        //JCV FALTA PONER EL MENSAJE DE SI ESTÁ VACÍA LA TABLA DE CUENTAS ACUMULATIVAS
                        $queryAcumulativa = "SELECT * FROM cuentas_acumulativa where estado=1 and nivel<96 order by nivel ;";
                        $stmtAcumulativa = $dbconec->prepare($queryAcumulativa);
                        $stmtAcumulativa->execute();
                        $count = $stmtAcumulativa->rowCount();

                        if($count > 0)
                        {
                                $filasAcumulativa= $stmtAcumulativa->fetchAll();
                        }else{
                            $dbconec = null;
                            exit();
                        } 

                        $queryBorrar= "Select * from flujo_de_efectivo";
                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                        $stmtBorrar->execute();
                        if($count > 0)
                        {
                                $queryBorrar="DELETE from flujo_de_efectivo";
                                $stmtBorrar = $dbconec->prepare($queryBorrar);
                                $stmtBorrar->execute();
                        }else{

                        }

                        //$mesito= intval(date("m"));
                        //$mesito= 3;

                        $cuantosinserto=0;
 
                        if (is_array($filasAcumulativa) || is_object($filasAcumulativa))
                        {
                            foreach ($filasAcumulativa as $row => $column)
                            {
                                $saldoEnero='0.00';
                                $saldoFebrero='0.00';
                                $saldoMarzo='0.00';
                                $saldoAbril='0.00';
                                $saldoMayo='0.00';
                                $saldoJunio='0.00';
                                $saldoJulio='0.00';
                                $saldoAgosto='0.00';
                                $saldoSeptiembre='0.00';
                                $saldoOctubre='0.00';
                                $saldoNoviembre='0.00';
                                $saldoDiciembre='0.00';
                                $saldot1='0.00';
                                $saldot2='0.00';
                                $id_acumulativaGlobal=$column['id_acumulativa'];
                                $nombre_atributoGlobal=$column['nombre_atributo'];
                               // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                $nivelGlobal=$column['nivel'];
                                $cuenta_acumulativaGlobal=$column['nombre'];




                 //PARA INGRESOS OPERATIVOS PONGO LA FORMULA ANTES DE QUE SE HAGA ENERO PORQUE SINO NO SE HACE ESTA PARTE PORQUE EL ORDEN ES ANTES Y NO HAY DATOS DE LA CUENTA DE INGRESOS
                 // OPERATIVOS, SOLO SE USA COMO REFERENCIA POR EL NOMBRE PARA QYE APAREZCA EN EL REPORTE               
                        if($nivelGlobal==1){
                            //jcv PARA RESULTADOS DE REPORTE:
                                $cxc ='0.00';
                                $contado ='0.00';
                                //$ingresosOperativos='0.00';

                            $queryContadoEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= 3
";  

                    $stmtContadoEnero = $dbconec->prepare($queryContadoEnero);
                    $stmtContadoEnero->execute();
                    $filasContadoEnero = $stmtContadoEnero;

                            if (is_array($filasContadoEnero) || is_object($filasContadoEnero))
                    {
                        foreach ($filasContadoEnero as $row => $column)
                        {

                            $contado =$column['SALDITO'];
                        }
                    }



                    $queryCxCEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= 2
";  


                    $stmtCxCEnero = $dbconec->prepare($queryCxCEnero);
                    $stmtCxCEnero->execute();
                    $filasCxCEnero = $stmtCxCEnero;

                            if (is_array($filasCxCEnero) || is_object($filasCxCEnero))
                    {
                        foreach ($filasCxCEnero as $row => $column)
                        {
                            /*
                            $id_acumulativa=$column['id_a'];
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            */
                            $cxc =$column['SALDITO'];
                        }
                    }


                     $saldoEnero= $contado + $cxc; 

                        }else {


                    //ENERO
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    $queryEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                    */
                    /*EL BUENO PARA QUE SEA CON id_acumulativa Y NO CON Cuentas_acumulativa.nombre PORQUE PODRIAN VARIAR LOS NOMBRES, NO ASÍ EL id
                    $queryEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                    */


                    $queryEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";  



                    $stmtEnero = $dbconec->prepare($queryEnero);
                    $stmtEnero->execute();
                    $filasEnero = $stmtEnero;
                    if (is_array($filasEnero) || is_object($filasEnero))
                    {
                        foreach ($filasEnero as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoEnero +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA



                        }//DEL FOREACH DE LA ID_ACUMULATIVA


                    } //JCV SI HAY REGISTROS, DE LA CONSULTA

                }   //JCV DEL IF Y ELSE DE    $nivelGlobal QUE ES LA CUENTA EN ORDE Y NIVEL =1




                //FEBRERO
                //PARA INGRESOS OPERATIVOS PONGO LA FORMULA ANTES DE QUE SE HAGA ENERO PORQUE SINO NO SE HACE ESTA PARTE PORQUE EL ORDEN ES ANTES Y NO HAY DATOS DE LA CUENTA DE INGRESOS
                 // OPERATIVOS, SOLO SE USA COMO REFERENCIA POR EL NOMBRE PARA QYE APAREZCA EN EL REPORTE               
                    if($nivelGlobal==1){
                            //jcv PARA RESULTADOS DE REPORTE:
                                $cxcFeb ='0.00';
                                $contadoFeb ='0.00';
                                //$ingresosOperativos='0.00';

                            $queryContadoFeb ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='FEB' AND librodiario.id_acumulativa= 3
";  

                    $stmtContadoFeb = $dbconec->prepare($queryContadoFeb);
                    $stmtContadoFeb->execute();
                    $filasContadoFeb = $stmtContadoFeb;

                    if (is_array($filasContadoFeb) || is_object($filasContadoFeb))
                    {
                        foreach ($filasContadoFeb as $row => $column)
                        {

                            $contadoFeb =$column['SALDITO'];
                        }
                    }



                    $queryCxCFeb ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='FEB' AND librodiario.id_acumulativa= 2
";  
                    $stmtCxCFeb = $dbconec->prepare($queryCxCFeb);
                    $stmtCxCFeb->execute();
                    $filasCxCFeb = $stmtCxCFeb;

                    if (is_array($filasCxCFeb) || is_object($filasCxCFeb))
                    {
                        foreach ($filasCxCFeb as $row => $column)
                        {
                            /*
                            $id_acumulativa=$column['id_a'];
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            */
                            $cxcFeb =$column['SALDITO'];
                        }
                    }


                     $saldoFebrero= $contadoFeb + $cxcFeb; 

                        }else {


                    //FEBRERO
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /* $queryFebrero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='FEB' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                    */

                    $queryFebrero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='FEB' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";  



                    $stmtFebrero = $dbconec->prepare($queryFebrero);
                    $stmtFebrero->execute();
                    $filasFebrero = $stmtFebrero;
                    if (is_array($filasFebrero) || is_object($filasFebrero))
                    {
                        foreach ($filasFebrero as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoFebrero +=$column['SALDITO']; //JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                } //JCV DEL IF Y ELSE DE    $nivelGlobal QUE ES LA CUENTA EN ORDE Y NIVEL =1, DE FEBRERO


                //MARZO
                //PARA INGRESOS OPERATIVOS PONGO LA FORMULA ANTES DE QUE SE HAGA ENERO PORQUE SINO NO SE HACE ESTA PARTE PORQUE EL ORDEN ES ANTES Y NO HAY DATOS DE LA CUENTA DE INGRESOS
                 // OPERATIVOS, SOLO SE USA COMO REFERENCIA POR EL NOMBRE PARA QYE APAREZCA EN EL REPORTE               
                        if($nivelGlobal==1){
                            //jcv PARA RESULTADOS DE REPORTE:
                                $cxc ='0.00';
                                $contado ='0.00';
                                //$ingresosOperativos='0.00';

                            $queryContadoMar ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAR' AND librodiario.id_acumulativa= 3
";  

                    $stmtContadoMar = $dbconec->prepare($queryContadoMar);
                    $stmtContadoMar->execute();
                    $filasContadoMar = $stmtContadoMar;

                            if (is_array($filasContadoMar) || is_object($filasContadoMar))
                    {
                        foreach ($filasContadoMar as $row => $column)
                        {

                            $contado =$column['SALDITO'];
                        }
                    }



                    $queryCxCMar ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAR' AND librodiario.id_acumulativa= 2
";  


                    $stmtCxCMar = $dbconec->prepare($queryCxCMar);
                    $stmtCxCMar->execute();
                    $filasCxCMar = $stmtCxCMar;

                            if (is_array($filasCxCMar) || is_object($filasCxCMar))
                    {
                        foreach ($filasCxCMar as $row => $column)
                        {
                            /*
                            $id_acumulativa=$column['id_a'];
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            */
                            $cxc =$column['SALDITO'];
                        }
                    }


                     $saldoMarzo= $contado + $cxc; 
                    $saldot1= $saldoEnero + $saldoFebrero + $saldoMarzo;         
                        }else {



                    //MARZO
                     /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /*$queryMarzo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel"; */


                    $queryMarzo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtMarzo = $dbconec->prepare($queryMarzo);
                    $stmtMarzo->execute();
                    $filasMarzo = $stmtMarzo;
                    if (is_array($filasMarzo) || is_object($filasMarzo))
                    {
                        foreach ($filasMarzo as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoMarzo +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    $saldot1= $saldoEnero + $saldoFebrero + $saldoMarzo;
                }//JCV DEL IF Y ELSE DE    $nivelGlobal QUE ES LA CUENTA EN ORDE Y NIVEL =1, DE MARZO

                
                //ABRIL
                //PARA INGRESOS OPERATIVOS PONGO LA FORMULA ANTES DE QUE SE HAGA ENERO PORQUE SINO NO SE HACE ESTA PARTE PORQUE EL ORDEN ES ANTES Y NO HAY DATOS DE LA CUENTA DE INGRESOS
                 // OPERATIVOS, SOLO SE USA COMO REFERENCIA POR EL NOMBRE PARA QYE APAREZCA EN EL REPORTE               
                        if($nivelGlobal==1){
                            //jcv PARA RESULTADOS DE REPORTE:
                                $cxc ='0.00';
                                $contado ='0.00';
                                //$ingresosOperativos='0.00';

                            $queryContadoAbr ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='APR' AND librodiario.id_acumulativa= 3
";  

                    $stmtContadoAbr = $dbconec->prepare($queryContadoAbr);
                    $stmtContadoAbr->execute();
                    $filasContadoAbr = $stmtContadoAbr;

                            if (is_array($filasContadoAbr) || is_object($filasContadoAbr))
                    {
                        foreach ($filasContadoAbr as $row => $column)
                        {

                            $contado =$column['SALDITO'];
                        }
                    }



                    $queryCxCAbr ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='APR' AND librodiario.id_acumulativa= 2
";  


                    $stmtCxCAbr = $dbconec->prepare($queryCxCAbr);
                    $stmtCxCAbr->execute();
                    $filasCxCAbr = $stmtCxCAbr;

                            if (is_array($filasCxCAbr) || is_object($filasCxCAbr))
                    {
                        foreach ($filasCxCAbr as $row => $column)
                        {
                            /*
                            $id_acumulativa=$column['id_a'];
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            */
                            $cxc =$column['SALDITO'];
                        }
                    }


                     $saldoAbril= $contado + $cxc; 

                        }else {

                    //ABRIL
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /*$queryAbril ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='APR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel"; */

                    $queryAbril ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='APR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtAbril = $dbconec->prepare($queryAbril);
                    $stmtAbril->execute();
                    $filasAbril = $stmtAbril;
                    if (is_array($filasAbril) || is_object($filasAbril))
                    {
                        foreach ($filasAbril as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoAbril +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 
                }//JCV DEL IF Y ELSE DE    $nivelGlobal QUE ES LA CUENTA EN ORDE Y NIVEL =1, DE abril
                
                
                    //MAYO
                     /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                   /* $queryMayo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAY' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  */

                
                
                
                
                    $queryMayo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAY' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";  
                    $stmtMayo = $dbconec->prepare($queryMayo);
                    $stmtMayo->execute();
                    $filasMayo = $stmtMayo;
                    if (is_array($filasMayo) || is_object($filasMayo))
                    {
                        foreach ($filasMayo as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoMayo +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //JUNIO
                     /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /*$queryJunio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";*/


                    $queryJunio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";
                    $stmtJunio = $dbconec->prepare($queryJunio);
                    $stmtJunio->execute();
                    $filasJunio = $stmtJunio;
                    if (is_array($filasJunio) || is_object($filasJunio))
                    {
                        foreach ($filasJunio as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoJunio +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //JULIO
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                  /*  $queryJulio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUL' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel"; */


                    $queryJulio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUL' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtJulio = $dbconec->prepare($queryJulio);
                    $stmtJulio->execute();
                    $filasJulio = $stmtJulio;
                    if (is_array($filasJulio) || is_object($filasJulio))
                    {
                        foreach ($filasJulio as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoJulio +=$column['SALDITO']; //JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //AGOSTO
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /*$queryAgosto ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='AUG' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";*/


                    $queryAgosto ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='AUG' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";
                    $stmtAgosto = $dbconec->prepare($queryAgosto);
                    $stmtAgosto->execute();
                    $filasAgosto = $stmtAgosto;
                    if (is_array($filasAgosto) || is_object($filasAgosto))
                    {
                        foreach ($filasAgosto as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoAgosto +=$column['SALDITO']; //JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //SEPTIEMBRE
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                    /*$querySeptiembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='SEP' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  */


                    $querySeptiembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='SEP' AND librodiario.id_acumulativa= $id_acumulativaGlobal
";  
                    $stmtSeptiembre = $dbconec->prepare($querySeptiembre);
                    $stmtSeptiembre->execute();
                    $filasSeptiembre = $stmtSeptiembre;
                    if (is_array($filasSeptiembre) || is_object($filasSeptiembre))
                    {
                        foreach ($filasSeptiembre as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoSeptiembre +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //OCTUBRE
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                   /* $queryOctubre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='OCT' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel"; */


                    $queryOctubre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='OCT' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtOctubre = $dbconec->prepare($queryOctubre);
                    $stmtOctubre->execute();
                    $filasOctubre = $stmtOctubre;
                    if (is_array($filasOctubre) || is_object($filasOctubre))
                    {
                        foreach ($filasOctubre as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoOctubre +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //NOVIEMBRE
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                   /* $queryNoviembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='NOV' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel"; */


                    $queryNoviembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='NOV' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtNoviembre = $dbconec->prepare($queryNoviembre);
                    $stmtNoviembre->execute();
                    $filasNoviembre = $stmtNoviembre;
                    if (is_array($filasNoviembre) || is_object($filasNoviembre))
                    {
                        foreach ($filasNoviembre as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoNoviembre +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    } 

                    //DICIEMBRE
                    /*JCV AL 13MAY2023 FUNCIONA MUY BIEN SIN EMBARGO LA CAMBIE PARA QUE, EN LUGAR QUE ORGANICE POR NOMBRE DE CUENTA QUE SEA POR id_acumulativa
                     * ADEMÁS QUE CONSIDERE EL ORDEN DE VISTA EN EL REPORTE EL NIVEL (ORDEN) Y NO EL ID ACUMULATIVA

                  /*  $queryDiciembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='DEC' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  */


                    $queryDiciembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.id_acumulativa = Cuentas_acumulativa.id_acumulativa
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='DEC' AND librodiario.id_acumulativa= $id_acumulativaGlobal
"; 
                    $stmtDiciembre = $dbconec->prepare($queryDiciembre);
                    $stmtDiciembre->execute();
                    $filasDiciembre = $stmtDiciembre;
                    if (is_array($filasDiciembre) || is_object($filasDiciembre))
                    {
                        foreach ($filasDiciembre as $row => $column)
                        {
                            $id_acumulativa=$column['id_a'];
                           // JCV OK$cuenta_acumulativa='PRUEBOTA';
                            $nivel=$column['nivel'];
                            $cuenta_acumulativa=$column['nombre'];
                            $saldoDiciembre +=$column['SALDITO'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    }  

                    //$id_acumulativa=99;
                    //$cuenta_acumulativa='PRUEBITA';

                        //JCV PARA BORRAR LA TABLA


                        //JCV PARA INSERTAR TODOS LOS DATOS EN LA TABLA flujo_de_efectivo:
                        /*OJ CV OK $query = "INSERT INTO flujo_de_efectivo(id_acumulativa, nombre_atributo, cuenta_acumulativa, nivel, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre) values(:id_acumulativa, :nombre_atributo, :cuenta_acumulativa, :nivel, :enero, :febrero, :marzo, :abril, :mayo, :junio, :julio, :agosto, :septiembre, :octubre, :noviembre, :diciembre)";*/
                        $query = "INSERT INTO flujo_de_efectivo(id_acumulativa, nombre_atributo, cuenta_acumulativa, nivel, enero, febrero, marzo, t_1, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre) values(:id_acumulativa, :nombre_atributo, :cuenta_acumulativa, :nivel, :enero, :febrero, :marzo, :t_1, :abril, :mayo, :junio, :julio, :agosto, :septiembre, :octubre, :noviembre, :diciembre)";

                        /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                        $stmt = $dbconec->prepare($query);
                        //$stmt->bindParam(":id_acumulativa",$id_acumulativa);
                        //$stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativa);
                        //$stmt->bindParam(":nivel",$nivel);
                        $stmt->bindParam(":id_acumulativa",$id_acumulativaGlobal);
                        $stmt->bindParam(":nombre_atributo",$nombre_atributoGlobal);
                        $stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativaGlobal);
                        $stmt->bindParam(":nivel",$nivelGlobal);
                        $stmt->bindParam(":enero",$saldoEnero);
                        $stmt->bindParam(":febrero",$saldoFebrero);
                        $stmt->bindParam(":marzo",$saldoMarzo);
                        $stmt->bindParam(":t_1",$saldot1);
                        $stmt->bindParam(":abril",$saldoAbril);
                        $stmt->bindParam(":mayo",$saldoMayo);
                        $stmt->bindParam(":junio",$saldoJunio);
                        $stmt->bindParam(":julio",$saldoJulio);
                        $stmt->bindParam(":agosto",$saldoAgosto);
                        $stmt->bindParam(":septiembre",$saldoSeptiembre);
                        $stmt->bindParam(":octubre",$saldoOctubre);
                        $stmt->bindParam(":noviembre",$saldoNoviembre);
                        $stmt->bindParam(":diciembre",$saldoDiciembre);


                        if($stmt->execute())
                        {   

                                $count = $stmt->rowCount();
                                if($count == 0){
                                        //$data = "Duplicado";
                                        //echo json_encode($data);
                                } else {
                                        $cuantosinserto=$cuantosinserto+1;
                                        //$data = "Validado";
                                        //echo json_encode($data);
                                        
                                        
                                         
                                        
                                }
                        } else {

                                $data = "Error";
                                echo json_encode($data);
                        }
                        //$dbconec = null;



                } //JCV DEL FOR EACH PARA TODAS LAS CUENTAS

                /*JCV PARA PROBAR SI FUNCIONA if($cuantosinserto>0){
                    $data = "Validado";
                    echo json_encode($data);
                }*/
                 
                
                ////JCV PARA ACTUALIZAR EGRESOS OPERATIVOS PORQUE EL ORDEN DEL REPORTE ES ANTES DE QUE PASEN CADA CUENTA
                // PORLO QUE PRIMERO INSERTA EN CEROS ESTA CUENTA Y AL FINAL ACTUALIZA (UPDATE) CON LAS CUENTAS YA INSERTADAS CON REGISTROS Y VALORES
                //ENERO
                    /*$queryEgOp ="SELECT sum(enero) as enero FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39" ; 
                    $stmtEgOp = $dbconec->prepare($queryEgOp);
                    $stmtEgOp->execute();
                    $filasEgOp = $stmtEgOp;
                    if (is_array($filasEgOp) || is_object($filasEgOp))
                    {
                        foreach ($filasEgOp as $row => $column)
                        {
                            
                            $saldoEneOp =$column['enero'];//JCV 13MAY2023 LE PONGO EL SIGNO += PORQUE SI HAY CUENTAS QUE TENGAN DIFERENTE id_para_flujoefectivo PERO MISMO id_acumulativa SE ACUMULEN Y ESTÉN EN LA MISMA CUENTA
                        }
                    }     
                    */
                    
               /* $A="UPDATE resumen_sucursales SET ordenes = (SELECT count(*)
 FROM ordenes  WHERE EXTRACT(YEAR FROM fecha)=resumen_sucursales.anno AND EXTRACT(MONTH FROM fecha)=resumen_sucursales.mes
   AND sucursal=resumen_sucursales.sucursal)";*/
                
                    //$queryTotalEneEgOp="UPDATE flujo_de_efectivo SET enero = '$saldoEneOp' WHERE nivel=4";
               
                
                //jcv PARA EL SEGUNDO TRIMESTRE de TODAS LAS CUENTAS
                    $queryTotalT_2="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio ";
                    $stmtTotalT_2 = $dbconec->prepare($queryTotalT_2);
                    $stmtTotalT_2->execute();
                
                
                
                

                ////JCV PARA ACTUALIZAR INGRESOS OPERATIVOS PORQUE EL ORDEN DEL REPORTE ES ANTES DE QUE PASEN CADA CUENTA
                // PORLO QUE PRIMERO INSERTA EN CEROS ESTA CUENTA Y AL FINAL ACTUALIZA (UPDATE) CON LAS CUENTAS YA INSERTADAS CON REGISTROS Y VALORES
                
                    //ABRIL
                    $queryTotalAbrInOp="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=2 AND nivel<=3)  WHERE nivel=1";
                    $stmtTotAbrInOp = $dbconec->prepare($queryTotalAbrInOp);
                    $stmtTotAbrInOp->execute();
                
                    //MAYO
                    $queryTotalAbrInOp="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=2 AND nivel<=3)  WHERE nivel=1";
                    $stmtTotAbrInOp = $dbconec->prepare($queryTotalAbrInOp);
                    $stmtTotAbrInOp->execute();
                    
                    //JUNIO
                    $queryTotalAbrInOp="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=2 AND nivel<=3)  WHERE nivel=1";
                    $stmtTotAbrInOp = $dbconec->prepare($queryTotalAbrInOp);
                    $stmtTotAbrInOp->execute();
                    
                    
                    //jcv PARA EL SEGUNDO TRIMESTRE
                    $queryTotalAbrInOp="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=1";
                    $stmtTotAbrInOp = $dbconec->prepare($queryTotalAbrInOp);
                    $stmtTotAbrInOp->execute();
                    
                    
                    //JULIO
                    $queryTotalAbrInOp="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=2 AND nivel<=3)  WHERE nivel=1";
                    $stmtTotAbrInOp = $dbconec->prepare($queryTotalAbrInOp);
                    $stmtTotAbrInOp->execute();
                
                 
                
                ////JCV PARA ACTUALIZAR EGRESOS OPERATIVOS PORQUE EL ORDEN DEL REPORTE ES ANTES DE QUE PASEN CADA CUENTA
                // PORLO QUE PRIMERO INSERTA EN CEROS ESTA CUENTA Y AL FINAL ACTUALIZA (UPDATE) CON LAS CUENTAS YA INSERTADAS CON REGISTROS Y VALORES
                
                    $queryTotalEneEgOp="UPDATE flujo_de_efectivo SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotEneEgOp = $dbconec->prepare($queryTotalEneEgOp);
                    $stmtTotEneEgOp->execute();
                    
                    $queryTotalFebEgOp="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotFebEgOp = $dbconec->prepare($queryTotalFebEgOp);
                    $stmtTotFebEgOp->execute();
                    
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1EgOp="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=4";
                    $stmtTotT1EgOp = $dbconec->prepare($queryTotalT1EgOp);
                    $stmtTotT1EgOp->execute();
                    
                    //ABRIL
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //MAYO
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //JUNIO
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //jcv PARA EL SEGUNDO TRIMESTRE
                    $queryTotalT1EgOp="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=4";
                    $stmtTotT1EgOp = $dbconec->prepare($queryTotalT1EgOp);
                    $stmtTotT1EgOp->execute();
                    
                    //JULIO
                    $queryTotalMarEgOp="UPDATE flujo_de_efectivo SET julio = (SELECT sum(julio) FROM flujo_de_efectivo WHERE nivel>=5 AND nivel<=39)  WHERE nivel=4";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                
//JCV FALTA DE AGOSTO A DICIEMBRE..
                    
                    
                    //JCV FLUJO OPERATIVO NETO SIN PROVEEDORES)
                    
                    $queryTotalEneFlOp="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 1)+(select enero from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotEneFlOp = $dbconec->prepare($queryTotalEneFlOp);
                    $stmtTotEneFlOp->execute();
                    
                    $queryTotalFebFlOp="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 1)+(select febrero from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotFebFlOp = $dbconec->prepare($queryTotalFebFlOp);
                    $stmtTotFebFlOp->execute();
                    
                    $queryTotalMarFlOp="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 1)+(select marzo from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotMarFlOp = $dbconec->prepare($queryTotalMarFlOp);
                    $stmtTotMarFlOp->execute();

                     //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1FlOp="update flujo_de_efectivo set t_1 = (select t_1 from flujo_de_efectivo where nivel = 1)+(select t_1 from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotT1FlOp = $dbconec->prepare($queryTotalT1FlOp);
                    $stmtTotT1FlOp->execute();
                    
                     //ABRIL
                    $queryTotalMarFlOp="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 1)+(select abril from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotMarFlOp = $dbconec->prepare($queryTotalMarFlOp);
                    $stmtTotMarFlOp->execute();
                    
                      //MAYO
                    $queryTotalMarFlOp="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 1)+(select mayo from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotMarFlOp = $dbconec->prepare($queryTotalMarFlOp);
                    $stmtTotMarFlOp->execute();
                    
                      //JUNIO
                    $queryTotalMarFlOp="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 1)+(select junio from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotMarFlOp = $dbconec->prepare($queryTotalMarFlOp);
                    $stmtTotMarFlOp->execute();
                    
                     //jcv PARA EL segundo TRIMESTRE
                    $queryTotalT1FlOp="update flujo_de_efectivo set t_2 = (select t_2 from flujo_de_efectivo where nivel = 1)+(select t_2 from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotT1FlOp = $dbconec->prepare($queryTotalT1FlOp);
                    $stmtTotT1FlOp->execute();
                    
                      //JULIO
                    $queryTotalMarFlOp="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 1)+(select julio from flujo_de_efectivo where nivel = 4) where nivel = 40;";
                    $stmtTotMarFlOp = $dbconec->prepare($queryTotalMarFlOp);
                    $stmtTotMarFlOp->execute();
                   
//JCV FALTA DE agosto A DICIEMBRE...
                    

                    //JCV FLUJO OPERATIVO NETO INCLUYENDO PROVEEDORES)
                    $queryTotalEneFlOpIp="UPDATE flujo_de_efectivo SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotEneFlOpIp = $dbconec->prepare($queryTotalEneFlOpIp);
                    $stmtTotEneFlOpIp->execute();
                    
                    $queryTotalFebFlOpIp="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotFebFlOpIp = $dbconec->prepare($queryTotalFebFlOpIp);
                    $stmtTotFebFlOpIp->execute();
                    
                    $queryTotalMarFlOpIp="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotMarFlOpIp = $dbconec->prepare($queryTotalMarFlOpIp);
                    $stmtTotMarFlOpIp->execute();
                    
                    //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1FlOpIp="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=54";
                    $stmtTotT1FlOpIp = $dbconec->prepare($queryTotalT1FlOpIp);
                    $stmtTotT1FlOpIp->execute();
                    
                     //ABRIL
                    $queryTotalMarFlOpIp="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotMarFlOpIp = $dbconec->prepare($queryTotalMarFlOpIp);
                    $stmtTotMarFlOpIp->execute();
                    
                     //MAYO
                    $queryTotalMarFlOpIp="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotMarFlOpIp = $dbconec->prepare($queryTotalMarFlOpIp);
                    $stmtTotMarFlOpIp->execute();
                    
                     //JUNIO
                    $queryTotalMarFlOpIp="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotMarFlOpIp = $dbconec->prepare($queryTotalMarFlOpIp);
                    $stmtTotMarFlOpIp->execute();
                    
                    //jcv PARA EL SEGUNDO TRIMESTRE
                    $queryTotalT1FlOpIp="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=54";
                    $stmtTotT1FlOpIp = $dbconec->prepare($queryTotalT1FlOpIp);
                    $stmtTotT1FlOpIp->execute();
                    
                    //JULIO
                    $queryTotalMarFlOpIp="UPDATE flujo_de_efectivo SET julio = (SELECT sum(julio) FROM flujo_de_efectivo WHERE nivel>=40 AND nivel<=53)  WHERE nivel=54";
                    $stmtTotMarFlOpIp = $dbconec->prepare($queryTotalMarFlOpIp);
                    $stmtTotMarFlOpIp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...
                    
                    
                    //JCV FLUJO DE INVERSION NETO)
                    $queryTotalEneFlInN="UPDATE flujo_de_efectivo SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotEneFlInN = $dbconec->prepare($queryTotalEneFlInN);
                    $stmtTotEneFlInN->execute();
                    
                    $queryTotalFebFlInN="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotFebFlInN = $dbconec->prepare($queryTotalFebFlInN);
                    $stmtTotFebFlInN->execute();
                    
                    $queryTotalMarFlInN="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotMarFlInN = $dbconec->prepare($queryTotalMarFlInN);
                    $stmtTotMarFlInN->execute();
                    
                    //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1FlInN="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=57";
                    $stmtTotT1FlInN = $dbconec->prepare($queryTotalT1FlInN);
                    $stmtTotT1FlInN->execute();
                    
                    //ABRIL
                    $queryTotalMarFlInN="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotMarFlInN = $dbconec->prepare($queryTotalMarFlInN);
                    $stmtTotMarFlInN->execute();
                    
                    $queryTotalMarFlInN="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotMarFlInN = $dbconec->prepare($queryTotalMarFlInN);
                    $stmtTotMarFlInN->execute();
                    
                    $queryTotalMarFlInN="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotMarFlInN = $dbconec->prepare($queryTotalMarFlInN);
                    $stmtTotMarFlInN->execute();
                    
                     //jcv PARA EL SEGUNDO TRIMESTRE
                    $queryTotalT1FlInN="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=57";
                    $stmtTotT1FlInN = $dbconec->prepare($queryTotalT1FlInN);
                    $stmtTotT1FlInN->execute();
                    
                    
                    $queryTotalMarFlInN="UPDATE flujo_de_efectivo SET julio = (SELECT sum(julio) FROM flujo_de_efectivo WHERE nivel>=55 AND nivel<=56)  WHERE nivel=57";
                    $stmtTotMarFlInN = $dbconec->prepare($queryTotalMarFlInN);
                    $stmtTotMarFlInN->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...                
                    
                    
                    //JCV FLUJO FINANCIERO NETO)
                    $queryTotalEneFlFiN="UPDATE flujo_de_efectivo SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotEneFlFiN = $dbconec->prepare($queryTotalEneFlFiN);
                    $stmtTotEneFlFiN->execute();
                    
                    $queryTotalFebFlFiN="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotFebFlFiN = $dbconec->prepare($queryTotalFebFlFiN);
                    $stmtTotFebFlFiN->execute();
                    
                    $queryTotalMarFlFiN="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotMarFlFiN = $dbconec->prepare($queryTotalMarFlFiN);
                    $stmtTotMarFlFiN->execute();
                    
                    //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1FlFiN="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=63";
                    $stmtTotT1FlFiN = $dbconec->prepare($queryTotalT1FlFiN);
                    $stmtTotT1FlFiN->execute();
                    
                    $queryTotalMarFlFiN="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotMarFlFiN = $dbconec->prepare($queryTotalMarFlFiN);
                    $stmtTotMarFlFiN->execute();
                    
                    $queryTotalMarFlFiN="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotMarFlFiN = $dbconec->prepare($queryTotalMarFlFiN);
                    $stmtTotMarFlFiN->execute();
                    
                    $queryTotalMarFlFiN="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotMarFlFiN = $dbconec->prepare($queryTotalMarFlFiN);
                    $stmtTotMarFlFiN->execute();
                    
                    //jcv PARA EL segundo TRIMESTRE
                    $queryTotalT1FlFiN="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=63";
                    $stmtTotT1FlFiN = $dbconec->prepare($queryTotalT1FlFiN);
                    $stmtTotT1FlFiN->execute();
                    
                    $queryTotalMarFlFiN="UPDATE flujo_de_efectivo SET julio = (SELECT sum(julio) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61)  WHERE nivel=63";
                    $stmtTotMarFlFiN = $dbconec->prepare($queryTotalMarFlFiN);
                    $stmtTotMarFlFiN->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...  
                     
                    
                    //JCV SALDO FINAL EN BANCOS)
                    $queryTotalEneSaFiBa="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 0)+(select enero from flujo_de_efectivo where nivel = 1)+(select enero from flujo_de_efectivo where nivel = 4)+(select enero from flujo_de_efectivo where nivel = 42)+(select enero from flujo_de_efectivo where nivel = 44)+(select enero from flujo_de_efectivo where nivel = 45)+(select enero from flujo_de_efectivo where nivel = 46)+(select enero from flujo_de_efectivo where nivel = 47)+(select enero from flujo_de_efectivo where nivel = 48)+(select enero from flujo_de_efectivo where nivel = 50)+(select enero from flujo_de_efectivo where nivel = 51)+(select enero from flujo_de_efectivo where nivel = 52)+(select enero from flujo_de_efectivo where nivel = 53)+(select enero from flujo_de_efectivo where nivel = 56)+(select enero from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotEneSaFiBa = $dbconec->prepare($queryTotalEneSaFiBa);
                    $stmtTotEneSaFiBa->execute();
                    
                    //JCV SALDO INICIAL FEBRERO) ES EL FINAL DE ENERO
                    $queryTotalFebSaInBa="update flujo_de_efectivo set febrero = (select enero from flujo_de_efectivo where nivel = 0)+(select enero from flujo_de_efectivo where nivel = 1)+(select enero from flujo_de_efectivo where nivel = 4)+(select enero from flujo_de_efectivo where nivel = 42)+(select enero from flujo_de_efectivo where nivel = 44)+(select enero from flujo_de_efectivo where nivel = 45)+(select enero from flujo_de_efectivo where nivel = 46)+(select enero from flujo_de_efectivo where nivel = 47)+(select enero from flujo_de_efectivo where nivel = 48)+(select enero from flujo_de_efectivo where nivel = 50)+(select enero from flujo_de_efectivo where nivel = 51)+(select enero from flujo_de_efectivo where nivel = 52)+(select enero from flujo_de_efectivo where nivel = 53)+(select enero from flujo_de_efectivo where nivel = 56)+(select enero from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotFebSaInBa = $dbconec->prepare($queryTotalFebSaInBa);
                    $stmtTotFebSaInBa->execute();
                    
                     //JCV SALDO FINAL EN BANCOS febrero)
                    $queryTotalFebSaFiBa="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 0)+(select febrero from flujo_de_efectivo where nivel = 1)+(select febrero from flujo_de_efectivo where nivel = 4)+(select febrero from flujo_de_efectivo where nivel = 42)+(select febrero from flujo_de_efectivo where nivel = 44)+(select febrero from flujo_de_efectivo where nivel = 45)+(select febrero from flujo_de_efectivo where nivel = 46)+(select febrero from flujo_de_efectivo where nivel = 47)+(select febrero from flujo_de_efectivo where nivel = 48)+(select febrero from flujo_de_efectivo where nivel = 50)+(select febrero from flujo_de_efectivo where nivel = 51)+(select febrero from flujo_de_efectivo where nivel = 52)+(select febrero from flujo_de_efectivo where nivel = 53)+(select febrero from flujo_de_efectivo where nivel = 56)+(select febrero from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotFebSaFiBa = $dbconec->prepare($queryTotalFebSaFiBa);
                    $stmtTotFebSaFiBa->execute();
                    
                    //JCV SALDO INICIAL marzo) ES EL FINAL DE FEBRER
                     $queryTotalMarSaInBa="update flujo_de_efectivo set marzo = (select febrero from flujo_de_efectivo where nivel = 0)+(select febrero from flujo_de_efectivo where nivel = 1)+(select febrero from flujo_de_efectivo where nivel = 4)+(select febrero from flujo_de_efectivo where nivel = 42)+(select febrero from flujo_de_efectivo where nivel = 44)+(select febrero from flujo_de_efectivo where nivel = 45)+(select febrero from flujo_de_efectivo where nivel = 46)+(select febrero from flujo_de_efectivo where nivel = 47)+(select febrero from flujo_de_efectivo where nivel = 48)+(select febrero from flujo_de_efectivo where nivel = 50)+(select febrero from flujo_de_efectivo where nivel = 51)+(select febrero from flujo_de_efectivo where nivel = 52)+(select febrero from flujo_de_efectivo where nivel = 53)+(select febrero from flujo_de_efectivo where nivel = 56)+(select febrero from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotMarSaInBa = $dbconec->prepare($queryTotalMarSaInBa);
                    $stmtTotMarSaInBa->execute();
                    
                    //JCV SALDO INICIAL EN BANCOS PARA EL PRIMER TRIMESTRE
                    /*$queryTotalT1SaFiBa="update flujo_de_efectivo set t_1 = enero + febrero + marzo  where nivel = 0;";
                    $stmtTotT1SaFiBa = $dbconec->prepare($queryTotalT1SaFiBa);
                    $stmtTotT1SaFiBa->execute();
                    */
                    
                    $queryTotalT1SaFiBa="update flujo_de_efectivo set t_1 = enero where nivel = 0;";
                    $stmtTotT1SaFiBa = $dbconec->prepare($queryTotalT1SaFiBa);
                    $stmtTotT1SaFiBa->execute();
                    
                    
                    //JCV SALDO FINAL EN BANCOS MARZO)
                    $queryTotalMarSaFiBa="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 0)+(select marzo from flujo_de_efectivo where nivel = 1)+(select marzo from flujo_de_efectivo where nivel = 4)+(select marzo from flujo_de_efectivo where nivel = 42)+(select marzo from flujo_de_efectivo where nivel = 44)+(select marzo from flujo_de_efectivo where nivel = 45)+(select marzo from flujo_de_efectivo where nivel = 46)+(select marzo from flujo_de_efectivo where nivel = 47)+(select marzo from flujo_de_efectivo where nivel = 48)+(select marzo from flujo_de_efectivo where nivel = 50)+(select marzo from flujo_de_efectivo where nivel = 51)+(select marzo from flujo_de_efectivo where nivel = 52)+(select marzo from flujo_de_efectivo where nivel = 53)+(select marzo from flujo_de_efectivo where nivel = 56)+(select marzo from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotMarSaFiBa = $dbconec->prepare($queryTotalMarSaFiBa);
                    $stmtTotMarSaFiBa->execute();
                    
                    //JCV SALDO FINAL EN BANCOS PARA EL PRIMER TRIMESTRE
                    $queryTotalT1SaFiBa="update flujo_de_efectivo set t_1 = marzo  where nivel = 64;";
                    $stmtTotT1SaFiBa = $dbconec->prepare($queryTotalT1SaFiBa);
                    $stmtTotT1SaFiBa->execute();
                    
                    //JCV SALDO INICIAL ABRIL) ES EL FINAL DE MARZO
                     $queryTotalMarSaInBa="update flujo_de_efectivo set abril = (select marzo from flujo_de_efectivo where nivel = 0)+(select marzo from flujo_de_efectivo where nivel = 1)+(select marzo from flujo_de_efectivo where nivel = 4)+(select marzo from flujo_de_efectivo where nivel = 42)+(select marzo from flujo_de_efectivo where nivel = 44)+(select marzo from flujo_de_efectivo where nivel = 45)+(select marzo from flujo_de_efectivo where nivel = 46)+(select marzo from flujo_de_efectivo where nivel = 47)+(select marzo from flujo_de_efectivo where nivel = 48)+(select marzo from flujo_de_efectivo where nivel = 50)+(select marzo from flujo_de_efectivo where nivel = 51)+(select marzo from flujo_de_efectivo where nivel = 52)+(select marzo from flujo_de_efectivo where nivel = 53)+(select marzo from flujo_de_efectivo where nivel = 56)+(select marzo from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotMarSaInBa = $dbconec->prepare($queryTotalMarSaInBa);
                    $stmtTotMarSaInBa->execute();
                    
                    //JCV SALDO FINAL EN BANCOS ABRIL)
                    $queryTotalMarSaFiBa="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 0)+(select abril from flujo_de_efectivo where nivel = 1)+(select abril from flujo_de_efectivo where nivel = 4)+(select abril from flujo_de_efectivo where nivel = 42)+(select abril from flujo_de_efectivo where nivel = 44)+(select abril from flujo_de_efectivo where nivel = 45)+(select abril from flujo_de_efectivo where nivel = 46)+(select abril from flujo_de_efectivo where nivel = 47)+(select abril from flujo_de_efectivo where nivel = 48)+(select abril from flujo_de_efectivo where nivel = 50)+(select abril from flujo_de_efectivo where nivel = 51)+(select abril from flujo_de_efectivo where nivel = 52)+(select abril from flujo_de_efectivo where nivel = 53)+(select abril from flujo_de_efectivo where nivel = 56)+(select abril from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotMarSaFiBa = $dbconec->prepare($queryTotalMarSaFiBa);
                    $stmtTotMarSaFiBa->execute();
                    
                    //JCV SALDO INICIAL MAYO) ES EL FINAL DE ABRIL
                     $queryTotalMarSaInBa="update flujo_de_efectivo set mayo = (select abril from flujo_de_efectivo where nivel = 0)+(select abril from flujo_de_efectivo where nivel = 1)+(select abril from flujo_de_efectivo where nivel = 4)+(select abril from flujo_de_efectivo where nivel = 42)+(select abril from flujo_de_efectivo where nivel = 44)+(select abril from flujo_de_efectivo where nivel = 45)+(select abril from flujo_de_efectivo where nivel = 46)+(select abril from flujo_de_efectivo where nivel = 47)+(select abril from flujo_de_efectivo where nivel = 48)+(select abril from flujo_de_efectivo where nivel = 50)+(select abril from flujo_de_efectivo where nivel = 51)+(select abril from flujo_de_efectivo where nivel = 52)+(select abril from flujo_de_efectivo where nivel = 53)+(select abril from flujo_de_efectivo where nivel = 56)+(select abril from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotMarSaInBa = $dbconec->prepare($queryTotalMarSaInBa);
                    $stmtTotMarSaInBa->execute();
                    
                    //JCV SALDO FINAL EN BANCOS MAYO)
                    $queryTotalMarSaFiBa="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 0)+(select mayo from flujo_de_efectivo where nivel = 1)+(select mayo from flujo_de_efectivo where nivel = 4)+(select mayo from flujo_de_efectivo where nivel = 42)+(select mayo from flujo_de_efectivo where nivel = 44)+(select mayo from flujo_de_efectivo where nivel = 45)+(select mayo from flujo_de_efectivo where nivel = 46)+(select mayo from flujo_de_efectivo where nivel = 47)+(select mayo from flujo_de_efectivo where nivel = 48)+(select mayo from flujo_de_efectivo where nivel = 50)+(select mayo from flujo_de_efectivo where nivel = 51)+(select mayo from flujo_de_efectivo where nivel = 52)+(select mayo from flujo_de_efectivo where nivel = 53)+(select mayo from flujo_de_efectivo where nivel = 56)+(select mayo from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotMarSaFiBa = $dbconec->prepare($queryTotalMarSaFiBa);
                    $stmtTotMarSaFiBa->execute();
                    
                    //JCV SALDO INICIAL junio) ES EL FINAL DE MAYO
                     $queryTotalMarSaInBa="update flujo_de_efectivo set junio = (select mayo from flujo_de_efectivo where nivel = 0)+(select mayo from flujo_de_efectivo where nivel = 1)+(select mayo from flujo_de_efectivo where nivel = 4)+(select mayo from flujo_de_efectivo where nivel = 42)+(select mayo from flujo_de_efectivo where nivel = 44)+(select mayo from flujo_de_efectivo where nivel = 45)+(select mayo from flujo_de_efectivo where nivel = 46)+(select mayo from flujo_de_efectivo where nivel = 47)+(select mayo from flujo_de_efectivo where nivel = 48)+(select mayo from flujo_de_efectivo where nivel = 50)+(select mayo from flujo_de_efectivo where nivel = 51)+(select mayo from flujo_de_efectivo where nivel = 52)+(select mayo from flujo_de_efectivo where nivel = 53)+(select mayo from flujo_de_efectivo where nivel = 56)+(select mayo from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotMarSaInBa = $dbconec->prepare($queryTotalMarSaInBa);
                    $stmtTotMarSaInBa->execute();
                    
                    //JCV SALDO FINAL EN BANCOS JUNIO)
                    $queryTotalMarSaFiBa="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 0)+(select junio from flujo_de_efectivo where nivel = 1)+(select junio from flujo_de_efectivo where nivel = 4)+(select junio from flujo_de_efectivo where nivel = 42)+(select junio from flujo_de_efectivo where nivel = 44)+(select junio from flujo_de_efectivo where nivel = 45)+(select junio from flujo_de_efectivo where nivel = 46)+(select junio from flujo_de_efectivo where nivel = 47)+(select junio from flujo_de_efectivo where nivel = 48)+(select junio from flujo_de_efectivo where nivel = 50)+(select junio from flujo_de_efectivo where nivel = 51)+(select junio from flujo_de_efectivo where nivel = 52)+(select junio from flujo_de_efectivo where nivel = 53)+(select junio from flujo_de_efectivo where nivel = 56)+(select junio from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotMarSaFiBa = $dbconec->prepare($queryTotalMarSaFiBa);
                    $stmtTotMarSaFiBa->execute();
                    
                    //JCV SALDO INICIAL EN BANCOS PARA EL segundo TRIMESTRE
                    $queryTotalT1SaFiBa="update flujo_de_efectivo set t_2 = abril + mayo + junio  where nivel = 0;";
                    $stmtTotT1SaFiBa = $dbconec->prepare($queryTotalT1SaFiBa);
                    $stmtTotT1SaFiBa->execute();
                    
                    
                     //JCV SALDO FINAL EN BANCOS PARA EL SEGUNDO TRIMESTRE
                    $queryTotalT1SaFiBa="update flujo_de_efectivo set t_2 = junio  where nivel = 64;";
                    $stmtTotT1SaFiBa = $dbconec->prepare($queryTotalT1SaFiBa);
                    $stmtTotT1SaFiBa->execute();
                    
                    
                     //JCV SALDO INICIAL julio) ES EL FINAL DE JUNIO
                     $queryTotalMarSaInBa="update flujo_de_efectivo set julio = (select junio from flujo_de_efectivo where nivel = 0)+(select junio from flujo_de_efectivo where nivel = 1)+(select junio from flujo_de_efectivo where nivel = 4)+(select junio from flujo_de_efectivo where nivel = 42)+(select junio from flujo_de_efectivo where nivel = 44)+(select junio from flujo_de_efectivo where nivel = 45)+(select junio from flujo_de_efectivo where nivel = 46)+(select junio from flujo_de_efectivo where nivel = 47)+(select junio from flujo_de_efectivo where nivel = 48)+(select junio from flujo_de_efectivo where nivel = 50)+(select junio from flujo_de_efectivo where nivel = 51)+(select junio from flujo_de_efectivo where nivel = 52)+(select junio from flujo_de_efectivo where nivel = 53)+(select junio from flujo_de_efectivo where nivel = 56)+(select junio from flujo_de_efectivo where nivel = 63) where nivel = 0;";
                    $stmtTotMarSaInBa = $dbconec->prepare($queryTotalMarSaInBa);
                    $stmtTotMarSaInBa->execute();
                    
                    //JCV SALDO FINAL EN BANCOS JULIO)
                    $queryTotalMarSaFiBa="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 0)+(select julio from flujo_de_efectivo where nivel = 1)+(select julio from flujo_de_efectivo where nivel = 4)+(select julio from flujo_de_efectivo where nivel = 42)+(select julio from flujo_de_efectivo where nivel = 44)+(select julio from flujo_de_efectivo where nivel = 45)+(select julio from flujo_de_efectivo where nivel = 46)+(select julio from flujo_de_efectivo where nivel = 47)+(select julio from flujo_de_efectivo where nivel = 48)+(select julio from flujo_de_efectivo where nivel = 50)+(select julio from flujo_de_efectivo where nivel = 51)+(select julio from flujo_de_efectivo where nivel = 52)+(select julio from flujo_de_efectivo where nivel = 53)+(select julio from flujo_de_efectivo where nivel = 56)+(select julio from flujo_de_efectivo where nivel = 63) where nivel = 64;";
                    $stmtTotMarSaFiBa = $dbconec->prepare($queryTotalMarSaFiBa);
                    $stmtTotMarSaFiBa->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  


                    //JCV FLUJO LIBRE NETO)
                    $queryTotalEneFlLiNe="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 54)+(select enero from flujo_de_efectivo where nivel = 57)+(select enero from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotEneFlLiNe = $dbconec->prepare($queryTotalEneFlLiNe);
                    $stmtTotEneFlLiNe->execute();
                    
                    $queryTotalFebFlLiNe="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 54)+(select febrero from flujo_de_efectivo where nivel = 57)+(select febrero from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotFebFlLiNe = $dbconec->prepare($queryTotalFebFlLiNe);
                    $stmtTotFebFlLiNe->execute();
                     
                    $queryTotalMarFlLiNe="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 54)+(select marzo from flujo_de_efectivo where nivel = 57)+(select marzo from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    //JCV FLUJO LIBRE NETO PARA EL PRIMER TRIMESTRE
                    /*$queryTotalT1FlLiNe="update flujo_de_efectivo set t_1 = marzo  where nivel = 65;";
                    $stmtTotT1FlLiNe = $dbconec->prepare($queryTotalT1FlLiNe);
                    $stmtTotT1FlLiNe->execute();
                    */
                     $queryTotalMarFlLiNe="update flujo_de_efectivo set t_1 = (select t_1 from flujo_de_efectivo where nivel = 54)+(select t_1 from flujo_de_efectivo where nivel = 57)+(select t_1 from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    
                    
                    $queryTotalMarFlLiNe="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 54)+(select abril from flujo_de_efectivo where nivel = 57)+(select abril from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    //MAYO
                    $queryTotalMarFlLiNe="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 54)+(select mayo from flujo_de_efectivo where nivel = 57)+(select mayo from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    $queryTotalMarFlLiNe="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 54)+(select junio from flujo_de_efectivo where nivel = 57)+(select junio from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    //JCV FLUJO LIBRE NETO PARA EL SEGUNDO TRIMESTRE
                    /*$queryTotalT1FlLiNe="update flujo_de_efectivo set t_2 = junio  where nivel = 65;";
                    $stmtTotT1FlLiNe = $dbconec->prepare($queryTotalT1FlLiNe);
                    $stmtTotT1FlLiNe->execute();
                    */
                      $queryTotalMarFlLiNe="update flujo_de_efectivo set t_2 = (select t_2 from flujo_de_efectivo where nivel = 54)+(select t_2 from flujo_de_efectivo where nivel = 57)+(select t_2 from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
                    
                    
                    
                    
                    //julio 
                    $queryTotalMarFlLiNe="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 54)+(select julio from flujo_de_efectivo where nivel = 57)+(select julio from flujo_de_efectivo where nivel = 63) where nivel = 65;";
                    $stmtTotMarFlLiNe = $dbconec->prepare($queryTotalMarFlLiNe);
                    $stmtTotMarFlLiNe->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...  


                     //JCV MESA DINERO +)
                    $queryTotalEneMeDi="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotEneMeDi = $dbconec->prepare($queryTotalEneMeDi);
                    $stmtTotEneMeDi->execute();
                    
                    $queryTotalFebMeDi="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotFebMeDi = $dbconec->prepare($queryTotalFebMeDi);
                    $stmtTotFebMeDi->execute();
                    
                    $queryTotalMarMeDi="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotMarMeDi = $dbconec->prepare($queryTotalMarMeDi);
                    $stmtTotMarMeDi->execute();
                   
                    //JCV MESA DINERO + PARA EL PRIMER TRIMESTRE
                    $queryTotalT1MeDi="update flujo_de_efectivo set t_1 = (select t_1 from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotT1MeDi = $dbconec->prepare($queryTotalT1MeDi);
                    $stmtTotT1MeDi->execute();
                    
                    $queryTotalMarMeDi="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotMarMeDi = $dbconec->prepare($queryTotalMarMeDi);
                    $stmtTotMarMeDi->execute();
                    
                    //MAYO
                    $queryTotalMarMeDi="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotMarMeDi = $dbconec->prepare($queryTotalMarMeDi);
                    $stmtTotMarMeDi->execute();
                    
                    $queryTotalMarMeDi="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotMarMeDi = $dbconec->prepare($queryTotalMarMeDi);
                    $stmtTotMarMeDi->execute();
                    
                     //JCV MESA DINERO + PARA EL SEGUNDO TRIMESTRE
                    $queryTotalT1MeDi="update flujo_de_efectivo set t_2 = (select t_2 from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotT1MeDi = $dbconec->prepare($queryTotalT1MeDi);
                    $stmtTotT1MeDi->execute();
                    
                    //JULIO
                    $queryTotalMarMeDi="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 65)*(0.35) where nivel = 66;";
                    $stmtTotMarMeDi = $dbconec->prepare($queryTotalMarMeDi);
                    $stmtTotMarMeDi->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...                      
                   
                    
                    
                    //PARA EL PRIMER SEMESTRE
                     //TODAS LAS CUENTAS: PRIMER TRIMESTRE +  SEGUNDO TRIMESTRE
                    $queryTotalT1MeDi="update flujo_de_efectivo set s_1 = t_1 + t_2;";
                    $stmtTotT1MeDi = $dbconec->prepare($queryTotalT1MeDi);
                    $stmtTotT1MeDi->execute();
                    
                    
                    
                    
                    
                    ///////////////////////////JCV YA PARA LOS DEMÁS REPORTES A PARTIR DE CUENTAS X COBRAR
                    //JCV HAY QUE CONSIDERAR OTRAS TABLAS ADEMAS DE LA DE flujo_de_efectivo
                    
                    
                    $queryProbar= "Select * from reporte_store_cxc";
                    $stmtProbar = $dbconec->prepare($queryProbar);
                    $stmtProbar->execute();
                    $count = $stmtProbar->rowCount();
                    if($count > 0)
                    { 
                         //SALDO INICIAL DE CXC: (ES LA 201 DE reporte_store_cxc)
                        $queryTotalEneSaInCxC="update flujo_de_efectivo set enero = (select enero from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotEneSaInCxC = $dbconec->prepare($queryTotalEneSaInCxC);
                        $stmtTotEneSaInCxC->execute();   
                        
                        $queryTotalFebSaInCxC="update flujo_de_efectivo set febrero = (select febrero from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotFebSaInCxC = $dbconec->prepare($queryTotalFebSaInCxC);
                        $stmtTotFebSaInCxC->execute();   
                        
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set marzo = (select marzo from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute();
                        
                        //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1SaInCxC="UPDATE flujo_de_efectivo SET t_1 = enero WHERE nivel=68";
                        $stmtTotT1SaInCxC = $dbconec->prepare($queryTotalT1SaInCxC);
                        $stmtTotT1SaInCxC->execute();
                        
                        //ABRIL
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set abril = (select abril from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute();
                        
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set mayo = (select mayo from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute();
                        
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set junio = (select junio from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute();
                        
                        
                        
                        //JULIO
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set julio = (select julio from reporte_store_cxc where nivel = 201) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...

                        //NUEVAS VENTAS DE CXC: (ES LA 202 DE reporte_store_cxc)
                        $queryTotalEneNuVeCxC="update flujo_de_efectivo set enero = (select enero from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotEneNuVeCxC = $dbconec->prepare($queryTotalEneNuVeCxC);
                        $stmtTotEneNuVeCxC->execute();   
                        
                        $queryTotalFebNuVeCxC="update flujo_de_efectivo set febrero = (select febrero from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotFebNuVeCxC = $dbconec->prepare($queryTotalFebNuVeCxC);
                        $stmtTotFebNuVeCxC->execute();   
                         
                        $queryTotalMarNuVeCxC="update flujo_de_efectivo set marzo = (select marzo from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotMarNuVeCxC = $dbconec->prepare($queryTotalMarNuVeCxC);
                        $stmtTotMarNuVeCxC->execute(); 
                        
                        //jcv PARA EL PRIMER TRIMESTRE
                    $queryTotalT1EgOp="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=69";
                    $stmtTotT1EgOp = $dbconec->prepare($queryTotalT1EgOp);
                    $stmtTotT1EgOp->execute();
                    
                        //ABRIL
                        $queryTotalMarNuVeCxC="update flujo_de_efectivo set abril = (select abril from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotMarNuVeCxC = $dbconec->prepare($queryTotalMarNuVeCxC);
                        $stmtTotMarNuVeCxC->execute(); 
                        
                        $queryTotalMarNuVeCxC="update flujo_de_efectivo set mayo = (select mayo from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotMarNuVeCxC = $dbconec->prepare($queryTotalMarNuVeCxC);
                        $stmtTotMarNuVeCxC->execute(); 
                        
                        $queryTotalMarNuVeCxC="update flujo_de_efectivo set junio = (select junio from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotMarNuVeCxC = $dbconec->prepare($queryTotalMarNuVeCxC);
                        $stmtTotMarNuVeCxC->execute(); 
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1EgOp="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=69";
                        $stmtTotT1EgOp = $dbconec->prepare($queryTotalT1EgOp);
                        $stmtTotT1EgOp->execute();
                        
                        //JULIO
                        $queryTotalMarNuVeCxC="update flujo_de_efectivo set julio = (select julio from reporte_store_cxc where nivel = 203) where nivel = 69;";
                        $stmtTotMarNuVeCxC = $dbconec->prepare($queryTotalMarNuVeCxC);
                        $stmtTotMarNuVeCxC->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                                                
                        
                        //COBROS DE CXC: (ES LA 1 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalEneCoCxC="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotEneCoCxC = $dbconec->prepare($queryTotalEneCoCxC);
                        $stmtTotEneCoCxC->execute();   
                        
                        $queryTotalFebCoCxC="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotFebCoCxC = $dbconec->prepare($queryTotalFebCoCxC);
                        $stmtTotFebCoCxC->execute();   
                        
                        $queryTotalMarCoCxC="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                        $stmtTotMarCoCxC->execute(); 
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1CoCxC="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=70";
                        $stmtTotT1CoCxC = $dbconec->prepare($queryTotalT1CoCxC);
                        $stmtTotT1CoCxC->execute();
                        
                        //ABRIL
                        $queryTotalMarCoCxC="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                        $stmtTotMarCoCxC->execute(); 
                        
                        $queryTotalMarCoCxC="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                        $stmtTotMarCoCxC->execute(); 
                        
                        $queryTotalMarCoCxC="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                        $stmtTotMarCoCxC->execute(); 
                        
                        //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1CoCxC="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=70";
                        $stmtTotT1CoCxC = $dbconec->prepare($queryTotalT1CoCxC);
                        $stmtTotT1CoCxC->execute();
                        
                        //JULIO
                        $queryTotalMarCoCxC="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 1) where nivel = 70;";
                        $stmtTotMarCoCxC = $dbconec->prepare($queryTotalMarCoCxC);
                        $stmtTotMarCoCxC->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...                                                
                        
                        
                        //CANCELACIONES DE CXC: (ES LA 202 DE reporte_store_cxc)
                        $queryTotalEneCaCxC="update flujo_de_efectivo set enero = (select enero from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotEneCaCxC = $dbconec->prepare($queryTotalEneCaCxC);
                        $stmtTotEneCaCxC->execute();
                        
                        $queryTotalFebCaCxC="update flujo_de_efectivo set febrero = (select febrero from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotFebCaCxC = $dbconec->prepare($queryTotalFebCaCxC);
                        $stmtTotFebCaCxC->execute();
                        
                        $queryTotalMarCaCxC="update flujo_de_efectivo set marzo = (select marzo from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotMarCaCxC = $dbconec->prepare($queryTotalMarCaCxC);
                        $stmtTotMarCaCxC->execute();
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1CaCxC="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=71";
                        $stmtTotT1CaCxC = $dbconec->prepare($queryTotalT1CaCxC);
                        $stmtTotT1CaCxC->execute();
                        
                        //ABRIL
                        $queryTotalMarCaCxC="update flujo_de_efectivo set abril = (select abril from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotMarCaCxC = $dbconec->prepare($queryTotalMarCaCxC);
                        $stmtTotMarCaCxC->execute();
                        
                        $queryTotalMarCaCxC="update flujo_de_efectivo set mayo = (select mayo from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotMarCaCxC = $dbconec->prepare($queryTotalMarCaCxC);
                        $stmtTotMarCaCxC->execute();
                        
                        $queryTotalMarCaCxC="update flujo_de_efectivo set junio = (select junio from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotMarCaCxC = $dbconec->prepare($queryTotalMarCaCxC);
                        $stmtTotMarCaCxC->execute();
                        
                        //JULIO
                        $queryTotalMarCaCxC="update flujo_de_efectivo set julio = (select julio from reporte_store_cxc where nivel = 204) where nivel = 71;";
                        $stmtTotMarCaCxC = $dbconec->prepare($queryTotalMarCaCxC);
                        $stmtTotMarCaCxC->execute();
                        
                        //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1CaCxC="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=71";
                        $stmtTotT1CaCxC = $dbconec->prepare($queryTotalT1CaCxC);
                        $stmtTotT1CaCxC->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...                                                                        
                        
                        
                        //SALDO FINAL DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalEneSaFiCxC="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 68)+(select enero from flujo_de_efectivo where nivel = 69)-(select enero from flujo_de_efectivo where nivel = 70)-(select enero from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotEneSaFiCxC = $dbconec->prepare($queryTotalEneSaFiCxC);
                        $stmtTotEneSaFiCxC->execute();  
                        
                        
                        //JCV AHORA EL SALDO INICIAL DE FEBRERO QUE ES EL FINAL DE ENERO
                        //SALDO INICIAL FEBRERO DE CXC: (ES LA 72 DE ENERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalFebSaInCxC="update flujo_de_efectivo set febrero = (select enero from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotFebSaInCxC = $dbconec->prepare($queryTotalFebSaInCxC);
                        $stmtTotFebSaInCxC->execute();  
                        
                        
                        //SALDO FINAL febrero DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalFebSaFiCxC="update flujo_de_efectivo set Febrero = (select Febrero from flujo_de_efectivo where nivel = 68)+(select Febrero from flujo_de_efectivo where nivel = 69)-(select Febrero from flujo_de_efectivo where nivel = 70)-(select Febrero from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotFebSaFiCxC = $dbconec->prepare($queryTotalFebSaFiCxC);
                        $stmtTotFebSaFiCxC->execute();  
                        
                        //SALDO INICIAL MARZO DE CXC: (ES LA 72 DE FEBRERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set marzo = (select febrero from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
                        //SALDO FINAL MARZO DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaFiCxC="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 68)+(select marzo from flujo_de_efectivo where nivel = 69)-(select marzo from flujo_de_efectivo where nivel = 70)-(select marzo from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotMarSaFiCxC = $dbconec->prepare($queryTotalMarSaFiCxC);
                        $stmtTotMarSaFiCxC->execute();  
                        
                         //SALDO FINAL primer trimestre DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalT1SaFiCxC="update flujo_de_efectivo set t_1 = (select t_1 from flujo_de_efectivo where nivel = 68)+(select t_1 from flujo_de_efectivo where nivel = 69)-(select t_1 from flujo_de_efectivo where nivel = 70)-(select t_1 from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotT1SaFiCxC = $dbconec->prepare($queryTotalT1SaFiCxC);
                        $stmtTotT1SaFiCxC->execute(); 
                        
                        
                         //SALDO INICIAL ABRIL DE CXC: (ES LA 72 DE FEBRERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set abril = (select marzo from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
                        //SALDO FINAL ABRIL DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaFiCxC="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 68)+(select abril from flujo_de_efectivo where nivel = 69)-(select abril from flujo_de_efectivo where nivel = 70)-(select abril from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotMarSaFiCxC = $dbconec->prepare($queryTotalMarSaFiCxC);
                        $stmtTotMarSaFiCxC->execute(); 
                        
                        
                        
                         //SALDO INICIAL MAYO DE CXC: (ES LA 72 DE FEBRERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set mayo = (select abril from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
                        //SALDO FINAL MAYO DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaFiCxC="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 68)+(select mayo from flujo_de_efectivo where nivel = 69)-(select mayo from flujo_de_efectivo where nivel = 70)-(select mayo from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotMarSaFiCxC = $dbconec->prepare($queryTotalMarSaFiCxC);
                        $stmtTotMarSaFiCxC->execute(); 
                        
                         //SALDO INICIAL JUNIO DE CXC: (ES LA 72 DE FEBRERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set junio = (select mayo from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
                        //SALDO FINAL JUNIO DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaFiCxC="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 68)+(select junio from flujo_de_efectivo where nivel = 69)-(select junio from flujo_de_efectivo where nivel = 70)-(select junio from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotMarSaFiCxC = $dbconec->prepare($queryTotalMarSaFiCxC);
                        $stmtTotMarSaFiCxC->execute(); 
                        
                        //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1SaInCxC="UPDATE flujo_de_efectivo SET t_2 = abril WHERE nivel=68";
                        $stmtTotT1SaInCxC = $dbconec->prepare($queryTotalT1SaInCxC);
                        $stmtTotT1SaInCxC->execute();
                         
                        
                         //SALDO FINAL SEGUNDO trimestre DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalT1SaFiCxC="update flujo_de_efectivo set t_2 = (select t_2 from flujo_de_efectivo where nivel = 68)+(select t_2 from flujo_de_efectivo where nivel = 69)-(select t_2 from flujo_de_efectivo where nivel = 70)-(select t_2 from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotT1SaFiCxC = $dbconec->prepare($queryTotalT1SaFiCxC);
                        $stmtTotT1SaFiCxC->execute(); 
                        
                         //SALDO INICIAL JULIO DE CXC: (ES LA 72 DE FEBRERO DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaInCxC="update flujo_de_efectivo set julio = (select junio from flujo_de_efectivo where nivel = 72) where nivel = 68;";
                        $stmtTotMarSaInCxC = $dbconec->prepare($queryTotalMarSaInCxC);
                        $stmtTotMarSaInCxC->execute(); 
                        
                        //SALDO FINAL JULIO DE CXC: (ES LA 68 + 69 - 70 - 71 DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalMarSaFiCxC="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 68)+(select julio from flujo_de_efectivo where nivel = 69)-(select julio from flujo_de_efectivo where nivel = 70)-(select julio from flujo_de_efectivo where nivel = 71) where nivel = 72;";
                        $stmtTotMarSaFiCxC = $dbconec->prepare($queryTotalMarSaFiCxC);
                        $stmtTotMarSaFiCxC->execute(); 
                     
//JCV FALTA DE AGOSTO A DICIEMBRE...                                                                                                
                         
                         
                        //DÍAS DE COBRO DE CXC: (ES 30 / (LA 70 / 68) DE ESTA MISMA: flujo_de_efectivo)
                        $queryTotalEneDiCoCxC="update flujo_de_efectivo set enero = 30/((select enero from flujo_de_efectivo where nivel = 70)/(select enero from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotEneDiCoCxC = $dbconec->prepare($queryTotalEneDiCoCxC);
                        $stmtTotEneDiCoCxC->execute();  
                        
                        $queryTotalFebDiCoCxC="update flujo_de_efectivo set febrero = 30/((select febrero from flujo_de_efectivo where nivel = 70)/(select febrero from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotFebDiCoCxC = $dbconec->prepare($queryTotalFebDiCoCxC);
                        $stmtTotFebDiCoCxC->execute();  
                        
                        $queryTotalMarDiCoCxC="update flujo_de_efectivo set marzo = 30/((select marzo from flujo_de_efectivo where nivel = 70)/(select marzo from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotMarDiCoCxC = $dbconec->prepare($queryTotalMarDiCoCxC);
                        $stmtTotMarDiCoCxC->execute();  
                        
                        //ABRIL
                        $queryTotalMarDiCoCxC="update flujo_de_efectivo set abril = 30/((select abril from flujo_de_efectivo where nivel = 70)/(select abril from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotMarDiCoCxC = $dbconec->prepare($queryTotalMarDiCoCxC);
                        $stmtTotMarDiCoCxC->execute();  
                        
                        $queryTotalMarDiCoCxC="update flujo_de_efectivo set mayo = 30/((select mayo from flujo_de_efectivo where nivel = 70)/(select mayo from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotMarDiCoCxC = $dbconec->prepare($queryTotalMarDiCoCxC);
                        $stmtTotMarDiCoCxC->execute();  
                        
                        $queryTotalMarDiCoCxC="update flujo_de_efectivo set junio = 30/((select junio from flujo_de_efectivo where nivel = 70)/(select junio from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotMarDiCoCxC = $dbconec->prepare($queryTotalMarDiCoCxC);
                        $stmtTotMarDiCoCxC->execute();  
                        
                        //JULIO
                        $queryTotalMarDiCoCxC="update flujo_de_efectivo set julio = 30/((select julio from flujo_de_efectivo where nivel = 70)/(select julio from flujo_de_efectivo where nivel = 68)) where nivel = 73;";
                        $stmtTotMarDiCoCxC = $dbconec->prepare($queryTotalMarDiCoCxC);
                        $stmtTotMarDiCoCxC->execute();  
                        
                        
                        
                       
                    }else{
                         echo '<span class="label label-danger label-block">NO SE HAN CAPTURADO/CALCULADO DATOS DE CXC</span>';
                    }
                    
                    
                    
                     ///////////////////////////JCV YA PARA LOS REPORTES DE INVENTARIOS 
                    //JCV HAY QUE CONSIDERAR LA TABLA reporte_store_inventarios ADEMAS DE LA DE flujo_de_efectivo
                        
                    
                    $queryProbarInv= "Select * from reporte_store_cxc";
                    $stmtProbarInv = $dbconec->prepare($queryProbarInv);
                    $stmtProbarInv->execute();
                    $countinv = $stmtProbarInv->rowCount();
                    if($countinv > 0)
                    {
                        
                        //SALDO INICIAL DE INVENTARIO STOCK: (ES LA 80 de reporte_store_inventarios) SE CAPTURA EN reporte_store_inventarios
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 80) where nivel = 80;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();   
                        
                        
                        //NUEVAS COMPRAS DE INVENTARIO STOCK: (ES LA 81 de reporte_store_inventarios)
                        $queryTotalEneNuCoInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotEneNuCoInv = $dbconec->prepare($queryTotalEneNuCoInv);
                        $stmtTotEneNuCoInv->execute();   
                        
                        $queryTotalFebNuCoInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotFebNuCoInv = $dbconec->prepare($queryTotalFebNuCoInv);
                        $stmtTotFebNuCoInv->execute();  
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                        //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=81";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        //abril
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=81";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        //JULIO
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 81) where nivel = 81;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...  

                        
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalEneCoVeInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotEneCoVeInv = $dbconec->prepare($queryTotalEneCoVeInv);
                        $stmtTotEneCoVeInv->execute();  
                        
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalFebCoVeInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotFebCoVeInv = $dbconec->prepare($queryTotalFebCoVeInv);
                        $stmtTotFebCoVeInv->execute();   
                        
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=82";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        //ABRIL
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                        
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                        
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                        
                        //JULIO
                        //COSTO DE VENTAS DE INVENTARIO STOCK: (ES LA 82 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 82) where nivel = 82;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=82";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...                          
                        
                        
                        //SALDO FINAL ENERO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 80)+(select enero from flujo_de_efectivo where nivel = 81)-(select enero from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();  
                        
                         
                        //JCV AHORA EL SALDO INICIAL DE FEBRERO ES EL SALDO FINAL DE ENERO
                        $queryTotalFebSaInInv="update flujo_de_efectivo set febrero = (select enero from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotFebSaInInv = $dbconec->prepare($queryTotalFebSaInInv);
                        $stmtTotFebSaInInv->execute();  
                        
                        
                        //SALDO FINAL FEBRERO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalFebSaFiInv="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 80)+(select febrero from flujo_de_efectivo where nivel = 81)-(select febrero from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFiInv);
                        $stmtTotFebSaFiInv->execute();  
                        
                        
                         //JCV AHORA EL SALDO INICIAL DE MARZO ES EL SALDO FINAL DE FEBRERO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set marzo = (select febrero from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MARZO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 80)+(select marzo from flujo_de_efectivo where nivel = 81)-(select marzo from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        
                         //JCV AHORA EL SALDO INICIAL DE ABRIL ES EL SALDO FINAL DE MARZO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set abril = (select marzo from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL ABRIL DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 80)+(select abril from flujo_de_efectivo where nivel = 81)-(select abril from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        
                        //JCV AHORA EL SALDO INICIAL DE MAYO ES EL SALDO FINAL DE ABRIL
                        $queryTotalMarSaInInv="update flujo_de_efectivo set mayo = (select abril from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MAYO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 80)+(select mayo from flujo_de_efectivo where nivel = 81)-(select mayo from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //JCV AHORA EL SALDO INICIAL DE JUNIO ES EL SALDO FINAL DE MAYO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set junio = (select mayo from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JUNIO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 80)+(select junio from flujo_de_efectivo where nivel = 81)-(select junio from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //JCV AHORA EL SALDO INICIAL DE JULIO ES EL SALDO FINAL DE JUNIO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set julio = (select junio from flujo_de_efectivo where nivel = 83) where nivel = 80;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JULIO DE INVENTARIO STOCK: (ES LA 80+81-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 80)+(select julio from flujo_de_efectivo where nivel = 81)-(select julio from flujo_de_efectivo where nivel = 82) where nivel = 83;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                        
                        
                         //días de inventario DE INVENTARIO STOCK: (ES LA (83/82)*30 de flujo_de_efectivo)
                        $queryTotalEneDiInInv="update flujo_de_efectivo set enero = ((select enero from flujo_de_efectivo where nivel = 83)/(select enero from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                        $stmtTotEneDiInInv->execute(); 
                        
                        $queryTotalFebDiInInv="update flujo_de_efectivo set febrero = ((select febrero from flujo_de_efectivo where nivel = 83)/(select febrero from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                        $stmtTotFebDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set marzo = ((select marzo from flujo_de_efectivo where nivel = 83)/(select marzo from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //ABRIL
                        $queryTotalMarDiInInv="update flujo_de_efectivo set abril = ((select abril from flujo_de_efectivo where nivel = 83)/(select abril from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set mayo = ((select mayo from flujo_de_efectivo where nivel = 83)/(select mayo from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set junio = ((select junio from flujo_de_efectivo where nivel = 83)/(select junio from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //JULIO
                        $queryTotalMarDiInInv="update flujo_de_efectivo set julio = ((select julio from flujo_de_efectivo where nivel = 83)/(select julio from flujo_de_efectivo where nivel = 82))*30 where nivel = 84;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...                                                
                        
                        
                        
                         ////////////////////////////INVENTARIO SERVICIO
                        
                        
                        
                        //SALDO INICIAL DE INVENTARIO SERVICIO: (ES LA 85 de reporte_store_inventarios) SE CAPTURA EN reporte_store_inventarios
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 85) where nivel = 85;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();   
                        
                        
                        //NUEVAS COMPRAS DE INVENTARIO SERVICIO: (ES LA 86 de reporte_store_inventarios)
                        $queryTotalEneNuCoInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotEneNuCoInv = $dbconec->prepare($queryTotalEneNuCoInv);
                        $stmtTotEneNuCoInv->execute();   
                        
                        $queryTotalFebNuCoInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotFebNuCoInv = $dbconec->prepare($queryTotalFebNuCoInv);
                        $stmtTotFebNuCoInv->execute();  
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=86";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        //abril
                         $queryTotalMarNuCoInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                         $queryTotalMarNuCoInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                         $queryTotalMarNuCoInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
                          //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=86";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        
                        //JULIO
                         $queryTotalMarNuCoInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 86) where nivel = 86;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute(); 
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...  

                        
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalEneCoVeInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotEneCoVeInv = $dbconec->prepare($queryTotalEneCoVeInv);
                        $stmtTotEneCoVeInv->execute();  
                        
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalFebCoVeInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotFebCoVeInv = $dbconec->prepare($queryTotalFebCoVeInv);
                        $stmtTotFebCoVeInv->execute();   
                        
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute(); 
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1CoVeInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=87";
                        $stmtTotT1CoVeInv = $dbconec->prepare($queryTotalT1CoVeInv);
                        $stmtTotT1CoVeInv->execute();
                        
                        //abril
                       //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute(); 
                        
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute(); 
                        
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute(); 
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1CoVeInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=87";
                        $stmtTotT1CoVeInv = $dbconec->prepare($queryTotalT1CoVeInv);
                        $stmtTotT1CoVeInv->execute();
                        
                        //JULIO
                        //COSTO DE VENTAS DE INVENTARIO SERVICIO: (ES LA 87 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 87) where nivel = 87;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute(); 
                       
//JCV FALTA DE agosto A DICIEMBRE...                          
                        
                        
                        //SALDO FINAL ENERO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 85)+(select enero from flujo_de_efectivo where nivel = 86)-(select enero from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();  
                        
                        
                        //JCV AHORA EL SALDO INICIAL DE FEBRERO ES EL SALDO FINAL DE ENERO
                        $queryTotalFebSaInInv="update flujo_de_efectivo set febrero = (select enero from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotFebSaInInv = $dbconec->prepare($queryTotalFebSaInInv);
                        $stmtTotFebSaInInv->execute();  
                        
                        
                        //SALDO FINAL FEBRERO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalFebSaFiInv="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 85)+(select febrero from flujo_de_efectivo where nivel = 86)-(select febrero from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFiInv);
                        $stmtTotFebSaFiInv->execute();  
                        
                        
                         //JCV AHORA EL SALDO INICIAL DE MARZO ES EL SALDO FINAL DE FEBRERO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set marzo = (select febrero from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MARZO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 85)+(select marzo from flujo_de_efectivo where nivel = 86)-(select marzo from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        
                        //JCV AHORA EL SALDO INICIAL DE ABRIL ES EL SALDO FINAL DE MARZO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set abril = (select marzo from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL ABRIL DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 85)+(select abril from flujo_de_efectivo where nivel = 86)-(select abril from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //JCV AHORA EL SALDO INICIAL DE MAYO ES EL SALDO FINAL DE ABRIL
                        $queryTotalMarSaInInv="update flujo_de_efectivo set mayo = (select abril from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MAYO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 85)+(select mayo from flujo_de_efectivo where nivel = 86)-(select mayo from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //JCV AHORA EL SALDO INICIAL DE JUNIO ES EL SALDO FINAL DE MAYO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set junio = (select mayo from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JUNIO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 85)+(select junio from flujo_de_efectivo where nivel = 86)-(select junio from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //JCV AHORA EL SALDO INICIAL DE JULIO ES EL SALDO FINAL DE JUNIO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set julio = (select junio from flujo_de_efectivo where nivel = 88) where nivel = 85;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JULIO DE INVENTARIO SERVICIO: (ES LA 85+86-87 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 85)+(select julio from flujo_de_efectivo where nivel = 86)-(select julio from flujo_de_efectivo where nivel = 87) where nivel = 88;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                        
                        
                         //días de inventario DE INVENTARIO SERVICIO: (ES LA (88/87)*30 de flujo_de_efectivo)
                        $queryTotalEneDiInInv="update flujo_de_efectivo set enero = ((select enero from flujo_de_efectivo where nivel = 88)/(select enero from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                        $stmtTotEneDiInInv->execute(); 
                        
                        $queryTotalFebDiInInv="update flujo_de_efectivo set febrero = ((select febrero from flujo_de_efectivo where nivel = 88)/(select febrero from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                        $stmtTotFebDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set marzo = ((select marzo from flujo_de_efectivo where nivel = 88)/(select marzo from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //ABRIL
                         $queryTotalMarDiInInv="update flujo_de_efectivo set abril = ((select abril from flujo_de_efectivo where nivel = 88)/(select abril from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                         $queryTotalMarDiInInv="update flujo_de_efectivo set mayo = ((select mayo from flujo_de_efectivo where nivel = 88)/(select mayo from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                         $queryTotalMarDiInInv="update flujo_de_efectivo set junio = ((select junio from flujo_de_efectivo where nivel = 88)/(select junio from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //JULIO
                         $queryTotalMarDiInInv="update flujo_de_efectivo set julio = ((select julio from flujo_de_efectivo where nivel = 88)/(select julio from flujo_de_efectivo where nivel = 87))*30 where nivel = 89;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
//JCV FALTA DE AGOSTO A DICIEMBRE...                          
                        
                        
                        ////////////////////////////INVENTARIO EN TRÁNSITO
                        
                        
                        
                        //SALDO INICIAL DE INVENTARIO TRÁNSITO: (ES LA 90 de reporte_store_inventarios) SE CAPTURA EN reporte_store_inventarios
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 90) where nivel = 90;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();   
                        
                        
                        //NUEVAS COMPRAS DE INVENTARIO TRÁNSITO: (ES LA 91 de reporte_store_inventarios)
                        $queryTotalEneNuCoInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotEneNuCoInv = $dbconec->prepare($queryTotalEneNuCoInv);
                        $stmtTotEneNuCoInv->execute();   
                        
                        $queryTotalFebNuCoInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotFebNuCoInv = $dbconec->prepare($queryTotalFebNuCoInv);
                        $stmtTotFebNuCoInv->execute();  
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute();  
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=91";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        
                        //abril
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute();  
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute();  
                        
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute();  
                        
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=91";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        
                        
                        //JULIO
                        $queryTotalMarNuCoInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 91) where nivel = 91;";
                        $stmtTotMarNuCoInv = $dbconec->prepare($queryTotalMarNuCoInv);
                        $stmtTotMarNuCoInv->execute();  
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...  

                        
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalEneCoVeInv="update flujo_de_efectivo set enero = (select enero from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotEneCoVeInv = $dbconec->prepare($queryTotalEneCoVeInv);
                        $stmtTotEneCoVeInv->execute();  
                        
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalFebCoVeInv="update flujo_de_efectivo set febrero = (select febrero from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotFebCoVeInv = $dbconec->prepare($queryTotalFebCoVeInv);
                        $stmtTotFebCoVeInv->execute();   
                        
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set marzo = (select marzo from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();   
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=92";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        
                        //ABRIL
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set abril = (select abril from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();   
                        
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set mayo = (select mayo from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();   
                        
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set junio = (select junio from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();  
                          
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1NuCoInv="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=92";
                        $stmtTotT1NuCoInv = $dbconec->prepare($queryTotalT1NuCoInv);
                        $stmtTotT1NuCoInv->execute();
                        
                        //JULIO
                        //COSTO DE VENTAS DE INVENTARIO TRÁNSITO: (ES LA 92 de reporte_store_inventarios)
                        $queryTotalMarCoVeInv="update flujo_de_efectivo set julio = (select julio from reporte_store_inventarios where nivel = 92) where nivel = 92;";
                        $stmtTotMarCoVeInv = $dbconec->prepare($queryTotalMarCoVeInv);
                        $stmtTotMarCoVeInv->execute();   
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...                          
                        
                        
                        //SALDO FINAL ENERO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalEneSaFiInv="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 90)+(select enero from flujo_de_efectivo where nivel = 91)-(select enero from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFiInv);
                        $stmtTotEneSaFiInv->execute();  
                        
                        
                        //JCV AHORA EL SALDO INICIAL DE FEBRERO ES EL SALDO FINAL DE ENERO
                        $queryTotalFebSaInInv="update flujo_de_efectivo set febrero = (select enero from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotFebSaInInv = $dbconec->prepare($queryTotalFebSaInInv);
                        $stmtTotFebSaInInv->execute();  
                        
                        
                        //SALDO FINAL FEBRERO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalFebSaFiInv="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 90)+(select febrero from flujo_de_efectivo where nivel = 91)-(select febrero from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFiInv);
                        $stmtTotFebSaFiInv->execute();  
                        
                        
                         //JCV AHORA EL SALDO INICIAL DE MARZO ES EL SALDO FINAL DE FEBRERO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set marzo = (select febrero from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MARZO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 90)+(select marzo from flujo_de_efectivo where nivel = 91)-(select marzo from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        
                         //JCV AHORA EL SALDO INICIAL DE ABRIL ES EL SALDO FINAL DE MARZO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set abril = (select marzo from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL ABRIL DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 90)+(select abril from flujo_de_efectivo where nivel = 91)-(select abril from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                         //JCV AHORA EL SALDO INICIAL DE MAYO ES EL SALDO FINAL DE ABRIÑ
                        $queryTotalMarSaInInv="update flujo_de_efectivo set mayo = (select abril from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL MAYO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 90)+(select mayo from flujo_de_efectivo where nivel = 91)-(select mayo from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                         //JCV AHORA EL SALDO INICIAL DE JUNIO ES EL SALDO FINAL DE MAYO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set junio = (select mayo from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JUNIO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 90)+(select junio from flujo_de_efectivo where nivel = 91)-(select junio from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
                        //julio
                         //JCV AHORA EL SALDO INICIAL DE JULIO ES EL SALDO FINAL DE JUNIO
                        $queryTotalMarSaInInv="update flujo_de_efectivo set julio = (select junio from flujo_de_efectivo where nivel = 93) where nivel = 90;";
                        $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                        $stmtTotMarSaInInv->execute();  
                        
                         //SALDO FINAL JULIO DE INVENTARIO TRÁNSITO: (ES LA 90+91-82 de flujo_de_efectivo)
                        $queryTotalMarSaFiInv="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 90)+(select julio from flujo_de_efectivo where nivel = 91)-(select julio from flujo_de_efectivo where nivel = 92) where nivel = 93;";
                        $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFiInv);
                        $stmtTotMarSaFiInv->execute(); 
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                        
                        
                         //días de inventario DE INVENTARIO TRÁNSITO: (ES LA (93/92)*30 de flujo_de_efectivo)
                        $queryTotalEneDiInInv="update flujo_de_efectivo set enero = ((select enero from flujo_de_efectivo where nivel = 93)/(select enero from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                        $stmtTotEneDiInInv->execute(); 
                        
                        $queryTotalFebDiInInv="update flujo_de_efectivo set febrero = ((select febrero from flujo_de_efectivo where nivel = 93)/(select febrero from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                        $stmtTotFebDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set marzo = ((select marzo from flujo_de_efectivo where nivel = 93)/(select marzo from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //ABRIL
                        $queryTotalMarDiInInv="update flujo_de_efectivo set abril = ((select abril from flujo_de_efectivo where nivel = 93)/(select abril from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set mayo = ((select mayo from flujo_de_efectivo where nivel = 93)/(select mayo from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        $queryTotalMarDiInInv="update flujo_de_efectivo set junio = ((select junio from flujo_de_efectivo where nivel = 93)/(select junio from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
                        //JULIO
                        $queryTotalMarDiInInv="update flujo_de_efectivo set julio = ((select julio from flujo_de_efectivo where nivel = 93)/(select julio from flujo_de_efectivo where nivel = 92))*30 where nivel = 94;";
                        $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                        $stmtTotMarDiInInv->execute(); 
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...    
                        
                        
                        
                        ////////////////////////////PROVEEDORES
                        
                        //JCV SALDO INICIAL ENERO(LA 401 DE reporte_store_proveedores SE CAPTURA MANUAL
                        $queryTotalEneSaInPro="UPDATE flujo_de_efectivo SET enero = (SELECT enero FROM reporte_store_proveedores WHERE nivel=401)  WHERE nivel=74";
                        $stmtTotEneSaInPro = $dbconec->prepare($queryTotalEneSaInPro);
                        $stmtTotEneSaInPro->execute();
                        
                        //JCV NUEVAS COMPRAS(LA 402 DE reporte_store_proveedores
                        $queryTotalEneNuCoPro="UPDATE flujo_de_efectivo SET enero = (SELECT enero FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotEneNuCoPro = $dbconec->prepare($queryTotalEneNuCoPro);
                        $stmtTotEneNuCoPro->execute();
                        
                        $queryTotalFebNuCoPro="UPDATE flujo_de_efectivo SET febrero = (SELECT febrero FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotFebNuCoPro = $dbconec->prepare($queryTotalFebNuCoPro);
                        $stmtTotFebNuCoPro->execute();
                        
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET marzo = (SELECT marzo FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                         
                        //PRIMER TRIMESTRE
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                        
                        //ABRIL
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET abril = (SELECT abril FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET mayo = (SELECT mayo FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET junio = (SELECT junio FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                        //SEGUNDO TRIMESTRE
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
                        
                        //JULIO
                        $queryTotalMarNuCoPro="UPDATE flujo_de_efectivo SET julio = (SELECT julio FROM reporte_store_proveedores WHERE nivel=402)  WHERE nivel=75";
                        $stmtTotMarNuCoPro = $dbconec->prepare($queryTotalMarNuCoPro);
                        $stmtTotMarNuCoPro->execute();
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...                           
                         

                        //JCV PAGOS (LA SUMA DE 41:53)*-1
                        $queryTotalEnePaPro="UPDATE flujo_de_efectivo SET enero = (SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotEnePaPro = $dbconec->prepare($queryTotalEnePaPro);
                        $stmtTotEnePaPro->execute();
                        
                        $queryTotalFebPaPro="UPDATE flujo_de_efectivo SET febrero = (SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotFebPaPro = $dbconec->prepare($queryTotalFebPaPro);
                        $stmtTotFebPaPro->execute();
                        
                        $queryTotalMarPaPro="UPDATE flujo_de_efectivo SET marzo = (SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotMarPaPro = $dbconec->prepare($queryTotalMarPaPro);
                        $stmtTotMarPaPro->execute();
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1PaPro="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=76";
                        $stmtTotT1PaPro = $dbconec->prepare($queryTotalT1PaPro);
                        $stmtTotT1PaPro->execute();
                        
                        //ABRIL
                         $queryTotalMarPaPro="UPDATE flujo_de_efectivo SET abril = (SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotMarPaPro = $dbconec->prepare($queryTotalMarPaPro);
                        $stmtTotMarPaPro->execute();
                        
                         $queryTotalMarPaPro="UPDATE flujo_de_efectivo SET mayo = (SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotMarPaPro = $dbconec->prepare($queryTotalMarPaPro);
                        $stmtTotMarPaPro->execute();
                        
                         $queryTotalMarPaPro="UPDATE flujo_de_efectivo SET junio = (SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotMarPaPro = $dbconec->prepare($queryTotalMarPaPro);
                        $stmtTotMarPaPro->execute();
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1PaPro="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=76";
                        $stmtTotT1PaPro = $dbconec->prepare($queryTotalT1PaPro);
                        $stmtTotT1PaPro->execute();
                        
                        //JULIO
                         $queryTotalMarPaPro="UPDATE flujo_de_efectivo SET julio = (SELECT sum(julio) FROM flujo_de_efectivo WHERE nivel>=41 AND nivel<=53)*-1  WHERE nivel=76";
                        $stmtTotMarPaPro = $dbconec->prepare($queryTotalMarPaPro);
                        $stmtTotMarPaPro->execute();
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...                            
                         
                        
                        //JCV AJUSTE DE PRECIOS / CANCELACIONES(LA 404 DE reporte_store_proveedores
                        $queryTotalEneAjPrPro="UPDATE flujo_de_efectivo SET enero = (SELECT enero FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotEneAjPrPro = $dbconec->prepare($queryTotalEneAjPrPro);
                        $stmtTotEneAjPrPro->execute();
                        
                        $queryTotalFebAjPrPro="UPDATE flujo_de_efectivo SET febrero = (SELECT febrero FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotFebAjPrPro = $dbconec->prepare($queryTotalFebAjPrPro);
                        $stmtTotFebAjPrPro->execute();
                        
                        $queryTotalMarAjPrPro="UPDATE flujo_de_efectivo SET marzo = (SELECT marzo FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotMarAjPrPro = $dbconec->prepare($queryTotalMarAjPrPro);
                        $stmtTotMarAjPrPro->execute();
                        
                         //jcv PARA EL PRIMER TRIMESTRE
                        $queryTotalT1AjPrPro="UPDATE flujo_de_efectivo SET t_1 = enero + febrero + marzo WHERE nivel=77";
                        $stmtTotT1AjPrPro = $dbconec->prepare($queryTotalT1AjPrPro);
                        $stmtTotT1AjPrPro->execute();
                        
                        //ABRIL
                         $queryTotalMarAjPrPro="UPDATE flujo_de_efectivo SET abril = (SELECT abril FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotMarAjPrPro = $dbconec->prepare($queryTotalMarAjPrPro);
                        $stmtTotMarAjPrPro->execute();
                        
                         $queryTotalMarAjPrPro="UPDATE flujo_de_efectivo SET mayo = (SELECT mayo FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotMarAjPrPro = $dbconec->prepare($queryTotalMarAjPrPro);
                        $stmtTotMarAjPrPro->execute();
                        
                         $queryTotalMarAjPrPro="UPDATE flujo_de_efectivo SET junio = (SELECT junio FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotMarAjPrPro = $dbconec->prepare($queryTotalMarAjPrPro);
                        $stmtTotMarAjPrPro->execute();
                        
                         //jcv PARA EL SEGUNDO TRIMESTRE
                        $queryTotalT1AjPrPro="UPDATE flujo_de_efectivo SET t_2 = abril + mayo + junio WHERE nivel=77";
                        $stmtTotT1AjPrPro = $dbconec->prepare($queryTotalT1AjPrPro);
                        $stmtTotT1AjPrPro->execute();
                        
                        //JULIO
                         $queryTotalMarAjPrPro="UPDATE flujo_de_efectivo SET julio = (SELECT julio FROM reporte_store_proveedores WHERE nivel=404)  WHERE nivel=77;";
                        $stmtTotMarAjPrPro = $dbconec->prepare($queryTotalMarAjPrPro);
                        $stmtTotMarAjPrPro->execute();
                        
//JCV FALTA DE AGOSTO A DICIEMBRE...                         
                        
                        
                        //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalEneSaFiPro="UPDATE flujo_de_efectivo SET enero = (SELECT enero FROM flujo_de_efectivo WHERE nivel=74)+(SELECT enero FROM flujo_de_efectivo WHERE nivel=75)-(SELECT enero FROM flujo_de_efectivo WHERE nivel=76)-(SELECT enero FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotEneSaFiPro = $dbconec->prepare($queryTotalEneSaFiPro);
                        $stmtTotEneSaFiPro->execute();
                        
                        
                        //JCV SALDO INICIAL FEBRERO ES EL SALDO FINAL DE ENERO(LA 78 DE flujo_de_efectivo )
                        $queryTotalFebSaInPro="UPDATE flujo_de_efectivo SET febrero = (SELECT enero FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotFebSaInPro = $dbconec->prepare($queryTotalFebSaInPro);
                        $stmtTotFebSaInPro->execute();
                        
                        //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalFebSaFiPro="UPDATE flujo_de_efectivo SET febrero = (SELECT febrero FROM flujo_de_efectivo WHERE nivel=74)+(SELECT febrero FROM flujo_de_efectivo WHERE nivel=75)-(SELECT febrero FROM flujo_de_efectivo WHERE nivel=76)-(SELECT febrero FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotFebSaFiPro = $dbconec->prepare($queryTotalFebSaFiPro);
                        $stmtTotFebSaFiPro->execute();
                        
                        //JCV SALDO INICIAL MARZO ES EL SALDO FINAL DE FEBRERO(LA 78 DE flujo_de_efectivo )
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET marzo = (SELECT febrero FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                         //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET marzo = (SELECT marzo FROM flujo_de_efectivo WHERE nivel=74)+(SELECT marzo FROM flujo_de_efectivo WHERE nivel=75)-(SELECT marzo FROM flujo_de_efectivo WHERE nivel=76)-(SELECT marzo FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        
                        //PRIMER TRIMESTRE
                        //JCV SALDO INICIAL igual al mes de enero
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET t_1 = enero  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                          //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET t_1 = (SELECT t_1 FROM flujo_de_efectivo WHERE nivel=74)+(SELECT t_1 FROM flujo_de_efectivo WHERE nivel=75)-(SELECT t_1 FROM flujo_de_efectivo WHERE nivel=76)-(SELECT t_1 FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        
                        //ABRIL
                        //JCV SALDO INICIAL ABRIL ES EL SALDO FINAL DE MARZO(LA 78 DE flujo_de_efectivo )
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET abril = (SELECT marzo FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                         //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET abril = (SELECT abril FROM flujo_de_efectivo WHERE nivel=74)+(SELECT abril FROM flujo_de_efectivo WHERE nivel=75)-(SELECT abril FROM flujo_de_efectivo WHERE nivel=76)-(SELECT abril FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        //MAYO
                        //JCV SALDO INICIAL MAYO ES EL SALDO FINAL DE ABRIL(LA 78 DE flujo_de_efectivo )
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET mayo = (SELECT abril FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                         //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET mayo = (SELECT mayo FROM flujo_de_efectivo WHERE nivel=74)+(SELECT mayo FROM flujo_de_efectivo WHERE nivel=75)-(SELECT mayo FROM flujo_de_efectivo WHERE nivel=76)-(SELECT mayo FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        //JUNIO
                        //JCV SALDO INICIAL JUNIO ES EL SALDO FINAL DE MAYO(LA 78 DE flujo_de_efectivo )
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET junio = (SELECT mayo FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                         //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET junio = (SELECT junio FROM flujo_de_efectivo WHERE nivel=74)+(SELECT junio FROM flujo_de_efectivo WHERE nivel=75)-(SELECT junio FROM flujo_de_efectivo WHERE nivel=76)-(SELECT junio FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        
                        //SEGUNDO TRIMESTRE
                        //JCV SALDO INICIAL igual al mes de ABRIL
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET t_2 = abril  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                          //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET t_2 = (SELECT t_2 FROM flujo_de_efectivo WHERE nivel=74)+(SELECT t_2 FROM flujo_de_efectivo WHERE nivel=75)-(SELECT t_2 FROM flujo_de_efectivo WHERE nivel=76)-(SELECT t_2 FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                        
                        
                        
                        
                        //JULIO
                        //JCV SALDO INICIAL JULIO ES EL SALDO FINAL DE JUNIO(LA 78 DE flujo_de_efectivo )
                        $queryTotalMarSaInPro="UPDATE flujo_de_efectivo SET julio = (SELECT junio FROM flujo_de_efectivo WHERE nivel=78)  WHERE nivel=74";
                        $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                        $stmtTotMarSaInPro->execute();
                        
                         //JCV SALDO FINAL(LA 74+75-76-77 DE flujo_de_efectivo)
                        $queryTotalMarSaFiPro="UPDATE flujo_de_efectivo SET julio = (SELECT julio FROM flujo_de_efectivo WHERE nivel=74)+(SELECT julio FROM flujo_de_efectivo WHERE nivel=75)-(SELECT julio FROM flujo_de_efectivo WHERE nivel=76)-(SELECT julio FROM flujo_de_efectivo WHERE nivel=77)  WHERE nivel=78;";
                        $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                        $stmtTotMarSaFiPro->execute();
                       
//JCV FALTA DE AGOSTO A DICIEMBRE...
                         
                         
                         //días de PAGO PROVEEDORES: (ES 30/(76/74) de flujo_de_efectivo)
                        $queryTotalEneDiPaPro="update flujo_de_efectivo set enero = 30/((select enero from flujo_de_efectivo where nivel = 76)/(select enero from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotEneDiPaPro = $dbconec->prepare($queryTotalEneDiPaPro);
                        $stmtTotEneDiPaPro->execute(); 
                        
                        $queryTotalFebDiPaPro="update flujo_de_efectivo set febrero = 30/((select febrero from flujo_de_efectivo where nivel = 76)/(select febrero from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotFebDiPaPro = $dbconec->prepare($queryTotalFebDiPaPro);
                        $stmtTotFebDiPaPro->execute(); 
                        
                        $queryTotalMarDiPaPro="update flujo_de_efectivo set marzo = 30/((select marzo from flujo_de_efectivo where nivel = 76)/(select marzo from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                        $stmtTotMarDiPaPro->execute(); 
                        
                        //ABRIL
                        $queryTotalMarDiPaPro="update flujo_de_efectivo set abril = 30/((select abril from flujo_de_efectivo where nivel = 76)/(select abril from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                        $stmtTotMarDiPaPro->execute(); 
                        
                        $queryTotalMarDiPaPro="update flujo_de_efectivo set mayo = 30/((select mayo from flujo_de_efectivo where nivel = 76)/(select mayo from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                        $stmtTotMarDiPaPro->execute(); 
                        
                        $queryTotalMarDiPaPro="update flujo_de_efectivo set junio = 30/((select junio from flujo_de_efectivo where nivel = 76)/(select junio from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                        $stmtTotMarDiPaPro->execute(); 
                        
                        //JULIO
                        $queryTotalMarDiPaPro="update flujo_de_efectivo set julio = 30/((select julio from flujo_de_efectivo where nivel = 76)/(select julio from flujo_de_efectivo where nivel = 74)) where nivel = 79;";
                        $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                        $stmtTotMarDiPaPro->execute(); 
                         
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                        
                          
                        
                    
                     }else{
                         echo '<span class="label label-danger label-block">NO SE HAN CAPTURADO/CALCULADO DATOS DE INVENTARIOS</span>';
                    }
                    
                    
                     
                $dbconec = null;

            } // JCV DEL IF



                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }


        
         
public function Insertar_datos_flujo_A()
        {
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;

                    
                    //JCV PARA CHECAR QUE NO HAY REGISTROS DE LOS QUE SE VAN A CALCULAR, SI HAY BORRARLOS Y LUEGO HACER EL CALCULO
                    //JCV LO HACEMOS VERIFICANDO EL NIVEL NO NO SEA 201 EN ADELANTE
                    
                    
                    $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=201 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                     
                     if($cuenta > 0)
                        {
                                $queryBorra = "delete FROM flujo_de_efectivo where nivel>=201 ;";
                                 $stmtBorrar = $dbconec->prepare($queryBorra);
                                 $stmtBorrar->execute();
                        }
                     

                        //JCV YA ESTÁ CON EL CICLO PARA TODAS LAS CUENTAS PARA TODOS LOS MESES
                    

                //try  
                //{
                        //JCV FALTA PONER EL MENSAJE DE SI ESTÁ VACÍA LA TABLA DE CUENTAS ACUMULATIVAS
                        //$queryAcumulativa = "SELECT * FROM cuentas_acumulativa where estado=1 and nivel>=200 and nivel<=900 order by nivel ;";
                        //JCV TEMPORAL HASTA 227 PORQUE LA UTILIAD DESEADA (228) Y VENTAS (229) AHORITA SOLO ESTÁN CPN LAS METAS
                        $queryAcumulativa = "SELECT * FROM cuentas_acumulativa where estado=1 and nivel>=200 and nivel<=227 order by nivel ;";
                        $stmtAcumulativa = $dbconec->prepare($queryAcumulativa);
                        $stmtAcumulativa->execute();
                        $count = $stmtAcumulativa->rowCount();

                        if($count > 0)
                        {
                                $filasAcumulativa= $stmtAcumulativa->fetchAll();
                        }else{
                            $dbconec = null;
                            exit();
                        } 

                        /*
                        $queryBorrar= "Select * from flujo_de_efectivo";
                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                        $stmtBorrar->execute();
                        if($count > 0)
                        {
                                $queryBorrar="DELETE from flujo_de_efectivo";
                                $stmtBorrar = $dbconec->prepare($queryBorrar);
                                $stmtBorrar->execute();
                        }else{

                        }
                        */

                        $cuantosinserto=0;

                        if (is_array($filasAcumulativa) || is_object($filasAcumulativa))
                        {
                            foreach ($filasAcumulativa as $row => $column)
                            {
                                $saldoEnero='0.00';
                                $saldoFebrero='0.00';
                                $saldoMarzo='0.00';
                                $saldoAbril='0.00';
                                $saldoMayo='0.00';
                                $saldoJunio='0.00';
                                $saldoJulio='0.00';
                                $saldoAgosto='0.00';
                                $saldoSeptiembre='0.00';
                                $saldoOctubre='0.00';
                                $saldoNoviembre='0.00';
                                $saldoDiciembre='0.00';
                                $saldot1='0.00';
                                $id_acumulativaGlobal=$column['id_acumulativa'];
                                $nombre_atributoGlobal=$column['nombre_atributo'];
                               // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                $nivelGlobal=$column['nivel'];
                                $cuenta_acumulativaGlobal=$column['nombre'];


                        //JCV PARA BORRAR LA TABLA


                        //JCV PARA INSERTAR TODOS LOS DATOS EN LA TABLA flujo_de_efectivo:
                        /*OJ CV OK $query = "INSERT INTO flujo_de_efectivo(id_acumulativa, nombre_atributo, cuenta_acumulativa, nivel, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre) values(:id_acumulativa, :nombre_atributo, :cuenta_acumulativa, :nivel, :enero, :febrero, :marzo, :abril, :mayo, :junio, :julio, :agosto, :septiembre, :octubre, :noviembre, :diciembre)";*/
                        $query = "INSERT INTO flujo_de_efectivo(id_acumulativa, nombre_atributo, cuenta_acumulativa, nivel, enero, febrero, marzo, t_1, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre) values(:id_acumulativa, :nombre_atributo, :cuenta_acumulativa, :nivel, :enero, :febrero, :marzo, :t_1, :abril, :mayo, :junio, :julio, :agosto, :septiembre, :octubre, :noviembre, :diciembre)";

                        /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                        $stmt = $dbconec->prepare($query);
                        //$stmt->bindParam(":id_acumulativa",$id_acumulativa);
                        //$stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativa);
                        //$stmt->bindParam(":nivel",$nivel);
                        $stmt->bindParam(":id_acumulativa",$id_acumulativaGlobal);
                        $stmt->bindParam(":nombre_atributo",$nombre_atributoGlobal);
                        $stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativaGlobal);
                        $stmt->bindParam(":nivel",$nivelGlobal);
                        $stmt->bindParam(":enero",$saldoEnero);
                        $stmt->bindParam(":febrero",$saldoFebrero);
                        $stmt->bindParam(":marzo",$saldoMarzo);
                        $stmt->bindParam(":t_1",$saldot1);
                        $stmt->bindParam(":abril",$saldoAbril);
                        $stmt->bindParam(":mayo",$saldoMayo);
                        $stmt->bindParam(":junio",$saldoJunio);
                        $stmt->bindParam(":julio",$saldoJulio);
                        $stmt->bindParam(":agosto",$saldoAgosto);
                        $stmt->bindParam(":septiembre",$saldoSeptiembre);
                        $stmt->bindParam(":octubre",$saldoOctubre);
                        $stmt->bindParam(":noviembre",$saldoNoviembre);
                        $stmt->bindParam(":diciembre",$saldoDiciembre);


                        if($stmt->execute())
                        {   

                                $count = $stmt->rowCount();
                                if($count == 0){
                                        //$data = "Duplicado";
                                        //echo json_encode($data);
                                } else {
                                        $cuantosinserto=$cuantosinserto+1;
                                        //$data = "Validado";
                                        //echo json_encode($data);
                                        
                                        
                                        
                                        
                                }
                        } else {

                                $data = "Error";
                                echo json_encode($data);
                        }
                        //$dbconec = null;



                } //JCV DEL FOR EACH PARA TODAS LAS CUENTAS

                /*JCV PARA PROBAR SI FUNCIONA if($cuantosinserto>0){
                    $data = "Validado";
                    echo json_encode($data);
                }*/
                 
                
                       
                ////JCV PARA ACTUALIZAR EGRESOS OPERATIVOS PORQUE EL ORDEN DEL REPORTE ES ANTES DE QUE PASEN CADA CUENTA
                // PORLO QUE PRIMERO INSERTA EN CEROS ESTA CUENTA Y AL FINAL ACTUALIZA (UPDATE) CON LAS CUENTAS YA INSERTADAS CON REGISTROS Y VALORES
                
                    /////////////////////////////////////JCV EL OTRO REPORTE//////////////////////////////////
                    
                    //JCV PARA LLENAR EL REPORTE DE RODOLFO, EL QUE ESTÁ ABAJO DEL REPORTE DE FLUJO DE EFECTIVO:
                    //GASTOS VARIABLES: // 18, 20, 21, 28, 29(NO LA TENEMOS), 61
                    
                    $queryTotalEneGaVa="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 18)+(select enero from flujo_de_efectivo where nivel = 20)+(select enero from flujo_de_efectivo where nivel = 21)+(select enero from flujo_de_efectivo where nivel = 28)+(select enero from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotEneGaVa = $dbconec->prepare($queryTotalEneGaVa);
                    $stmtTotEneGaVa->execute();
                    
                    $queryTotalFebGaVa="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 18)+(select febrero from flujo_de_efectivo where nivel = 20)+(select febrero from flujo_de_efectivo where nivel = 21)+(select febrero from flujo_de_efectivo where nivel = 28)+(select febrero from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotFebGaVa = $dbconec->prepare($queryTotalFebGaVa);
                    $stmtTotFebGaVa->execute();
                     
                    $queryTotalMarGaVa="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 18)+(select marzo from flujo_de_efectivo where nivel = 20)+(select marzo from flujo_de_efectivo where nivel = 21)+(select marzo from flujo_de_efectivo where nivel = 28)+(select marzo from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotMarGaVa = $dbconec->prepare($queryTotalMarGaVa);
                    $stmtTotMarGaVa->execute();
                    
                    //ABRIL
                    $queryTotalMarGaVa="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 18)+(select abril from flujo_de_efectivo where nivel = 20)+(select abril from flujo_de_efectivo where nivel = 21)+(select abril from flujo_de_efectivo where nivel = 28)+(select abril from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotMarGaVa = $dbconec->prepare($queryTotalMarGaVa);
                    $stmtTotMarGaVa->execute();
                    
                    $queryTotalMarGaVa="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 18)+(select mayo from flujo_de_efectivo where nivel = 20)+(select mayo from flujo_de_efectivo where nivel = 21)+(select mayo from flujo_de_efectivo where nivel = 28)+(select mayo from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotMarGaVa = $dbconec->prepare($queryTotalMarGaVa);
                    $stmtTotMarGaVa->execute();
                    
                    $queryTotalMarGaVa="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 18)+(select junio from flujo_de_efectivo where nivel = 20)+(select junio from flujo_de_efectivo where nivel = 21)+(select junio from flujo_de_efectivo where nivel = 28)+(select junio from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotMarGaVa = $dbconec->prepare($queryTotalMarGaVa);
                    $stmtTotMarGaVa->execute();
                    
                    $queryTotalMarGaVa="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 18)+(select julio from flujo_de_efectivo where nivel = 20)+(select julio from flujo_de_efectivo where nivel = 21)+(select julio from flujo_de_efectivo where nivel = 28)+(select julio from flujo_de_efectivo where nivel = 61) where nivel = 201;";
                    $stmtTotMarGaVa = $dbconec->prepare($queryTotalMarGaVa);
                    $stmtTotMarGaVa->execute();
                    
 //JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //GASTOS FIJOS: // 5, 6((no la teNEMOS), 7(EN DUDA, CHECAR SI SERVICIOS PROFESINALES AFECTA SOLO UNO O TODOS, 15, 16, 17, 19, 34, 35, 36(COMISIONES NO LA TENEMOS), 37,  38, 39(PAGO INTERESES, NO LA TENEMOS), 60
                    $queryTotalEneGaFi="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 5)+(select enero from flujo_de_efectivo where nivel = 15)+(select enero from flujo_de_efectivo where nivel = 16)+(select enero from flujo_de_efectivo where nivel = 17)+(select enero from flujo_de_efectivo where nivel = 19)+(select enero from flujo_de_efectivo where nivel = 34)+(select enero from flujo_de_efectivo where nivel = 35)+(select enero from flujo_de_efectivo where nivel = 37)+(select enero from flujo_de_efectivo where nivel = 38)+(select enero from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                    $queryTotalFebGaFi="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 5)+(select febrero from flujo_de_efectivo where nivel = 15)+(select febrero from flujo_de_efectivo where nivel = 16)+(select febrero from flujo_de_efectivo where nivel = 17)+(select febrero from flujo_de_efectivo where nivel = 19)+(select febrero from flujo_de_efectivo where nivel = 34)+(select febrero from flujo_de_efectivo where nivel = 35)+(select febrero from flujo_de_efectivo where nivel = 37)+(select febrero from flujo_de_efectivo where nivel = 38)+(select febrero from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotFebGaFi = $dbconec->prepare($queryTotalFebGaFi);
                    $stmtTotFebGaFi->execute();
                    
                    $queryTotalMarGaFi="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 5)+(select marzo from flujo_de_efectivo where nivel = 15)+(select marzo from flujo_de_efectivo where nivel = 16)+(select marzo from flujo_de_efectivo where nivel = 17)+(select marzo from flujo_de_efectivo where nivel = 19)+(select marzo from flujo_de_efectivo where nivel = 34)+(select marzo from flujo_de_efectivo where nivel = 35)+(select marzo from flujo_de_efectivo where nivel = 37)+(select marzo from flujo_de_efectivo where nivel = 38)+(select marzo from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotMarGaFi = $dbconec->prepare($queryTotalMarGaFi);
                    $stmtTotMarGaFi->execute();
                    
                    //ABRIL
                    $queryTotalMarGaFi="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 5)+(select abril from flujo_de_efectivo where nivel = 15)+(select abril from flujo_de_efectivo where nivel = 16)+(select abril from flujo_de_efectivo where nivel = 17)+(select abril from flujo_de_efectivo where nivel = 19)+(select abril from flujo_de_efectivo where nivel = 34)+(select abril from flujo_de_efectivo where nivel = 35)+(select abril from flujo_de_efectivo where nivel = 37)+(select abril from flujo_de_efectivo where nivel = 38)+(select abril from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotMarGaFi = $dbconec->prepare($queryTotalMarGaFi);
                    $stmtTotMarGaFi->execute();
                    
                    $queryTotalMarGaFi="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 5)+(select mayo from flujo_de_efectivo where nivel = 15)+(select mayo from flujo_de_efectivo where nivel = 16)+(select mayo from flujo_de_efectivo where nivel = 17)+(select mayo from flujo_de_efectivo where nivel = 19)+(select mayo from flujo_de_efectivo where nivel = 34)+(select mayo from flujo_de_efectivo where nivel = 35)+(select mayo from flujo_de_efectivo where nivel = 37)+(select mayo from flujo_de_efectivo where nivel = 38)+(select mayo from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotMarGaFi = $dbconec->prepare($queryTotalMarGaFi);
                    $stmtTotMarGaFi->execute();
                    
                    $queryTotalMarGaFi="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 5)+(select junio from flujo_de_efectivo where nivel = 15)+(select junio from flujo_de_efectivo where nivel = 16)+(select junio from flujo_de_efectivo where nivel = 17)+(select junio from flujo_de_efectivo where nivel = 19)+(select junio from flujo_de_efectivo where nivel = 34)+(select junio from flujo_de_efectivo where nivel = 35)+(select junio from flujo_de_efectivo where nivel = 37)+(select junio from flujo_de_efectivo where nivel = 38)+(select junio from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotMarGaFi = $dbconec->prepare($queryTotalMarGaFi);
                    $stmtTotMarGaFi->execute();
                    
                    $queryTotalMarGaFi="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 5)+(select julio from flujo_de_efectivo where nivel = 15)+(select julio from flujo_de_efectivo where nivel = 16)+(select julio from flujo_de_efectivo where nivel = 17)+(select julio from flujo_de_efectivo where nivel = 19)+(select julio from flujo_de_efectivo where nivel = 34)+(select julio from flujo_de_efectivo where nivel = 35)+(select julio from flujo_de_efectivo where nivel = 37)+(select julio from flujo_de_efectivo where nivel = 38)+(select julio from flujo_de_efectivo where nivel = 60) where nivel = 202;";
                    $stmtTotMarGaFi = $dbconec->prepare($queryTotalMarGaFi);
                    $stmtTotMarGaFi->execute();
                    
 //JCV FALTA DE AGOSTO A DICIEMBRE...  
                    
                    
                    //COSTO VENTAS /PAGO PROVEE: // DE LA 41 A LA 53 ( NO TENEMOS LA 41, 43 Y 49)
                    $queryTotalEneCoVePr="update flujo_de_efectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotEneCoVePr = $dbconec->prepare($queryTotalEneCoVePr);
                    $stmtTotEneCoVePr->execute();
                    
                    $queryTotalFebCoVePr="update flujo_de_efectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotFebCoVePr = $dbconec->prepare($queryTotalFebCoVePr);
                    $stmtTotFebCoVePr->execute();
                    
                    $queryTotalMarCoVePr="update flujo_de_efectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotMarCoVePr = $dbconec->prepare($queryTotalMarCoVePr);
                    $stmtTotMarCoVePr->execute();
                    
                    //ABRIL
                    $queryTotalMarCoVePr="update flujo_de_efectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotMarCoVePr = $dbconec->prepare($queryTotalMarCoVePr);
                    $stmtTotMarCoVePr->execute();
                    
                    $queryTotalMarCoVePr="update flujo_de_efectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotMarCoVePr = $dbconec->prepare($queryTotalMarCoVePr);
                    $stmtTotMarCoVePr->execute();
                    
                    $queryTotalMarCoVePr="update flujo_de_efectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotMarCoVePr = $dbconec->prepare($queryTotalMarCoVePr);
                    $stmtTotMarCoVePr->execute();
                    
                    $queryTotalMarCoVePr="update flujo_de_efectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >=41 and nivel <=53) where nivel = 203;";
                    $stmtTotMarCoVePr = $dbconec->prepare($queryTotalMarCoVePr);
                    $stmtTotMarCoVePr->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  
                    
                    
                    //MANO DE OBRA: // LA 45, 46 Y 47)
                    $queryTotalEneMaOb="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 45)+(select enero from flujo_de_efectivo where nivel = 46)+(select enero from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotEneMaOb = $dbconec->prepare($queryTotalEneMaOb);
                    $stmtTotEneMaOb->execute();
                    
                    $queryTotalFebMaOb="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 45)+(select febrero from flujo_de_efectivo where nivel = 46)+(select febrero from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotFebMaOb = $dbconec->prepare($queryTotalFebMaOb);
                    $stmtTotFebMaOb->execute();
                    
                    $queryTotalMarMaOb="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 45)+(select marzo from flujo_de_efectivo where nivel = 46)+(select marzo from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotMarMaOb = $dbconec->prepare($queryTotalMarMaOb);
                    $stmtTotMarMaOb->execute();
                    
                    //ABRIL
                    $queryTotalMarMaOb="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 45)+(select abril from flujo_de_efectivo where nivel = 46)+(select abril from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotMarMaOb = $dbconec->prepare($queryTotalMarMaOb);
                    $stmtTotMarMaOb->execute();
                    
                    $queryTotalMarMaOb="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 45)+(select mayo from flujo_de_efectivo where nivel = 46)+(select mayo from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotMarMaOb = $dbconec->prepare($queryTotalMarMaOb);
                    $stmtTotMarMaOb->execute();
                    
                    $queryTotalMarMaOb="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 45)+(select junio from flujo_de_efectivo where nivel = 46)+(select junio from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotMarMaOb = $dbconec->prepare($queryTotalMarMaOb);
                    $stmtTotMarMaOb->execute();
                    
                    $queryTotalMarMaOb="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 45)+(select julio from flujo_de_efectivo where nivel = 46)+(select julio from flujo_de_efectivo where nivel = 47) where nivel = 204;";
                    $stmtTotMarMaOb = $dbconec->prepare($queryTotalMarMaOb);
                    $stmtTotMarMaOb->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE... 
                    
                    
                    //OPERATIVOS: // DE LA 17 A LA 32 MÁS LA 39 (NO TENEMOS 32 NI 39)
                    $queryTotalEneOp="update flujo_de_efectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotEneOp = $dbconec->prepare($queryTotalEneOp);
                    $stmtTotEneOp->execute();

                    $queryTotalFebOp="update flujo_de_efectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotFebOp = $dbconec->prepare($queryTotalFebOp);
                    $stmtTotFebOp->execute();
                    
                    $queryTotalMarOp="update flujo_de_efectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotMarOp = $dbconec->prepare($queryTotalMarOp);
                    $stmtTotMarOp->execute();
                    
                    //ABRIL
                    $queryTotalMarOp="update flujo_de_efectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotMarOp = $dbconec->prepare($queryTotalMarOp);
                    $stmtTotMarOp->execute();
                    
                    $queryTotalMarOp="update flujo_de_efectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotMarOp = $dbconec->prepare($queryTotalMarOp);
                    $stmtTotMarOp->execute();
                    
                    $queryTotalMarOp="update flujo_de_efectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotMarOp = $dbconec->prepare($queryTotalMarOp);
                    $stmtTotMarOp->execute();
                    
                    //JULIO
                    $queryTotalMarOp="update flujo_de_efectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >=17 and nivel <=32) where nivel = 205;";
                    $stmtTotMarOp = $dbconec->prepare($queryTotalMarOp);
                    $stmtTotMarOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE... 

                    
                    //DE VENTA: // DE LA 33 A LA 37 (NO TENEMOS 33 NI 36)
                    $queryTotalEneDeVe="update flujo_de_efectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotEneDeVe = $dbconec->prepare($queryTotalEneDeVe);
                    $stmtTotEneDeVe->execute();
                    
                    $queryTotalFebDeVe="update flujo_de_efectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotFebDeVe = $dbconec->prepare($queryTotalFebDeVe);
                    $stmtTotFebDeVe->execute();
                    
                    $queryTotalMarDeVe="update flujo_de_efectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotMarDeVe = $dbconec->prepare($queryTotalMarDeVe);
                    $stmtTotMarDeVe->execute();
                    
                    //ABRIL
                    $queryTotalMarDeVe="update flujo_de_efectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotMarDeVe = $dbconec->prepare($queryTotalMarDeVe);
                    $stmtTotMarDeVe->execute();
                    
                    $queryTotalMarDeVe="update flujo_de_efectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotMarDeVe = $dbconec->prepare($queryTotalMarDeVe);
                    $stmtTotMarDeVe->execute();
                    
                    $queryTotalMarDeVe="update flujo_de_efectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotMarDeVe = $dbconec->prepare($queryTotalMarDeVe);
                    $stmtTotMarDeVe->execute();
                    
                    $queryTotalMarDeVe="update flujo_de_efectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >=33 and nivel <=37) where nivel = 206;";
                    $stmtTotMarDeVe = $dbconec->prepare($queryTotalMarDeVe);
                    $stmtTotMarDeVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                      
                    
                    
                    //ADMINISTRATIVOS: // DE LA 5 A LA 16 (NO TENEMOS 6, 8, 9, 10, 11)
                    $queryTotalEneAd="update flujo_de_efectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotEneAd = $dbconec->prepare($queryTotalEneAd);
                    $stmtTotEneAd->execute();
                    
                    $queryTotalFebAd="update flujo_de_efectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotFebAd = $dbconec->prepare($queryTotalFebAd);
                    $stmtTotFebAd->execute();
                    
                    $queryTotalMarAd="update flujo_de_efectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotMarAd = $dbconec->prepare($queryTotalMarAd);
                    $stmtTotMarAd->execute();
                    
                    //ABRIL
                    $queryTotalMarAd="update flujo_de_efectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotMarAd = $dbconec->prepare($queryTotalMarAd);
                    $stmtTotMarAd->execute();
                    
                    $queryTotalMarAd="update flujo_de_efectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotMarAd = $dbconec->prepare($queryTotalMarAd);
                    $stmtTotMarAd->execute();
                    
                    $queryTotalMarAd="update flujo_de_efectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotMarAd = $dbconec->prepare($queryTotalMarAd);
                    $stmtTotMarAd->execute();
                    
                    //JULIO
                    $queryTotalMarAd="update flujo_de_efectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >=5 and nivel <=16) where nivel = 207;";
                    $stmtTotMarAd = $dbconec->prepare($queryTotalMarAd);
                    $stmtTotMarAd->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                    //IMPUESTOS: (ES LA 38)
                    $queryTotalEneIm="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalFebIm="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotFebIm = $dbconec->prepare($queryTotalFebIm);
                    $stmtTotFebIm->execute();
                    
                    $queryTotalMarIm="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    //ABRIL
                    $queryTotalMarIm="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    $queryTotalMarIm="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    $queryTotalMarIm="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
                    //JULIO
                    $queryTotalMarIm="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 38) where nivel = 208;";
                    $stmtTotMarIm = $dbconec->prepare($queryTotalMarIm);
                    $stmtTotMarIm->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...

                    
                    //TOTAL COSTO DE VENTAS /PROVEE: // DE LA 205 A LA 208
                    $queryTotalEneToCoVe="update flujo_de_efectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotEneToCoVe = $dbconec->prepare($queryTotalEneToCoVe);
                    $stmtTotEneToCoVe->execute();
                    
                    $queryTotalFebToCoVe="update flujo_de_efectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotFebToCoVe = $dbconec->prepare($queryTotalFebToCoVe);
                    $stmtTotFebToCoVe->execute();
                    
                    $queryTotalMarToCoVe="update flujo_de_efectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotMarToCoVe = $dbconec->prepare($queryTotalMarToCoVe);
                    $stmtTotMarToCoVe->execute();
                    
                    //ABRIL
                    $queryTotalMarToCoVe="update flujo_de_efectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotMarToCoVe = $dbconec->prepare($queryTotalMarToCoVe);
                    $stmtTotMarToCoVe->execute();
                    
                    $queryTotalMarToCoVe="update flujo_de_efectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotMarToCoVe = $dbconec->prepare($queryTotalMarToCoVe);
                    $stmtTotMarToCoVe->execute();
                    
                    $queryTotalMarToCoVe="update flujo_de_efectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotMarToCoVe = $dbconec->prepare($queryTotalMarToCoVe);
                    $stmtTotMarToCoVe->execute();
                    
                    //JULIO
                    $queryTotalMarToCoVe="update flujo_de_efectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >=205 and nivel <=208) where nivel = 209;";
                    $stmtTotMarToCoVe = $dbconec->prepare($queryTotalMarToCoVe);
                    $stmtTotMarToCoVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                     
                    
                    //INTERESES: ES LA 39 (NO LA TENEMOS)
                    $queryTotalEneIn="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotEneIn = $dbconec->prepare($queryTotalEneIn);
                    $stmtTotEneIn->execute(); 
                    
                    $queryTotalFebIn="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotFebIn = $dbconec->prepare($queryTotalFebIn);
                    $stmtTotFebIn->execute(); 
                    
                    $queryTotalMarIn="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute(); 
                    
                    //ABRIL
                    $queryTotalMarIn="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute(); 
                    
                    $queryTotalMarIn="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute(); 
                    
                    $queryTotalMarIn="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute(); 
                    
                    //JULIO
                    $queryTotalMarIn="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 39) where nivel = 210;";
                    $stmtTotMarIn = $dbconec->prepare($queryTotalMarIn);
                    $stmtTotMarIn->execute(); 
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    
                    //IMPUESTOS FIN: (ES LA 38 O LA 211)
                    $queryTotalEneImFi="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotEneImFi = $dbconec->prepare($queryTotalEneImFi);
                    $stmtTotEneImFi->execute();
                    
                    $queryTotalFebImFi="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotFebImFi = $dbconec->prepare($queryTotalFebImFi);
                    $stmtTotFebImFi->execute();
                    
                    $queryTotalMarImFi="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotMarImFi = $dbconec->prepare($queryTotalMarImFi);
                    $stmtTotMarImFi->execute();
                    
                    //ABRIL
                    $queryTotalMarImFi="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotMarImFi = $dbconec->prepare($queryTotalMarImFi);
                    $stmtTotMarImFi->execute();
                    
                    $queryTotalMarImFi="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotMarImFi = $dbconec->prepare($queryTotalMarImFi);
                    $stmtTotMarImFi->execute();
                    
                    $queryTotalMarImFi="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotMarImFi = $dbconec->prepare($queryTotalMarImFi);
                    $stmtTotMarImFi->execute();
                    
                    //JULIO
                    $queryTotalMarImFi="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 38) where nivel = 211;";
                    $stmtTotMarImFi = $dbconec->prepare($queryTotalMarImFi);
                    $stmtTotMarImFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    

                    //EGRESOS OPERACIÓN: (ES LA 5)
                    $queryTotalEneEgOp="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotEneEgOp = $dbconec->prepare($queryTotalEneEgOp);
                    $stmtTotEneEgOp->execute();
                    
                    $queryTotalFebEgOp="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotFebEgOp = $dbconec->prepare($queryTotalFebEgOp);
                    $stmtTotFebEgOp->execute();
                    
                    $queryTotalMarEgOp="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //ABRIL
                     $queryTotalMarEgOp="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                     $queryTotalMarEgOp="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                     $queryTotalMarEgOp="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    $queryTotalMarEgOp="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 5) where nivel = 212;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    
                    
                    //EGRESOS inversión: (ES LA 56)
                    $queryTotalEneEgIn="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotEneEgIn = $dbconec->prepare($queryTotalEneEgIn);
                    $stmtTotEneEgIn->execute();
                    
                    $queryTotalFebEgIn="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotFebEgIn = $dbconec->prepare($queryTotalFebEgIn);
                    $stmtTotFebEgIn->execute();
                    
                    $queryTotalMarEgIn="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    //ABRIL
                    $queryTotalMarEgIn="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    $queryTotalMarEgIn="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    $queryTotalMarEgIn="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    //JULIO
                    $queryTotalMarEgIn="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 56) where nivel = 213;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   


                    //INVETARIO INICIAL: // LA 80, 85 Y 90 (NO LAS TENEMOS)
                    $queryTotalEneInIn="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 80)+(select enero from flujo_de_efectivo where nivel = 85)+(select enero from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotEneInIn = $dbconec->prepare($queryTotalEneInIn);
                    $stmtTotEneInIn->execute();
                    
                    $queryTotalFebInIn="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 80)+(select febrero from flujo_de_efectivo where nivel = 85)+(select febrero from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotFebInIn = $dbconec->prepare($queryTotalFebInIn);
                    $stmtTotFebInIn->execute();
                    
                    $queryTotalMarInIn="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 80)+(select marzo from flujo_de_efectivo where nivel = 85)+(select marzo from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotMarInIn = $dbconec->prepare($queryTotalMarInIn);
                    $stmtTotMarInIn->execute();
                    
                    //ABRIL
                    $queryTotalMarInIn="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 80)+(select abril from flujo_de_efectivo where nivel = 85)+(select abril from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotMarInIn = $dbconec->prepare($queryTotalMarInIn);
                    $stmtTotMarInIn->execute();
                    
                    $queryTotalMarInIn="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 80)+(select mayo from flujo_de_efectivo where nivel = 85)+(select mayo from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotMarInIn = $dbconec->prepare($queryTotalMarInIn);
                    $stmtTotMarInIn->execute();
                    
                    $queryTotalMarInIn="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 80)+(select junio from flujo_de_efectivo where nivel = 85)+(select junio from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotMarInIn = $dbconec->prepare($queryTotalMarInIn);
                    $stmtTotMarInIn->execute();
                    
                    //JULIO
                    $queryTotalMarInIn="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 80)+(select julio from flujo_de_efectivo where nivel = 85)+(select julio from flujo_de_efectivo where nivel = 90) where nivel = 214;";
                    $stmtTotMarInIn = $dbconec->prepare($queryTotalMarInIn);
                    $stmtTotMarInIn->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    
                    
                    //NUEVAS COMPRAS: // LA 81, 86 Y 91 (NO LAS TENEMOS)
                    $queryTotalEneNuCo="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 81)+(select enero from flujo_de_efectivo where nivel = 86)+(select enero from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotEneNuCo = $dbconec->prepare($queryTotalEneNuCo);
                    $stmtTotEneNuCo->execute();
                    
                    $queryTotalFebNuCo="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 81)+(select febrero from flujo_de_efectivo where nivel = 86)+(select febrero from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotFebNuCo = $dbconec->prepare($queryTotalFebNuCo);
                    $stmtTotFebNuCo->execute();
                    
                    $queryTotalMarNuCo="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 81)+(select marzo from flujo_de_efectivo where nivel = 86)+(select marzo from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotMarNuCo = $dbconec->prepare($queryTotalMarNuCo);
                    $stmtTotMarNuCo->execute();
                    
                    //ABRIL
                    $queryTotalMarNuCo="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 81)+(select abril from flujo_de_efectivo where nivel = 86)+(select abril from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotMarNuCo = $dbconec->prepare($queryTotalMarNuCo);
                    $stmtTotMarNuCo->execute();
                    
                    $queryTotalMarNuCo="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 81)+(select mayo from flujo_de_efectivo where nivel = 86)+(select mayo from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotMarNuCo = $dbconec->prepare($queryTotalMarNuCo);
                    $stmtTotMarNuCo->execute();
                    
                    $queryTotalMarNuCo="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 81)+(select junio from flujo_de_efectivo where nivel = 86)+(select junio from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotMarNuCo = $dbconec->prepare($queryTotalMarNuCo);
                    $stmtTotMarNuCo->execute();
                    
                    //JULIO
                    $queryTotalMarNuCo="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 81)+(select julio from flujo_de_efectivo where nivel = 86)+(select julio from flujo_de_efectivo where nivel = 91) where nivel = 215;";
                    $stmtTotMarNuCo = $dbconec->prepare($queryTotalMarNuCo);
                    $stmtTotMarNuCo->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    
                    
                    //COSTO DE VENTAS: // LA 82, 87 Y 92 (NO LAS TENEMOS)
                    $queryTotalEneCoVe="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 82)+(select enero from flujo_de_efectivo where nivel = 87)+(select enero from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotEneCoVe = $dbconec->prepare($queryTotalEneCoVe);
                    $stmtTotEneCoVe->execute();
                    
                    $queryTotalFebCoVe="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 82)+(select febrero from flujo_de_efectivo where nivel = 87)+(select febrero from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotFebCoVe = $dbconec->prepare($queryTotalFebCoVe);
                    $stmtTotFebCoVe->execute();
                    
                    $queryTotalMarCoVe="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 82)+(select marzo from flujo_de_efectivo where nivel = 87)+(select marzo from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    //ABRIL
                    $queryTotalMarCoVe="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 82)+(select abril from flujo_de_efectivo where nivel = 87)+(select abril from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    $queryTotalMarCoVe="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 82)+(select mayo from flujo_de_efectivo where nivel = 87)+(select mayo from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    $queryTotalMarCoVe="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 82)+(select junio from flujo_de_efectivo where nivel = 87)+(select junio from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
                    //JULIO
                    $queryTotalMarCoVe="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 82)+(select julio from flujo_de_efectivo where nivel = 87)+(select julio from flujo_de_efectivo where nivel = 92) where nivel = 216;";
                    $stmtTotMarCoVe = $dbconec->prepare($queryTotalMarCoVe);
                    $stmtTotMarCoVe->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   


                    //SALDO: // LA 83, 88 Y 93 (NO LAS TENEMOS)
                    $queryTotalEneSa="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 83)+(select enero from flujo_de_efectivo where nivel = 88)+(select enero from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotEneSa = $dbconec->prepare($queryTotalEneSa);
                    $stmtTotEneSa->execute();
                    
                    $queryTotalFebSa="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 83)+(select febrero from flujo_de_efectivo where nivel = 88)+(select febrero from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotFebSa = $dbconec->prepare($queryTotalFebSa);
                    $stmtTotFebSa->execute();
                    
                    $queryTotalMarSa="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 83)+(select marzo from flujo_de_efectivo where nivel = 88)+(select marzo from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotMarSa = $dbconec->prepare($queryTotalMarSa);
                    $stmtTotMarSa->execute();
                    
                    //ABRIL
                     $queryTotalMarSa="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 83)+(select abril from flujo_de_efectivo where nivel = 88)+(select abril from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotMarSa = $dbconec->prepare($queryTotalMarSa);
                    $stmtTotMarSa->execute();
                    
                     $queryTotalMarSa="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 83)+(select mayo from flujo_de_efectivo where nivel = 88)+(select mayo from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotMarSa = $dbconec->prepare($queryTotalMarSa);
                    $stmtTotMarSa->execute();
                    
                     $queryTotalMarSa="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 83)+(select junio from flujo_de_efectivo where nivel = 88)+(select junio from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotMarSa = $dbconec->prepare($queryTotalMarSa);
                    $stmtTotMarSa->execute();
                    
                    //JULIO
                     $queryTotalMarSa="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 83)+(select julio from flujo_de_efectivo where nivel = 88)+(select julio from flujo_de_efectivo where nivel = 93) where nivel = 217;";
                    $stmtTotMarSa = $dbconec->prepare($queryTotalMarSa);
                    $stmtTotMarSa->execute();
                    

                    //ACTIVO FIJO, CHECAR LA FORMULA, NO TIENE CONSISTENCIA: 
                    
                    
                    //INVENTARIO INICIAL, REPETIDO :  CHECAR SI SE VUELVE A PONER O YA NO
                    
                    //INVENTARIO COMPRAS, REPETIDO :  CHECAR SI SE VUELVE A PONER O YA NO
                    
                    //INVENTARIO COSTO DE VENTA, REPETIDO :  CHECAR SI SE VUELVE A PONER O YA NO
                    
                    //INVENTARIO FINAL, REPETIDO :  CHECAR SI SE VUELVE A PONER O YA NO
                    
                    
                    //VENTAS:  AL PARECER ES MANUAL PERO YO DIGO QU DEBE DE SER LA SUMA DE TODO LO VENDIDO
                    
                    
                    //COSTOS FIJOS: DE LA 5 A LA 17 + LA 19 + DE LA 33 A LA 35 + DE LA 37 A LA 39 + LA 60 Y TODO MULTIPLICADO POR -1 PARA QUE SALGA POSITIVO EL RESULTADO
                    $queryTotalEneCoFi="update flujo_de_efectivo set enero = ((select sum(enero) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select enero from flujo_de_efectivo where nivel = 19) + (select sum(enero) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(enero) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select enero from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotEneCoFi = $dbconec->prepare($queryTotalEneCoFi);
                    $stmtTotEneCoFi->execute();
                    
                    $queryTotalFebCoFi="update flujo_de_efectivo set febrero = ((select sum(febrero) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select febrero from flujo_de_efectivo where nivel = 19) + (select sum(febrero) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(febrero) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select febrero from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotFebCoFi = $dbconec->prepare($queryTotalFebCoFi);
                    $stmtTotFebCoFi->execute();
                    
                    $queryTotalMarCoFi="update flujo_de_efectivo set marzo = ((select sum(marzo) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select marzo from flujo_de_efectivo where nivel = 19) + (select sum(marzo) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(marzo) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select marzo from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotMarCoFi = $dbconec->prepare($queryTotalMarCoFi);
                    $stmtTotMarCoFi->execute();
                    
                    //abril
                    $queryTotalMarCoFi="update flujo_de_efectivo set abril = ((select sum(abril) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select abril from flujo_de_efectivo where nivel = 19) + (select sum(abril) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(abril) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select abril from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotMarCoFi = $dbconec->prepare($queryTotalMarCoFi);
                    $stmtTotMarCoFi->execute();
                    
                    $queryTotalMarCoFi="update flujo_de_efectivo set mayo = ((select sum(mayo) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select mayo from flujo_de_efectivo where nivel = 19) + (select sum(mayo) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(mayo) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select mayo from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotMarCoFi = $dbconec->prepare($queryTotalMarCoFi);
                    $stmtTotMarCoFi->execute();
                    
                    $queryTotalMarCoFi="update flujo_de_efectivo set junio = ((select sum(junio) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select junio from flujo_de_efectivo where nivel = 19) + (select sum(junio) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(junio) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select junio from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotMarCoFi = $dbconec->prepare($queryTotalMarCoFi);
                    $stmtTotMarCoFi->execute();
                    
                    //JULIO 
                    $queryTotalMarCoFi="update flujo_de_efectivo set julio = ((select sum(julio) from flujo_de_efectivo where nivel >=5 and nivel <=17) + (select julio from flujo_de_efectivo where nivel = 19) + (select sum(julio) from flujo_de_efectivo where nivel >=33 and nivel <=35) + (select sum(julio) from flujo_de_efectivo where nivel >=37 and nivel <=39) + (select julio from flujo_de_efectivo where nivel = 60)) * -1 where nivel = 224;";
                    $stmtTotMarCoFi = $dbconec->prepare($queryTotalMarCoFi);
                    $stmtTotMarCoFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...    

 
                    //COSTOS VARIABLES 70%: LA 19 + DE LA 20 A LA 32 + LA 36 (LA 36 NO LA TENEMOS)
                    $queryTotalEneCoVa="update flujo_de_efectivo set enero = (select enero from flujo_de_efectivo where nivel = 19) + (select sum(enero) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotEneCoVa = $dbconec->prepare($queryTotalEneCoVa);
                    $stmtTotEneCoVa->execute();
                    
                    $queryTotalFebCoVa="update flujo_de_efectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 19) + (select sum(febrero) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotFebCoVa = $dbconec->prepare($queryTotalFebCoVa);
                    $stmtTotFebCoVa->execute();
                    
                    $queryTotalMarCoVa="update flujo_de_efectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 19) + (select sum(marzo) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotMarCoVa = $dbconec->prepare($queryTotalMarCoVa);
                    $stmtTotMarCoVa->execute();
                    
                    //ABRIL
                    $queryTotalMarCoVa="update flujo_de_efectivo set abril = (select abril from flujo_de_efectivo where nivel = 19) + (select sum(abril) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotMarCoVa = $dbconec->prepare($queryTotalMarCoVa);
                    $stmtTotMarCoVa->execute();
                    
                    $queryTotalMarCoVa="update flujo_de_efectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 19) + (select sum(mayo) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotMarCoVa = $dbconec->prepare($queryTotalMarCoVa);
                    $stmtTotMarCoVa->execute();
                    
                    $queryTotalMarCoVa="update flujo_de_efectivo set junio = (select junio from flujo_de_efectivo where nivel = 19) + (select sum(junio) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotMarCoVa = $dbconec->prepare($queryTotalMarCoVa);
                    $stmtTotMarCoVa->execute();
                    
                    //JULIO
                    $queryTotalMarCoVa="update flujo_de_efectivo set julio = (select julio from flujo_de_efectivo where nivel = 19) + (select sum(julio) from flujo_de_efectivo where nivel >=20 and nivel <=32) where nivel = 225;";
                    $stmtTotMarCoVa = $dbconec->prepare($queryTotalMarCoVa);
                    $stmtTotMarCoVa->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    
                
                    
                     
                $dbconec = null;

            } // JCV DEL IF



                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
        
        
        
        
        


        public function Listar_Flujo_de_efectivo()
        {
                $dbconec = Conexion::Conectar();

                try 
                {
                        $query = "SELECT * FROM flujo_de_efectivo where nivel <999 order by id_flujo_de_efectivo ;";
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
        
          
        public function Listar_Flujo_de_efectivo_A()
        {
                $dbconec = Conexion::Conectar();

                try 
                {
                        $query = "SELECT * FROM flujo_de_efectivo where nivel <999 and nivel>=200  order by id_flujo_de_efectivo ;";
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



        public function Listar_Cuentasdebancos()
        {
                $dbconec = Conexion::Conectar();

                try
                {
                        /*JCV ORIG $query = "CALL sp_view_Cliente();";  */
                        /*$query = "SELECT * FROM cuentasbancos;";*/
                        /*$query = "SELECT * FROM cuentasprueba;";*/
                        $query = "SELECT * FROM cuentas_debancos;";
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


        /*JCV DE PRUEBA PARA DASHBARD APLICAD A FORMULAS DE FLUJO DE EFECTIVO*/
        public function Datos_Paneles()
        {
                $dbconec = Conexion::Conectar();

                try
                {
                        //$query = "SELECT * FROM cuentas_debancos;";


                        //$query = "CALL sp_panel_dashboard();";

                   $query = "CALL sp_panel_jcv();";




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



        public function Listar_Cuentasacumulativa()
        {
                $dbconec = Conexion::Conectar();

                try
                { 
                        /*JCV ORIG $query = "CALL sp_view_Cliente();";  */
                        /*$query = "SELECT * FROM cuentasbancos;";*/
                        /*$query = "SELECT * FROM cuentasprueba;";*/
                        $query = "SELECT * FROM cuentas_acumulativa where nivel<101 and estado=1 order by nivel ;";
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
        
        
         
        public function Listar_Cuentasacumulativa_A()
        {
                $dbconec = Conexion::Conectar();

                try 
                { 
                        /*JCV ORIG $query = "CALL sp_view_Cliente();";  */
                        /*$query = "SELECT * FROM cuentasbancos;";*/
                        /*$query = "SELECT * FROM cuentasprueba;";*/
                        $query = "SELECT * FROM cuentas_acumulativa where nivel<999 and nivel >=200 and estado=1 order by nivel ;";
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
        
        
        


        public function Compras_Anuales()
        {
                $dbconec = Conexion::Conectar();

                try
                {
                        $query = "CALL sp_compras_anual();";
                        $stmt = $dbconec->prepare($query);
                        $stmt->execute();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                                return $stmt->fetchAll();
                        }

                        $dbconec = null;
                } catch (Exception $e) {
                        //echo $e;
                        echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
                }
        }



        public function Listar_Cuentasdebancos_Activos()
        {
                $dbconec = Conexion::Conectar();

                try
                {
                        /*JCV ORIGIN OK $query = "CALL sp_view_cliente_activo();";*/
                        $query = "SELECT * FROM cuentas_debancos WHERE estado =1;";

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

        public function Listar_Cuentasdebancos_Inactivos()
        {
                $dbconec = Conexion::Conectar();

                try
                {
                        /* JCV ORIGINAL $query = "CALL sp_view_cliente_inactivo();";*/
                        $query = "SELECT * FROM cuentas_debancos WHERE estado =0;";
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

        public function Ver_Limite_Credito($id_debancos){

                $dbconec = Conexion::Conectar();
                try {

                        $query = "CALL sp_view_limite_credito(:id_debancos)";
                        $stmt = $dbconec->prepare($query);
                        $stmt->bindParam(":id_debancos",$id_debancos);
                        $stmt->execute();
                        $Data = array();

                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        $Data[] = $row;
                        }

                        // header('Content-type: application/json');
                         echo json_encode($Data);

                } catch (Exception $e) {

                        echo "Error al cargar el listado";
                }

        }


        public function Insertar_Cuentasdebancos($nombre,$saldo)
        {
                $dbconec = Conexion::Conectar();
                try
                {
                        /*$query = "CALL sp_insert_cliente(:nombre_cliente, :numero_nit, :numero_nrc,
                        :direccion, :numero_telefono, :email, :giro, :limite_credito)";*/

                        /*$query = "INSERT INTO cuentasbancos(nombre_cliente, numero_nit, numero_nrc,
                        direccion_cliente, numero_telefono, email, giro, limite_credito) values(:nombre_cliente, :numero_nit, :numero_nrc,
                        :direccion_cliente, :numero_telefono, :email, :giro, :limite_credito)";*/


                        /*$query = "INSERT INTO cuentasprueba(fecha, concepto, ingreso,
                        direccion, egreso, saldo, observaciones, cuenta) values(:fecha, :concepto, :ingreso,
                        :direccion_cliente, :egreso, :saldo, :observaciones, :cuenta)";*/

                        $query = "INSERT INTO cuentas_debancos(nombre, saldo) values(:nombre, :saldo)";

                        /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                        $stmt = $dbconec->prepare($query);
                        $stmt->bindParam(":nombre",$nombre);
                        $stmt->bindParam(":saldo",$saldo);


                        if($stmt->execute())
                        {
                                $count = $stmt->rowCount();
                                if($count == 0){
                                        $data = "Duplicado";
                                        echo json_encode($data);
                                } else {
                                        $data = "Validado";
                                        echo json_encode($data);
                                }
                        } else {

                                $data = "Error";
                                echo json_encode($data);
                        }
                        $dbconec = null;
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }



        /*JCV PARA BORRAR*/

        public function Borrar_Cuentasdebancos($id_debancos)
        {
                $dbconec = Conexion::Conectar();
                $response = array();
                try
                {
                        /* $query = "CALL sp_delete_cotizacion(:idcliente)";*/

                        /*$query = "DELETE from cuentasbancos where idcliente = '$idcliente';";*/

                        /*$query = "DELETE from cuentasprueba where idcliente = '$idcliente';";*/
                        $query = "DELETE from cuentas_debancos where id_debancos = '$id_debancos';";
                        $stmt = $dbconec->prepare($query);
                        $stmt->bindParam(":id_debancos",$id_debancos);

                        if($stmt->execute())
                        {
                                $response['status']  = 'success';
                                $response['message'] = 'Atributo Eliminado Correctamente!';
                        } else {

                                $response['status']  = 'error';
                                $response['message'] = 'No pudimos eliminar el Atributo!';
                        }
                        echo json_encode($response);
                        $dbconec = null;
                } catch (Exception $e) {
                        $response['status']  = 'error';
                        $response['message'] = 'Error de Ejecucion';
                        echo json_encode($response);

                }

        }



        public function Editar_Cuentasdebancos($id_debancos, $nombre, $saldo, $estado)
        {
            /*$dbconec->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );*/
                $dbconec = Conexion::Conectar();
                try
                {
                        /*$query = "CALL sp_update_cliente(:idcliente, :nombre_cliente, :numero_nit, :numero_nrc,
                        :direccion, :numero_telefono, :email, :giro, :limite_credito, :estado);";*/

                    /*$query="UPDATE cuentasbancos SET  nombre_cliente = '$nombre_cliente', numero_nit = '$numero_nit', numero_nrc = '$numero_nrc',
direccion_cliente = '$direccion', numero_telefono = '$numero_telefono', email = '$email', giro = '$giro', limite_credito = '$limite_credito',
estado = '$estado' where idcliente='$idcliente';";  */

                   /* $query="UPDATE cuentasprueba SET  fecha = '$fecha', concepto = '$concepto', ingreso = '$ingreso',
direccion = '$direccion', egreso = '$egreso', saldo = '$saldo', observaciones = '$observaciones', cuenta = '$cuenta',
estado = '$estado' where idcliente='$idcliente';";  */


                     $query="UPDATE cuentas_debancos SET  nombre = '$nombre', saldo = '$saldo', estado = '$estado' where id_debancos='$id_debancos';";  


                       /* $query = "update cuentasbancos (set :idcliente=$idcliente, :nombre_cliente=$nombre_cliente, :numero_nit=$numero_nit, :numero_nrc=$numero_nrc,
                        :direccion_cliente=$direccion, :numero_telefono=$numero_telefono, :email=$email, :giro=$giro, :limite_credito=$limite_credito, :estado=$estado);";
                         */                                                             
                        $stmt = $dbconec->prepare($query);
                        $stmt->bindParam(":id_debancos",$id_debancos);
                        $stmt->bindParam(":nombre",$nombre);
                        $stmt->bindParam(":saldo",$saldo);
                        $stmt->bindParam(":estado",$estado);


                        if($stmt->execute())
                        {

                          $data = "Validado";
                          echo json_encode($data);

                        } else {

                                $data = "Error";
                                echo json_encode($data);
                        }
                        $dbconec = null;
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }

}


 ?>
