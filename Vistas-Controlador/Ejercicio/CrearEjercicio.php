<?php
ob_start();

// Cargamos consultas del repositorio
include("../../Repositorio/EjercicioRepository.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imc = $_POST["imc"];




    // Comprobamos si se pasa un id mediante URL para crear o actualizar el producto.
    if (!isset($_POST["cod_ejercicio"])) {

        crearEjercicio($nombre, $descripcion, $imc);
        header("Location: ListarEjercicio.php");


    }
} else {


    /*$result = findNombreIDProducto($nombre, $cod_producto);*/
    /*if ($result->rowCount() == 0) {*/

    updateProducto($cod_producto, $descripcion, $precio, $nombre, $imagen, $cod_cat);
    /*} else {
        $errorNombreExistente = true;
    }    */
}



// Se comprueba si existe id en la url + si se ha pulsado el boton de submit 
// (Para recargar los datos o no en caso de fallo)
if (isset($_GET["id"]) && !isset($_REQUEST["submit"])) {
    $idProducto = $_GET["id"];

    $res = findIdProducto($idProducto);

    if ($res->rowCount() == 0) {
        header("Location:../Fitclub.php");
    } else {
        $producto = $res->fetch(PDO::FETCH_ASSOC);

        $nombre = $producto["nombre"];
        $descripcion = $producto["descripcion"];
        $precio = $producto["precio"];
        $imagen = $producto["imagen"];
        $cod_at = $producto["codCat"];
    }

}

//header("Location:ListarProducto.php");

ob_end_flush();
?>