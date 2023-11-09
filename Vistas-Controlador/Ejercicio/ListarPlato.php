<?php
    include("../../Utiles/Includes/Header.php");

    $platosSistemas = findPlatoByIMC($_SESSION["correo"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub - Mis Platos</title>

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
    <legend class="mt-2" style="padding-left:15%; font-size:40px">Tus Platos</legend>
    <hr style="width:95%;">
    <br>

    

    <p style="margin-left:10%">Aqui tienes una lista de ejercicios que pueden ayudarte a lograr tu objetivo. Escoge los que mas se adecuen a tu manera de trabajar y organizate.<p>

    <?php foreach ($platosSistemas as $plato){ ?>

    <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
    <div class="card-header">
        <?php echo $plato['nombre']; ?>
    </div>
    
    <div class="card-body" style="background-color:rgb(253, 237, 237)">
        <div style="height:200px;
                    width:200px;
                    background-image:url(<?php echo $plato['imagen'] ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    margin:5px;">
        </div>
        
            <?php if ($_SESSION['rol'] == 'admin') { ?>

                <hr>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: comprobarEliminar(<?php echo $plato['cod_producto'] ?>)" >Borrar</a>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: modificar(<?php echo $plato['cod_producto'] ?>)">Modificar</a>

            <?php }
        
        ?>

    </div>
</div>

<?php } ?>


</body>


</html>
