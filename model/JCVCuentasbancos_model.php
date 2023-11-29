<?php

	require_once('Conexion.php');

	class CuentaBancosModel extends Conexion
	{
		public function Listar_Cuentas_Bancos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/* JCV ORIGINAL $query = "CALL sp_view_Cliente();"; */
                               /* $query = "CALL sp_view_Cuentasprueba();";*/
                                $query = "SELECT * FROM cuentasprueba";
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

		public function Listar_Clientes_Activos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "CALL sp_view_cliente_activo();";
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

		public function Listar_Clientes_Inactivos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "CALL sp_view_cliente_inactivo();";
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

		public function Ver_Limite_Credito($idcliente){

			$dbconec = Conexion::Conectar();
			try {

				$query = "CALL sp_view_limite_credito(:idcliente)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idcliente",$idcliente);
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


		public function Insertar_Cuenta_Bancos($idcuenta, $fecha, $concepto, $ingreso, $egreso,
		$saldo, $observaciones, $tipocuenta)
		{
			$dbconec = Conexion::Conectar();
			try
			{
				/*JCV ORIGINAL $query = "CALL sp_insert_cuentasprueba(:fecha, :concepto, :ingreso,
				:egreso, :saldo, :observaciones, :tipocuenta)";*/
                            $query = " insert into cuentasprueba (idcuenta,fecha,concepto,ingreso,egreso,saldo,observaciones,tipocuenta) values(:idcuenta,:fecha, :concepto, :ingreso,
				:egreso, :saldo, :observaciones, :tipocuenta)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idcuenta",$id);
                                $stmt->bindParam(":fecha",$fecha);
				$stmt->bindParam(":concepto",$concepto);
				$stmt->bindParam(":ingreso",$ingreso);
				$stmt->bindParam(":egreso",$egreso);
				$stmt->bindParam(":saldo",$saldo);
				$stmt->bindParam(":observaciones",$observaciones);
				
				$stmt->bindParam(":tipocuenta",$tipocuenta);

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

		public function Editar_Cuenta_Bancos($idcuenta, $fecha, $concepto, $ingreso, $egreso,
		$saldo, $observaciones, $tipocuenta)
		{
			$dbconec = Conexion::Conectar();
			try
			{
				$query = "CALL sp_update_cliente(:idcliente, :nombre_cliente, :numero_nit, :numero_nrc,
				:direccion, :numero_telefono, :email, :giro, :limite_credito, :estado);";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id",$id);
				$stmt->bindParam(":fecha",$fecha);
				$stmt->bindParam(":concepto",$concepto);
				$stmt->bindParam(":ingreso",$ingreso);
				$stmt->bindParam(":egreso",$egreso);
				$stmt->bindParam(":saldo",$saldo);
				$stmt->bindParam(":observaciones",$observaciones);
				
				$stmt->bindParam(":tipocuenta",$tipocuenta);


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
