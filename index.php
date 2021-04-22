<?php
error_reporting(0);
session_start();

$varsesion = $_SESSION['usus'];

if($varsesion == null || $varsesion = ''){
echo 'lo sentimos para ingresar al contenido es necesario iniciar sesión';
die();
}

require "ConexionBD.php";

$cali = $_POST['calificacion'];
$user = $_SESSION['usus'] ;
$error= 5- $cali;
$conta = $_POST['cont'];


    $consulta=mysqli_query($conexion, "UPDATE usuarios SET par_1 = '$cali' WHERE nom_us = '$user'");
    mysqli_close($conexion);

   



?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
<link href="img/js.ico" rel="icon"/>
<link rel="stylesheet" href="style/styleIndex.css">    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<title>TestP</title>

</head>

<body>
    
   

<div class="wrap" id="wrap">
<a><button class="boton2" value="SIGUIENTE" id="inicio">INICIAR</button></a>
<div id="temporizador" class="temporizador">
50
</div>

    <form action="index.php" method="post" class="formulario"">

    <div class="radio"><h2>ALUMNO: <?php echo $_SESSION['usus'] ?></h2></div>

    <div class="radio">
    <h1>TEST DE DESARROLLO WEB</h1>
    <h2 class="titulo">Evaluacion JavaScript:</h2>       
    </div>


    <div class="formulario" style="display:none" id="form">
        <div class="radio">
             
            <h2>1- ¿En qué lugar se ejecuta generalmente el código JavaScript?</h2>
            <input type="radio" name="p1" value="a"  id="respuesta1"/> 
            <label for="respuesta1">Cliente (en el propio navegador de internet) </label>
            <br>
            <input type="radio" name="p1" value="b" id="1.2" />
            <label for="1.2">Servidor </label>
            
        </div>

        <div class="radio">
            <h2>2- ¿Cuáles de estas son marcas para la inserción del código JavaScript en las páginas HTML?</h2>
            <input type="radio" name="p2" value="a" id="2.1" />
            <label for="2.1">< javascript _code > y < /javascript_code ></label>
            <br>
            <input type="radio" name="p2" value="b" id="respuesta2" />
            <label for="respuesta2">< script > y < /script ></label>
            
        </div>

        <div class="radio">
             
            <h2>3- La llamada al código Javascript debe colocarse en:</h2>
            <input type="radio" name="p3" value="a"  id="3.1"/> 
            <label for="3.1">Antes de la etiqueta HTML</label>
            <br>
            <input type="radio" name="p3" value="b" id="3.3" />
            <label for="3.3">Puede colocarse en la sección Head o en Body</label>
            
        </div>
        <div class="radio">
             
            <h2>4- En JavaScript, para darle el nombre a una variable, objeto o función, debemos tener en cuenta que:</h2>
            <input type="radio" name="p4" value="a"  id="4.1"/> 
            <label for="4.1">JavaScript no distingue entre mayúsculas y minúsculas</label>
            <br>
            <input type="radio" name="p4" value="b" id="4.4" />
            <label for="4.4">JavaScript diferencia entre mayúsculas y minúsculas</label>
            
        </div>
        <div class="radio">
             
            <h2>5-¿Cuál es la instrucción usada para devolver un valor en una función de JavaScript?</h2>
            <input type="radio" name="p5" value="a"  id="5.1"/> 
            <label for="5.1">Send</label>
            <br>
            <input type="radio" name="p5" value="b" id="5.5" />
            <label for="5.5">Return</label>
            
        </div>
        
</div>
        
        
        <input class="boton" type="submit" value="EVALUAR" name="evaluar" id="evaluar"/>
          
           <input class="precio" type="text" name="calificacion" id="calificacion">
           <input class="precio" type="text" name="cont" id="cont">
        
        </form>
       <!-- AQUI SE GENERA LA GRAFICA CON EL CANVAS -->  
       <canvas class="canvas" id="myChart"  ></canvas>
        
        <a href="Menu.php"><button class="boton" value="SIGUIENTE">Menu</button></a>
        
<!-- ----------------------------------------------------------------------------------------------------------------- -->

</div>
<script src='script/script1.js'></script>
<script>
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                    
                labels:['<?php echo $_SESSION['usus'] ?>'],
                
                datasets:[
                    {
                        label:'Aciertos',
                        data:[<?php echo $cali ?>,  5],
                        backgroundColor:['rgba(25, 25, 255, 0.5)'],
                        borderColor:['rgba(25, 25, 255, 1)'],
                        borderWidth: 2
                        
                },
                {
                        label:'Errores',
                        data:[<?php echo $error ?>,  5],
                        backgroundColor:['rgba(25, 25, 25, 0.5)'],
                        borderColor:['rgba(25, 25, 255, 1)'],
                        borderWidth: 2
                        
                }
                
            ]
            
            },
            options:{
                title:{
                    display: true,
                    text:'Calificacion 1°',
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
</body>


</html>