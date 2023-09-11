<?php
$id_producto = $_GET['id_producto'];
include '../../../conexion/conexion.php';
$eli = "DELETE FROM productos WHERE id_producto like $id_producto";
$query = mysqli_query($con, $eli);
if (!$query) {
    echo "<script>alert('No se elimino');</script>";
} else {
    header("location:index.php");
}
?>