<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $usuarioVerMensaje) {
    $sqlCrear = "INSERT INTO mensaje(asunto, cuerpo, remitente, destinatario, usuarioVerMensaje)
    VALUES (?, ?, ?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($asunto, $cuerpo, $remitente, $destinatario, $usuarioVerMensaje));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function updateMensaje($codMensaje, $usuarioVerMensaje) {
    $sqlUpdateMensaje = "UPDATE mensaje set usuarioVerMensaje = ? where codMensaje = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateMensaje);
        $result->execute(array($usuarioVerMensaje, $codMensaje));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    //$GLOBALS["bd"]->query($sqlUpdateMensaje);
}

function findIdMensaje($idMensaje) {
    $sqlFindId = "SELECT * FROM mensaje where codMensaje = ?";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindId);
        $result->execute(array($idMensaje));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result->fetch(PDO::FETCH_ASSOC);
}

// Consulta con todos los mensajes enviados o recibidos
function findAllMensajeByUser($idUserLogin) {
    $sqlFindAllByUser = "SELECT * FROM mensaje WHERE destinatario = ? ";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindAllByUser);
        $result->execute(array($idUserLogin));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $res = array();
        
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

// Consulta con todos los mensajes enviados o recibidos
function findRecibidosMensajeByUser($idUserLogin) {
    $sqlFindRecibidosByUser = "SELECT * FROM mensaje WHERE destinatario = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindRecibidosByUser);
        $result->execute(array($idUserLogin));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $res = array();

        // Recorremos los mensajes para eliminar aquellos que he borrado previamente 
        // de usuarioVerMensaje
        foreach($result as $mensaje) {
            $arrayUsuarios = explode(";", $mensaje["usuarioVerMensaje"]);
            // Comprobamos que cuando buscamos el id del usuario en el listado de usuarios
            // que pueden ver el mensaje devuelva su posicion (sino se encuentra devuelve 
            // false)
            if(is_int(array_search($idUserLogin, $arrayUsuarios))) {
                $res[] = $mensaje;
            }
        }

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}

// Consulta con todos los mensajes enviados o recibidos
function findEnviadoMensajeByUser($idUserLogin) {
    $sqlFindEnviadoByUser = "SELECT * FROM mensaje WHERE remitente = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEnviadoByUser);
        $result->execute(array($idUserLogin));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $res = array();

        // Recorremos los mensajes para eliminar aquellos que he borrado previamente 
        // de usuarioVerMensaje
        foreach($result as $mensaje) {
            $arrayUsuarios = explode(";", $mensaje["usuarioVerMensaje"]);
            // Comprobamos que cuando buscamos el id del usuario en el listado de usuarios
            // que pueden ver el mensaje devuelva su posicion (sino se encuentra devuelve 
            // false)
            if(is_int(array_search($idUserLogin, $arrayUsuarios))) {
                $res[] = $mensaje;
            }
        }

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}

function deleteMensaje($codMensaje) {
    $sqlDeleteMensaje = "DELETE FROM mensaje where codMensaje = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeleteMensaje);
        $result->execute(array($codMensaje));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}
?>