<?php
include("../Utiles/Includes/Header.php");
include("modales.php");

?>

<!DOCTYPE html>
<html lang="en">

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

    <span style="text-align:center">
        <h1>Elige tu plan</h1><br>
    </span>
    <br>
    <div style="display:flex;">

        <div class="img-hover-zoom">
            <img style="width:100%" src="/Fitclub/Img/basic.jpg" />
            <div class="div-plan-text">
                <h2>Plan Basic</h2>
                <hr>
                - Ejercicios y dieta automaticos.<br>
                - Sin asistencia de profesinales.<br>
                - No se le tomara en cuenta la edad.<br><br>
                <?php if (!isset($_SESSION["correo"])) {
                    ?>
                    <div style="color:orange">Inicie sesion para elegir plan </div>
                    <?php
                } else { ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalBasic">Elegir</button>
                <?php } ?>
            </div>
            </a>
        </div>

        <div class="img-hover-zoom">
            <img style="width:100%" src="/Fitclub/Img/pro.jpg" />
            <div class="div-plan-text">
                <h2>Plan Pro</h2>
                <hr>
                - Ejercicios y dieta asignados por un profesional.<br>
                - Asistencia 24 horas. <br><br>
                <?php if (!isset($_SESSION["correo"])) {
                    ?>
                    <div style="color:orange">Inicie sesion para elegir plan </div>

                    <?php
                } else { ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalPro">Elegir</button>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
<hr>
    <div class="divContacto">
        <div style="width:50%; float:left; padding:5%">
            <h3>CONTACTA CON NOSOTROS</h3>
        </div>
        <div style="width:50%; padding:10%; float:right">
            <form>
                <label for="nombre">Nombre: </label>
                <input id="nombre" class="form-control" required type="text" name="peso" /><br>

                <label for="altura">Altura: </label>
                <input id="altura" class="form-control" required type="text" name="altura"
                    placeholder="Metros | Ej: 1.75" /><br>

                <label for="edad">Edad: </label>
                <input id="edad" class="form-control" required type="text" name="edad" placeholder="Años" /><br>
            </form>
        </div>

    </div>


    <?php

    ?>

    <script src="../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    </script>
</body>

</html>