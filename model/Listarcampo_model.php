<?php

require_once('Conexion.php');

    class Listar_Campo{
        /*private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php'; //DEL MODELO UBIGEO
            $this->conexion = new conexion();
            $this ->conexion->conectar();
        }*/

        function listar_combo_campo($id_deregistro){
           ///JCV YA ESTÁ CON LA CONEXIÓN CORRECTA Y ESTANDAR QUE USO QUEDÓ MUY BIEN 27JUL2022
            ///JCV LO QUE ESTÁ EN COMENTARIO ES CÓMO ESTABA, SI FUNCIONA PERO ME GUSTA MÁS LA QUE SE QUEDÓ EN CON POO
            $dbconec = Conexion::Conectar();

			try
			{
				$query = "SELECT * FROM cuentas_deregistro where id_deregistro=$id_deregistro;";
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


            //$sql = "call SP_LISTAR_COMBO_PROVINCIA('$iddepartamento')";
            /*
            $sql = "SELECT * FROM cuentas_deregistro where id_deregistro=$id_deregistro;";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
              */          
                        
        }
        
        
        
        
        function listar_combo_cuentadebancos($id_debancos){
           ///JCV YA ESTÁ CON LA CONEXIÓN CORRECTA Y ESTANDAR QUE USO QUEDÓ MUY BIEN 27JUL2022
            ///JCV LO QUE ESTÁ EN COMENTARIO ES CÓMO ESTABA, SI FUNCIONA PERO ME GUSTA MÁS LA QUE SE QUEDÓ EN CON POO
            $dbconec = Conexion::Conectar();

			try
			{
				$query = "SELECT * FROM cuentas_debancos where id_debancos=$id_debancos;";
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