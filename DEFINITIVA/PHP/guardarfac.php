<?php
include 'Conexion.php';
echo "entro al guardar";
$Cedula=$_POST['Id_cliente'];
$Id_producto=$_POST['Id_producto'];
$valor_total=$_POST['valor_total'];
$Descripcion=$_POST['descripcion'];
if (isset($_POST ['submit'])){
    $sql= "INSERT INTO facturas (Cedula, Id_producto, valor_total, Descripcion) values ('$Cedula', '$Id_producto', '$valor_total', '$Descripcion' )";
    $rs=mysqli_query($con,$sql);
    if ($rs) {
        header('location:main.php');
    }
} 
?>