<?php

include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/CategoriaRepository.php");
include("../../Utiles/Includes/Header.php");
include("../modales.php");



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

<body>

    <legend class="mt-2" style="margin-left:15%; font-size:40px">Productos</legend>

    <?php
    if (isset($_SESSION["rol"])) {
        if ($_SESSION['rol'] == 'admin'){ ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearProducto"
            style="margin-left:15%">Crear</button>
    <?php }} ?>
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
            include("producto.php");
        }

    } else {
        $i = 0;
        foreach ($_POST['check'] as $seleccion) {
            $productoSistemas = findProductoByCategoria($seleccion);
            foreach ($productoSistemas as $producto) {
                $_SESSION['productos'][$i] = $producto["cod_producto"];
                $i += 1;
                include("producto.php");
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