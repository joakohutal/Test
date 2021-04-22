    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link href="img/js.ico" rel="icon"/>
    <link rel="stylesheet" href="style/styleFormul.css" />
    <title>Recupera contraseña</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="RecuperaPass.php" method="POST" class="sign-in-form">
          <h2 class="title">Escanea</h2>
          <?php
                                                                
                                   require 'ConexionBD.php';
    
    $usu=$_POST['corre'];
    $pregu = $_POST['pregunta'];
    
    
    
    $result=mysqli_query($conexion,"SELECT * FROM usuarios WHERE preg_us = '$pregu'");
    while($consulta=mysqli_fetch_array($result)){
                        
    
    
        require 'LIBRERIAQR/qrlib.php';
        $dir = 'imgqr/';
        if(!file_exists($dir))
        mkdir($dir);
        $filname = $dir.'test.png';
        $tamaño = 5;
        $level = 'H';
        $frameSize = 3;
        $contenido = 
    ('Usuario: '.$consulta['nom_us'].' 
    Correo:'.$consulta['correo_us'].' 
    Respuesta de PS:'.$consulta['preg_us'].' 
    Contraseña:'.$consulta['pass_us'].'
    Ultima Calificacion:'.$consulta['cal_us']);
        QRcode::png($contenido, $filname, $level, $tamaño, $frameSize);
        echo '<img src="'.$filname.'" />';
    
      
    
    }
    
                                 
    ?>   
          </form>
<!-- ----------------------------------------------------------------------- -->
          <form action="ValidaSesion.php" method="POST" class="sign-up-form">
            <h2 class="title">Inicia sesion</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="corre" placeholder="Username"  required/>
             
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" required />
            </div>
            <input type="submit" value="Iniciar" class="btn solid" />            
          </form>
<!-- ----------------------------------------------------------------------- -->

       
        
      </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
                    <h3>Iniciar Sesion</h3>
                    <p>
                    Si ya tienes un registro inicia sesión.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                    INICIAR
                    </button>
          
            
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>No recuerdas tu contraseña?</h3>
            <p>
              Recupera tu contraseña en el siguiente enlase.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              RECUPERAR
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="script/app.js"></script>
  </body>
</html>
