
<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['edit'])){
    
            $id = $_GET['id'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
 
            $upd = "UPDATE usuarios set usuario='$usuario', correo='$correo', contraseña='$contraseña' WHERE id like $id";

            $query = mysqli_query($con, $upd);
 
        }
        
    header('location: index.php');
 
?>