<?php
    include("../../Repositorio/PlatoRepository.php");
    
    session_start();

    if(isset($_GET["id"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
        $idPlato = $_GET["id"];
        deletePlato($idPlato);
        header("Location: ListarPlato.php");
    } else {
        header("Location: ../Fitclub.php");
    }
?>