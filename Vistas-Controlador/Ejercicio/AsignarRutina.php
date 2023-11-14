<?php
include("../../Utiles/Includes/Header.php");


$ejerciciosSistemas = findAllEjercicio();

$usuGet = $_GET["correo"];
$usuario = findOneByCorreoUser($usuGet)["cod_usu"];

if (isset($_GET['cod_ejercicio'])){
    $cod_ej = $_GET["cod_ejercicio"];

    asignarEjercicio($usuario, $cod_ej);
    header("Location:AsignarRutina.php?correo=".$usuGet);
}

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <br>

    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <hr style="width:95%;">
    <br>

    <form action="AsignarRutina.php?correo=<?php echo $_GET['correo'] ?>" method="POST">

        <?php foreach ($ejerciciosSistemas as $ejercicio) { ?>

            <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                <div class="card-header">
                    <?php echo $ejercicio['nombre']; ?>
                    <?php echo $ejercicio['cod_ejercicio']; ?>
                </div>

                <div class="card-body" style="background-color:rgb(253, 237, 237)">
                    <div style="height:200px;
                    width:200px;
                    background-image:url(<?php echo $ejercicio['imagen'] ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    margin:5px;">
                    </div>

                    <input type="hidden" value="<?php echo $ejercicio['cod_ejercicio'] ?>" name="cod_ejercicio">
                    <?php { ?>

                        <hr>
                        <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="AsignarRutina.php?cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Asignar</a>
                    <?php }

                    ?>

                </div>
            </div>
        <?php } ?>
    </form>
</body>

</html>