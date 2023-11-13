<?php

include("../../Repositorio/MensajeRepository.php");
include("../../Utiles/Includes/Header.php");

if(isset($_POST["destinatario"])){
    $destinatario = $_POST["destinatario"];
}
else{
    $destinatario = "admin@admin.com";
}


$remitente = $_SESSION["correo"];
$fecha = date("Y-m-d");




//Mandar mensaje al administrador para crear rutina

if(isset($_POST["altura"])){
    $asunto = "Crear plan";
    $cuerpo= "El usuario con correo ".$remitente." se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href='Ejercicio/AsignarRutina.php?correo=".$correo."'>Crear</a>";
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location:../Micuenta.php");
}


//Crear mensaje normal
else{
    $asunto = $_POST["asunto"];
    $cuerpo = $_POST["cuerpo"];
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location: ../Micuenta.php");
}














?>


