<?php
include("../../Repositorio/PlatoRepository.php");
include("../../Utiles/Includes/Header.php");
$plato = findPlatoByCod($_GET["plato"]);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="text-align:center">
        <br>
        <h2>
            <?php
            
                echo $plato[0]["nombre"];
            
            ?>
        </h2>


        <hr style="margin-left:5%; width:90%">
        <br><br>


        <div style="">
            <div style="display:inline-block; vertical-align: top; margin-right:30px"><img style="max-width:600px;" src="<?php echo $plato[0]['imagen'] ?>"></div>
            <div style="padding-right:5px;max-height:70%;overflow-y: auto; display:inline-block; vertical-align: top;width:30%;text-align:left">
                <p>
                    <?php echo nl2br($plato[0]['descripcion']) ?>
                </p>
            </div>
        </div>
    </div>


    </div>
</body>

</html>