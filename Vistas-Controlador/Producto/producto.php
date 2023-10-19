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
            <?php echo $producto['precio'] ?> €
        </h6>

<!--Modal------------------ -->

        <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="CrearActualizarProducto.php?id=<?php echo $producto['cod_producto'] ?>">

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
                        <input id="imagen" class="form-control" required type="text" name="imagen"
                            value="<?php if (isset($imagen))
                                echo $imagen; ?>" /><br>

                        <label for="cod_cat">Categoria: </label>
                        <select name="cod_cat">
                            <?php foreach ($categoriaSistemas as $categoria) { ?>
                                <option value="<?php echo $categoria["cod_cat"] ?>">
                                    <?php echo $categoria["nombre"] ?>
                                </option>
                            <?php } ?>
                        </select>

                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                    </form>
                
            </div>
        </div>
    </div>

        <?php if (isset($_SESSION['rol'])) { ?>
            <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                onclick="carrito()">Comprar</button>
            <br>
            <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                lista</button>

            <?php if ($_SESSION['rol'] == 'admin') { ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalModificar">
                        Modificar
                </button>
                <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Borrar</button>

            <?php }
        } ?>

    </div>
</div>