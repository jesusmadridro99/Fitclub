<?php
include("../Utiles/Includes/Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head><style>.img-hover-zoom {
    height: 300px; /* [1.1] Set it as per your need */
    overflow: hidden; /* [1.2] Hide the overflowing of child elements */
  }
  
  /* [2] Transition property for smooth transformation of images */
  .img-hover-zoom img {
    transition: transform .5s ease;
  }
  
  /* [3] Finally, transforming the image when container gets hovered */
  .img-hover-zoom:hover img {
    transform: scale(1.5);
  }</style></head>
<body>

    <div class="div_princ_ini">
        <div class="div_sec_ini">
            <h3>El plan de entrenamiento y dieta que mejor se adapta a ti</h3>
            <br>
            <p>Fit club te ofrece un plan de ejercicios y una dieta personalizada para que consigas tu objetivo.
                <br>
                <br>
                Para ello, llevarás a cabo una encuesta inicial que servirá a nuestro sistema para poder crearte una
                rutina de entrenamiento y una dieta adaptada, para conseguir tu objetivo.
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



    <div style="display: flex;">
        <div class="img-hover-zoom" style="float:left; width:50%;">
            <img style="width:100%" src="/Fitclub/Img/standard.jpg"/>
        </div>
        <div class="img-hover-zoom" style="float:left; width:50%;">
            <img style="width:100%; max-height:84%" src="/Fitclub/Img/pro.jpg"/>
        </div>

    </div>





    <br>
    <br>
    <h3 style="text-align:center">Empieza tu cambio</h3>
    <br>

    <div style="text-align:center;">

        <div class="div_form_datos">
            <form action="plantilla.php" method="POST">
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