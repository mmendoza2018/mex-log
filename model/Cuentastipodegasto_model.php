<?php

	require_once('Conexion.php');

	class CuentastipodegastoModel extends Conexion
	{
		public function Listar_Cuentastipodegasto()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*JCV ORIG $query = "CALL sp_view_Cliente();";  */
				/*$query = "SELECT * FROM cuentasbancos;";*/
                                /*$query = "SELECT * FROM cuentasprueba;";*/
                                $query = "SELECT * FROM cuentas_tipodegasto;";
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

		public function Listar_Cuentastipodegasto_Activos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*JCV ORIGIN OK $query = "CALL sp_view_cliente_activo();";*/
                                $query = "SELECT * FROM cuentas_tipodegasto WHERE estado =1;";
                                
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

		public function Listar_Cuentastipodegasto_Inactivos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/* JCV ORIGINAL $query = "CALL sp_view_cliente_inactivo();";*/
                                $query = "SELECT * FROM cuentas_tipodegasto WHERE estado =0;";
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

		public function Ver_Limite_Credito($id_tipodegasto){

			$dbconec = Conexion::Conectar();
			try {

				$query = "CALL sp_view_limite_credito(:id_tipodegasto)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id_tipodegasto",$id_tipodegasto);
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


		public function Insertar_Cuentastipodegasto($nombre)
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
                                
                                $query = "INSERT INTO cuentas_tipodegasto(nombre) values(:nombre)";
				
                                /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                                $stmt = $dbconec->prepare($query);
				$stmt->bindParam(":nombre",$nombre);
				

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
                
                public function Borrar_Cuentastipodegasto($id_tipodegasto)
		{
			$dbconec = Conexion::Conectar();
			$response = array();
			try
			{
				/* $query = "CALL sp_delete_cotizacion(:idcliente)";*/
                                
                                /*$query = "DELETE from cuentasbancos where idcliente = '$idcliente';";*/
                                
                                /*$query = "DELETE from cuentasprueba where idcliente = '$idcliente';";*/
                                $query = "DELETE from cuentas_tipodegasto where id_tipodegasto = '$id_tipodegasto';";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id_tipodegasto",$id_tipodegasto);

				if($stmt->execute())
				{
					$response['status']  = 'success';
					$response['message'] = 'Tipo d egasto Eliminado Correctamente!';
				} else {

					$response['status']  = 'error';
					$response['message'] = 'No pudimos eliminar el Tipo d egasto!';
				}
				echo json_encode($response);
				$dbconec = null;
			} catch (Exception $e) {
				$response['status']  = 'error';
				$response['message'] = 'Error de Ejecucion';
				echo json_encode($response);

			}

		}
                
                
                
		public function Editar_Cuentastipodegasto($id_tipodegasto, $nombre, $estado)
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
                            
                            
                             $query="UPDATE cuentas_tipodegasto SET  nombre = '$nombre', estado = '$estado' where id_tipodegasto='$id_tipodegasto';";  
                            

                               /* $query = "update cuentasbancos (set :idcliente=$idcliente, :nombre_cliente=$nombre_cliente, :numero_nit=$numero_nit, :numero_nrc=$numero_nrc,
				:direccion_cliente=$direccion, :numero_telefono=$numero_telefono, :email=$email, :giro=$giro, :limite_credito=$limite_credito, :estado=$estado);";
                                 */                                                             
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id_tipodegasto",$tipodegasto);
				$stmt->bindParam(":nombre",$nombre);
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
