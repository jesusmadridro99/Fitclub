
<!-- Div con el contenido de cada ejercicio -->
<div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                <div class="card-header">
                    <h5><?php echo $ejercicio['nombre']; ?></h5>
                </div>

                <div class="card-body" style="background-color:rgb(253, 237, 237)">
                    <div class="divEjercicio">
                    <span><?php echo $ejercicio['descripcion']; ?></span>
                    </div>

                    <input type="hidden" value="<?php echo $ejercicio['cod_ejercicio'] ?>" name="cod_ejercicio">

                        <hr>

                        <?php
                        if($_SESSION["rol"] == "admin"){
                            //Si $borrar existe significa que venimos desde la página ListarEjercicio.php
                            // y solo se nos muestra este botón en vez de los botones asignar y quitar.
                            if(isset($borrar)){ ?>
                                <a class="btn btn-primary botonDiv"
                                href="BorrarEjercicio.php?id=<?php echo $ejercicio['cod_ejercicio'] ?>">Borrar</a>
                           <?php }
                        else{
                        
                        //Buscamos si el ejercicio si el ejercicio esta asignado al usuario.
                        $ejercicioUsuario = findEjercicioByUsuario($usuario, $ejercicio['cod_ejercicio']);

                        //Si el ejercicio esta asignado muestra el boton quitar y si no, muestra el boton asignar
                        if ($ejercicioUsuario) {  ?>
                            <a class="btn btn-danger botonDiv"
                                href="AsignarRutina.php?accion=quitar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Quitar</a>
                        <?php } else {  ?>
                            
                            <a class="btn btn-success botonDiv"
                                href="AsignarRutina.php?accion=asignar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Asignar</a>
                        <?php }}}
                     ?>

                </div>
            </div>