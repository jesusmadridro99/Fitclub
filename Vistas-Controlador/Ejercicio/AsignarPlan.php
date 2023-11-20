<?php

session_start();

include("../../Repositorio/UsuarioRepository.php");

//Calculamos el imc y lo guardamos
$imcN = $_POST["peso"]/($_POST["altura"]*$_POST["altura"]);

if ($imcN<25) {
    $imc = "b";
}
else {
    $imc = "o";
}

updateImc($imc, $_SESSION['correo']);




//Si nos mandan la edad quiere decir que han elegido el plan pro,
//guardamos la edad y el tipo de plan
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


