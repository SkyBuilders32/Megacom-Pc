<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['edit'])){
    
            $cedula = $_GET['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
 
            $upd = "UPDATE clientes set nombre='$nombre', apellido='$apellido', correo='$correo' WHERE cedula='$cedula'";

            $query = mysqli_query($con, $upd);
 
        }
        
    header('location: index.php');
 
?>