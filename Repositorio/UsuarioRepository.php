<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


//Crear usuario
function crearUsuario($correo,$contrasena,$username,$nombre,$apellidos) {
    $sqlCrear = "INSERT INTO usuario(correo, password, username, nombre, apellidos,  esAdmin)
    VALUES (?, ?, ?, ?, ?, '0')";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($correo, $contrasena, $username, $nombre, $apellidos));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}


//Modificar nº de pedidos
function updatePedidos($pedidos, $usuario) {
    $sqlUpdatePedidos = "UPDATE usuario SET n_pedidos = ? WHERE cod_usu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdatePedidos);
        $result->execute(array($pedidos, $usuario));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}



//Buscamos usuario por correo y contraseña
function findCorreoPassUsuario($correo, $pass) {
    $sqlFindCorreoPass = "SELECT * FROM usuario where correo = ? and password = ? ";

    $encuentraUser = false;
    $esAdminSistema = false;

        $result = $GLOBALS["bd"]->prepare($sqlFindCorreoPass);
        $result->execute(array($correo, $pass));

        $esAdmin = $result->fetch(PDO::FETCH_ASSOC)["esAdmin"];

        if ($result->rowCount() == 1 ) {
            $encuentraUser = true;  
        }

        if ($esAdmin == 1){
            $esAdminSistema = true;
        }

    return array ($encuentraUser, $esAdminSistema);
}



//Buscar todos los usuarios
function findAllUser() {
    $sqlFindAll = "SELECT * FROM usuario";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $res;
}



//Buscar usuarios por id
function findOneByIdUser($codUser) {
    $sqlFindOne = "SELECT * FROM usuario WHERE cod_usu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindOne);
        $result->execute(array($codUser));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}



//Buscar usuario por correo
function findOneByCorreoUser($correo) {
    $sqlFindOne = "SELECT * FROM usuario WHERE correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindOne);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
    
    return $result;
}



//Modificar edad
function updateEdad($edad, $correo)
{
    $sqlUpdateEdad = "UPDATE usuario set edad = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateEdad);
        $result->execute(array($edad, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}



//Modificar imc
function updateImc($imc, $correo)
{
    $sqlUpdateImc = "UPDATE usuario set imc = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateImc);
        $result->execute(array($imc, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}



//Modificar contraseña
function updatePass($pass,$correo)
{
    $sqlUpdatePass = "UPDATE usuario set password = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdatePass);
        $result->execute(array($pass, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}



//Modificar plan
function updatePlan($plan, $correo) {
    $sqlUpdatePlan = "UPDATE usuario set plan = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdatePlan);
        $result->execute(array($plan, $correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}


?>


