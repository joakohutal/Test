<?php
require "ConexionBD.php";

$correo=$_POST['corre'];
$clave=$_POST['pass'];



$consulta="SELECT * FROM usuarios WHERE correo_us='$correo' and pass_us='$clave'";
$resultado = mysqli_query($conexion, $consulta);



session_start();

$query = "SELECT * FROM usuarios WHERE correo_us = '$correo' ";
  $resultado =  $conexion->query($query);
  while($row = $resultado->fetch_assoc()){

             $nombre =  $row['nom_us'];
           
 }
 $_SESSION['usus'] = $nombre;


$filas = mysqli_num_rows($resultado);

if($filas>0){
include "Menu.php";
}
else {
    include "InSesion.html";
    
}