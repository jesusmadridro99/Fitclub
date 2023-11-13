<?php
include("../../Utiles/Includes/Header.php");

$usuario = $_POST["correo"];
$ejerciciosSistemas = findAllEjercicio();
$usuariosSistemas = findAllUser();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
}



?>

<!DOCTYPE html>
<html lang="en">

<body>

    <br>

    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <hr style="width:95%;">
    <br>

    <form action="AsignarRutina.php" method="POST">

        <?php foreach ($ejerciciosSistemas as $ejercicio) { ?>

            <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                <div class="card-header">
                    <?php echo $ejercicio['nombre']; ?>
                </div>

                <div class="card-body" style="background-color:rgb(253, 237, 237)">
                    <div style="height:200px;
                    width:200px;
                    background-image:url(<?php echo $ejercicio['imagen'] ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    margin:5px;">
                    </div>

                    <input type="hidden" value="<?php echo $ejercicio['cod_ejercicio'] ?>" name="ejercicio">
                    <input type="hidden" value="<?php echo $usuario ?>" name="usuario">
                    <?php { ?>

                        <hr>
                        <button class="btn btn-primary" style="font-size:15px; margin-top:7px" type="submit">Añadir</button>
                    <?php }

                    ?>

                </div>
            </div>
        <?php } ?>
    </form>
</body>

</html>