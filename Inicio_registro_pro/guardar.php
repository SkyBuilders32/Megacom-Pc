<?php
include 'conexion.php';
if (isset($_POST['registrarse'])){
    echo"entro";
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];


    $sql = "INSERT INTO usuarios (correo, contraseña) VALUES ('$correo','$contraseña')";

    $veri = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' ");
    if (mysqli_num_rows($veri) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, porfavor Inicie Sesion");
            </script>
            window.location = "index.php";
        ';
    }

    $resultado = mysqli_query($con,$sql);
    if($resultado){
        echo '
            <script>
                alert("Correo almacenado exitosamente");
                window.location = "index.php";
            </script>
        ';
    }
    else {
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no almacenado");
                window.location = "index.php";
            </script>
        ';
    }
}

mysqli_close($con);

// <?php
// include 'Conexion.php';
// echo"entró al guardar";
//     $Nit=$_POST['Nit'];
//     $Nombre=$_POST['nombre'];
//     $Direccion=$_POST['direccion'];
//     $Ciudad=$_POST['ciudad'];
//     $Telefono=$_POST['Telefono'];
//     if (isset($_POST['submit'])) {
//         echo"entró";

//     $func = "INSERT INTO proveedores (Nit, nombre, direccion, ciudad, telefono) VALUES ('$Nit','$Nombre','$Direccion','$Ciudad','$Telefono')";
//     $result = mysqli_query($con,$func);
//     if ($result) {
//         header('location:Index.php');
//     }
// }
// ?>
?>
