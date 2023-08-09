<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
    
            $nit = $_POST['nit'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $telefono = $_POST['telefono'];
            $sql = "INSERT INTO clientes (nit, nombre, correo, direccion, ciudad, telefono) VALUES ('$nit','$nombre','$correo','$direccion','$ciudad', '$telefono')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>