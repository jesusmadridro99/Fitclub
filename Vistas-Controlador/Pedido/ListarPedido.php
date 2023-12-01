<?php


include("../../Repositorio/PedidoRepository.php");
include("../../Utiles/Includes/Header.php");


$user = findOneByCorreoUser($_SESSION["correo"])["cod_usu"];
$pedidoSistemas = findAllPedidoByUser($user);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <br>
    <legend class="mt-2 titulo">Tus Pedidos</legend>
    <hr style="width:95%;">
    <br>

    <?php

    if (count($pedidoSistemas) == 0) { ?>

        <span style="margin-left:15%">Todavia no has realizado ningún pedido.</span>


    <?php } else {

        //Listamos los pedidos
        foreach ($pedidoSistemas as $pedido) { ?>
            <h4 style="margin-left:20%">Pedido número
                <?php echo $pedido["cod_pedido"]; ?> |
                <?php echo $pedido["fecha"]; ?>
            </h4>
            <div class="divPedido">

                <?php
                $total = 0;
                $pedido_productoSistemas = findIdPedidoProducto($pedido["cod_pedido"]);

                //Listamos los productos de cadd pedido
                foreach ($pedido_productoSistemas as $pedido_producto) { ?>
                    <div>
                        <?php $productos = findIdProducto($pedido_producto["cod_producto"]);

                        foreach ($productos as $producto) {
                            ?>

                            <div style="padding-bottom:5%;">

                                <div class="divImg" style="background-image:url(<?php echo $producto['imagen'] ?>); ">
                                </div>
                                <br>
                                <span>
                                    <?php echo $producto['nombre'] ?>
                                </span>
                                <br>
                                <b>
                                    <?php echo $producto['precio'] ?> €
                                </b><br><br>
                                <span>Cantidad: </span>
                                <?php echo $pedido_producto['cantidad_producto'];
                                ?>

                                <br>

                            </div>

                        <?php } ?>

                        <hr style="width:95%;margin-left:2%">

                    </div>
                <?php } ?>
            </div>
        <?php }
    } ?>


</body>

</html>