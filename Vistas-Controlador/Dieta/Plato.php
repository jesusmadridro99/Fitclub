<!-- Div con el contenido de cada plato -->
<div class="div_pro_2 div_plato">
    <a style="text-decoration:none; color:black" href="MostrarPlato.php?plato=<?php echo $plato['cod_plato'] ?>">
        <div class="card border-primary mb-3 div_pro_2" style="width:250px;">
            <div class="card-header">
                <h5>
                    <?php echo $plato['nombre']; ?>
                </h5>
            </div>

            <div class="card-body" style="background-color:rgb(253, 237, 237)">
                <div class="divImgPlato" style="background-image:url(<?php echo $plato['imagen'] ?>);">
                </div>

                <input type="hidden" value="<?php echo $plato['cod_plato'] ?>" name="cod_plato">

                <hr>

                <?php
                if ($_SESSION["rol"] == "admin") {
                    if (isset($borrar)) { ?>
                        <a class="btn btn-primary botonDiv"
                        href="javascript: comprobarEliminar(<?php echo $plato['cod_plato'] ?>)">Borrar</a>
                    <?php } else {
                        $platoUsuario = findPlatoByUsuario($usuario, $plato['cod_plato']);
                        //Si el plato esta asignado muestra el boton quitar y si no, muestra el boton asignar
                        if ($platoUsuario) { ?>
                            <a class="btn btn-danger botonDiv"
                                href="AsignarDieta.php?accion=quitar&cod_plato=<?php echo $plato['cod_plato'] ?>&correo=<?php echo $_GET['correo'] ?>">Quitar</a>
                        <?php } else { ?>

                            <a class="btn btn-success botonDiv"
                                href="AsignarDieta.php?accion=asignar&cod_plato=<?php echo $plato['cod_plato'] ?>&correo=<?php echo $_GET['correo'] ?>">Asignar</a>
                        <?php }
                    }
                }
                ?>

            </div>
        </div>
    </a>
</div>