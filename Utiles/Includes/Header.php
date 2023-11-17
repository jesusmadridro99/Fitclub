<?php

session_start();

include __DIR__ . '\..\..\Repositorio\UsuarioRepository.php';
include __DIR__ . '\..\..\Repositorio\EjercicioRepository.php';
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
  <link rel="stylesheet" href="/Fitclub/Utiles/css/bootstrap.min.css">
  </link>
  <link rel="stylesheet" href="/Fitclub/Utiles/css/Fitclub.css">
  </link>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap"
    rel="stylesheet">
</head>

<body>
  <header style="z-index:9;width:100%;left:0;top:0;position:sticky">
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/Fitclub/Vistas-Controlador/Fitclub.php">Fit Club</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">

            <a style="margin-left:50%;border-left:solid rgb(190,190,190) 1px;" class="nav-link active"
              href="/Fitclub/Vistas-Controlador/Producto/ListarProducto.php">Productos
            </a>

          </ul>
          <form class="d-flex">
            <input class="form-control me-sm-2" type="search" placeholder="Buscar productos ...">
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
            <a href="/Fitclub/Vistas-Controlador/Micuenta.php?caja=recibidos">Mi cuenta</a>
            <?php if ($_SESSION["rol"] == "admin") { ?>
              <a href="/Fitclub/Vistas-Controlador/Ejercicio/ListarEjercicio.php">Ejercicios</a>
              <a href="/Fitclub/Vistas-Controlador/Dieta/ListarPlato.php">Platos</a>
            <?php } else { ?>
              <a href="/Fitclub/Vistas-Controlador/Ejercicio/ListarEjercicio.php">Mis ejercicios</a>
              <a href="/Fitclub/Vistas-Controlador/Dieta/ListarPlato.php">Mis platos</a>
              <a href="/Fitclub/Vistas-Controlador/Pedido/ListarPedido.php">Pedidos</a>
              <a href="/Fitclub/Vistas-Controlador/Deseo/Listardeseo.php">Lista de deseos</a>
              <hr style="color:grey">
            <?php } ?>
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

  <script src="../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>