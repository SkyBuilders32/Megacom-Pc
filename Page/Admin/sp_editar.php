<?php
$id = $_POST['id'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
include '../../Inicio_registro_pro/conexion.php';
$upd = "UPDATE usuarios set correo='$correo', contraseña='$contraseña' WHERE id like $id";
$query = mysqli_query($con, $upd);
if (!$query) {
    echo "No se actualizo";
} else {
    header("location:prueba.php");
}
?>