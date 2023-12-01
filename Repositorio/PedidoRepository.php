<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


//Crear pedido
function crearPedido($cod_pedido, $fecha, $cod_usu) {
    $sqlCrear = "INSERT INTO pedido(cod_pedido, fecha, cod_usu)
    VALUES (?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($cod_pedido, $fecha, $cod_usu));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}



//Crear pedido_producto
function crearPedidoProducto($cod_pedido, $cod_producto, $cantidad) {
    $sqlCrearPedidoProducto = "INSERT INTO pedido_producto(cod_pedido, cod_producto, cantidad_producto)
    VALUES (?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrearPedidoProducto);
        $result->execute(array($cod_pedido, $cod_producto, $cantidad));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}




//Buscar pedido por id
function findIdPedido($cod_pedido) {
    $sqlFindId = "SELECT * FROM pedido where cod_pedido = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindId);
        $result->execute(array($cod_pedido));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}




//Buscar pedido_producto por id
function findIdPedidoProducto($cod_pedido) {
    $sqlFindId = "SELECT * FROM pedido_producto where cod_pedido = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindId);
        $result->execute(array($cod_pedido));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}



//Buscamos pedido por el di de usuario y los ordenamos
function findAllPedidoByUser($cod_usu) {
    $sqlFindAllByUser = "SELECT * FROM pedido where cod_usu = ? ORDER BY fecha DESC";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindAllByUser);
        $result->execute(array($cod_usu));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    
    return $result;
}


