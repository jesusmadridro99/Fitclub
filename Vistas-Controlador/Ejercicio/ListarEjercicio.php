<?php
    include("../../Utiles/Includes/Header.php");

    $ejerciciosSistemas = findEjercicioByIMC($_SESSION["correo"]);

?>

<!DOCTYPE html>
<html lang="en">

<body>
    
    <br>
    <legend class="mt-2" style="padding-left:15%; font-size:40px">Tus ejercicios</legend>
    <hr style="width:95%;">
    <br>

    <?php if ($ejerciciosSistemas->rowCount() > 0) { ?>
        <p style="margin-left:10%">Aqui tienes una lista de ejercicios que pueden ayudarte a lograr tu objetivo. Escoge los que mas se adecuen a tu manera de trabajar y organizate.<p>
    <?php }
    else { ?>
        <p style="margin-left:10%">Todavia no has elegido un plan.<p>
   <?php } ?>

    

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

