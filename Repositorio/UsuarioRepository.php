<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function crearUsuario($correo,$contrasena,$username,$nombre,$apellidos) {
    $sqlCrear = "INSERT INTO usuario(correo, password, username, nombre, apellidos, activo, esAdmin)
    VALUES (?, ?, ?, ?, ?, '1',  '0')";

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





function findCorreoPassActivoUsuario($correo, $pass) {
    $sqlFindCorreoPassActivo = "SELECT * FROM usuario where correo = ? and password = ? 
        and activo = '1'";

    $encuentraUser = false;
    $esAdminSistema = false;

    
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreoPassActivo);
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

function banearDesbanear($codUser) {
    $estaActivo = findOneByIdUser($codUser)["activo"];

    if ($estaActivo == "1") {
        try {
            $sqlBanearUser = "UPDATE usuario set activo = 0 where codUsu = ?";
            $result = $GLOBALS["bd"]->prepare($sqlBanearUser);
            $result->execute(array($codUser));
        } catch(PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: /Spytufo/Vistas-Controlador/Error.html");
        }
    } else {
        try {
            $sqlDesbanearUser = "UPDATE usuario set activo = 1 where codUsu = ?";
            $result = $GLOBALS["bd"]->prepare($sqlDesbanearUser);
            $result->execute(array($codUser));
        } catch(PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: /Spytufo/Vistas-Controlador/Error.html");
        }
    }
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

function updateVacioUsuario($correo) {
    $idUser =  findOneByCorreoUser($correo)["codUsu"];

    $sqlUpdateVacio = "UPDATE usuario set correo = '$idUser@usereli.com',
                        direccion = 'GDPR', cp='00000', pais='GDPR', activo = '0' 
                        where codUsu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateVacio);
        $result->execute(array($idUser));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}

function updateUsuario($username, $correo, $contrasena, $cp, $direccion, $pais) {
    $sqlUpdate = "UPDATE usuario SET username = ?, password = ?, cp = ?, direccion = ?,
        pais = ? where correo = ?";
     
    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdate);
        $result->execute(array($username, $contrasena, $cp, $direccion, $pais, $correo));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
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


