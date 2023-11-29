<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function crearMensaje($asunto, $cuerpo, $remitente, $destinatario, $fecha) {
    $sqlCrear = "INSERT INTO mensaje(asunto, cuerpo, remitente, destinatario, fecha)
    VALUES (?, ?, ?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($asunto, $cuerpo, $remitente, $destinatario, $fecha));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
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
function findRecibidoMensajeByUser($idUserLogin) {
    $sqlFindAllByUser = "SELECT * FROM mensaje WHERE destinatario = ? ORDER BY fecha DESC";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindAllByUser);
        $result->execute(array($idUserLogin));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}




// Consulta con todos los mensajes enviados o recibidos
function findEnviadoMensajeByUser($idUserLogin) {
    
    $sqlFindEnviadoByUser = "SELECT * FROM mensaje WHERE remitente = ? ORDER BY fecha DESC";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEnviadoByUser);
        $result->execute(array($idUserLogin));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
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