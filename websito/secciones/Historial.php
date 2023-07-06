<?php
include("../templates/cabecera.php");
include("../configuraciones/bd.php");

$conexionBD = BD::crearInstancia();
$cuenta = isset($_GET['cuenta']) ? $_GET['cuenta'] : '';

if (!empty($cuenta)) {
  $sql = "SELECT * FROM transacciones WHERE cta_paga_transa = :cuenta OR cta_cobra_transa = :cuenta";
  $consulta = $conexionBD->prepare($sql);
  $consulta->bindValue(':cuenta', $cuenta);
} else {
  $sql = "SELECT * FROM transacciones";
  $consulta = $conexionBD->prepare($sql);
}

$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
  <h1>Buscar transacciones por cuenta</h1>

  <form action="Historial.php" method="GET" class="mb-3">
    <div class="input-group">
      <input type="text" class="form-control" style="background-color: #f5f5f5; border: 1px solid #ccc" name="cuenta" placeholder="Número de cuenta">
      <button class="btn btn-primary" type="submit">Buscar</button>
    </div>
  </form>
</div>

<div class="container">
  <h1>Historial de transacciones</h1>

  <table class="table" style="background-color: #f5f5f5; border: 1px solid #ccc;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cuenta a pagar</th>
        <th>Cuenta a cobrar</th>
        <th>Monto</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($resultado as $row) : ?>
        <tr>
          <td><?php echo $row['id_transa']; ?></td>
          <td><?php echo $row['cta_paga_transa']; ?></td>
          <td><?php echo $row['cta_cobra_transa']; ?></td>
          <td><?php echo $row['monto_transa']; ?></td>
          <td><?php echo $row['fecha_transa']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
include("../templates/pie.php");
?>
