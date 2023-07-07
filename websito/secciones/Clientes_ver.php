<?php
include_once "../configuraciones/bd.php";
$conexionBD=BD::crearInstancia();

$rut_cliente=isset($_POST["rut_cliente"])?$_POST["rut_cliente"]:"";
$nombre_cliente=isset($_POST["nombre_cliente"])?$_POST["nombre_cliente"]:"";
$accion=isset($_POST["accion"])?$_POST["accion"]:"";


if($accion){
  switch($accion){
    case "agregar":
      $sql= "INSERT INTO cliente(rut_cliente,nombre_cliente) VALUES(:rut_cliente,:nombre_cliente)"; 
      $consulta=$conexionBD->prepare($sql);
      $consulta->bindParam(':rut_cliente',$rut_cliente);
      $consulta->bindParam(':nombre_cliente',$nombre_cliente);
      $consulta->execute();
    
      // cliente recién insertado
      $idCliente = $conexionBD->lastInsertId();
        
      // Insertar cuenta asociada al cliente en la tabla "cuenta" con monto inicial 0
      $sqlCuenta = "INSERT INTO cuenta (rut_cuenta, monto_cuenta) VALUES (:rut_cliente, 0)";
      $consultaCuenta = $conexionBD->prepare($sqlCuenta);
      $consultaCuenta->bindParam(':rut_cliente', $rut_cliente);
      $consultaCuenta->execute();
      break; 
      
      case "editar":
        $sql= "UPDATE cliente SET nombre_cliente=:nombre_cliente WHERE rut_cliente=:rut_cliente";
        $consulta=$conexionBD->prepare($sql);
        $consulta->bindParam(':rut_cliente',$rut_cliente);
        $consulta->bindParam(':nombre_cliente',$nombre_cliente);
        $consulta->execute();
      break;

    case "borrar":
      $sql= "DELETE FROM cliente WHERE rut_cliente=:rut_cliente";
      $consulta=$conexionBD->prepare($sql);
      $consulta->bindParam(':rut_cliente',$rut_cliente);
      $consulta->execute();
    break;
    case "Seleccionar":
      $sql= "SELECT * FROM cliente WHERE rut_cliente=:rut_cliente";
      $consulta=$conexionBD->prepare($sql);
      $consulta->bindParam(':rut_cliente',$rut_cliente);
      $consulta->execute();
      $cliente=$consulta->fetch(PDO::FETCH_ASSOC);
      print_r($cliente);
      $nombre_cliente=$cliente["nombre_cliente"];

    break;
  }
}



$consulta=$conexionBD->prepare("SELECT * FROM cliente");
$consulta->execute();
$listaCliente=$consulta->fetchAll();
?>
