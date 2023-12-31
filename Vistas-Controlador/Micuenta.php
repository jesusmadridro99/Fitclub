<?php
ob_start();

include("../Repositorio/MensajeRepository.php");
include("../Repositorio/PedidoRepository.php");
include("../Utiles/Includes/Header.php");

$usuariosSistemas = findAllUser();

include("modales.php");

$error = false;



//Recogemos los pedidos del usuario
$codUsu = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
$pedidos = findAllPedidoByUser($codUsu);

$usuario = findOneByCorreoUser($_SESSION["correo"]);
$pass_usu = $usuario["password"];
$correo = $_SESSION["correo"];

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

    <?php 
    if (isset($_GET["pedido"])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Pedido realizado con éxito!.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <br>
    <br>

    
    <div class="divDatosContra">

        <!-- Mis Datos -->
        <div style="">
            <h3 style="text-align:center;">Mis Datos</h3>
            <hr>
            <div style="display: flex; justify-content: center;" >

                <div class="divDatosUser">
                    <div>
                        <b style="font-size:17px">Username: </b>
                        <?php echo $usuario["username"]; ?><br>
                        <b style="font-size:17px">Nombre: </b>
                        <?php echo $usuario["nombre"]; ?> <br>
                        <b style="font-size:17px"> Apellidos: </b>
                        <?php echo $usuario["apellidos"]; ?> <br>
                        <b style="font-size:17px">E-mail: </b>
                        <?php echo $usuario["correo"]; ?>

                    </div>
                </div>

                <div  class="divDatosPedidos">
                    Pedidos Totales: <br><br>
                    <h1 style="text-align:center">
                        <?php echo count($pedidos) ?>
                        <h1>
                </div>

            </div>
        </div>

        
        <!-- Cambiar contraseña -->
        <div style="text-align:center; margin-top:30px">
            <h3>Cambiar Contraseña</h3>
            <hr>
            <div class="divContra">
                <label for="antigua" class="form-label mt-4">Contraseña antigua</label>
                <input class="form-control" type="password" id="antigua" autocomplete="off">

                <label for="antigua" class="form-label mt-4">Contraseña nueva</label>
                <input class="form-control" type="password" id="nueva" autocomplete="off">

                <label for="antigua" class="form-label mt-4">Confirmar contraseña</label>
                <input class="form-control" type="password" id="confirmar" autocomplete="off"><br>

                <button id="pass" type="button" class="btn btn-primary" onclick="cambiarContraseña('<?php echo $correo ?>')"
                    pass="<?php echo $pass_usu; ?>">Cambiar</button>


            </div>
        </div>
    </div>



    <!-- Mensajes -->
    <div class="divMensaje">
    
        <h3 style="text-align:center">Mensajes</h3>
        <hr>
        <div style="display: flex; justify-content: center;">

            <div class="divMensaje1" >
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
                                    <th scope="col">Cuerpo</th>
                                    <?php if ($_SESSION["rol"] == "admin") { ?>
                                        <th style="max-width:50px" scope="col">Remitente</th>
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

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>

    <script src="../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function comprobarEliminar($idMensaje) {
            if (confirm("¿Seguro que quiere eliminar este correo?")) {
                window.location.href = "BorrarMensaje.php?id=" + $idMensaje;
            }
        }


        function cambiarContraseña(correo) {
            let pass_usu = document.getElementById("pass").getAttribute("pass");
            let antigua = sha256(document.getElementById("antigua").value);
            let nueva = sha256(document.getElementById("nueva").value);
            let confirmar = sha256(document.getElementById("confirmar").value);


            if (pass_usu != antigua) {
                alert("La contraseña actual no es igual a la que nos has enviado");
            }
            else if (nueva != confirmar) {
                alert("La contraseña nueva no coincide con la confirmarción");
            }

            else {
                alert("Contraseña cambiada con éxito");

                $.ajax({
                    type: "POST",
                    url: "Usuario/cambiarContraseña.php",
                    data: { nuevaContraseña: nueva, correo: correo }
                });
                window.location.reload();
            }
        }

        function sha256(message) {
            const hash = CryptoJS.SHA256(message);
            return hash.toString(CryptoJS.enc.Hex);
        }

    </script>





</body>

</html>