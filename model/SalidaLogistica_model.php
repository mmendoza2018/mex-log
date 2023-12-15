<?php

require_once('Conexion.php');

class SalidaLogisticaModel extends Conexion
{

  public static function ListarSalidasLogistica($idEntrada = false)
  {
    $dbconec = Conexion::Conectar();

    try {

      $query = "SELECT *, c2.nombre_cliente  as clienteOC, c1.nombre_cliente as clienteEL, c2.id_cliente  as idClienteOC, c1.id_cliente as idClienteEL  FROM entradas_logistica el ";
      $query .= "LEFT JOIN clientes c1 ON el.id_cliente = c1.id_cliente ";
      $query .= "LEFT JOIN facturas_compras fc ON el.id_factura = fc.id_factura ";
      $query .= "LEFT JOIN clientes c2 ON fc.id_cliente = c2.id_cliente ";

      if ($idEntrada) {
        $query .= "WHERE id_entrada = $idEntrada";
      }
      $stmt = $dbconec->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();

      if ($count > 0) {
        return $stmt->fetchAll();
      }

      $dbconec = null;
    } catch (Exception $e) {
      return false;
    }
  }

  public static function ListarSalidasLogisticaPorVenta($idVenta = false)
  {
    $dbconec = Conexion::Conectar();

    try {

      $query = "SELECT * FROM salida_logistica sl ";
      $query .= "LEFT JOIN clientes c ON sl.id_cliente = c.id_cliente ";
      $query .= "LEFT JOIN users u ON sl.id_asesor=u.id_users WHERE sl.id_venta = $idVenta";
      $stmt = $dbconec->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();

    } catch (Exception $e) {
      return false;
    }
  }

  public static function ListarDetalleProductos($idEntrada)
  {
    $dbconec = Conexion::Conectar();

    try {

      $query = "SELECT *  FROM entradas_logistica el ";
      $query .= "INNER JOIN det_entradas_logistica dl ON el.id_entrada = dl.id_entrada";
      $query .= " INNER JOIN productos prod ON dl.id_producto = prod.id_producto";
      $query .= " INNER JOIN proveedores prov ON prod.id_proveedor = prov.id_proveedor WHERE dl.id_entrada = $idEntrada";
      $stmt = $dbconec->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();

    } catch (Exception $e) {
      return false;
    }
  }

  public static function  InsertarEntradaLogistica($arrayData)
  {
    $dbconec = Conexion::Conectar();
    try {

      $query = "INSERT INTO entradas_logistica (
                                            numero_guia,	
                                            fecha_envio,		
                                            fecha_entrega,	
                                            id_cliente,
                                            id_factura,
                                            tipo_entrada,	
                                            direccion,		
                                            telefono,	
                                            medidas,		
                                            precio,		
                                            seguro
                                            ) 
                                            values
                                            (                                   
                                            :numero_guia,	
                                            :fecha_envio,		
                                            :fecha_entrega,	
                                            :id_cliente,
                                            :id_factura,
                                            :tipo_entrada,	
                                            :direccion,		
                                            :telefono,	
                                            :medidas,		
                                            :precio,		
                                            :seguro
                                          )";

      /*: son los campos $ son los parametros de la funcion que vienen del formulario*/
      // Preparar la consulta
      $stmt = $dbconec->prepare($query);

      // Vincular todos los parámetros sin importar las condiciones
      $stmt->bindParam(":numero_guia", $arrayData["numero_guia"]);
      $stmt->bindParam(":fecha_envio", $arrayData["fecha_envio"]);
      $stmt->bindParam(":fecha_entrega", $arrayData["fecha_entrega"]);
      $stmt->bindParam(":direccion", $arrayData["direccion"]);
      $stmt->bindParam(":telefono", $arrayData["telefono"]);
      $stmt->bindParam(":medidas", $arrayData["medidas"]);
      $stmt->bindParam(":precio", $arrayData["precio"]);
      $stmt->bindParam(":seguro", $arrayData["seguro"]);

      $temporalNull = null;

      if ($arrayData["id_factura"] === "") {
        $stmt->bindValue(":id_factura", $temporalNull, PDO::PARAM_NULL);
        $stmt->bindParam(":id_cliente", $arrayData["id_cliente"]);
        $stmt->bindParam(":tipo_entrada", $arrayData["tipo_entrada"]);
      } else {
        $stmt->bindParam(":id_factura", $arrayData["id_factura"]);
        $stmt->bindParam(":id_cliente", $temporalNull, PDO::PARAM_NULL);
        $stmt->bindParam(":tipo_entrada", $temporalNull, PDO::PARAM_NULL);
      }

      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
          return false;
        } else {
          return true;
        }
      } else {

        return false;
      }
      $dbconec = null;
    } catch (Exception $e) {
      return false;
    }
  }

  public static function obtenerUltimoId()
  {
    $dbconec = Conexion::Conectar();
    $query = "SELECT * FROM entradas_logistica ORDER BY id_entrada DESC LIMIT 1";
    $stmt = $dbconec->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public static function insertarDetalleProductos($arrayProductos)
  {
    try {
      $dbconec = Conexion::Conectar();
      $query = "INSERT INTO det_entradas_logistica (id_entrada, id_producto, estado) VALUES ";

      // Datos de ejemplo (puedes cambiar esto según tu lógica)
      $datos = $arrayProductos;

      // Crear un array para almacenar los marcadores de posición
      $marcadores = array();

      // Bucle para construir la parte VALUES de la consulta
      foreach ($datos as $dato) {
        $marcadores[] = "(?, ?, ?)";
      }

      // Unir los marcadores con comas
      $query .= implode(", ", $marcadores);
      // Preparar la consulta
      $stmt = $dbconec->prepare($query);

      // Bucle para vincular los parámetros
      $i = 1;
      foreach ($datos as $dato) {
        $stmt->bindParam($i++, $dato['id_entrada']);
        $stmt->bindParam($i++, $dato['id_producto']);
        $stmt->bindParam($i++, $dato['estado']);
      }

      // Ejecutar la consulta
      if ($stmt->execute()) {

        $data = "Validado";
        echo json_encode($data);
      } else {

        $data = "Error";
        echo json_encode($data);
      }
      $dbconec = null;
    } catch (Exception $e) {
      echo $e;
      return false;
    }
  }

  public static function EditarEntradaLogistica($arrayData)
  {
    $dbconec = Conexion::Conectar();

    try {
      $query = "UPDATE entradas_logistica SET
                                          numero_guia = :numero_guia,	
                                          fecha_envio = :fecha_envio,		
                                          fecha_entrega = :fecha_entrega,		
                                          id_cliente = :id_cliente,
                                          id_factura = :id_factura,
                                          tipo_entrada = :tipo_entrada,
                                          direccion = :direccion,	
                                          telefono = :telefono,
                                          medidas = :medidas,	
                                          precio = :precio,		
                                          seguro = :seguro,
                                          estado = :estado
                                          WHERE id_entrada = :id_entrada";

      $stmt = $dbconec->prepare($query);
      $stmt->bindParam(":numero_guia", $arrayData["numero_guia"]);
      $stmt->bindParam(":fecha_envio", $arrayData["fecha_envio"]);
      $stmt->bindParam(":fecha_entrega", $arrayData["fecha_entrega"]);
      $stmt->bindParam(":direccion", $arrayData["direccion"]);
      $stmt->bindParam(":telefono", $arrayData["telefono"]);
      $stmt->bindParam(":medidas", $arrayData["medidas"]);
      $stmt->bindParam(":precio", $arrayData["precio"]);
      $stmt->bindParam(":seguro", $arrayData["seguro"]);
      $stmt->bindParam(":estado", $arrayData["estado"]);
      $stmt->bindParam(":id_entrada", $arrayData["id_entrada"]);

      $temporalNull = null;

      if ($arrayData["id_factura"] === "") {
        $stmt->bindValue(":id_factura", $temporalNull, PDO::PARAM_NULL);
        $stmt->bindParam(":id_cliente", $arrayData["id_cliente"]);
        $stmt->bindParam(":tipo_entrada", $arrayData["tipo_entrada"]);
      } else {
        $stmt->bindParam(":id_factura", $arrayData["id_factura"]);
        $stmt->bindParam(":id_cliente", $temporalNull, PDO::PARAM_NULL);
        $stmt->bindParam(":tipo_entrada", $temporalNull, PDO::PARAM_NULL);
      }

      if ($stmt->execute()) {

        $data = "Validado";
        echo json_encode($data);
      } else {

        $data = "Error";
        echo json_encode($data);
      }
      $dbconec = null;
    } catch (Exception $e) {
      echo $e;
      return false;
    }
  }
}
