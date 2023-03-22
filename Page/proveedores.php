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
//clientes
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
        header('location:Index.php');
    }
}
?>