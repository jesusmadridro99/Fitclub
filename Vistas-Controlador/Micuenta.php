<?php
ob_start();

include("../Repositorio/MensajeRepository.php");
include("../Utiles/Includes/Header.php");
include("modales.php");

$error = false;

function findByCorreoUsuario2($correo)
{
    $sqlFindCorreo = "SELECT * FROM usuario where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreo);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();

    }

    return $result;
}


$idUserLogin = $_SESSION["correo"];
$mensajesSistemas = findAllMensajeByUser($idUserLogin);
$box = false;
if (isset($_GET["caja"])) {
    if ($_GET["caja"] == "recibidos") {
        $mensajesSistemas = findAllMensajeByUser($idUserLogin);
    }
    if ($_GET["caja"] == "enviados") {
        $mensajesSistemas = findEnviadoMensajeByUser($idUserLogin);
        $box = true;
    }

} else {
    $mensajesSistemas = findAllMensajeByUser($idUserLogin);

}




?>

<!DOCTYPE html>
<html lang="en">

<body>
    <br>
    <br>
    <h3 style="text-align:center">Mis Datos</h3>
    <br>
    <div style="display: flex; justify-content: center;">

        <div style="background-color:#f8dede; padding:40px; border-radius:10px 0px 0px 10px">
            <div>
                Username:
                <?php echo findByCorreoUsuario2($_SESSION["correo"])["username"]; ?><br>
                Nombre: </h6>
                <?php echo findByCorreoUsuario2($_SESSION["correo"])["nombre"]; ?> <br>
                Apellidos: </h6>
                <?php echo findByCorreoUsuario2($_SESSION["correo"])["apellidos"]; ?> <br>
                E-mail:
                <?php echo findByCorreoUsuario2($_SESSION["correo"])["correo"]; ?>
                </h6>
            </div>
        </div>

        <div style="; float:left; background-color:#f8ebeb; padding:40px; border-radius:0px 10px 10px 0px">
            Pedidos Totales: <h1 style="text-align:center">40<h1>
        </div>
    </div>
    <br>
    <br>
    <br>
    <hr style="width:30%; margin-left:35%;">
    <br>
    <br>
    <h3 style="text-align:center">Mensajes</h3>
    <br>

    <div style="text-align:center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMensaje">Enviar
            Mensaje</button>
    </div>
    <br>
    <br>
    <div style="text-align:center">
        <a href="Micuenta.php?caja=enviados" class="btn btn-outline-dark">Enviados</a>
        <a href="Micuenta.php?caja=recibidos" class="btn btn-outline-dark">Recibidos</a>
    </div><br>

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
                <br>
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
                                        <?php echo $mensaje["remitente"] ?>
                                    </td>
                                    <td>
                                        <?php echo $mensaje["destinatario"] ?>
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