<?php
include("../templates/cabecera.php");
include("../configuraciones/bd.php");

$conexionBD = BD::crearInstancia();
$sql = "SELECT * FROM transacciones";
$consulta = $conexionBD->prepare($sql);
if ($consulta->execute()) {
?>

<div class="container">
  <h1>Historial de transacciones</h1>

  <table class="table">
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
      <?php while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
          <td><?php echo $row['id_transa']; ?></td>
          <td><?php echo $row['cta_paga_transa']; ?></td>
          <td><?php echo $row['cta_cobra_transa']; ?></td>
          <td><?php echo $row['monto_transa']; ?></td>
          <td><?php echo $row['fecha_transa']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php
} else {
  echo "Error: " . $consulta->errorInfo()[2];
}

include("../templates/pie.php");
?>
