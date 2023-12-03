<?php
ob_start();

include("../../Repositorio/CategoriaRepository.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];


    crearCategoria($nombre, $descripcion);
    header("Location: ListarProducto.php");

}

ob_end_flush();
?>