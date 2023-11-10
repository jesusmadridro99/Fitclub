<div class="modal fade" id="modalBasic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="Ejercicio/CrearRutina.php" method="POST">

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


<div class="modal fade" id="modalPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Introduce tus datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="Ejercicio/CrearRutina.php" method="POST">

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