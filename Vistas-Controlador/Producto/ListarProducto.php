<?php

include("../../Repositorio/CategoriaRepository.php");
$categoriaSistemas = findAllCategoria();
include("../../Utiles/Includes/Header.php");
include("../modales.php");



//Metemos el producto en el carrito
if (isset($_GET["carrito"])) {
    $idProducto = $_GET["carrito"];
    $cantidad = $_GET["cantidad"];
    $_SESSION["carrito"][$idProducto] = $cantidad;
}



//Asignamos el oden de los productos mostrados
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

//Vaciamos la variable de sesion para que no se nos muestren los que ya estan mostrandose.
//Mirar lineas 127 a 155
} else {
    $_SESSION['productos'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>

.val{
    float:right;
}


        span.clasificacion {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

span.clasificacion input {
  position: absolute;
  top: -100px;
}

span.clasificacion label {
  float: right;
  color: #333;
}

span.clasificacion label:hover,
span.clasificacion label:hover ~ label,
span.clasificacion input:checked ~ label {
  color: #dd4;
}
        </style>
</head>

<body>

    <head>

    </head>
    <br>
    <legend class="mt-2" style="margin-left:15%; font-size:40px">Productos</legend>

    <?php

    //Boton de crear produto
    if (isset($_SESSION["rol"])) {
        if ($_SESSION['rol'] == 'admin') { ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearProducto"
                style="margin-left:15%">Crear</button>
        <?php }
    } ?>
    <hr style="width:95%;">
    <br>



    <!-- Check de categorias -->
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


    <!-- Dropdown del orden de los productos -->
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


    <!-- Div del producto -->
    <div style="">
        <?php

        //Si no elegimos categoria en el checkbox vaciamos el array del check y metemos en 
//ese mismo array todos los codigos de categoria
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $_POST['check'] = [];
            foreach ($categoriaSistemas as $cat) {
                array_push($_POST['check'], $cat['cod_cat']);
            }
        }


        //Ordenamos los productos mostrados que estan almacenados en $_SESSION["productos"]
        if (isset($_GET["orden"])) {
            $productoSistemas = findProductoByIDOrdered($_SESSION['productos'], $orden);
            foreach ($productoSistemas as $producto) {
                include("producto.php");
            }



        } else if (!isset($_POST["cantidad"])) {
            $i = 0;

            //Mostramos los productos segun el input "search" del header y los 
            //almacenamos en $_SESSION["productos"] para que si queremos ordenarlos
//se nos muestren los productos de las categorias seleccionadas
            if (isset($_POST["buscar"])) {
                $productoSistemas = findProductoByNombre($_POST["buscar"]);
                if ($productoSistemas->Rowcount() == 0) {
                    echo "No se han encontrado productos";
                } else {
                    foreach ($productoSistemas as $producto) {
                        $_SESSION['productos'][$i] = $producto["cod_producto"];
                        $i += 1;
                        include("producto.php");
                    }
                }
            } else {

                //Mostramos los productos de las categorias seleccionadas en el checkbox
//y los almacenamos en $_SESSION["productos"] para que si queremos ordenarlos
//se nos muestren los productos de las categorias seleccionadas
                foreach ($_POST['check'] as $seleccion) {
                    $productoSistemas = findProductoByCategoria($seleccion);
                    foreach ($productoSistemas as $producto) {
                        $_SESSION['productos'][$i] = $producto["cod_producto"];
                        $i += 1;
                        include("producto.php");
                    }
                }
            }
        }



        ?>

    </div>


    <script src="../../Utiles/Includes/javascript.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        function comprobarEliminar($cod_producto) {
            if (confirm("¿Seguro que quiere eliminar el producto?")) {
                window.location.href = "BorrarProducto.php?id=" + $cod_producto;
            }
        }

        var modal = document.getElementById("modalModificar");
        var modalModificar = document.getElementById('modalModificar');

        function modificar(cod_producto) {

            $.ajax({
                type: "POST",
                url: "guardarProducto.php",
                data: { codProducto: cod_producto }
            });

            var modalModificar = new bootstrap.Modal(document.getElementById('modalModificar'), { keyboard: false });
            modalModificar.show();
        }

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";

            }
        }


    </script>


</body>

</html>