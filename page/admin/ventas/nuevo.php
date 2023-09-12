<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
 
            $sql = "INSERT INTO clientes (cedula, nombre, apellido, correo) VALUES ('$cedula','$nombre','$apellido','$correo')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>