<?php


include 'conexion.php';

$correo= $_POST['correo'];
$contraseña= $_POST['contraseña'];


$validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'");

$fila = mysqli_fetch_array($validar_login);

if(mysqli_num_rows($validar_login) > 0) {
    session_start();
    $_SESSION['correo'] = $fila[1];
    $_SESSION['rol'] = $fila[3];
    if ($fila[3] == 1) {
        header("location:../admin/index.php");
    }
    else {
        header("location:../index.php");
    }
    exit;
}
elseif (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['correo'] = $correo;
    header("location:index.php");
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