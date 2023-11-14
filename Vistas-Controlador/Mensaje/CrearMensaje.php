<?php

include("../../Repositorio/MensajeRepository.php");
include("../../Utiles/Includes/Header.php");

$fecha = date("Y-m-d");

if(isset($_POST["destinatario"])){

    $destinatario = findOneByCorreoUser($_POST["destinatario"])["cod_usu"];
}
else{
    $destinatario = findOneByCorreoUser("admin@admin.com")["cod_usu"];
}

//Crear mensaje de usuario sin registro
if (isset($_POST["correo"])){
    $remitente = $_POST["correo"];
    $asunto = "Contacto de usuario no registrado";
    $cuerpo = $_POST["cuerpo"];
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location:../LoginUsuario.php");

}

else{
    $remitente = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
}



//Mandar mensaje al administrador para crear rutina
if(isset($_POST["altura"])){
    $asunto = "Crear plan";
    $cuerpo= "El usuario con correo ".$remitente." se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href='Ejercicio/AsignarRutina.php?correo=".$correo."'>Crear</a>";
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location:../Micuenta.php");
}


//Crear mensaje normal
if(isset($_POST["asunto"])){
    $asunto = $_POST["asunto"];
    $cuerpo = $_POST["cuerpo"];
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location: ../Micuenta.php");
}














?>


