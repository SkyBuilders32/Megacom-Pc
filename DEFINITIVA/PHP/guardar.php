

<?php
include 'Conexion.php';
echo"entró al guardar";
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $precio_base=$_POST['precio_base'];
    $precio_descuento=$_POST['precio_descuento'];
    $existencias=$_POST['existencias'];
    $disponibilidad=$_POST['disponibilidad'];
    $descripcion=$_POST['descripcion'];
    $proveedor=$_POST['proveedor'];
    if (isset($_POST['submit'])) {
        echo"entró";

    $produ = "INSERT INTO productos (marca, modelo, precio_base, precio_descuento, existencias, disponibilidad, descripcion, proveedor) VALUES ('$marca','$modelo','$precio_base','$precio_descuento','$existencias', '$disponibilidad', '$descripcion', '$proveedor')";
    $rsp = mysqli_query($con,$produ);
    if ($rsp) {
        header('location:main.php');
    }
}
?>

