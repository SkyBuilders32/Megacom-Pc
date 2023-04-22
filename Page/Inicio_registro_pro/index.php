<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include 'conexion.php';
include 'sweetalerts.php';
session_start();

if (isset($_SESSION['correo'])) {
    header("location: ../index.php");
}
// Guardar los datos
if (isset($_POST['registrarse'])) {
    $correo = $_POST['correo'];
    $veri = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $con->query($veri);
    if ($result->num_rows > 0) {
        echo $repet_registro;
    } else {
        $contraseña = $_POST['contraseña'];
        $sql = "INSERT INTO usuarios (correo, contraseña, rol) VALUES ('$correo','$contraseña', 2)";
        if ($con->query($sql) === TRUE) {
            echo $correo_ok;
        } else {
            echo $error_user;
        }
    }
}
//login
if (isset($_POST['inicio'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'");

    $fila = mysqli_fetch_array($validar_login);

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['correo'] = $fila[1];
        $_SESSION['rol'] = $fila[3];
        if ($fila[3] == 1) {
            echo $inicio_admin;
        } else {
            header("location:../index.php");
        }
        exit;
    } elseif (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['correo'] = $correo;
        header("location:index.php");
        exit;
    } else {
        echo $error_inicio;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css" />
    <title>Inicio de Sesion y Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="js/guardar.js"></script> -->
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <a href="../../index.html" class="regresar-left">Regresar</a>
            <a href="../../index.html" class="regresar-right">Regresar</a>
            <div class="signin-signup">
                <form action="index.php" method="post" class="sign-in-form">
                    <h2 class="title">Iniciar Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="myInput" required />
                        <span class="icon-eye" onclick="myFuntion()">
                            <i class="fas fa-eye" id="hide1"></i>
                            <i class="fas fa-eye-slash" id="hide2"></i>
                        </span>
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn solid" name="inicio" />
                    <p class="social-text">O inicia sesión con plataformas</p>
                    <div class="social-media">
                        <a href="https://facebook.com" class="social-icon-fa">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/i/flow/login" class="social-icon-tw">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://google.com" class="social-icon-go">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

                <form action="index.php" method="POST" class="sign-up-form">
                    <h2 class="title">Registrate</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="correo" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="myinput" required />
                        <span class="icon-eye" onclick="myfuntion()">
                            <i class="fas fa-eye" id="hide3"></i>
                            <i class="fas fa-eye-slash" id="hide4"></i>
                        </span>
                    </div>
                    <!-- <a onclick="alerta_registro()" class="btn" name="registrarse">Registrarse</a> -->

                    <input type="submit" class="btn" value="registrarse" name="registrarse"></input>
                    <p class="social-text">O registrate con plataformas sociales</p>
                    <div class="social-media">
                        <a href="#" class="social-icon-fa">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon-tw">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon-go">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nuevo Aquí?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, ex ratione. Aliquid!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Registrate</button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Ya tienes cuenta?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Inicia Sesión
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    

    <script src="js/app.js"></script>

</body>

</html>