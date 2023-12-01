<?php
ob_start();


include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/CategoriaRepository.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];
    $cod_cat = $_POST["categoria"];

    
    //Crear Producto
    if (!isset($_POST["cod_producto"])) {
        crearProducto($nombre, $precio, $imagen, $cod_cat);
        header("Location: ListarProducto.php?COD=$cod_cat");

    //Actualizar producto
    } else {
        $cod = $_POST["cod_producto"];
        updateProducto($precio, $nombre, $imagen, $cod_cat, $cod);
        header("Location: ListarProducto.php");

    }
}


ob_end_flush();
?>