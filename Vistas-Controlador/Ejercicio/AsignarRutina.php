<?php
include("../../Utiles/Includes/Header.php");
include("../modales.php");

$ejerciciosSistemas = findAllEjercicio();

$usuGet = $_GET["correo"];
$usuario = findOneByCorreoUser($usuGet)["cod_usu"];



if (isset($_GET['accion'])) {
    $cod_ej = $_GET["cod_ejercicio"];

    if($_GET['accion'] == "asignar"){
        asignarEjercicio($usuario, $cod_ej);
    }
    else{
        quitarEjercicio($usuario, $cod_ej);
    }
    header("Location:AsignarRutina.php?correo=" . $usuGet);
}

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <br>



    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEjercicio"
        style="margin-left:15%">Crear Ejercicio</button><br><br>
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

                    <input type="hidden" value="<?php echo $ejercicio['cod_ejercicio'] ?>" name="cod_ejercicio">
                    

                        <hr>

                        <?php
                        $ejercicioUsuario = findEjercicioByUsuario($usuario, $ejercicio['cod_ejercicio']);

                        if ($ejercicioUsuario) {  ?>
                            <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                href="AsignarRutina.php?accion=quitar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Quitar</a>
                        <?php } else {  ?>
                            
                            <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                href="AsignarRutina.php?accion=asignar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Asignar</a>
                        <?php }
                     ?>

                </div>
            </div>
        <?php } ?>
    </form>

    </script>
    <script src="/Fitclub/Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


</body >

</html >