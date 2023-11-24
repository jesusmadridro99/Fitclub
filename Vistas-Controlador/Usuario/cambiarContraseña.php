<?php 

include("../../Repositorio/UsuarioRepository.php");

if (isset($_POST['nuevaContraseña'])) {
    $nuevaContraseña = $_POST['nuevaContraseña'];
    $correo = $_POST['correo'];
    updatePass($nuevaContraseña, $correo);

}

?>