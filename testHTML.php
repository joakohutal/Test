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

if($conta==5){
    $consulta=mysqli_query($conexion, "UPDATE usuarios SET par_3 = '$cali' WHERE nom_us = '$user'");
    mysqli_close($conexion);

    
}else{
    /* echo '<h3 class="titulo">Faltaron preguntas por responder regresa al test.</h3>'; */
}
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

<div class="wrap">
<a><button class="boton2" value="SIGUIENTE" id="inicio">INICIAR</button></a>
<div id="temporizador" class="temporizador">
50
</div>

    <form action="testHTML.php" method="post" class="formulario">

    <div class="radio"><h2>ALUMNO: <?php echo $_SESSION['usus'] ?></h2></div>

    <div class="radio">
    <h1>TEST DE DESARROLLO WEB</h1>
    <h2 class="titulo">Evaluacion JAVA:</h2>       
    </div>
    <div class="formulario" style="display:none" id="form">
    <div class="radio">
             
             <h2>1- ¿Cuál es la descripción que crees que define mejor el concepto 'clase' en la programación orientada a objetos?</h2>
             <input type="radio" name="p1" value="a"  id="11.1"/> 
             <label for="11.1">Es una categoria de datos ordenada secuencialmente</label>
             <br>
             <input type="radio" name="p1" value="b" id="11.11" />
             <label for="11.11">Es un modelo o plantilla a partir de la cual creamos objetos</label>
             
         </div>
         
         <div class="radio">
              
             <h2>2- ¿Qué elementos crees que definen a un objeto?</h2>
             <input type="radio" name="p2" value="a"  id="12.1"/> 
             <label for="12.1">Sus atributos y sus métodos</label>
             <br>
             <input type="radio" name="p2" value="b" id="12.12" />
             <label for="12.12">Su interfaz y los eventos asociados</label>
             
         </div>
         <div class="radio">
              
             <h2>3- ¿Qué código de los siguientes tiene que ver con la herencia?</h2>
             <input type="radio" name="p3" value="a"  id="13.1"/> 
             <label for="13.1">public class Componente extends Producto</label>
             <br>
             <input type="radio" name="p3" value="b" id="13.13" />
             <label for="13.13">public class Componente implements Producto</label>
             
         </div>
         <div class="radio">
              
             <h2>4- ¿Qué significa instanciar una clase?</h2>
             <input type="radio" name="p4" value="a"  id="14.1"/> 
             <label for="14.1">Conectar dos clases entre sí</label>
             <br>
             <input type="radio" name="p4" value="b" id="14.14" />
             <label for="14.14">Crear un objeto a partir de la clase</label>
             
         </div>
         <div class="radio">
              
             <h2>5- En Java, ¿a qué nos estamos refiriendo si hablamos de 'Swing'?</h2>
             <input type="radio" name="p5" value="a"  id="15.1"/> 
             <label for="15.1">Una función utilizada para intercambiar valores</label>
             <br>
             <input type="radio" name="p5" value="b" id="15.15" />
             <label for="15.15">Una librería para construir interfaces gráficas</label>
             
         </div>
        
         </div>
        
         <input class="boton" type="submit" value="EVALUAR" name="evaluar" id="evaluar"/>
          <input class="precio" type="text" name="calificacion" id="calificacion">
           <input class="precio" type="text" name="cont" id="cont">
           
            
        </form>
        <!-- AQUI SE GENERA LA GRAFICA CON EL CANVAS -->  
        <canvas class="canvas" id="myChart" ></canvas>
        
        <a href="Menu.php"><button class="boton" value="SIGUIENTE">MENU</button></a>
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
                    text:'Nivel de conocimiento',
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


