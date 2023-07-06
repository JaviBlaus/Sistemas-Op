<!doctype html>
<html lang="en">

<head>
  <title>DDJ Banco</title>
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

    .nav-link.active,
    .nav-link:hover {
      background-color: #DFD7BF;
      color: #141E27;
    }

    .nav-link {
      background-color: #F2EAD3;
      color: #141E27;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      background-color: #3F2305;
      color: #F5F5F5;      
    }
    
    .container {
      background-color: #EEEDDE;
      color: #141E27;
      padding: 20px;
      border: 1px solid #203239;
    }

    .table {
      background-color: #E0DDAA;
      border: 1px solid #203239;
    }
  </style>
</head>

<body>

  <div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'transacciones.php') ? 'active' : ''; ?>" href="transacciones.php">Transacciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'Clientes.php') ? 'active' : ''; ?>" href="Clientes.php">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'Cuentas.php') ? 'active' : ''; ?>" href="Cuentas.php">Cuentas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'Historial.php') ? 'active' : ''; ?>" href="Historial.php">Historial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'abyret.php') ? 'active' : ''; ?>" href="abyret.php">Abonos y Retiros</a>
      </li>
    </ul>
  </div>

</body>

</html>
        
      
