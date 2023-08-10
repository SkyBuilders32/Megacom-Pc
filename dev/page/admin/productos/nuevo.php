<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio_base = $_POST['precio_base'];
            $existencias = $_POST['existencias'];
            $descripcion = $_POST['descripcion'];
            $proveedor = $_POST['proveedor'];

 
            $sql = "INSERT INTO productos (marca, modelo, precio_base, existencias, descripcion, proveedor) VALUES ('$marca','$modelo','$precio_base','$existencias','$descripcion','$proveedor')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>