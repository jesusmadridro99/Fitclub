<?php
    include("../../Utiles/Includes/Header.php");

    $imcActual = $_SESSION["imc"];
    $ejerciciosSistemas = findEjercicioByIMC("$imcActual");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub - Mis Ejercicios</title>

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
<body>
    
    <br>
    <legend class="mt-2" style="padding-left:15%; font-size:40px">Ejercicios</legend>
    <hr style="width:95%;">
    <br>

    <?php foreach ($ejerciciosSistemas as $ejercicio){ ?>

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
        
            <?php if ($_SESSION['rol'] == 'admin') { ?>

                <hr>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: comprobarEliminar(<?php echo $producto['cod_producto'] ?>)" >Borrar</a>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: modificar(<?php echo $producto['cod_producto'] ?>)">Modificar</a>

            <?php }
        
        ?>

    </div>
</div>

<?php } ?>


</body>


</html>

