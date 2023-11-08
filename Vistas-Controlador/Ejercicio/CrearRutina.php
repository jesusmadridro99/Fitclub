<?php

include("../../Repositorio/EjercicioRepository.php");


$imcN = $_POST["peso"]/($_POST["altura"]*$_POST["altura"]);

if ($imcN<25) {
    $imc = "b";
}
else {
    $imc = "o";
}

updateImc($imc,$_SESSION["correo"]);


header("ListarEjercicio.php");



?>