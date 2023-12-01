<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

//Crear categoria
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


//Buscar categoria por nombre
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


//Buscar categoria 
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
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}




