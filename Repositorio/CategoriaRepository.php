<?php
include __DIR__ . '../../Utiles/ConectarBD.php';


//Crear categoria
function crearCategoria($nombre, $descripcion) {
    $sqlCrear = "INSERT INTO categoria(nombre, descripcion) 
        VALUES (?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($sqlCrear);
        $result->execute(array($nombre, $descripcion,));
    } catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }
}




//Buscar todas las categorias
function findAllCategoria() {
    $sqlFindAll = "SELECT * FROM categoria";

    try {
        $result = $GLOBALS["bd"]->query($sqlFindAll);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: /Fitclub/Vistas-Controlador/Error.html");
    }

    return $result;
}




