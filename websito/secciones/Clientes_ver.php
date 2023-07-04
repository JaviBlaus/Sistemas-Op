<?php
include_once "../configuraciones/bd.php";
$conexionBD=BD::crearInstancia();

$rut_cliente=isset($_POST["rut_cliente"])?$_POST["rut_cliente"]:"";
$nombre_cliente=isset($_POST["nombre_cliente"])?$_POST["nombre_cliente"]:"";
$accion=isset($_POST["accion"])?$_POST["accion"]:"";

print_r($_POST);

if($accion){
  switch($accion){
    case "agregar":
      $sql= "INSERT INTO cliente(rut_cliente,nombre_cliente) values($rut_cliente,:nombre_cliente)";
      $consulta=$conexionBD->prepare($sql);
      $consulta->bindParam(':nombre_cliente',$nombre_cliente);
      $consulta->execute();
    break; 
    case "editar":
      $sql= "UPDATE cliente SET nombre_cliente='$nombre_cliente' WHERE rut_cliente='$rut_cliente'";
      echo $sql;
    break;
    case "borrar":
      $sql= "DELETE FROM cliente WHERE rut_cliente='$rut_cliente'";
      echo $sql;
    break;
    case "Seleccionar":
      $sql= "SELECT * FROM cliente WHERE rut_cliente=:rut_cliente";
      $consulta=$conexionBD->prepare($sql);
      $consulta->bindParam(':rut_cliente',$rut_cliente);
      $consulta->execute();
      $cliente=$consulta->fetch(PDO::FETCH_ASSOC);
      print_r($cliente);
      $nombre_cliente=$cliente["nombre_cliente"];
      echo $nombre_cliente;

    break;
  }
}



$consulta=$conexionBD->prepare("SELECT * FROM cliente");
$consulta->execute();
$listaCliente=$consulta->fetchAll();
?>