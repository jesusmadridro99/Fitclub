<?php
include("../../Utiles/Includes/Header.php");
include("../modales.php");

$ejerciciosSistemas = findAllEjercicio();

$usuGet = $_GET["correo"];
$usuario = findOneByCorreoUser($usuGet)["cod_usu"];







//Asignar o quitar de la rutina un ejercicio
if (isset($_GET['accion'])) {
    $cod_ej = $_GET["cod_ejercicio"];

    if ($_GET['accion'] == "asignar") {
        asignarEjercicio($usuario, $cod_ej);
    } else {
        quitarEjercicio($usuario, $cod_ej);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <br>

    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <div style="margin-left:15%;">
        - <b>Correo: </b>
        <?php echo $usuGet ?><br>
        - <b>Edad: </b>
        <?php echo findOneByCorreoUser($usuGet)["edad"] ?><br>
        - <b>Imc: </b>
        <?php echo findOneByCorreoUser($usuGet)["imc"] ?>
    </div>
    <hr style="width:95%;">
    <br>

    <form action="AsignarRutina.php?correo=<?php echo $_GET['correo'] ?>" method="POST">
        <div style="margin-left:2%">
            <h3>Imc: Obesidad</h3>
            <hr style="width:30%">
            <?php foreach ($ejerciciosSistemas as $ejercicio) { ?>

                <?php if ($ejercicio["imc"] == "o") { ?>

                    <?php include("Ejercicio.php");

                }
            } ?>
        </div>
        <br><br><br>
        <div style="margin-left:2%;margin-top:25em">
            <h3>Imc: Bajo/Normal</h3>
            <hr style="width:30%">
            <?php foreach ($ejerciciosSistemas as $ejercicio) { ?>

                <?php if ($ejercicio["imc"] == "b") { ?>

                    <?php include("Ejercicio.php");

                }
            }
            ?>
        </div>
    </form>

    </script>
    <script src="/Fitclub/Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>



</body >

</html >