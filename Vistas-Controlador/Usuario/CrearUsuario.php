<?php
ob_start();

//Se carga Header
include("../../Utiles/Includes/Header.php");

// Errores 
$errorContrasena = false;
$correoYaExiste = false;


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
        //Comprobamos que el correo del usuario no esta en la BD
        if (!findCorreoUsuario($correo)) {
            // Cifrado de la contraseña con SHA256
            $contasenaCifrada = hash('sha256', $contrasena);
            crearUsuario($correo, $contasenaCifrada, $username, $nombre, $apellidos);
            header("Location:../LoginUsuario.php");
        } else {
            $correoYaExiste = true;
        }
    } else {
        $errorContrasena = true;
    }

ob_end_flush();
}

?>

<body>
    <br>
    <br>
    <h4 style="text-align:center">Iniciar Sesión</h4>
    <br>
    <br>
    <div id="cajaError">
        <?php if ($error == true) {
            echo "<p>La combinación de correo y contraseña no es correcta</p>";
        }
        ?>
    </div>
    <div style="text-align:center;">

        <div style="border:solid 1px rgba(0,0,0,0.3);
        border-radius: 4px;
        display:inline-block;
        margin-left:auto;
        margin-right:auto;
        text-align:center;
        padding:30px">
        
            <form action="CrearUsuario.php" method="POST">
                <input type="email" placeholder="E-mail*" name="correo" /> <br><br>
                <input type="text" placeholder="Username" name="username"/> <br><br>
                <input type="text" placeholder="Nombre" name="nombre"/> <br><br>
                <input type="text" placeholder="Apellidos" name="apellidos"/> <br><br>
                <input type="password" name="password" placeholder="Contraseña*" /> <br><br>
                <input type="password" name="passwordComprobar" placeholder="Confirmar ontraseña*" /> <br><br><br>
                <input type="submit" class="btn btn-primary" value="Registrarse" />
            </form>
        </div>
    </div>
    <br>

    <?php
        include("../../Utiles/Includes/Footer.html");
    ?>
</body>

</html>