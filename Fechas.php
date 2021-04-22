<?php

include('ConexionBD.php');

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final  = $_POST['fecha_final'];

$alumnosLista = $conexion->query("SELECT * FROM usuarios WHERE fecha_ingreso BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'"); 


echo '<table style="width:100%">
  <thead class="bg-primary">
    <th>id</th>
    <th>nombre</th> 
    <th>calificacion</th>
    <th>Fecha Ingreso</th>
  </th>
  </thead>
  <tbody>';

while($alumno = $alumnosLista->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr> 
			<td>'.$alumno['id_us'].'</td>
			<td>'.$alumno['nom_us'].'</td>
			<td>'.$alumno['cal_us'].'</td>
			<td>'.$alumno['fecha_ingreso'].'</td>
		</tr>';

}

echo '</tbody> </table>'; 

?>




<div class="containerTable"  style="display:none;" id="tabla2">    
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
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_final  = $_POST['fecha_final'];
  $query = "SELECT * FROM usuarios WHERE fecha_ingreso BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'";
  $resultado =  $conexion->query($query);
  while($row = $resultado->fetch_assoc()){
?>
           <tr>
             <td><?php echo $row['id_us']; ?></td>
              <td><?php echo $row['nom_us'];?></td>
              <td><?php echo $row['cal_us'];?></td>
              <td><?php echo $row['fecha_ingreso'];?></td>
              
           </tr>
<?php
 }
?>
      </tbody>
    </table>