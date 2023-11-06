
<?php
ob_start();

// Cargamos consultas del repositorio
include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/CategoriaRepository.php");


//Errores
/*$errorNombreExistente = false;

if (!isset($_SESSION["rol"]) ) {
    header("Location:../Fitclub.php");
}*/

$categoriasDisponibles = findAllCategoria();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];
    $cod_cat = $_POST["cod_cat"];
    
    


    // Comprobamos si se pasa un id mediante URL para crear o actualizar el producto.
    if (!isset($_POST["cod_producto"])) {
        $result = findNombreProducto($nombre);
        if ($result->rowCount() == 0) {
            crearProducto($nombre, $descripcion, $precio, $imagen, $cod_cat);
            header("Location: ListarProducto.php");
        } else {
            $errorNombreExistente = true;
        }
    } else {
        
        
        /*$result = findNombreIDProducto($nombre, $cod_producto);*/
        /*if ($result->rowCount() == 0) {*/
            
            updateProducto($cod_producto, $descripcion, $precio, $nombre, $imagen, $cod_cat);
        /*} else {
            $errorNombreExistente = true;
        }    */    
    }
}

// Se comprueba si existe id en la url + si se ha pulsado el boton de submit 
// (Para recargar los datos o no en caso de fallo)
if (isset($_GET["id"]) && !isset($_REQUEST["submit"])) {
    $idProducto = $_GET["id"];

    $res = findIdProducto($idProducto);

    if ($res->rowCount() == 0) {
        header("Location:../Fitclub.php");
    } else {
        $producto = $res->fetch(PDO::FETCH_ASSOC);

        $nombre = $producto["nombre"];
        $descripcion = $producto["descripcion"];
        $precio = $producto["precio"];
        $imagen = $producto["imagen"];  
        $cod_at = $producto["codCat"];
    }
    
}

//header("Location:ListarProducto.php");

ob_end_flush();
?>

