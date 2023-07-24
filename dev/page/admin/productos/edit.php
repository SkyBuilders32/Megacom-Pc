
<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['edit'])){
    
            $id_producto = $_GET['id_producto'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio_base = $_POST['precio_base'];
            $existencias = $_POST['existencias'];
            $descripcion = $_POST['descripcion'];
            $id_proveedor = $_POST['id_proveedor'];
            
 
            $upd = "UPDATE productos set marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', descripcion='$descripcion', id_proveedor='$id_proveedor' WHERE id_producto like $id_producto";

            $query = mysqli_query($con, $upd);
 
        }
        
    header('location: index.php');
 
?>