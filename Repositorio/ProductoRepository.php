<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function crearProducto($nombre, $descripcion, $precio, $imagen, $cod_cat) {
    $sqlCrear = "INSERT INTO producto(nombre, descripcion, precio, imagen, cod_cat) 
        VALUES (?, ?, ?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombre, $descripcion, $precio, $imagen, $cod_cat));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}

function updateProducto($codProducto, $descripcion, $precio, $nombre,  $imagen, $codCat) {
    $sqlUpdateProducto = "UPDATE producto set nombre = ?, descripcion = ?, precio = ?, imagen = ?, cod_cat = ? where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateProducto);
        $result->execute(array($nombre, $descripcion, $precio, $imagen, $codCat, $codProducto));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}

function findNombreIDProducto($cod_producto, $nombre) {
    $sqlFindIDNombre = "SELECT * FROM producto where nombre = ? and cod_producto != ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindIDNombre);
        $result->execute(array($nombre, $cod_producto));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}


function findProductoByCategoria($categoria)
{

    $sqlFindProducto = "SELECT * from producto where cod_cat = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindProducto);
        $result->execute(array($categoria));
        return $result;

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}

function findProductoByCategoriaOrdenado($categoria, $orden)
{

    $sqlFindProducto = "SELECT * from producto where cod_cat = ? ORDER BY nombre";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindProducto);
        $result->execute(array($categoria));
        return $result;

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}


function findProductoByIDOrdered($cod, $orden)
{
    $codigos = '"' . rtrim(implode('","', $cod), ',') . '"';
    $sqlFindAll = "SELECT * FROM producto WHERE cod_producto IN ($codigos) ORDER BY $orden";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);


    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findIdProducto($id)
{

    $sqlFindProducto = "SELECT * from producto where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindProducto);
        $result->execute(array($id));

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    return $result;

}




/*

/*function findUsuarioUsername($username)
{
    $sqlFindUsername = "SELECT * FROM usuario where username = ?";
    $res = true;

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindUsername);
        $result->execute(array($username));

        if ($result->rowCount() == 0) {
            $res = false;
        }
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $res;
}*/


/*function findCorreoUsuario($correo)
{
    $sqlFindCorreo = "SELECT * FROM usuario where correo = ?";
    $res = true;

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreo);
        $result->execute(array($correo));

        if ($result->rowCount() == 0) {
            $res = false;
        }
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $res;
}


function findByCorreoUsuario($correo)
{
    $sqlFindCorreo = "SELECT * FROM usuario where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindCorreo);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}








function findCorreoPassActivoUsuario($correo, $pass)
{
    $sqlFindCorreoPassActivo = "SELECT * FROM usuario where correo = ? and password = ? 
        and activo = '1'";

    $encuentraUser = false;
    $esAdminSistema = false;


    $result = $GLOBALS["bd"]->prepare($sqlFindCorreoPassActivo);
    $result->execute(array($correo, $pass));


    if ($result->rowCount() == 0) {
        $encuentraUser = true;
    } else {

        $esAdmin = $result->fetch(PDO::FETCH_ASSOC)["esAdmin"];

        if ($esAdmin == 1) {
            $esAdminSistema = true;
        }
    }

    return array($encuentraUser, $esAdminSistema);
}
*/

function findNombreProducto($nombre) {
    $sqlFindNombre = "SELECT * FROM producto where nombre = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindNombre);
        $result->execute(array($nombre));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}


function findEachCategoria()
{
    $sqlFindEach = "SELECT DISTINCT categoria FROM producto";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindEach);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    return $res;
}





function findAllProducto()
{
    $sqlFindAll = "SELECT * FROM producto";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}
/*
function findAllUserSinUserLogin($codUsu)
{
    $sqlFindAll = "SELECT * FROM usuario where codUsu != ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindAll);
        $result->execute(array($codUsu));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findOneByIdUser($codUser)
{
    $sqlFindOne = "SELECT * FROM usuario WHERE cod_usu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindOne);
        $result->execute(array($codUser));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fit Club/Vistas-Controlador/Error.html");
    }

    return $result;
}

function banearDesbanear($codUser)
{
    $estaActivo = findOneByIdUser($codUser)["activo"];

    if ($estaActivo == "1") {
        try {
            $sqlBanearUser = "UPDATE usuario set activo = 0 where codUsu = ?";
            $result = $GLOBALS["bd"]->prepare($sqlBanearUser);
            $result->execute(array($codUser));
        } catch (PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: /Spytufo/Vistas-Controlador/Error.html");
        }
    } else {
        try {
            $sqlDesbanearUser = "UPDATE usuario set activo = 1 where codUsu = ?";
            $result = $GLOBALS["bd"]->prepare($sqlDesbanearUser);
            $result->execute(array($codUser));
        } catch (PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: /Spytufo/Vistas-Controlador/Error.html");
        }
    }
}

function findOneByCorreoUser($correo)
{
    $sqlFindOne = "SELECT * FROM usuario WHERE correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindOne);
        $result->execute(array($correo));
        $result = $result->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

function updateVacioUsuario($correo)
{
    $idUser = findOneByCorreoUser($correo)["codUsu"];

    $sqlUpdateVacio = "UPDATE usuario set correo = '$idUser@usereli.com',
                        direccion = 'GDPR', cp='00000', pais='GDPR', activo = '0' 
                        where codUsu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateVacio);
        $result->execute(array($idUser));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}

function updateUsuario($username, $correo, $contrasena, $cp, $direccion, $pais)
{
    $sqlUpdate = "UPDATE usuario SET username = ?, password = ?, cp = ?, direccion = ?,
        pais = ? where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdate);
        $result->execute(array($username, $contrasena, $cp, $direccion, $pais, $correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}
?>*/


function deleteProducto($codProducto) {
    $sqlDeleteProducto = "DELETE FROM producto where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeleteProducto);
        $result->execute(array($codProducto));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}


?>