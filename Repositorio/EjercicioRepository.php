<?php
include __DIR__ . '../../Utiles/ConectarBD.php';

function findEjercicioByIMC($correo)
{
    $sqlFindEj = "SELECT * FROM ejercicio where imc IN(SELECT imc FROM usuario WHERE correo = ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function asignarEjercicio($correo, $ejercicio) {
    $sqlCrear = "INSERT INTO usuario_ejercicio(correo, cod_ejercicio)VALUES (?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($correo, $ejercicio));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findPlatoByIMC($correo)
{
    $sqlFindPlato = "SELECT * FROM plato where imc IN(SELECT imc FROM usuario WHERE correo = ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindPlato);
        $result->execute(array($correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}

function findAllEjercicio()
{
    $sqlFindAll = "SELECT * FROM ejercicio";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}


function findImcByUser($correo)
{
    $sqlFindImc = "SELECT imc FROM usuario WHERE correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindImc);
        $result->execute(array($correo));
        return $result;

    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}

function updateImc($imc, $correo)
{
    $sqlUpdateImc = "UPDATE usuario set imc = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateImc);
        $result->execute(array($imc, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}


function updateEdad($edad, $correo)
{
    $sqlUpdateEdad = "UPDATE usuario set edad = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateEdad);
        $result->execute(array($edad, $correo));
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Fitclub.php");
    }
}


function addEjercicioToUsuario($usuario, $ejercicio)
{
    $sqlAddEj = "INSERT INTO usuario_ejercicio (cod_usu, cod_ejercicio) VALUES (?,?);";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlAddEj);
        $result->execute(array($usuario, $ejercicio));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}