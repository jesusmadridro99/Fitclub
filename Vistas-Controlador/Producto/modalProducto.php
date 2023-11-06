
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="CrearActualizarProducto.php" method="POST">

                    <label for="nombre">Nombre: </label>
                    <input id="nombre" class="form-control" required type="text" name="nombre" /><br>

                    <label for="descripcion">Descripción: </label>
                    <input id="descripcion" class="form-control" required type="text" name="descripcion" /><br>

                    <label for="precio">Precio: </label>
                    <input id="precio" class="form-control" required type="number" name="precio" /><br>

                    <label for="imagen">Imagen URL: </label>
                    <input id="imagen" class="form-control" required type="text" name="imagen" /><br>

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




<div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                
                <form action="CrearActualizarProducto.php" method="POST">

                     
                    <label for="nombre">Nombre: </label>
                    <input id="nombre" class="form-control" required type="text" name="nombre" value="" /><br>

                    <label for="descripcion">Descripción: </label>
                    <input id="descripcion" class="form-control" required type="text" name="descripcion" value="<?php if (isset($descripcion))
                        echo $descripcion; ?>" /><br>

                    <label for="precio">Precio: </label>
                    <input id="precio" class="form-control" required type="number" name="precio" value="<?php if (isset($precio))
                        echo $precio; ?>" /><br>

                    <label for="imagen">Imagen URL: </label>
                    <input id="imagen" class="form-control" required type="text" name="imagen" value="<?php if (isset($imagen))
                        echo $imagen; ?>" /><br>

                    <label for="cod_cat">Categoria: </label>
                    <select name="cod_cat">
                        <?php foreach ($categoriaSistemas as $categoria) { ?>
                            <option value="<?php echo $categoria["cod_cat"] ?>">
                                <?php echo $categoria["nombre"] ?>
                            </option>
                        <?php } ?>
                    </select>

                    
                    
                    <input id="cod_producto" class="form-control" required type="text" name="cod_producto" value="<?php echo $_SESSION['cod']?>"/><br>
                    
                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>