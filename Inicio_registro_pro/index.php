<?php

    session_start();

    if(isset($_SESSION['correo'])){
        header("location: ../page/admin/index.php");
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"  />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css" />
    <title>Inicio de Sesion y Registro</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="post" class="sign-in-form">
                    <h2 class="title">Iniciar Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Email" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="myInput" required/>
                        <span class="icon-eye" onclick="myFuntion()">
                        <i class="fas fa-eye" id="hide1"></i>
                        <i class="fas fa-eye-slash" id="hide2"></i>
                        </span>
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn solid" />
                    <p class="social-text">O inicia sesión con plataformas</p>
                    <div class="social-media">
                        <a href="https://facebook.com"
                            class="social-icon-fa">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/i/flow/login" class="social-icon-tw">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://google.com"
                            class="social-icon-go">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
                <form action="guardar.php" method="POST" class="sign-up-form">
                    <h2 class="title">Registrate</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="myinput" required/>
                        <span class="icon-eye" onclick="myfuntion()">
                        <i class="fas fa-eye" id="hide3"></i>
                        <i class="fas fa-eye-slash" id="hide4"></i>
                        </span>
                    </div>
                    <button type="submit" class="btn" name="registrarse">Registrarse</button>
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