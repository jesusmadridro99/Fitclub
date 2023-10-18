<?php
// Cargamos consultas del repositorio
include("../../Repositorio/UsuarioRepository.php");

//Se carga Header
include("../../Utiles/Includes/Header.php");

// Se comprueba que no se entre en esta vista 
// sino se tiene los permisos
/*if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin") {
    header("Location: ../Spytufo.php");
} */


$usuariosSistemas = findAllUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="../../Utiles/Spytufo.css">
</head>

<body>
    <h2 id="titulosTablas">Usuarios</h2>
    <table>
        <tr>
            <th>Correo</th>
            <th>Username</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>

        <?php
            foreach($usuariosSistemas as $user) {
                if($user["activo"] == 1) {
        ?>
            <tr id="activo">
                <td><?php echo $user["correo"]?></td>
                <td><?php echo $user["username"]?></td>
                <td><?php echo $user["nombre"]?></td>
                <td><?php echo $user["password"]?></td>
                <td>
                    <a href="BanearDesbanearUsuario.php?id=<?php echo $user['codUsu']?>">Banear </a>
                </td>
            </tr>
        <?php
            } else {   
        ?>
            <tr id="noActivo">
                <td><?php echo $user["correo"]?></td>
                <td><?php echo $user["username"]?></td>
                <td><?php echo $user["nombre"]?></td>
                <td><?php echo $user["apellidos"]?></td>
                <td>
                    <a href="BanearDesbanearUsuario.php?id=<?php echo $user['codUsu']?>">Desbanear </a>
                </td>
            </tr>
        <?php
            }
        }   
        ?>
    </table>

    <?php
        //Se carga Footer
        /*include("../../Utiles/Includes/Footer.html");*/
    ?>

</body>

</html>