<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #F5F5F5;
      color: #1A120B;
    }

    .container {
      background-color: #F2EAD3;
      border: 1px solid #DFD7BF;
      padding: 20px;
    }

    h1 {
      color: #3F2305;
    }

    ul li a {
      color: #141E27;
    }

    ul li a:hover {
      color: #203239;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Bienvenido al Banco DDJ</h1>
    <p>Selecciona una opción:</p>
    <ul>
      <li><a href="transacciones.php">Realizar transacciones</a></li>
      <li><a href="clientes.php">Gestionar clientes</a></li>
      <li><a href="cuentas.php">Gestionar cuentas</a></li>
      <li><a href="historial.php">Ver historial</a></li>
    </ul>
  </div>

  <?php include("../templates/pie.php"); ?>
</body>

</html>
