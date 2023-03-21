<?php
include 'Conexion.php';
echo"entró al guardar";
    $Nit=$_POST['Nit'];
    $Nombre=$_POST['nombre'];
    $Direccion=$_POST['direccion'];
    $Ciudad=$_POST['ciudad'];
    $Telefono=$_POST['Telefono'];
    if (isset($_POST['submit'])) {
        echo"entró";

    $func = "INSERT INTO proveedores (Nit, nombre, direccion, ciudad, telefono) VALUES ('$Nit','$Nombre','$Direccion','$Ciudad','$Telefono')";
    $result = mysqli_query($con,$func);
    if ($result) {
        header('location:Index.php');
    }
}
?>