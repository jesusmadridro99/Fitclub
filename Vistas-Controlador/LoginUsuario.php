<?php
ob_start();


include("../Utiles/Includes/Header.php");

$error = false;



//Determinamos si los datos del usuario que nos envian son correctos y si se trata de un usuario estandar o del administrador.
if(isset($_SESSION["correo"])){
    header("Location:Fitclub.php");
} else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $correo = $_POST["correo"];
        $pass = hash('sha256', $_POST["pass"]);
        $resultConsultaEncontrarUser = findCorreoPassUsuario($correo, $pass);
        
        if ($resultConsultaEncontrarUser[0]) {
            $_SESSION['correo'] = $correo;
            
            if ($resultConsultaEncontrarUser[1]) {
                $_SESSION['rol'] = "admin";
                header("Location:Micuenta.php");
            } 
                
            else {
                $_SESSION['rol'] = "usuario";
                $_SESSION['carrito'] = array();
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

        <div class="divRegistroCrear">
        
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
    
    <p style="text-align:center;"><a style="text-align:center;" href="../Vistas-Controlador/Usuario/CrearUsuario.php">Registrate</a></p>
    
    <?php
        include("../Utiles/Includes/Footer.html");
    ?>
</body>

</html>
