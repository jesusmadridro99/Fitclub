<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


//Crear mensaje
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



// Consulta con todos los mensajes por destinatario
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




// Consulta con todos los mensajes por remitente
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


?>