<?php
ob_start();

include("../Repositorio/MensajeRepository.php");
include("../Utiles/Includes/Header.php");

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



$idUserLogin = findOneByCorreoUser($_SESSION["correo"]);
if (isset($_SESSION["caja"])) {
    if ($_GET["caja"] == "Recibido") {
        $mensajesSistemas = findRecibidosMensajeByUser($idUserLogin);
    }
    if ($_GET["caja"] == "Enviado") {
        $mensajesSistemas = findEnviadoMensajeByUser($idUserLogin);
    }

} else {
    $mensajesSistemas = findAllMensajeByUser($idUserLogin);
    
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    </link>
    <link rel="stylesheet" href="../Utiles/css/Fitclub.css">
    </link>
    <style>
        body {
            font-family: 'Roboto Condensed';
        }
    </style>
</head>

<body>

    <br>
    <br>
    <h3 style="text-align:center">Mis Datos</h3>
    <br>
    <div style="display: flex; justify-content: center;">

        <div style="background-color:#F0F0F0; padding:40px; border-radius:10px 0px 0px 10px">

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

        <div style="; float:left; background-color:#F0F0F0; padding:40px; border-radius:0px 10px 10px 0px">
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
    <div style="display: flex; justify-content: center;">

        <div style="background-color:#F0F0F0; padding:40px; border-radius:20px">
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">Cuerpo</th>
                            <th scope="col">Remitente</th>
                            <th scope="col">Destinatario</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mensajesSistemas as $mensaje) { ?>
                            <tr>
                                <td>
                                    <?php echo $mensaje["asunto"] ?>
                                </td>
                                <td>
                                    <?php echo $mensaje["cuerpo"] ?>
                                </td>
                                <td>
                                    <?php echo findOneByIdUser($mensaje["destinatario"])["correo"] ?>
                                </td>
                                <td>
                                    <?php echo findOneByIdUser($mensaje["fecha"])["correo"] ?>
                                </td>
                                <td>
                                    <a href="javascript: comprobarEliminar(<?php echo $mensaje["codMensaje"] ?>)">Borrar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>





    <script>
        function comprobarEliminar($idMensaje) {
            if (confirm("¿Seguro que quiere eliminar este correo?")) {
                window.location.href = "BorrarMensaje.php?id=" + $idMensaje;
            }
        }
    </script>


</body>

</html>