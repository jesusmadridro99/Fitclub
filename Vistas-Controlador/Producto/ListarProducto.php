<?php

$modificar = false;


include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/CategoriaRepository.php");
include("../../Utiles/Includes/Header.php");


$categoriaSistemas = findAllCategoria();


if (isset($_GET["orden"])) {
    if ($_GET['orden'] == "alfaAZ") {
        $orden = "nombre ASC";
    } else if ($_GET['orden'] == "alfaZA") {
        $orden = "nombre DESC";
    } else if ($_GET['orden'] == "precio<>") {
        $orden = "precio ASC";
    } else if ($_GET['orden'] == "precio><") {
        $orden = "precio DESC";
    } else {
        $orden = "nombre ASC";
    }

} else {
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
    <?php
    if ($_SESSION['rol'] == 'admin') { ?>
        <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Crear</button>
        <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Borrar</button>
    <?php } ?>
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
            <button class="btn btn-dark" style="margin-right: 100px;">Ordenar por:</button>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="CrearActualizarProducto.php" method="POST">

                        <label for="nombre">Nombre: </label>
                        <input id="nombre" class="form-control" required type="text" name="nombre" value="<?php if (isset($nombre))
                            echo $nombre; ?>" /><br>

                        <label for="descripcion">Descripción: </label>
                        <input id="descripcion" class="form-control" required type="text" name="descripcion" value="<?php if (isset($descripcion))
                            echo $descripcion; ?>" /><br>

                        <label for="precio">Precio: </label>
                        <input id="precio" class="form-control" required type="number" name="precio" value="<?php if (isset($precio))
                            echo $precio; ?>" /><br>

                        <label for="imagen">Imagen URL: </label>
                        <input id="imagen" class="form-control" required type="text" name="imagen" value="<?php if (isset($imagen))
                            echo $imagen; ?>" /><br>
                        <label for="imagen2">Imagen URLaaa: </label>
                        <input id="imagen2" class="form-control" required type="text" name="imagen" /><br>

                        <label for="cod_cat">Categoria: </label>
                        <select name="cod_cat">
                            <?php foreach ($categoriaSistemas as $categoria) { ?>
                                <option value="<?php echo $categoria["cod_cat"] ?>">
                                    <?php echo $categoria["nombre"] ?>
                                </option>
                            <?php } ?>
                        </select>

                        <?php if (isset($_GET["mod"])) { ?>
                            <input id="cod_producto" class="form-control" required type="text" name="cod_producto"
                                value="<?php $producto['cod_producto'] ?>" /><br>

                        <?php } ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                </form>

            </div>
        </div>
    </div>



    <?php

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $_POST['check'] = [];
        foreach ($categoriaSistemas as $cat) {
            array_push($_POST['check'], $cat['cod_cat']);
        }
    }

    if (isset($_GET["orden"])) {
        $productoSistemas = findProductoByIDOrdered($_SESSION['productos'], $orden);
        foreach ($productoSistemas as $producto) { ?>
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
                        <?php echo $producto["precio"] ?> €
                    </h6>

                    <?php if (isset($_SESSION['rol'])) {

                        ?>

                        <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                            onclick="carrito()">Comprar</button>
                        <br>
                        <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                            lista</button>

                        <?php if ($_SESSION['rol'] == 'admin') {
                            ?>
                            <p>
                            </p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarModal">
                                Launch demo modal
                            </button>


                            <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                href="javascript: comprobarEliminar(<?php echo $producto['cod_producto'] ?>)">Borrar</a>
                        <?php }
                    }
                    ?>

                </div>
            </div>

        <?php }

    } else {
        $i = 0;
        foreach ($_POST['check'] as $seleccion) {
            $productoSistemas = findProductoByCategoria($seleccion);
            foreach ($productoSistemas as $producto) {
                $_SESSION['productos'][$i] = $producto["cod_producto"];
                $i += 1; ?>
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
                            <?php echo $producto["precio"] ?> €
                        </h6>


                        <?php if (isset($_SESSION['rol'])) {

                            ?>

                            <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                                onclick="carrito()">Comprar</button>
                            <br>
                            <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                                lista</button>

                            <?php if ($_SESSION['rol'] == 'admin') { ?>

                                <p>

                                </p>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarModal">
                                    Launch demo modal
                                </button>
                                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                    href="javascript: comprobarEliminar(<?php echo $producto['cod_producto'] ?>)">Borrar</a>

                                </button>
                                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                    href="javascript: modificar(<?php echo $producto['cod_producto'] ?>)">Mod</a>
                            <?php }
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
        }
    }

    ?>

    <script>
        function carrito() {
            alert('Producto añadido al carrito');

        }

    </script>
    <script src="../../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        function comprobarEliminar($cod_producto) {
            if (confirm("¿Seguro que quiere eliminar el producto?")) {
                window.location.href = "BorrarProducto.php?id=" + $cod_producto;
            }
        }
    </script>

    <script>
        var modal = document.getElementById("exampleModal");
        function modificar($cod_producto) {
            var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                keyboard: false
                
            });

            exampleModal._element.setAttribute('data-cod-producto', $cod_producto);


            exampleModal.show();
        }

        var exampleModal = document.getElementById('exampleModal');
        var imagen2 = exampleModal.querySelector('#imagen2');

        exampleModal.addEventListener('show.bs.modal', function () {
        var cod_producto = exampleModal.getAttribute('data-cod-producto');
        imagen2.textContent = cod_producto;
});



        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>