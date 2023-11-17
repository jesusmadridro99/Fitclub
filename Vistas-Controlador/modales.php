<!-- Modal plan Basic -->
<div class="modal fade" id="modalBasic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="Ejercicio/AsignarPlan.php" method="POST">

                    <label for="peso">Peso: </label>
                    <input id="peso" class="form-control" required type="text" name="peso" placeholder="Kg" /><br>

                    <label for="altura">Altura: </label>
                    <input id="altura" class="form-control" required type="text" name="altura"
                        placeholder="Metros | Ej: 1.75" /><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal plan Pro -->
<div class="modal fade" id="modalPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="Ejercicio/AsignarPlan.php" method="POST">

                    <label for="peso">Peso: </label>
                    <input id="peso" class="form-control" required type="text" name="peso" placeholder="Kg" /><br>

                    <label for="altura">Altura: </label>
                    <input id="altura" class="form-control" required type="text" name="altura"
                        placeholder="Metros | Ej: 1.75" /><br>

                    <label for="edad">Edad: </label>
                    <input id="edad" class="form-control" required type="text" name="edad" placeholder="Años" /><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal enviar mensaje -->
<div class="modal fade" id="modalMensaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="Mensaje/CrearMensaje.php" method="POST">

                    <?php if ($_SESSION["rol"] == "admin") { ?>
                        <input class="form-control" required type="text" name="destinatario"
                            placeholder="Destinatario" /><br>
                    <?php } ?>

                    <input class="form-control" required type="text" name="asunto" placeholder="Asunto" /><br>

                    <input class="form-control" required type="text" name="cuerpo" placeholder="Cuerpo ..." /><br>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal crear ejercicio -->
<div class="modal fade" id="modalEjercicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="CrearEjercicio.php" method="POST">

                    <label for="nombre">Nombre: </label>
                    <input id="nombre" class="form-control" required type="nombre" name="nombre" /><br>

                    <label for="descripcion">Descripción: </label>
                    <input id="descripcion" class="form-control" required type="descripcion" name="descripcion" /><br>

                    <label for="imc">Imc: </label>
                    <input id="imc" class="form-control" required type="text" name="imc" /><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal crear plato -->
<div class="modal fade" id="modalPlato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="CrearPlato.php" method="POST">

                    <label for="nombre">Nombre: </label>
                    <input id="nombre" class="form-control" required type="nombre" name="nombre" /><br>

                    <label for="descripcion">Descripción: </label>
                    <input id="descripcion" class="form-control" required type="descripcion" name="descripcion" /><br>

                    <label for="imc">Imc: </label>
                    <input id="imc" class="form-control" required type="text" name="imc" /><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal crear producto -->
<div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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