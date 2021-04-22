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
    $consulta=mysqli_query($conexion, "UPDATE usuarios SET par_2 = '$cali' WHERE nom_us = '$user'");
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
    
    <form action="testCSS.php" method="post" class="formulario">

    <div class="radio"><h2>ALUMNO: <?php echo $_SESSION['usus'] ?></h2></div>

    <div class="radio">
    <h1>TEST DE DESARROLLO WEB</h1>
    <h2 class="titulo">Evaluacion CSS:</h2>       
    </div>
    <div class="formulario" style="display:none" id="form">
    
    <div class="radio">
             
             <h2>1-¿Qué significa CSS?</h2>
             <input type="radio" name="p1" value="a"  id="11.1"/> 
             <label for="11.1">Cascading Style Sheets (Hojas de Estilo en Cascada) </label>
             <br>
             <input type="radio" name="p1" value="b" id="11.11" />
             <label for="11.11">Code of Style Sheets (Código de Hojas de Estilo) </label>
             
         </div>
         
         <div class="radio">
              
             <h2>¿Cómo podemos añadir un comentario en una hoja de estilo CSS?</h2>
             <input type="radio" name="p2" value="a"  id="12.1"/> 
             <label for="12.1">Entre las etiquetas "!--" y "-->". Ej: !-- Esto es un comentario CSS --> </label>
             <br>
             <input type="radio" name="p2" value="b" id="12.12" />
             <label for="12.12"> Entre los caracteres "/*" y "*/ ". Ej: /* esto es un comentario CSS */ s</label>
             
         </div>
         <div class="radio">
              
             <h2>3- ¿En qué sección de la página HTML podemos definir una hoja de estilo interna CSS?</h2>
             <input type="radio" name="p3" value="a"  id="13.1"/> 
             <label for="13.1">En la sección footer </label>
             <br>
             <input type="radio" name="p3" value="b" id="13.13" />
             <label for="13.13">En la sección head </label>
             
         </div>
         <div class="radio">
              
             <h2>4.- En HTML existe el atributo ‘class’. En relación con los estilos CSS ¿para qué crees que sirve?</h2>
             <input type="radio" name="p4" value="a"  id="14.1"/> 
             <label for="14.1">Para aplicar unos estilos específicos (que se definen en una hoja CSS interna o externa) a los elementos que tenga la misma clase, es decir, el mismo valor en ese atributo</label>
             <br>
             <input type="radio" name="p4" value="b" id="14.14" />
             <label for="14.14"> Es específico para indicar el color de la fuente que queremos aplicar, Por ejemplo: p class="red" presentaría las letras en rojo de ese párrafo </label>
             
         </div>
         <div class="radio">
              
             <h2>5-¿Qué está mal en esta regla de estilo?:
             .cuadro { border: 1px blue dotted padding: 10px 5px; }
 </h2>
             <input type="radio" name="p5" value="a"  id="15.1"/> 
             <label for="15.1">Falta un ';' (punto y coma) al final de la declaración del estilo 'border' </label>
             <br>
             <input type="radio" name="p5" value="b" id="15.15" />
             <label for="15.15"> A la propiedad border solo se le puede dar un valor y no 3 como aparece aquí: 1px, blue y dotted </label>
             
         </div>
        
         </div>
       
        <input class="boton" type="submit" value="EVALUAR" name="evaluar" id="evaluar"/>
          <input class="precio" type="text" name="calificacion" id="calificacion">
           <input class="precio" type="text" name="cont" id="cont">
            
        </form>
        <!-- AQUI SE GENERA LA GRAFICA CON EL CANVAS -->  
        <canvas class="canvas" id="myChart" ></canvas>

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

