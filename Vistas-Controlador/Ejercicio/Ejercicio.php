<div class="card border-primary mb-3 div_pro_2" style="width:250px;">
                <div class="card-header">
                    <h5><?php echo $ejercicio['nombre']; ?></h5>
                </div>

                <div class="card-body" style="background-color:rgb(253, 237, 237)">
                    <div style="height:180px;
                    width:200px;
                    background-size: cover;
                    margin:5px;">
                    <span><?php echo $ejercicio['descripcion']; ?></span>
                    </div>

                    <input type="hidden" value="<?php echo $ejercicio['cod_ejercicio'] ?>" name="cod_ejercicio">

                        <hr>

                        <?php
                        if($_SESSION["rol"] == "admin"){
                            if(isset($borrar)){ ?>
                                <a class="btn btn-primary" style="font-size:15px; margin-top:7px"
                                href="BorrarEjercicio.php?id=<?php echo $ejercicio['cod_ejercicio'] ?>">Borrar</a>
                           <?php }
                        else{
                        $ejercicioUsuario = findEjercicioByUsuario($usuario, $ejercicio['cod_ejercicio']);
                        //Si el ejercicio esta asignado muestra el boton quitar y si no, muestra el boton asignar
                        if ($ejercicioUsuario) {  ?>
                            <a class="btn btn-danger" style="font-size:15px; margin-top:7px"
                                href="AsignarRutina.php?accion=quitar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Quitar</a>
                        <?php } else {  ?>
                            
                            <a class="btn btn-success" style="font-size:15px; margin-top:7px"
                                href="AsignarRutina.php?accion=asignar&cod_ejercicio=<?php echo $ejercicio['cod_ejercicio'] ?>&correo=<?php echo $_GET['correo'] ?>">Asignar</a>
                        <?php }}}
                     ?>

                </div>
            </div>