<?php




if (isset($_POST['accion'])){
		$conexion=mysqli_connect("localhost","root","","megacom");
		extract($_POST);
		$consulta="UPDATE clientes SET Cedula =  '$cedula', nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$Telefono' where cedula = '$id'";

		mysqli_query($conexion, $consulta);


		header('Location: ../PHP/main.php');

}