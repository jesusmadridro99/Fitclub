<?php
ob_start();

// Cargamos consultas del repositorio
include("../../Repositorio/PlatoRepository.php");


$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$imc = $_POST["imc"];
$imagen = $_POST["imagen"];

crearPlato($nombre, $descripcion, $imc, $imagen); 
header("Location:ListarPlato.php");


ob_end_flush();
?>