<?php
include("../Utiles/Includes/Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .img-hover-zoom {
    float:left;
    width:50%; 
    position:relative; 
    display:inline-block;
    text-align:center;
    overflow: hidden;
  }
  
  
  .img-hover-zoom img {
    transition: transform 2s, filter 1s ease-in-out;
    filter: blur(5px);
    transform: scale(1.2);
  }
  
 
  .img-hover-zoom:hover img {
    filter: blur(0);
  transform: scale(1);
  }
  
  .div-plan-text {
    color:rgb(220,220,220);
    padding: 15px;
    border-radius:10px;
    background: rgba(15,15,15, .9);
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%, -50%);
    font-size:17px;
    
  }
  </style>
  </head>
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
   <hr>
   <br>
   <br>

    <span style="text-align:center"><h2>Elige tu plan</h2></span>
    <br>
    <div style="display:flex;">
        <div class="img-hover-zoom">
            <img style="width:100%" src="/Fitclub/Img/standard.jpg"/>
            <div class="div-plan-text"><h2>Plan Basic</h2><br>
            - Ejercicios y dieta automaticos.<br>
            - Sin asistencia de profesinales.<br>
            - No se le tomara en cuenta la edad.</div>
        </div>
        <div class="img-hover-zoom">
            <img style="width:100%" src="/Fitclub/Img/pro.jpg"/>
            <div class="div-plan-text"><h2>Plan Pro</h2><br>
            - Ejercicios y dieta asignados por un profesional.<br>
            - Asistencia 24 horas. <br>
            </div>
        </div>
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