<?php
include("../Utiles/Includes/Header.php");
?>

<!DOCTYPE html>
<html lang="en">

<body>


    <div class="modal fade" id="modalPlan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce los datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="Ejercicio/CrearRutina.php" method="POST">

                        <label for="peso">Peso: </label>
                        <input id="peso" class="form-control" required type="text" name="peso" /><br>

                        <label for="altura">Altura: </label>
                        <input id="altura" class="form-control" required type="text" name="altura" /><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalPlan">Elegir</button>

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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Elegir</button>

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





    <script src="../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>











</body>

</html>