<?php

if (isset($_GET["idProducto"])) {
    $idProducto = $_GET["idProducto"];
    unset($_SESSION["carrito"][$idProducto]);
    header("Location:../Micuenta.php");
  } 