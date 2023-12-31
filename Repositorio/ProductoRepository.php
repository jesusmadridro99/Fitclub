<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

//Crear producto
function crearProducto($nombre, $precio, $imagen, $cod_cat)
{
    $sqlCrear = "INSERT INTO producto(nombre, precio, imagen, cod_cat) 
        VALUES (?, ?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombre, $precio, $imagen, $cod_cat));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}



//Modificar producto
function updateProducto($precio, $nombre, $imagen, $codCat, $cod_producto)
{
    $sqlUpdateProducto = "UPDATE producto set precio = ?, nombre = ?, imagen = ?, cod_cat = ? where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateProducto);
        $result->execute(array($precio, $nombre, $imagen, $codCat, $cod_producto));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}



//Buscar producto por categoria
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




//Buscamos los productos segun el id y los ordenamos
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



//Buscar todos los productos
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



//Buscamos todos los productos
function findIdProducto2($id)
{

    $sqlFindProducto = "SELECT * from producto where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindProducto);
        $result->execute(array($id));
        $result = $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    return $result;

}




//Buscamos productos por nombre
function findProductoByNombre($nombre)
{

    $sqlFindProductoNombre = "SELECT * from producto where nombre LIKE ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindProductoNombre);
        $result->execute(array('%' . $nombre . '%'));


    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    return $result;

}



//Borrar producto
function deleteProducto($codProducto)
{
    $sqlDeleteProducto = "DELETE FROM producto where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeleteProducto);
        $result->execute(array($codProducto));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}


//Modificar las valoraciones del producto
function updateValProducto($val_total,$num_val,$cod_producto){
    
    $sqlUpdateProducto = "UPDATE producto set valoraciones_totales = ?, val_num = ? where cod_producto = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateProducto);
        $result->execute(array($val_total,$num_val,$cod_producto));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}


?>