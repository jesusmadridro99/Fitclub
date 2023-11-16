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

function updateRutina($rutina, $correo) {
    $sqlUpdateRutina = "UPDATE usuario set rutina = ?  where correo = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlUpdateRutina);
        $result->execute(array($rutina, $correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

}

function asignarEjercicio($cod_usu, $ejercicio) {
    $sqlCrear = "INSERT INTO usuario_ejercicio(cod_usu, cod_ejercicio)VALUES (?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($cod_usu, $ejercicio));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    
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

function findEjercicioByUsuario($usuario, $ejercicio)
{
    $sqlFindEj = "SELECT * FROM usuario_ejercicio where cod_usu = ? and cod_ejercicio = ?";
    $encuentra = false;
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($usuario, $ejercicio));
         if($result->rowCount() == 1 ){
            $encuentra = true;
         }
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        
    }

    return $encuentra;
}



function quitarEjercicio($usuario,$ejercicio){
    
    $sqlQuitar = "DELETE FROM usuario_ejercicio where cod_usu = ? and cod_ejercicio = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlQuitar);
        $result->execute(array($usuario,$ejercicio));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
    }

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