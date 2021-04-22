
    <!-- ESTE ARCHIVO HACE LA CONEXION A BASE DE DATOS -->
    <?php
$conexion = new mysqli('localhost','root','','conocimientos');
if(mysqli_connect_errno()){
	echo 'Conexion Fallida: ', mysqli_connect_errno();
	exit();
	}
?>
