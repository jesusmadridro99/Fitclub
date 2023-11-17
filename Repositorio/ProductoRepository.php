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