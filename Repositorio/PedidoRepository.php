<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

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

function crearPedidoProducto($cod_pedido, $cod_producto, $cantidad) {
    $sqlCrearPedidoAlbum = "INSERT INTO pedido_producto(cod_pedido, cod_producto, cantidad_producto)
    VALUES (?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrearPedidoAlbum);
        $result->execute(array($cod_pedido, $cod_producto, $cantidad));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}

function valorarPedido($valoracion, $codPedido) {
    $sqlValorarpedido = "UPDATE pedido set valoracion = ? where codPedido = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlValorarpedido);
        $result->execute(array($valoracion, $codPedido));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}



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

function findAllPedido() {
    $sqlFindAll = "SELECT * FROM pedido";
 
    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findAllPedidoByUser($cod_usu) {
    $sqlFindAllByUser = "SELECT * FROM pedido where cod_usu = ?";

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


function countPedidoByUser($cod_usu){
    $sqlCount = "SELECT COUNT(cod_pedido) as total FROM pedido WHERE cod_usu = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCount);
        $result->execute(array($cod_usu));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
    
    return $result;
}

/*function findAllByGenerarFactura($codPedido) {
    $findAllByGenerarFactura = "SELECT album.imagen, album.nombre, album.precio
        FROM album INNER JOIN pedidoalbum ON album.codAlbum = pedidoalbum.codAlbum
        where pedidoalbum.codPedido = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($findAllByGenerarFactura);
        $result->execute(array($codPedido));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}*/