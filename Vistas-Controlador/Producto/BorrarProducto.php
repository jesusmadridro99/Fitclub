<?php
    // Cargamos consultas del repositorio
    include("../../Repositorio/ProductoRepository.php");
    
    session_start();

    if(isset($_GET["id"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
        $idProducto = $_GET["id"];
        deleteProducto($idProducto);
        header("Location: ListarProductos.php");
    } else {
        header("Location: ../Fitclub.php");
    }
?>