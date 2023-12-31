<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


//Crear plato
function crearPlato($nombre, $descripcion,$imc, $imagen) {
    $sqlCrear = "INSERT INTO plato(nombre, descripcion, imc, imagen) 
        VALUES (?, ?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombre, $descripcion, $imc, $imagen));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}



//Buscar plato por IMC
function findPlatoByIMC($correo)
{
    $sqlFindEj = "SELECT * FROM plato where imc IN(SELECT imc FROM usuario WHERE correo = ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($correo));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}



//Seleccionamos los datos de los platos que tiene asignado un usuario
function findPlatoByUsuarioPlan($usuario){
    $sqlFindEj = "SELECT * FROM plato WHERE cod_plato in (SELECT cod_plato from usuario_plato WHERE cod_usu = ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($usuario));
        
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        
    }

    return $result;
}



//Asignar plato a un usuario
function asignarPlato($cod_usu, $plato) {
    $sqlCrear = "INSERT INTO usuario_plato(cod_usu, cod_plato)VALUES (?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($cod_usu, $plato));
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
    }

    
}



//Buscamos si un plato esta asignado a un usuario y devolvemos si lo encuetra
function findPlatoByUsuario($usuario, $plato)
{
    $sqlFindEj = "SELECT * FROM usuario_plato where cod_usu = ? and cod_plato = ?";
    $encuentra = false;
    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindEj);
        $result->execute(array($usuario, $plato));
         if($result->rowCount() == 1 ){
            $encuentra = true;
         }
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        
    }

    return $encuentra;
}



//Quitar plato de la dieta de un usuario
function quitarPlato($usuario,$plato){
    
    $sqlQuitar = "DELETE FROM usuario_plato where cod_usu = ? and cod_plato = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlQuitar);
        $result->execute(array($usuario,$plato));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
    }

}



//Buscar todos los platos
function findAllPlato()
{
    $sqlFindAll = "SELECT * FROM plato";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}



//Buscar plato por id
function findPlatoByCod($plato)
{
    $sqlFindPlato = "SELECT * FROM plato WHERE cod_plato = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlFindPlato);
        $result->execute(array($plato));
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $res;
}



//Borrar plato
function deletePlato($plato) {
    $sqlDeletePlato = "DELETE FROM plato where cod_plato = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($sqlDeletePlato);
        $result->execute(array($plato));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}