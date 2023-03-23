<?php
$id = $_GET['id'];

include '../../Inicio_registro_pro/conexion.php';
$upd = "DELETE FROM usuarios WHERE id like $id";
$query = mysqli_query($con,$upd);
if(!$query){
    echo "No se elimino";
}
else{
    header("location:prueba.php");
}
?>
