<?php
error_reporting(0);
session_start();

$varsesion = $_SESSION['usus'];

if($varsesion == null || $varsesion = ''){
echo 'lo sentimos para ingresar al contenido es necesario iniciar sesión';
die();
}

require "ConexionBD.php";

$nomb = $_POST['username'];
$correo =  $_POST['email'];
$pregu = $_POST['pregunta'];
$pass = $_POST['password'];
$id =$_POST['Id'];
$idm = $_POST['idMod'];
$cali = $_POST['cal'];
$fecha_inicio = $_POST['fecha_inicio']." 00:00:00";
            $fecha_final  = $_POST['fecha_final']." 23:58:59";


/* $consulta=mysqli_query($conexion, "UPDATE usuarios SET cal_us = '$cali' WHERE id_us = '$idm'");
mysqli_close($conexion); */



if($nomb|| null){
$insertar = "INSERT INTO usuarios (nom_us, correo_us, preg_us, pass_us) VALUES 
    ('$nomb', '$correo', '$pregu', '$pass')";
    $resultado = mysqli_query($conexion, $insertar);
}if($id||null){
  $consulta=mysqli_query($conexion, "DELETE FROM usuarios WHERE id_us = '$id'");
mysqli_close($conexion);
}else{
  $consulta=mysqli_query($conexion, "UPDATE usuarios SET cal_us = '$cali' WHERE id_us = '$idm'");
mysqli_close($conexion);
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/js.ico" rel="icon"/>
    <link rel="stylesheet" href="style/Menu.css">
    <title>Menu</title>
</head>
<body>
<a href="cerrar_ses.php"><button class="boton2" type="button" name="button">Cerrar Sesion</button></a>
<h1 class="user">ALUMNO: <?php echo $_SESSION['usus'] ?></h1>
<br>
    <h1 class="title1">TEST DE PROGRAMACION</h1>
    
    
    <div class="container">
        
        <div class="card">
            <img src="img/javascript.png" alt="">
        <h4>JAVASCRIPT</h4>
        <p>En este test pondras a prueba tus conocimientos relacionadas a esta tecnologia.</p>
        <a href="index.php"> Realizar TEST</a>
        </div>
        
        <div class="card">
            <img src="img/CS3.png" alt="">
        <h4>CSS3</h4>
        <p>En este test podras a prueba tus conocimientos como frontend developer.</p>
        <a href="testCSS.php"> Realizar TEST</a>
        </div>

        <div class="card">
            <img src="img/java.jpg" alt="">
        <h4>JAVA</h4>
        <p>En este test podras a prueba tus conocimientos relacionados con el mejor lenguaje de programacion.</p>
        <a href="testHTML.php"> Realizar Curso</a>
        </div>

    </div>
    
    <div class="containerTable"  style="display:none;" id="tabla">  
    <h1 class="title1">ALUMNOS REGISTRADOS</h1>  
    <table border="0" >
            <thead>
             <tr>
               <th>Id</th>
              <th>NOMBRE</th>
              <th>TEST JavaScript</th>
              <th>TEST CSS</th>
              <th>TEST Java</th>
              <th>Promedio</th>
              
           </tr>
           </thead>
        <tbody>
            <?php
  include ("ConexionBD.php");
  
  $query = "SELECT * FROM usuarios";
  $resultado =  $conexion->query($query);
  while($row = $resultado->fetch_assoc()){
?>
           <tr>
             <td><?php echo $row['id_us']; ?></td>
              <td><?php echo $row['nom_us'];?></td>
              <td><?php echo $row['par_1'];?></td>
              <td><?php echo $row['par_2'];?></td>
              <td><?php echo $row['par_3'];?></td>
              <td><?php echo $row['cal_us'];?></td>
              
           </tr>
<?php
 }
?>
      </tbody>
    </table>
    
    </div>
    
    <div id="opciones" style="display:none;" class="opciones">
    <h1 class="title1">Opciones de administrador</h1>
    <!-- FORMULARIO PARA ELIMINAR ALUMNO -->
    <form action="Menu.php" method="POST" class="sign-in-form">
            <h2 class="title">Eliminar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="Id" placeholder="Id alumno" required />
            </div>
             <input type="submit" value="Eliminar" class="btn solid" />
          </form>

          <!-- FORMULARIO PARA REGISTRAR ALUMNO -->
          <form action="Menu.php" method="POST" class="sign-in-form">
            <h2 class="title">Registro</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input
                type="text"
                name="username"
                placeholder="Username"
                required
              />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required />
            </div>

            <div class="input-field">
              <i class="fas fa-question"></i>
              <input
                type="text"
                name="pregunta"
                placeholder="Nombre de mascota?"
                required
              />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <input type="submit" class="btn" value="Registrar" />
          </form>

          <!-- formulario para modificar alumno -->
          <form action="Menu.php" method="POST" class="sign-in-form">
            <h2 class="title">Modificar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input
                type="text"
                name="idMod"
                placeholder="Id alumno"
                required
              />
            </div>
           
            <div class="input-field">
              <i class="fas fa-question"></i>
              <input
                type="text"
                name="cal"
                placeholder="Calificacion Final"
                required
              />
            </div>
            
            
            <input type="submit" class="btn" value="Modificar" />
          </form>
          <br>
          </div>

          
          <!-- TABLA FECHAS -->
          <div class="containerTable"  style="display:none;" id="tabla2">  
          
             <!-- FORMULARIO DE BUSQUEDA DE FECHAS -->
             <form action="Menu.php" method="POST" class="sign-in-form" style="margin-left:20%;">
             <h1 class="title1">Buscar por fecha</h1>
             <div class="col-xs-10 col-xs-offset-3">
        <div >
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
        </div>
        <div >
            <label for="fecha_final">Fecha Final:</label>
            <input type="date" class="form-control" name="fecha_final" required>
        </div>
        <div >
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
          </form>
        
    <table border="0" >
            <thead>
             <tr>
               <th>Id</th>
              <th>NOMBRE</th>
              <th>Cal.Final</th>
              <th>Fecha registro</th>
              
              
           </tr>
           </thead>
        <tbody>
            <?php
             include ("ConexionBD.php");
            
           
 
   if ($fecha_final || null) { 
  
    
  $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE fecha_ingreso BETWEEN '$fecha_inicio' AND '$fecha_final'");
  
  while($row = $query->fetch_assoc()){
?>
          <tr>
             <td><?php echo $row['id_us']; ?></td>
              <td><?php echo $row['nom_us'];?></td>
              <td><?php echo $row['cal_us'];?></td>
              <td><?php echo $row['fecha_ingreso'];?></td>
              
              
           </tr>
<?php
 }} 
?>
      </tbody>
    </table>
  </div>
    
          <a href="guardaCal.php"><button class="boton" id="boton" value="SIGUIENTE">PROMEDIO GENERAL</button></a>
    
       <script>
       const tabla= document.querySelector("#tabla");
       const tabla2= document.querySelector("#tabla2");
       const boton1=document.querySelector("#boton");
       const opcion=document.querySelector("#opciones")
       var usu = '<?php echo $_SESSION['usus'] ?>';

       if(usu ==='Joaquin'){
           opcion.style.display = null;
           tabla.style.display = null;
           tabla2.style.display = null;
           boton1.style.display= "none";
           
       } 
       </script>
</body>
</html>