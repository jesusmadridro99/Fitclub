<!-- Div con el contenido de cada producto -->
<div class="card border-primary mb-3 div_pro_2" style="width:250px;">

    <div class="card-header">
        <?php echo $producto['nombre']; ?>
    </div>

    <!-- Imagen -->
    <div class="card-body" style="background-color:rgb(253, 237, 237)">
        <div style="background-image:url(<?php echo $producto['imagen'] ?>);" class="img_producto" >
        </div>
        <hr>

        <b>
            <?php echo $producto["precio"] ?> €
        </b>

        <!-- Valoraciones -->
        <?php if (isset($_SESSION["rol"])) { ?>
            <div class="val">
            <span style="font-size:13px;float:right; margin-left:5px"><?php echo '('.$producto["valoraciones_totales"].')' ?></span>
                <?php
                if ($producto["valoraciones_totales"] == 0) { ?>
                    <span style="float:right; padding-left:5px"> N/A </span>
                <?php } else {
                    $val = $producto["val_num"] / $producto["valoraciones_totales"]; ?>
                    <span style="float:right; padding-left:5px">
                        <?php echo round($val, 1); ?>
                    </span>
                <?php } ?>
                
                <span class="clasificacion">
                    <input id="cinco_<?php echo $producto['cod_producto']; ?>" type="radio" name="estrellas"
                        onclick="valorar(<?php echo $producto['cod_producto']; ?>, 5)">
                    <label for="cinco_<?php echo $producto['cod_producto']; ?>">★</label>
                    <input id="cuatro_<?php echo $producto['cod_producto']; ?>" type="radio" name="estrellas"
                        onclick="valorar(<?php echo $producto['cod_producto']; ?>, 4)">
                    <label for="cuatro_<?php echo $producto['cod_producto']; ?>">★</label>
                    <input id="tres_<?php echo $producto['cod_producto']; ?>" type="radio" name="estrellas"
                        onclick="valorar(<?php echo $producto['cod_producto']; ?>, 3)">
                    <label for="tres_<?php echo $producto['cod_producto']; ?>">★</label>
                    <input id="dos_<?php echo $producto['cod_producto']; ?>" type="radio" name="estrellas"
                        onclick="valorar(<?php echo $producto['cod_producto']; ?>, 2)">
                    <label for="dos_<?php echo $producto['cod_producto']; ?>">★</label>
                    <input id="uno_<?php echo $producto['cod_producto']; ?>" type="radio" name="estrellas"
                        onclick="valorar(<?php echo $producto['cod_producto']; ?>, 1)">
                    <label for="uno_<?php echo $producto['cod_producto']; ?>">★</label>
                </span>
                
            </div>
            
        <?php }


        if (isset($_SESSION['rol'])) { ?>
            <hr>
            <?php if ($_SESSION["rol"] == "usuario") { ?>

                <span>Cantidad: </span>
                <!-- Cantidad -->
                <select id="cantidad_<?php echo $producto['cod_producto']; ?>">
                    <?php
                    $i = 1;
                    for ($i = 1; $i <= 30; $i++) { ?>
                        <option value="<?php echo $i ?>">
                            <?php echo $i ?>
                        </option>
                    <?php } ?>
                </select>

                <br><br>

                <!-- Botones -->
                <button class="btn btn-lg btn-primary" style="font-size:15px;" type="button"
                    onclick="agregarAlCarrito('<?php echo $producto['cod_producto']; ?>')">Añadir al carrito</button>

            <?php }
            if ($_SESSION['rol'] == 'admin') { ?>

                <a class="btn btn-primary botonDiv"
                    href="javascript: comprobarEliminar(<?php echo $producto['cod_producto'] ?>)">Borrar</a>

                <a name="modificar" class="btn btn-primary botonDiv" data-bs-toggle="modal"
                    data-bs-target="#modalModificarProducto" cod="<?php echo $producto['cod_producto']; ?>">Modificar</a>

            <?php }
        }
        ?>

    </div>
</div>



<script>


    //Nos envia a ListarProducto.php con el producto y la cantidad para agregarlo al carrito.
    function agregarAlCarrito(cod_producto) {
        var cantidadSeleccionada = document.getElementById("cantidad_" + cod_producto).value;
        var urlBase = "ListarProducto.php?carrito=" + cod_producto + "&cantidad=";
        var urlCompleta = urlBase + cantidadSeleccionada;
        window.location.href = urlCompleta;
    }


    //Nos envia a Valorar.php con el producto y el valor.
    function valorar(producto, val) {
        window.location.href = 'Valorar.php?idProducto=' + producto + '&val=' + val;
    }



    //Manda el cod_producto a un input hidden del modal modalModificarProducto.
    function enviarCodProducto(cod_producto) {
        document.getElementById('cod').value = cod_producto;
    }
    document.addEventListener('DOMContentLoaded', function () {
        var botonModificar = document.querySelectorAll('[name="modificar"]');
        botonModificar.forEach(function (button) {
            button.addEventListener('click', function () {
                var cod_producto = this.getAttribute('cod');
                enviarCodProducto(cod_producto);
            });
        });
    });


</script>