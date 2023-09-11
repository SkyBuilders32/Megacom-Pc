<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['edit'])){
    
            $nit = $_GET['nit'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $telefono = $_POST['telefono'];
            $sql = "UPDATE proveedores SET nombre = '$nombre', correo = '$correo', direccion = '$direccion', ciudad = '$ciudad', telefono = '$telefono' WHERE nit = '$nit'";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>