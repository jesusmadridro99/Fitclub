<?php
ob_start();


include("../../Utiles/Includes/Header.php");

$errorContrasena = false;

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['password'];
    $contrasenaConf = $_POST['passwordComprobar'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    // Comprobamos que las constraseñas sean iguales
    if ($contrasena == $contrasenaConf) {
        // Cifrado de la contraseña con SHA256
        $contasenaCifrada = hash('sha256', $contrasena);
        crearUsuario($correo, $contasenaCifrada, $username, $nombre, $apellidos);
        header("Location:../LoginUsuario.php");
    } else {
        $errorContrasena = true;
    }

    ob_end_flush();
}

?>

<body>

    <?php if ($errorContrasena == true) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Las contraseñas no coinciden!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <br>
    <br>
    <h4 style="text-align:center">Registro</h4>
    <br>
    <br>
    <div style="text-align:center;">

        <div class="divRegistroCrear">

            <form action="CrearUsuario.php" method="POST">
                <input type="email" placeholder="E-mail" name="correo" /> <br><br>
                <input type="text" placeholder="Username" name="username" autocomplete="off" /> <br><br>
                <input type="text" placeholder="Nombre" name="nombre" /> <br><br>
                <input type="text" placeholder="Apellidos" name="apellidos" /> <br><br>
                <input type="password" name="password" placeholder="Contraseña" autocomplete="off" /> <br><br>
                <input type="password" name="passwordComprobar" placeholder="Confirmar ontraseña" /> <br><br><br>
                <input type="submit" class="btn btn-primary" value="Registrarse" />
            </form>
        </div>
    </div>
    <br>

</body>

</html>