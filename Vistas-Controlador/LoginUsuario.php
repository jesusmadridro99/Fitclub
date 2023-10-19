<?php
ob_start();


include("../Utiles/Includes/Header.php");

$error = false;

if(isset($_SESSION["correo"])){
    header("Location:Fitclub.php");
} else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $correo = $_POST["correo"];
        $pass = hash('sha256', $_POST["pass"]);

        $resultConsultaEncontrarUser = findCorreoPassActivoUsuario($correo, $pass);

        if ($resultConsultaEncontrarUser[0]) {
            $_SESSION['correo'] = $correo;
            
            if ($resultConsultaEncontrarUser[1] == false) {
                $_SESSION['rol'] = "admin";
                header("Location:Fitclub.php");
            } 
                
            else {
                $_SESSION['rol'] = "usuario";
                /*$_SESSION['carrito'] = array();*/
                header("Location:Micuenta.php");
            }

            header("Location:Micuenta.php");
        }
        
        else {
            header("Location:Fitclub.php");
        }
    }
}


ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../Utiles/css/bootstrap.min.css">
    </link>
  <link rel="stylesheet" href="../Utiles/css/Fitclub.css"></link>
</head>

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
        padding:20px">
        
            <form action="LoginUsuario.php" method="POST">
                <input type="email" placeholder="E-mail*" name="correo" value="<?php if (isset($correo))
                    echo $correo ?>" /> <br><br>
                <input type="password" name="pass" placeholder="Contraseña*" /> <br><br>
                <input type="submit" class="btn btn-primary" value="Iniciar Sesión" />
            </form>
        </div>
    </div>
    <br>
    <hr style="width:20%; margin-left: 40%;">
    <br>
    <p style="text-align:center;">¿Eres nuevo?</p>
    
    <p style="text-align:center;"><a style="text-align:center;" href="/Vistas-Controlador/Usuario/CrearUsuario.php">Registrate</a></p>
    
    <?php
        include("../Utiles/Includes/Footer.html");
    ?>
</body>

</html>
