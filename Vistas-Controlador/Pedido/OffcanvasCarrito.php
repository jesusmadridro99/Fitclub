<div style="overflow:hidden">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header" style="background-color:rgb(253, 237, 237)">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel">Carrito</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div style="overflow:hidden" class="overflow-scroll">
            <?php
            $total = 0;

            foreach ($_SESSION["carrito"] as $keyProducto => $cantidadProducto) {
                $producto = findIdProducto($keyProducto);
                $producto = $producto->fetch(PDO::FETCH_ASSOC);
                ?>
                <br>
                <form action="" method="POST">
                    <div style="margin:5px 5px">

                        <div style="display:inline-block;
                            height:150px;
                            float:left;
                            border-radius:10px;
                            width:150px;
                            background-image:url(<?php echo $producto['imagen'] ?>);
                            background-size: cover;
                            background-repeat: no-repeat;
                            margin:5px;">
                        </div>
                        <br>
                        <span>
                            <?php echo $producto['nombre'] ?>
                        </span><br>
                        <b>
                            <?php echo $producto['precio'] ?> €
                        </b><br>
                        <span>Cantidad: </span>

                        <select id="cantidad_<?php echo $keyProducto; ?>" data-precio="<?php echo $producto['precio']; ?>">
                            <?php
                            $i = 1;
                            for ($i = 1; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i ?>" <?php echo ($i == $cantidadProducto) ? 'selected' : ''; ?>>
                                    <?php echo $i ?>
                                </option>
                            <?php } ?>
                        </select>
                        <br>
                        <a href="/Fitclub/Vistas-Controlador/Pedido/QuitarCarrito.php?idProducto=<?php echo $producto['cod_producto'] ?>">Quitar</a>
                    </div>

                    <hr style="margin: 0 auto; width:80%;">

                </form>
                <?php
                $total += $producto["precio"] * $cantidadProducto;
            }
            ?>
            <br>
            <?php if ($total > 0) { ?>
                <div class="offcanvas-header" style="background-color:rgb(253, 237, 237)">
                    <h4>Total: <span id="total"><?php echo $total; ?></span> €</h4>
                    <a style="float:right;margin-right:10px" class="btn btn-primary" href="/Fitclub/Vistas-Controlador/Pedido/ComprarPedido.php">Pagar</a>
                </div>
            <?php } else { ?>
                <p>No tienes ningún producto en el carrito</p>
            <?php } ?>

            <br>
            <br>

        </div>

    </div>
</div>

<script>
    var selectElements = document.querySelectorAll('select');

    selectElements.forEach(function(select) {
        select.addEventListener('change', function() {
            actualizarTotal();
        });
    });

    function actualizarTotal() {
        var total = 0;

        selectElements.forEach(function(select) {
            var cantidadSeleccionada = select.value;
            var precioProducto = select.getAttribute('data-precio');
            total += cantidadSeleccionada * precioProducto;
        });

        // Actualizar el total en el DOM
        document.getElementById('total').innerHTML = total;

        console.log('Nuevo total: ' + total); // Puedes mostrar el total en la consola según tus necesidades
    }
</script>