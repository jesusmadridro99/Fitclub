<?php
include("../Utiles/Includes/Header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
</head>

<body>
    
    <div class="div_princ_ini">
        <div class="div_sec_ini">
            <h3>El plan de entrenamiento y dieta que mejor se adapta a ti</h3>
            <br>
            <p >Fit club te ofrece un plan de ejercicios y una dieta personalizada para que consigas tu objetivo.
                <br>
                <br>
                Para ello, llevarás a cabo una encuesta inicial que servirá a nuestro sistema para poder crearte una rutina de entrenamiento y una dieta adaptada, para conseguir tu objetivo.
                <br>
            </p>
        </div>

        <div class="div_ini_img1"> 
            <img style="width:100%" src="/Fitclub/Img/ejercicio1.jpg" />        
        </div>
        <div class="div_ini_img2"> 
            <img style="max-width:100%" src="/Fitclub/Img/dieta1.jpg" />
        </div>
        
    </div>
    <br>
    <br>
    <br>
    <h3 style="text-align:center">Empieza tu cambio</h3>
    <br>

    <div style="text-align:center;">

        <div class="div_form_datos">
            <form action="Plantilla.php" method="POST">
                <input type="number" name="edad" placeholder="Edad*" /> <br><br>
                <input type="text" name="altura" placeholder="Altura*" /> <br><br>
                <input type="text" name="peso" placeholder="Peso*" /> <br><br>
                <input class="btn btn-primary" type="submit" value="Enviar" />
            </form>
        </div>
    </div>
    
    
    <?php
        include("../Utiles/Includes/Footer.html");
    ?>

</body>

</html>