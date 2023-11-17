<?php
include("../../Utiles/Includes/Header.php");
include("../modales.php");



// Si el usuario no es admin seleccionamos solo los ejercicios que
//el usuario normal tiene asignados. Si es admin seleccionamos todos los ejercicios.
if ($_SESSION["rol"] != "admin") {

    $plan = findOneByCorreoUser($_SESSION["correo"])["plan"];
    $usuario = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];

    if ($plan == "basic") {
        $ejerciciosSistemas = findEjercicioByIMC($_SESSION["correo"]);
    } else {
        $ejerciciosSistemas = findEjercicioByUsuarioPlan($usuario);
    }
} else {
    $ejerciciosSistemas = findAllEjercicio();
}


?>

<!DOCTYPE html>
<html lang="en">

<body>


    <?php 

    //Para el admin
    if ($_SESSION["rol"] == "admin") {
        $borrar = true;
        ?>

        <br>

        <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEjercicio"
            style="margin-left:15%">Crear Ejercicio</button><br><br>
        <hr style="width:95%;">
        <br>
        <form action="BorrarEjercicio.php?ejercicio=<?php echo $ejercicio["cod_ejercicio"] ?>" method="POST">
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


    <?php 

//Para el usuario normal

} else {

        ?>

        <br>
        <legend class="mt-2" style="padding-left:15%; font-size:40px">Tus ejercicios</legend>
        <hr style="width:95%;">
        <br>

        <?php if ($ejerciciosSistemas->rowCount() > 0) { ?>
            <p style="margin-left:10%">Aqui tienes una lista de ejercicios que pueden ayudarte a lograr tu objetivo. Escoge los
                que mas se adecuen a tu manera de trabajar y organizate.
            <p>
            <?php } else { ?>
            <p style="margin-left:10%">Todavia no has elegido un plan.
            <p>
            <?php

             foreach ($ejerciciosSistemas as $ejercicio) {
                include("Ejercicio.php");
            }
    } }?>


<script src="../../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>


</html>