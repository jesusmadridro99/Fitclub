<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

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


function findUsuarioUsername($username) {
    $sqlFindUsername= "SELECT * FROM usuario where username = ?";
    $res = true;

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindUsername);
        $result->execute(array($username));
        
        if ($result->rowCount() == 0) {
            $res = false;
        }
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $res;
}



function findCorreoUsuario($correo) {
    $sqlFindCorreo = "SELECT * FROM usuario where correo = ?";
    $res = true;

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreo);
        $result->execute(array($correo));
        
        if ($result->rowCount() == 0) {
            $res = false;
        }
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $res;
}


function findByCorreoUsuario($correo) {
    $sqlFindCorreo = "SELECT * FROM usuario where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreo);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}



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

function findIMCbyCorreo($correo) {

    $sqlFindIMC = "SELECT imc FROM usuario WHERE correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindIMC);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;

}


function findAllUserSinUserLogin($codUsu) {
    $sqlFindAll = "SELECT * FROM usuario where codUsu != ?";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindAll);
        $result->execute(array($codUsu));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

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



function findImcByUser($correo)
{
    $sqlFindImc = "SELECT imc FROM usuario WHERE correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindImc);
        $result->execute(array($correo));
        return $result;

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}



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


