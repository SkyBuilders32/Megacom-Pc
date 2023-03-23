<?php

session_start();

include 'conexion.php';

$correo= $_POST['correo'];
$contraseña= $_POST['contraseña'];


$validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'");

if(mysqli_num_rows($validar_login) > 0) {
    $_SESSION['correo'] = $correo;
    header("location:index.php");
    exit;
}else{
    echo'<script>
    alert("Usuario no existe, por favor verifique los datos introducidos");
    window.location = "index.php"; 
    </script>';
    exit;
}
?>