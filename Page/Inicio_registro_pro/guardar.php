<?php
include 'conexion.php';
if (isset($_POST['registrarse'])) {
    // echo "entro";
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];



    $sql = "INSERT INTO usuarios (correo, contraseña, rol) VALUES ('$correo','$contraseña', 2)";

    $veri = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' ");
    if (mysqli_num_rows($veri) > 0) {
        echo '
            <script>
                alert("Este correo ya esta registrado, porfavor Inicie Sesion");
                window.location = "index.php";
            </script>
        ';
    }

    $resultado = mysqli_query($con, $sql);
    if ($resultado) {
        echo '
            <script>
                alert("Correo almacenado exitosamente");
                window.location = "index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no almacenado");
                window.location = "index.php";
            </script>
        ';
    }
}

mysqli_close($con);

?>