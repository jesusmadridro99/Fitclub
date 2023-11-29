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
    <legend class="mt-2" style="margin-left:15%; font-size:40px">Tus Pedidos</legend>
    <hr style="width:95%;">
    <br>
    
    <?php 
    
    if(count($pedidoSistemas) == 0){ ?>
        
        <span style="margin-left:15%">Todavia no has realizado ningún pedido.</span>


    <?php }
    else{
        foreach ($pedidoSistemas as $pedido) { ?>
    <h4 style="margin-left:20%">Pedido número
            <?php echo $pedido["cod_pedido"]; ?>  |  
            <?php echo $pedido["fecha"]; ?>
    </h4>    
        <div style="border:1px solid grey;border-radius:10px;margin:0 20% 10% 20%;padding-top:1%">
        
            <?php
            $total = 0;
            $pedido_productoSistemas = findIdPedidoProducto($pedido["cod_pedido"]);
            foreach ($pedido_productoSistemas as $pedido_producto) { ?>
                <div >
                    <?php $productos = findIdProducto($pedido_producto["cod_producto"]);
                    
                    foreach($productos as $producto){
                    ?>

                    <div style="padding-bottom:5%;">

                        <div style="display:inline-block;
                    height:150px;
                    width:150px;
                    float:left;
                    border-radius:10px;
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
                        </b><br><br>
                        <span>Cantidad: </span>
                        <?php echo $pedido_producto['cantidad_producto']; 
                        $total += $producto["precio"] * $pedido_producto['cantidad_producto'];;
                        ?>
                        
                        <br>

                    </div>

                <?php } ?>
                
                <hr style="width:95%;margin-left:2%">
                
                    </div>
                <?php   }?>
        </div>
    <?php  } }?>






</body>

</html>