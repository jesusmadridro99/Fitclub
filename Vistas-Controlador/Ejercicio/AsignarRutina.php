<?php
include("../../Utiles/Includes/Header.php");



$ejerciciosSistemas = findAllEjercicio();
$usuariosSistemas = findAllUser();









?>

<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitClub - Productos</title>

        <link rel="stylesheet" href="../../Utiles/css/bootstrap.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="../../Utiles/css/Fitclub.css">

        <style>
            body {
                font-family: 'Roboto Condensed';
            }
        </style>
    </head>
    <br>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        
        echo $_POST["ejercicio"]; 
        echo $_POST["usuario"];}?>

    



    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <hr style="width:95%;">
    <br>

    <form action="AsignarRutina.php" method="POST">
            
        <select style="margin-left:20px; width:20%" id="select" class="form-select form-select-sm" aria-label="Small select example">
            <option selected>Selecciona un usuario</option>
            <?php foreach ($usuariosSistemas as $usuario) { ?>
                <option name="usuario" value="1"> <?php echo $usuario['username'] ?> </option>
           <?php } ?>
        </select>
        <br>
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