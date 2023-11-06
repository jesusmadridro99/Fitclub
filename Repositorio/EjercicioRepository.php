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


