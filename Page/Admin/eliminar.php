<?php
$id = $_GET['id'];

include '../../Inicio_registro_pro/conexion.php';
$eli = "DELETE FROM usuarios WHERE id like $id";
$query = mysqli_query($con, $eli);
if (!$query) {
    echo "<script>alert('No se elimino');</script>";
} else {
    header("location:index.php");
}
?>