<?php
include("../templates/cabecera.php");
include("../configuraciones/bd.php");
$conexionBD = BD::crearInstancia();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $cta_paga = $_POST['cta_paga'];
  $cta_cobra = $_POST['cta_cobra'];
  $monto = $_POST['monto'];

  // Validar los datos
  if (!empty($cta_paga) && !empty($cta_cobra) && !empty($monto)) {
    // Verificar si existen en la tabla "cuenta"
    $sql_verificar_cuentas = "SELECT COUNT(*) FROM cuenta WHERE cuenta IN (:cta_paga, :cta_cobra)";
    $consulta_verificar_cuentas = $conexionBD->prepare($sql_verificar_cuentas);
    $consulta_verificar_cuentas->bindParam(':cta_paga', $cta_paga);
    $consulta_verificar_cuentas->bindParam(':cta_cobra', $cta_cobra);
    $consulta_verificar_cuentas->execute();
    $cuentas_existen = $consulta_verificar_cuentas->fetchColumn();

    if ($cuentas_existen == 2) {
      // 1. Obtener el saldo de la cuenta a pagar
      $sql_saldo_paga = "SELECT monto_cuenta FROM cuenta WHERE cuenta = :cta_paga";
      $consulta_saldo_paga = $conexionBD->prepare($sql_saldo_paga);
      $consulta_saldo_paga->bindParam(':cta_paga', $cta_paga);
      $consulta_saldo_paga->execute();
      $saldo_paga = $consulta_saldo_paga->fetchColumn();

      if ($saldo_paga >= $monto) {
        // 2. Actualizar el saldo de la cuenta a pagar
        $nuevo_saldo_paga = $saldo_paga - $monto;
        $sql_actualizar_saldo_paga = "UPDATE cuenta SET monto_cuenta = :nuevo_saldo_paga WHERE cuenta = :cta_paga";
        $consulta_actualizar_saldo_paga = $conexionBD->prepare($sql_actualizar_saldo_paga);
        $consulta_actualizar_saldo_paga->bindParam(':nuevo_saldo_paga', $nuevo_saldo_paga);
        $consulta_actualizar_saldo_paga->bindParam(':cta_paga', $cta_paga);
        $consulta_actualizar_saldo_paga->execute();
        // 3. Obtener el saldo de la cuenta a cobrar
        $sql_saldo_cobra = "SELECT monto_cuenta FROM cuenta WHERE cuenta = :cta_cobra";
        $consulta_saldo_cobra = $conexionBD->prepare($sql_saldo_cobra);
        $consulta_saldo_cobra->bindParam(':cta_cobra', $cta_cobra);
        $consulta_saldo_cobra->execute();
        $saldo_cobra = $consulta_saldo_cobra->fetchColumn();

        // 4. Actualizar el saldo de la cuenta a cobrar
        $nuevo_saldo_cobra = $saldo_cobra + $monto;
        $sql_actualizar_saldo_cobra = "UPDATE cuenta SET monto_cuenta = :nuevo_saldo_cobra WHERE cuenta = :cta_cobra";
        $consulta_actualizar_saldo_cobra = $conexionBD->prepare($sql_actualizar_saldo_cobra);
        $consulta_actualizar_saldo_cobra->bindParam(':nuevo_saldo_cobra', $nuevo_saldo_cobra);
        $consulta_actualizar_saldo_cobra->bindParam(':cta_cobra', $cta_cobra);
        $consulta_actualizar_saldo_cobra->execute();

        // 5. Guardar la transacción en la tabla de transacciones
        $sql_guardar_transaccion = "INSERT INTO transacciones (cta_paga_transa, cta_cobra_transa, monto_transa, fecha_transa) VALUES (:cta_paga, :cta_cobra, :monto, NOW())";
        $consulta_guardar_transaccion = $conexionBD->prepare($sql_guardar_transaccion);
        $consulta_guardar_transaccion->bindParam(':cta_paga', $cta_paga);
        $consulta_guardar_transaccion->bindParam(':cta_cobra', $cta_cobra);
        $consulta_guardar_transaccion->bindParam(':monto', $monto);
        $consulta_guardar_transaccion->execute();

        echo "Transacción realizada con éxito";
      } else {
  
        echo "Error: Saldo insuficiente en la cuenta a pagar";
      }
    } else {

      echo "Error: Las cuentas especificadas no existen";
    }
  } else {

    echo "Error: Por favor, complete todos los campos";
  }
}
?>

<div class="container">
  <h1>Realizar transacciones</h1>
  <form action="transacciones.php" method="post">
    <div class="mb-3">
      <label for="cta_paga">Cuenta a pagar</label>
      <input type="text" class="form-control" name="cta_paga" id="cta_paga" placeholder="Cuenta a pagar">
    </div>
    <div class="mb-3">
      <label for="cta_cobra">Cuenta a cobrar</label>
      <input type="text" class="form-control" name="cta_cobra" id="cta_cobra" placeholder="Cuenta a cobrar">
    </div>
    <div class="mb-3">
      <label for="monto">Monto</label>
      <input type="text" class="form-control" name="monto" id="monto" placeholder="Monto">
</div>
<button type="submit" class="btn btn-primary">Realizar transacción</button>

  </form>
  <?php if (isset($mensaje)) : ?>
    <div class="mt-3">
  <?php echo $mensaje; ?>
</div>
<?php endif; ?>
</div>
<?php include("../templates/pie.php"); ?>
