<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function crearCategoria($nombreCategoria, $descripcionCategoria) {
    $sqlCrear = "INSERT INTO categoria(nombre, descripcion)
    VALUES (?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombreCategoria, $descripcionCategoria));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
    return $result;

}



function findNombreCategoria($nombreCategoria) {
    $sqlFindNombre = "SELECT * FROM categoria where nombre = ?";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindNombre);
        $result->execute(array($nombreCategoria));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findNombreIDCategoria($nombreCategoria, $idCategoria) {
    $sqlFindIDNombre = "SELECT * FROM categoria where nombre = ? and codCat != ?";
   
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindIDNombre);
        $result->execute(array($nombreCategoria, $idCategoria ));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findIdCategoria($idCategoria) {
    $sqlFindId = "SELECT * FROM categoria where cod_cat = ?";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindId);
        $result->execute(array($idCategoria));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findAllCategoria() {
    $sqlFindAll = "SELECT * FROM categoria";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }

    return $result;
}


function updateCategoria($codCat, $nombreCategoria, $descripcionCat) {
    $sqlUpdateCategoria = "UPDATE categoria set nombre = ?, descripcion = ? 
        where codCat= ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateCategoria);
        $result->execute(array($nombreCategoria, $descripcionCat, $codCat));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}

function deleteCategoria($codCat) {
    $sqlDeleteCategoria = "DELETE FROM categoria where codCat = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeleteCategoria);
        $result->execute(array($codCat));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Spytufo/Vistas-Controlador/Error.html");
    }
}
