<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


function crearEjercicio($nombre, $descripcion,$imc) {
    $sqlCrear = "INSERT INTO ejercicio(nombre, descripcion, imc) 
        VALUES (?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombre, $descripcion, $imc));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}


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

function findEjercicioByUsuarioPlan($usuario){
    $sqlFindEj = "SELECT * FROM ejercicio WHERE cod_ejercicio in (SELECT cod_ejercicio from usuario_ejercicio WHERE cod_usu = ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($usuario));
        
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        
    }

    return $result;
}



function asignarEjercicio($cod_usu, $ejercicio) {
    $sqlCrear = "INSERT INTO usuario_ejercicio(cod_usu, cod_ejercicio)VALUES (?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($cod_usu, $ejercicio));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
    }

    
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


function deleteEjercicio($ejercicio) {
    $sqlDeleteEjercicio = "DELETE FROM ejercicio where cod_ejercicio = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeleteEjercicio);
        $result->execute(array($ejercicio));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}