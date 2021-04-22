
<?PHP
error_reporting(0);
session_start();

$varsesion = $_SESSION['usus'];

if($varsesion == null || $varsesion = ''){
echo 'lo sentimos para ingresar al contenido es necesario iniciar sesión';
die();
}
 


 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
    <style>
        html,body{ height: 70%;}
        body{
            justify-content: center;
    background-color: #DDECF4;
    background-size: 100% 100%;
    font-family: 'Poppins';
    font-weight: 300;
    height: 100%;
    text-align: center;
    color: #262B34;
    
}
.QR{
    margin-top:0px;
    margin-left:45%;
    width:130px;
    height:130px;
    justify-content: center;
    display: flex;
}
.bold{
    font-weight: 300;
}
    </style>
    <title>Document</title>
</head>
<body>
    <?php
    require "ConexionBD.php";


    $user = $_SESSION['usus'] ;
    $conta = $_POST['cont'];
    
    $query = "SELECT * FROM usuarios WHERE nom_us = '$user' ";
      $resultado =  $conexion->query($query);
      while($row = $resultado->fetch_assoc()){
    
                 $cal1 =  $row['cal_us'];
     }
     $dia = date("d");
     
    ?>
    <div style="background-color: white; height: 133%; width:96% ;margin-left:15px; border-style: double;border-width: 10px">
<div>
    <h1 class="bold">CERTIFICADO UMB</h1>

    <p style="margin-bootom:0px;margin-top:25px;" class="light">Certifica a: </p>
    <p style="font-size:2.em;color:#1BBC9B;margin:0px" class="bold"> <?php echo $_SESSION['usus'] ?> </p>
   
    <br>
    <p style="margin:0px;">Por completar el curso: </p>
    <h2 style="max-width:500px;margin:15px auto;font-size:2em" class="bold">DESARROLLO WEB</h2>

    <p style="margin:0px;">Con la puntuacion: </p>
    <p style="font-size:0.7em;" class="bold"><?php echo $cal1;?> </p>

    <br>
    <p style="margin:0px;">Fecha de expedición: </p>
    <p style="font-size:0.9em;" class="bold"><?php echo date(d),'/',date(m),'/',date(y);?> </p>
    <div class="QR">
    <?php
                                                                
                                   require 'ConexionBD.php';
    
    
    $pregu = $_POST['pregunta'];
    
    
    
    $result=mysqli_query($conexion,"SELECT * FROM usuarios WHERE nom_us = '$user'");
    while($consulta=mysqli_fetch_array($result)){
                        
    
    
        require 'LIBRERIAQR/qrlib.php';
        $dir = 'imgqr/';
        if(!file_exists($dir))
        mkdir($dir);
        $filname = $dir.'test.png';
        $tamaño = 5;
        $level = 'H';
        $frameSize = 3;
        $contenido = (
    'Usuario: '.$consulta['nom_us'].' 
    Correo:'.$consulta['correo_us'].' 
    Contraseña:'.$consulta['pass_us'].'
    Calificacion Final:'.$consulta['cal_us']);
        QRcode::png($contenido, $filname, $level, $tamaño, $frameSize);
        echo '<img src="'.$filname.'" />';
    
      
    
    }
    
                                 
    ?> 
    </div> 
</div>
</div>
    
</body>
</html>