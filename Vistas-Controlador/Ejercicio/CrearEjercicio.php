<?php
ob_start();

include("../../Repositorio/EjercicioRepository.php");


$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$imc = $_POST["imc"];

crearEjercicio($nombre, $descripcion, $imc);
header("Location: ListarEjercicio.php");


ob_end_flush();
?>