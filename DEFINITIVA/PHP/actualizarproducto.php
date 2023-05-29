<?php
include 'Conexion.php';
    $id_producto= $_POST['id_producto'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $precio_base=$_POST['precio_base'];
    $existencias=$_POST['existencias'];
    $disponibilidad=$_POST['disponibilidad'];
    $descripcion=$_POST['descripcion'];
    $proveedor=$_POST['proveedor'];

if (isset($_POST['submit'])) {
    echo"entró";
    $consult=  "UPDATE productos set id_producto = '$id_producto', marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', disponibilidad='$disponibilidad', descripcion='$descripcion', proveedor='$proveedor' WHERE id_producto = $id_producto" ;
$resulta = mysqli_query($con,$consult);
if ($resulta) {
    header('location:main.php');
}
}
?>