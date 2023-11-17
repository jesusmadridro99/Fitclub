<?php
include("../../Utiles/Includes/Header.php");
include("../modales.php");
include("../../Repositorio/PlatoRepository.php");

$platosSistemas = findAllPlato();

$usuGet = $_GET["correo"];
$usuario = findOneByCorreoUser($usuGet)["cod_usu"];



//Asignar o quitar de la dieta un plato
if (isset($_GET['accion'])) {
    $cod_plato = $_GET["cod_plato"];

    if ($_GET['accion'] == "asignar") {
        asignarPlato($usuario, $cod_plato);
    } else {
        quitarPlato($usuario, $cod_plato);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <br>

    <legend class="mt-2" style="padding-left:15%; font-size:40px">Platos</legend>
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

    <form action="AsignarDieta.php?correo=<?php echo $_GET['correo'] ?>" method="POST">
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

    </script>
    <script src="/Fitclub/Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>



</body >

</html >