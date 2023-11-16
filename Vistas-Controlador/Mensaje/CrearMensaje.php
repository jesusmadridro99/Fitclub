<?php

include("../../Repositorio/MensajeRepository.php");
include("../../Utiles/Includes/Header.php");



$fecha = date("Y-m-d");


//Si se envia el destinatario quiere decir que el usuario que ha mandado el
// email es el admin ya que solo el puede elegir el destinatario, si no
//los mensajes se envian al admin.
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
    header("Location:../Fitclub.php");

}

else{
    $remitente = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
}




//Mandar mensaje al administrador para crear rutina
if(isset($_GET["rutina"])){
    $asunto = "Crear plan";
    $cuerpo= "El usuario con correo ".$_SESSION["correo"]." se ha suscrito al plan pro. Creale una rutina de entrenamiento y asignale platos para la dieta. || <a href='Ejercicio/AsignarRutina.php?correo=".$correo."'>Crear</a>";
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location:../Micuenta.php?caja=recibidos");
}



//Crear mensaje normal
if(isset($_POST["asunto"])){
    $asunto = $_POST["asunto"];
    $cuerpo = $_POST["cuerpo"];
    crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha);
    header("Location: ../Micuenta.php");
}













?>


