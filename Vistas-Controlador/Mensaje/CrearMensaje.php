<?php

include("../../Repositorio/MensajeRepository.php");
include("../../Utiles/Includes/Header.php");


$asunto = $_POST["asunto"];
$cuerpo = $_POST["cuerpo"];
$remitente = $_SESSION["correo"];
$fecha = date("Y-m-d");

if(isset($_POST["destinatario"])){
    $destinatario = $_POST["destinatario"];
}
else{
    $destinatario = "admin@admin.com";
}

crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);

header("Location: ../Micuenta.php");








?>


