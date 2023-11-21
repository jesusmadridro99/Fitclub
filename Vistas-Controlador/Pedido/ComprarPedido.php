<?php
include("../../Repositorio/PedidoRepository.php");
include("../../Repositorio/ProductoRepository.php");
include("../../Repositorio/UsuarioRepository.php");

session_start();

$carrito = $_SESSION["carrito"];
$cod_usu = findByCorreoUsuario($_SESSION["correo"])["cod_usu"];
$usu_pedidos = findByCorreoUsuario($_SESSION["correo"])["n_pedidos"] + 1;
$cod_pedido = crearCodigoPedido();
$fecha = date("Y-m-d");

// Se crea pedido
crearPedido($cod_pedido, $fecha, $cod_usu); 

foreach ($carrito as $keyProducto => $cantidadProducto) {
    $GLOBALS["bd"]->beginTransaction();
    crearPedidoProducto($cod_pedido, $keyProducto, $cantidadProducto);
    $GLOBALS["bd"]->commit();
    $_SESSION["carrito"] = array();
    header("Location: ../Micuenta.php?pedido");

}

updatePedidos($usu_pedidos, $cod_usu);


function crearCodigoPedido()
{
    $codigoPedido = rand(1, 9999);
    while (findIdPedido($codigoPedido)->rowCount() != 0) {
        $codigoPedido = rand(1, 9999);
    }

    return $codigoPedido;
}


?>