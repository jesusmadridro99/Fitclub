<div style="overflow:hidden">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header" style="background-color:rgb(253, 237, 237)">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel">Carrito</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div style="overflow:auto">
            <?php
            $total = 0;

            //Listamos los productos
            foreach ($_SESSION["carrito"] as $keyProducto => $cantidadProducto) {
                $producto = findIdProducto($keyProducto);
                $producto = $producto->fetch(PDO::FETCH_ASSOC);
                ?>
                <br>
                <form action="" method="POST">
                    <div style="margin:5px 5px">

                        <div class="divImg" style=" background-image:url(<?php echo $producto['imagen'] ?>);">
                        </div>
                        <br>
                        <span>
                            <?php echo $producto['nombre'] ?>
                        </span><br>
                        <b>
                            <?php echo $producto['precio'] ?> €
                        </b><br>
                        <span>Cantidad: </span>

                        <?php echo $cantidadProducto; ?>
                        <br>
                        <a
                            href="/Fitclub/Vistas-Controlador/Pedido/QuitarCarrito.php?idProducto=<?php echo $producto['cod_producto'] ?>">Quitar</a>
                    </div>

                    <hr style="margin: 0 auto; width:80%;">

                </form>
                <?php
                $total += $producto["precio"] * $cantidadProducto;
            }
            ?>
            <br>

            <!-- Mostramos el total del precio de los productos -->
            <?php if ($total > 0) { ?>
                <div class="offcanvas-header" style="background-color:rgb(253, 237, 237)">
                    <h4>Total: <span id="total">
                            <?php echo $total; ?>
                        </span> €</h4>
                    <a style="float:right;margin-right:10px" class="btn btn-primary"
                        href="/Fitclub/Vistas-Controlador/Pedido/ComprarPedido.php">Pagar</a>
                </div>
            <?php } else { ?>
                <p style="margin-left:5%">No tienes ningún producto en el carrito</p>
            <?php } ?>

            <br>
            <br>

        </div>

    </div>
</div>