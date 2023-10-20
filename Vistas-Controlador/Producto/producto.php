

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
            <?php echo $producto["precio"] ?> €
        </h6>

        
         

        <?php if (isset($_SESSION['rol'])) { 
            
            
            ?>
            
            <button class="btn btn-lg btn-primary" style="font-size:15px; width:90px" type="button"
                onclick="carrito()">Comprar</button>
            <br>
            <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Añadir a la
                lista</button>

            <?php if ($_SESSION['rol'] == 'admin') { ?>
                
                <p>
        
    </p>
    
            
                <button class="btn btn-lg btn-primary" style="font-size:15px; margin-top:7px" type="button">Borrar</button>

            <?php }
        }
         ?>

    </div>
</div>


