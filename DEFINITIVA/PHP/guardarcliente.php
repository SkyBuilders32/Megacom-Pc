<?php
include 'Conexion.php';
echo"entró al guardar";
    $cedula=$_POST['Cedula'];
    $Nombre=$_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $Correo=$_POST['Correo'];
    $Telefono=$_POST['Telefono'];
    if (isset($_POST['sub'])) {
        echo"entró";

    $sql = "INSERT INTO clientes (cedula, nombre, apellido, correo, Telefono) VALUES ('$cedula','$Nombre','$Apellido','$Correo','$Telefono')";
    $rs = mysqli_query($con,$sql);
    if ($rs) {
        header('location:main.php');
    }
}
?>