<?php

session_start();

include("../../Repositorio/UsuarioRepository.php");

$imcN = $_POST["peso"]/($_POST["altura"]*$_POST["altura"]);

if ($imcN<25) {
    $imc = "b";
}
else {
    $imc = "o";
}

updateImc($imc, $_SESSION['correo']);

if (isset($_POST['edad'])) {
    updatePlan("pro",$_SESSION["correo"]);
    updateEdad($_POST['edad'], $_SESSION["correo"]);
    header("Location: ../Mensaje/CrearMensaje.php?plan=1");
}

else{
    updatePlan("basic",$_SESSION["correo"]);
    header("Location: ListarEjercicio.php");
}

?>


