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

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    body {
      background-color: #F5F5F5;
      color: #141E27;
    }

    .container {
      background-color: #EEEDDE;
      border: 1px solid #203239;
      padding: 20px;
    }

    h1 {
      color: #3F2305;
    }

    input.form-control {
      background-color: #F2EAD3;
      border: 1px solid #141E27;
      color: #141E27;
    }

    button.btn.btn-primary {
      background-color: #3F2305;
      border-color: #3F2305;
    }

    table.table {
      background-color: #E0DDAA;
      border: 1px solid #203239;
    }

    a.nav-link {
      background-color: #F2EAD3;
      color: #141E27;
    }

    a.nav-link:hover,
    a.nav-link.active {
      background-color: #EEEDDE;
      color: #141E27;
    }

    .table th {
      background-color: #DFD7BF;
      color: #141E27;
    }

    .table td {
      background-color: #F2EAD3;
      color: #141E27;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Buscar transacciones por cuenta</h1>

    <form action="Historial.php" method="GET" class="mb-3">
      <div class="input-group">
        <input type="text" class="form-control" name="cuenta" placeholder="Número de cuenta">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </div>
    </form>
  </div>

  <div class="container">
    <h1>Historial de transacciones</h1>

    <table class="table">
      <thead style="background-color: #DFD7BF; color: #141E27;">
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
          <tr style="background-color: #F2EAD3; color: #141E27;">
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

  <?php include("../templates/pie.php"); ?>
</body>

</html>
