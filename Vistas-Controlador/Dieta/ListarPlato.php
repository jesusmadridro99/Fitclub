<?php
include("../../Utiles/Includes/Header.php");
include("../modales.php");
include("../../Repositorio/PlatoRepository.php");

if ($_SESSION["rol"] != "admin") {

    $plan = findOneByCorreoUser($_SESSION["correo"])["plan"];
    $usuario = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];

    if ($plan == "basic") {
        $platosSistemas = findPlatoByIMC($_SESSION["correo"]);
    } else {
        $platosSistemas = findPlatoByUsuarioPlan($usuario);
    }
} else {
    $platosSistemas = findAllPlato();
}


?>

<!DOCTYPE html>
<html lang="en">

<body>


    <?php
    if ($_SESSION["rol"] == "admin") {
        $borrar = true;
        ?>

        <br>

        <legend class="mt-2" style="padding-left:15%; font-size:40px">Platos</legend>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPlato"
            style="margin-left:15%">Crear Plato</button><br><br>
        <hr style="width:95%;">
        <br>
        <form action="BorrarPlato.php?plato=<?php echo $plato["cod_plato"] ?>" method="POST">
            <div style="margin-left:2%">
                <h3>Imc: Obesidad</h3>
                <hr style="width:30%">
                <?php foreach ($platosSistemas as $plato) { ?>

                    <?php if ($plato["imc"] == "o") { ?>

                        <?php include("Plato.php");

                    }
                } ?>
            </div>
            <br><br><br>
            <div style="margin-left:2%;margin-top:25em">
                <h3>Imc: Bajo/Normal</h3>
                <hr style="width:30%">
                <?php foreach ($platosSistemas as $plato) { ?>

                    <?php if ($plato["imc"] == "b") { ?>

                        <?php include("Plato.php");

                    }
                }
                ?>
            </div>
        </form>


    <?php } else {

        ?>




        <br>
        <legend class="mt-2" style="padding-left:15%; font-size:40px">Tus platos</legend>
        <hr style="width:95%;">
        <br>

        <?php if ($platosSistemas->rowCount() > 0) { ?>
            <p style="margin-left:10%">Aqui tienes una lista de platos que pueden ayudarte a lograr tu objetivo. Escoge los
                que mas se adecuen a tu manera de trabajar y organizate.
            <p>
                <?php

                foreach ($platosSistemas as $plato) {
                    include("Plato.php");
                }
        }

        else if (!isset($plan)) { ?>
            <p style="margin-left:10%">Todavia no has elegido un plan.
            </p>

        <?php } else { ?>
            <p style="margin-left:10%">Todavia no te han asignado platos.
            </p>

        <?php }
    } ?>


    <script src="../../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>


</html>