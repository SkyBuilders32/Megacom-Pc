<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $cedula = $_POST['cedula_cliente'];
            $nombre = $_POST['nom_cliente'];
            $apellido = $_POST['ap_cliente'];
            $correo = $_POST['cor_cliente'];
 
            $sql = "INSERT INTO clientes (cedula, nombre, apellido, correo) VALUES ('$cedula','$nombre','$apellido','$correo')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>