<?php
session_start();
include '../../../conexion/conexion.php';

if (isset($_POST['edit'])) {
    $id_producto = $_GET['id_producto'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio_base = $_POST['precio_base'];
    $existencias = $_POST['existencias'];
    $descripcion = $_POST['descripcion'];
    $proveedor = $_POST['proveedor'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre = $_FILES['imagen']['tmp_name']; // nombre temporal
        $truta = 'imagenes/' . $_FILES['imagen']['name']; // ruta según la ubicación de tus archivos
        move_uploaded_file($nombre, $truta); // mueve la imagen a la carpeta del proyecto
        $upd = "UPDATE productos SET imagen='$truta', marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', descripcion='$descripcion', proveedor='$proveedor' WHERE id_producto like $id_producto";
    } else {
        $upd = "UPDATE productos SET marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', descripcion='$descripcion', proveedor='$proveedor' WHERE id_producto like $id_producto";
    }

    $query = mysqli_query($con, $upd);
}

header('location: index.php');
?>
