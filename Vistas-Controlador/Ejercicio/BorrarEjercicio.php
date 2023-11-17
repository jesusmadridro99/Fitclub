<?php
    include("../../Repositorio/EjercicioRepository.php");
    
    session_start();

    if(isset($_GET["id"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
        $idEjercicio = $_GET["id"];
        deleteEjercicio($idEjercicio);
        header("Location: ListarEjercicio.php");
    } else {
        header("Location: ../Fitclub.php");
    }
?>