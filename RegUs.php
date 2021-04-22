<?php
require "ConexionBD.php";

$nomb = $_POST['username'];
$correo =  $_POST['email'];
$pregu = $_POST['pregunta'];
$pass = $_POST['password'];

$insertar = "INSERT INTO usuarios (nom_us, correo_us, preg_us, pass_us) VALUES 
    ('$nomb', '$correo', '$pregu', '$pass')";
    $resultado = mysqli_query($conexion, $insertar);

    if ($resultado=1){
        header("Location:InSesion.html");
    }else{
        echo 'ERROR DE REGISTRO';
    }

