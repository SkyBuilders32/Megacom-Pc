<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
 
            $sql = "INSERT INTO clientes (Cedula, nombre, apellido, correo, Telefono) VALUES ('$cedula','$nombre','$apellido','$correo','$telefono' )";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>