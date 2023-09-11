<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
        
        //$ruta='imagenes/'.$_FILES['imagen']['name'];//Captura el nombre de la imagen
        $nombre=$_FILES['imagen']['tmp_name'];//nombre temporal
        $truta='imagenes/'.$_FILES['imagen']['name']; // esta ruta según la ubicación de tus archivos
        move_uploaded_file($nombre,$truta);//manda la imagen a la carpeta del proyecto
            //$imagen = $_POST['imagen'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio_base = $_POST['precio_base'];
            $existencias = $_POST['existencias'];
            $descripcion = $_POST['descripcion'];
            $proveedor = $_POST['proveedor'];

 
            $sql = "INSERT INTO productos (imagen, marca, modelo, precio_base, existencias, descripcion, proveedor) VALUES ('$truta', '$marca','$modelo','$precio_base','$existencias','$descripcion','$proveedor')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>