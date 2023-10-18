<?php

include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/CategoriaRepository.php");
include("../../Utiles/Includes/Header.php");





$categoriaSistemas = findAllCategoria();

if (isset($_GET["orden"])) {
    if ($_GET['orden'] == "alfaAZ") {
        $orden = "nombre ASC";
    }
    else if ($_GET['orden'] == "alfaZA") {
        $orden = "nombre DESC";
    }

    else if ($_GET['orden'] == "precio<>") {
        $orden = "precio ASC";
    }

    else if ($_GET['orden'] == "precio><") {
        $orden = "precio DESC";
    }

    else {
        $orden = "nombre ASC";
    }
    
}else{
    $_SESSION['productos'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub - Productos</title>

    <link rel="stylesheet" href="../../Utiles/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../Utiles/css/Fitclub.css">

    <style>
        body {
            font-family: 'Roboto Condensed';
        }
    </style>
</head>

<body>


    <legend class="mt-2" style="padding-left:15%; font-size:40px">Productos</legend>
    <hr style="width:95%;">
    <br>

    <div class="div_pro_1">
        <form action="listarProducto.php" method="POST">
            <fieldset class="form-group">
                <legend class="mt-4">Categorias</legend>
                <hr>
                <?php foreach ($categoriaSistemas as $categoria) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $categoria['cod_cat']; ?>"
                            name="check[]">
                        <label class="form-check-label" for="check">
                            <?php echo $categoria['nombre']; ?>
                        </label>
                    </div>
                <?php } ?>
                <br>
                <input type="submit" class="btn btn-primary" style="font-size:17px" value="Buscar" />
            </fieldset>
        </form>
    </div>


    <div style="float:right">
        <div class="dropdown">
            <button class="btn btn-dark" style="margin-right: 100px">Ordenar por:</button>
            <div class="dropdown-content">
                <a href="ListarProducto.php?orden=alfaAZ">Nombre, A a Z</a>
                <a href="ListarProducto.php?orden=alfaZA">Nombre, Z a A</a>
                <a href="ListarProducto.php?orden=precio<>">Precio: de más bajo a más alto</a>
                <a href="ListarProducto.php?orden=precio><">Precio: de más alto a más bajo</a>
                <a href="ListarProducto.php?orden=relevancia">Relevancia</a>
            </div>
        </div>
    </div>

    <br>
    <br>


    <div>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $_POST['check'] = [];
            foreach ($categoriaSistemas as $cat) {
                array_push($_POST['check'], $cat['cod_cat']);
            }
        }
        

        if (isset($_GET["orden"])) {

            $productoSistemas = findProductoByIDOrdered($_SESSION['productos'], $orden);
            
            foreach ($productoSistemas as $producto) {
                
                ?>

                <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                    <div class="card-header">
                        <?php echo $producto['nombre']; ?>
                    </div>
                    <div class="card-body" style="background-color:rgb(253, 237, 237)">
                        <div style="height:200px;
                                    width:200px;
                                        background-image:url(<?php echo $producto['imagen'] ?>);
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        margin:5px;">
                        </div>
                        <hr>
                        <h6 class="card-title">
                            <?php echo $producto['precio'] ?> €
                        </h6>

                        <?php if (isset($_SESSION['rol'])) { ?>
                            <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                                onclick="carrito()">Comprar</button>
                            <br>
                            <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                                lista</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }

        } else {
            

            /*-------------------------------------------------------------------------------------*/

            $i = 0;
            foreach ($_POST['check'] as $seleccion) {

                $productoSistemas = findProductoByCategoria($seleccion);
            
                foreach ($productoSistemas as $producto) {
                    $_SESSION['productos'][$i] = $producto["cod_producto"];
                    $i += 1;

            /* ------------------------------------------------------------------------------------*/
                    
                    ?>

                   
                <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                    <div class="card-header">
                        <?php echo $producto['nombre']; ?>
                    </div>
                    <div class="card-body" style="background-color:rgb(253, 237, 237)">
                        <div style="height:200px;
                                    width:200px;
                                        background-image:url(<?php echo $producto['imagen'] ?>);
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        margin:5px;">
                        </div>
                        <hr>
                        <h6 class="card-title">
                            <?php echo $producto['precio'] ?> €
                        </h6>

                        <?php if (isset($_SESSION['rol'])) { ?>
                            <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                                onclick="carrito()">Comprar</button>
                            <br>
                            <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                                lista</button>
                        <?php } ?>
                    </div>
                </div>
                </div>
            <?php }
            
            }
        }

        ?>

    <script>
        function carrito() {
            alert('Producto añadido al carrito');
        }
    </script>


</body>

</html>