<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $id_producto = $_POST['id_producto'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio_base = $_POST['precio_base'];
            $existencias = $_POST['existencias'];
            $descripcion = $_POST['descripcion'];
            $id_proveedor = $_POST['id_proveedor'];

 
            $sql = "INSERT INTO productos (id_producto, marca, modelo, precio_base, existencias, descripcion, id_proveedor) VALUES ('$id_producto','$marca','$modelo','$precio_base', '$existencias', '$descripcion' , '$id_proveedor')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>