<?php
ob_start();

include("../Repositorio/MensajeRepository.php");
include("../Repositorio/PedidoRepository.php");
include("../Utiles/Includes/Header.php");
include("modales.php");

$error = false;

//Recogemos los pedidos del usuario
$codUsu = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
$pedidos = findAllPedidoByUser($codUsu);


//Mostramos los mensajes enviados o recibidos
$idUserLogin = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
$box = false;

if (!isset($_GET["caja"])) {
    $_GET["caja"] = "recibidos";
}

if ($_GET["caja"] == "recibidos") {
    $mensajesSistemas = findRecibidoMensajeByUser($idUserLogin);
}
if ($_GET["caja"] == "enviados") {
    $mensajesSistemas = findEnviadoMensajeByUser($idUserLogin);
    $box = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php if(isset($_GET["pedido"])){ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Pedido realizado con éxito!.</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
    <br>
    <br>
    <div style="width:30%; display:inline-block;margin-left:3%">
        <div>
            <h3 style="text-align:center; ">Mis Datos</h3>
            <br>
            <div style="display: flex; justify-content: center;">

                <div style="background-color:#f8dede; padding:40px; border-radius:10px 0px 0px 10px">
                    <div>
                        <b style="font-size:17px">Username: </b>
                        <?php echo findByCorreoUsuario($_SESSION["correo"])["username"]; ?><br>
                        <b style="font-size:17px">Nombre: </b>
                        <?php echo findByCorreoUsuario($_SESSION["correo"])["nombre"]; ?> <br>
                        <b style="font-size:17px"> Apellidos: </b>
                        <?php echo findByCorreoUsuario($_SESSION["correo"])["apellidos"]; ?> <br>
                        <b style="font-size:17px">E-mail: </b>
                        <?php echo findByCorreoUsuario($_SESSION["correo"])["correo"]; ?>

                    </div>
                </div>

                <div style="; float:left; background-color:#f8ebeb; padding:40px; border-radius:0px 10px 10px 0px">
                    Pedidos Totales: <br><br><h1 style="text-align:center">
                        <?php echo count($pedidos) ?>
                        <h1>
                </div>

            </div>
        </div>
        <div style="text-align:center; margin-top:60px">
            <h3>Cambiar Contraseña</h3>
            <br>
            <div style="justify-content: center; background-color:#f8dede; padding:20px; border-radius:10px;">
                <label for="antigua" class="form-label mt-4">Contraseña antigua</label>
                <input class="form-control" type="password" id="antigua" autocomplete="off">

                <label for="antigua" class="form-label mt-4">Contraseña nueva</label>
                <input class="form-control" type="password" id="antigua" autocomplete="off">

                <label for="antigua" class="form-label mt-4">Confirmar contraseña</label>
                <input class="form-control" type="password" id="antigua" autocomplete="off">

            </div>
        </div>
    </div>

    <div style="width:60%; float:right; margin-right:3%">
        <h3 style="text-align:center">Mensajes</h3>
        <br>


        <div style="display: flex; justify-content: center;">

            <div style="background-color:#f8dede; 
  padding:40px; 
  border-radius:20px;">
                <div>
                    <?php if ($box) { ?>
                        <h4 style="text-decoration:underline">Mensajes enviados</h4>
                    <?php } else { ?>
                        <h4 style="text-decoration:underline">Mensajes recibidos</h4>
                    <?php } ?>
                    <a href="Micuenta.php?caja=enviados" class="btn btn-outline-dark">Enviados</a>
                    <a href="Micuenta.php?caja=recibidos" class="btn btn-outline-dark">Recibidos</a>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalMensaje">Enviar
                        Mensaje</button>

                    <br>
                    <br>
                    <div style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Asunto</th>
                                    <th style="max-width:500px" scope="col">Cuerpo</th>
                                    <?php if ($_SESSION["rol"] == "admin") { ?>
                                        <th scope="col">Remitente</th>
                                        <th scope="col">Destinatario</th>
                                    <?php } ?>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($mensajesSistemas as $mensaje) { ?>
                                    <tr>

                                        <td style="max-width:300px">
                                            <?php echo $mensaje["asunto"] ?>
                                        </td>
                                        <td style="max-width:800px">
                                            <?php echo $mensaje["cuerpo"] ?>
                                        </td>
                                        <?php if ($_SESSION["rol"] == "admin") { ?>
                                            <td>
                                                <?php

                                                echo findOneByIdUser($mensaje["remitente"])["correo"] ?>
                                            </td>
                                            <td>
                                                <?php echo findOneByIdUser($mensaje["destinatario"])["correo"] ?>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <?php echo $mensaje["fecha"] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script src="../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function comprobarEliminar($idMensaje) {
            if (confirm("¿Seguro que quiere eliminar este correo?")) {
                window.location.href = "BorrarMensaje.php?id=" + $idMensaje;
            }
        }
    </script>

</body>

</html>