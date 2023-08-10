<?php
$nit = $_GET['nit'];

include '../../../conexion/conexion.php';
$eli = "DELETE FROM proveedores WHERE nit like $nit";
$query = mysqli_query($con, $eli);
if (!$query) {
    echo "<script>alert('No se elimino');</script>";
} else {
    header("location:index.php");
}

?>