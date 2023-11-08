<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function findEjercicioByIMC($imc) {
    $sqlFindEj = "SELECT * FROM ejercicio where imc = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($imc));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}


function updateImc($imc, $correo) {
    $sqlUpdateImc = "UPDATE usuario set imc = ?,  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateImc);
        $result->execute(array($imc, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}