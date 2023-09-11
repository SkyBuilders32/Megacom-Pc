<?php
$cedula = $_GET['cedula'];

include '../../../conexion/conexion.php';
$eli = "DELETE FROM clientes WHERE cedula like $cedula";
$query = mysqli_query($con, $eli);
if (!$query) {
    echo "<script>alert('No se elimino');</script>";
} else {
    header("location:index.php");
}

?>