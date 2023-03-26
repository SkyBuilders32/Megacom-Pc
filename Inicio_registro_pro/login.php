<?php

session_start();

include 'conexion.php';

$correo= $_POST['correo'];
$contraseña= $_POST['contraseña'];


$validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'");
$validar_login_admin = mysqli_query($con, "SELECT * FROM administrador WHERE correo='$correo' and contraseña='$contraseña'");

if(mysqli_num_rows($validar_login_admin) > 0) {
    $_SESSION['correo'] = $correo;
    header("location:../Page/admin/index.php");
    exit;
}
elseif (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['correo'] = $correo;
    header("location:../Page/index.php");
    exit;
}
else{
    echo'<script>
    alert("Usuario no existe, por favor verifique los datos introducidos");
    window.location = "index.php"; 
    </script>';
    exit;
}
?>