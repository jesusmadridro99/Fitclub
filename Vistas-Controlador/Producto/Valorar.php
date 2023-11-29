<?php 

include("../../Repositorio/ProductoRepository.php");

$valoracion = $_GET["val"];
$producto =  $_GET["idProducto"];

$val_total = findIdProducto2($producto)["valoraciones_totales"] + 1;
$num_val = findIdProducto2($producto)["val_num"] + $valoracion;

updateValProducto($val_total,$num_val,$producto);

header("Location:ListarProducto.php");

?>