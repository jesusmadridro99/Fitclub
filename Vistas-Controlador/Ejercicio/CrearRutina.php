<?php

session_start();

include("../../Repositorio/EjercicioRepository.php");

$imcN = $_POST["peso"]/($_POST["altura"]*$_POST["altura"]);

if ($imcN<25) {
    $imc = "b";
}
else {
    $imc = "o";
}

updateImc($imc, $_SESSION['correo']);

if (isset($_POST['edad'])) {
    updateRutina("pro",$_SESSION["correo"]);
    updateEdad($_POST['edad'], $_SESSION["correo"]);
    header("Location: ../Mensaje/CrearMensaje.php?rutina=1");
}

else{
    updateRutina("basic",$_SESSION["correo"]);
    header("Location: ListarEjercicio.php");
}

?>


