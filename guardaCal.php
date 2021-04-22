<?php
error_reporting(0);
session_start();

$varsesion = $_SESSION['usus'];

if($varsesion == null || $varsesion = ''){
echo 'lo sentimos para ingresar al contenido es necesario iniciar sesión';
die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="img/js.ico" rel="icon"/>
<link rel="stylesheet" href="style/guardaCal.css"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<title>Resultado</title>
</head>

<body>
<a href="Menu.php"><button class="boton1" type="button" name="button">Intenar de nuevo</button></a>
<a href="cerrar_ses.php"><button class="boton2" type="button" name="button">Cerrar Sesion</button></a>
    <div class="main">
    
        <div class="box">
<?PHP
require "ConexionBD.php";

date_default_timezone_set('America/Mexico_City');
$user = $_SESSION['usus'] ;
$conta = $_POST['cont'];
$fecha = date("Y-m-d H:i:s");

$query = "SELECT * FROM usuarios WHERE nom_us = '$user' ";
  $resultado =  $conexion->query($query);
  while($row = $resultado->fetch_assoc()){

             $par1 =  $row['par_1'];
              $par2= $row['par_2'];
              $par3= $row['par_3'];
 }
 


$prom=$par1+ $par2+ $par3;
$mult = $prom * 10;
$promf= $mult / 15;


    $consulta=mysqli_query($conexion, "UPDATE usuarios SET cal_us = '$promf', fecha_ingreso = '$fecha' WHERE nom_us = '$user'");
    mysqli_close($conexion);

    if($promf==10){
        echo '<h3 class="titulo"> APROBADO </h3>';
    }else if($promf>=8.5){
        echo '<h3 class="titulo"> APROBADO</h3>';
    
    }else if($promf<8.5){
        echo '<h3 class="titulo"> REPROBADO</h3>';
    }

?>
<h3 class="titulo">ALUMNO: <?php echo $_SESSION['usus'] ?></h3>
<h3 class="titulo" >PROMEDIO: <?php echo $promf ?><br><br> DE: 10</h3>
<br>
<br>
<br>
<br>
<br>
<a href="Certificado.php" ><button class="boton3" type="button" name="butto3" id="boton3" style="display:none;">Certificado</button></a>
<canvas id="myChart" width="10" height="10"></canvas>

</div>

</div>

<script>
    /* ESTE SCRIPT DETERMINA SI SE MUESTRA O NO EL BOTON PARA GENERAR EL CERTIFICADO */
    const boton = document.getElementById('boton3');
    if(<?php echo $promf ?> > 8.5){
        muestraBoton();
    }
function muestraBoton(){

    boton.style.display = null;
}
</script>

</body>
<script>
       
    
        
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                    
                labels:['Porcentaje de Calificacion'],
                
                datasets:[
                    {
                        label:'Calificacion',
                        data:[<?php echo $promf ?>,  10],
                        backgroundColor:['rgba(25, 25, 255, 0.5)'],
                        borderColor:['rgba(25, 25, 255, 1)'],
                        borderWidth: 2
                }
                
            ]
            },
            options:{
                title:{
                    display: true,
                    text:'Promedio general',
                    fontSize: 30,
                    padding: 30,
                    fontColor:'rgba(25, 25, 255, 0.7)',

                },
                legend:{
                    position:'bottom',
                    labels: {
                        padding: 20,
                        boxWidth: 15,
                        fontFamily: 'roboto',
                        fontColor: 'black',
                    }
                },  
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>
</html>