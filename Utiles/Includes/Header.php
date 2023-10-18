<?php

session_start();

include __DIR__ . '\..\..\Repositorio\UsuarioRepository.php';
include __DIR__ . '\..\ConectarBD.php';

if (isset($_SESSION['correo'])) {
  $correo = $_SESSION["correo"];
  $usuarioActual = findByCorreoUsuario($correo);
}



?>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Utiles/css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="../Utiles/css/Fitclub.css"></link>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
  
  <style>
      header {
          font-family: 'Roboto Condensed';
      }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/Fitclub/Vistas-Controlador/Fitclub.php">Fit Club</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="/Fitclub/Vistas-Controlador/Producto/ListarProducto.php">Productos
              </a>
            </li>

          </ul>
          <form class="d-flex">
            <input class="form-control me-sm-2" type="search" placeholder="Search">
          </form>
        </div>
      </div>

      <img style="width:50px; height:50px; margin-right:12px; float:right" src="/Fitclub/Img/usuario.png" />

      <?php
      if (isset($_SESSION['rol'])) { ?>


        <div class="dropdown">
          <button class="btn btn-dark" style="margin-right: 100px">
            <?php echo $usuarioActual["username"] ?>
          </button>
          <div class="dropdown-content">
            <a href="/Fitclub/Vistas-Controlador/Micuenta.php">Mi cuenta</a>
            <a href="/Fitclub/Vistas-Controlador/Pedido/ListarPedido.php">Pedidos</a>
            <a href="/Fitclub/Vistas-Controlador/Deseo/Listardeseo.php">Lista de deseos</a>
            <hr style="color:grey">
            <a href="/Fitclub/Vistas-Controlador/LogoutUsuario.php">Cerrar sesion</a>
          </div>
        </div>
        <?php
      } else {
        echo "<a href='/Fitclub/Vistas-Controlador/LoginUsuario.php'><h4 style='color:white; float:right'>Iniciar Sesion<h4></a>";
      }
      ?>
    </nav>
  </header>
</body>

</html>