
<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['edit'])){
            $nombre=$_FILES['imagen']['tmp_name'];//nombre temporal
            $truta='imagenes/'.$_FILES['imagen']['name']; // esta ruta según la ubicación de tus archivos
            move_uploaded_file($nombre,$truta);//manda la imagen a la carpeta del proyecto
<<<<<<< Updated upstream
            //$imagen = addslashes(file_get_contents($_FILES ['imagen'] ['tmp_name'] ));
=======
>>>>>>> Stashed changes
            $id_producto = $_GET['id_producto'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio_base = $_POST['precio_base'];
            $existencias = $_POST['existencias'];
            $descripcion = $_POST['descripcion'];
            $proveedor = $_POST['proveedor'];
            
 
            $upd = "UPDATE productos set imagen='$truta',  marca='$marca', modelo='$modelo', precio_base='$precio_base', existencias='$existencias', descripcion='$descripcion', proveedor='$proveedor' WHERE id_producto like $id_producto";

            $query = mysqli_query($con, $upd);
 
        }
        
    header('location: index.php');
 
?>