
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
            $proveedor = $_POST['proveedor'];
            
 
            $upd = "UPDATE productos set marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', descripcion='$descripcion', proveedor='$proveedor' WHERE id_producto like $id_producto";

            $query = mysqli_query($con, $upd);
 
        }
        
    header('location: index.php');
 
?>