<?php
    $servername = "127.0.0.1";
    $database = "fitclub";
    $username = "admin";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS["bd"] = $conn;
        
    } catch(PDOException $e) {
        echo "Error en la conexion" . $e->getMessage();
        header("Location: /Web/Vistas-Controlador/Error.html");
        
    }
?>