<?php
include("../../Repositorio/EjercicioRepository.php");

session_start();

if (isset($_GET["id"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
    deleteEjercicio($_GET["id"]);
    header("Location: ListarEjercicio.php");
} else {
    header("Location: ../Fitclub.php");
}

?>