<!-- Div con el contenido de cada producto -->
<div class="card border-primary mb-3 div_pro_2" style="width:250px;">

    <div class="card-header">
        <?php echo $producto['nombre']; ?>
    </div>
    <div class="card-body" style="background-color:rgb(253, 237, 237)">
        <div style="height:200px;
                    border-radius:10px;
                    width:200px;
                    background-image:url(<?php echo $producto['imagen'] ?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    margin:5px;">
        </div>
        <hr>

        <b>
            <?php echo $producto["precio"] ?> €
        </b>

        <div class="val">
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
        <?php if (isset($_SESSION['rol'])) { ?>
            <hr>
            <?php if ($_SESSION["rol"] == "usuario") { ?>

                <span>Cantidad: </span>

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

                <button class="btn btn-lg btn-primary" style="font-size:15px;" type="button"
                    onclick="agregarAlCarrito('<?php echo $producto['cod_producto']; ?>')">Añadir al carrito</button>

            <?php }
            if ($_SESSION['rol'] == 'admin') { ?>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: comprobarEliminar(<?php echo $producto['cod_producto'] ?>)">Borrar</a>

                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                    href="javascript: modificar(<?php echo $producto['cod_producto'] ?>)">Modificar</a>

            <?php }
        }
        ?>

    </div>
</div>

<script>
    function agregarAlCarrito(cod_producto) {
        var cantidadSeleccionada = document.getElementById("cantidad_" + cod_producto).value;
        var urlBase = "ListarProducto.php?carrito=" + cod_producto + "&cantidad=";
        var urlCompleta = urlBase + cantidadSeleccionada;
        window.location.href = urlCompleta;
    }



    function valorar(producto, val) {
        window.location.href = 'Valorar.php?idProducto=' + producto + '&val=' + val;
    }



</script>