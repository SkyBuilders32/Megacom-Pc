<?php

    session_start();

    if(isset($_SESSION['correo'])){
        header("location: Sidebar/index.php");
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css" />
    <title>Sign in - Sign up</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="post" class="sign-in-form">
                    <h2 class="title">Iniciar Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña"/>
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn solid" />
                    <p class="social-text">O inicia sesión con plataformas</p>
                    <div class="social-media">
                        <a href="https://web.facebook.com/login.php?skip_api_login=1&api_key=849252695179784&kid_directed_site=0&app_id=849252695179784&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv3.0%2Fdialog%2Foauth%3Fclient_id%3D849252695179784%26redirect_uri%3Dhttps%253A%252F%252Fauthorize.iconscout.com%252Fregister%252Ffacebook%252Fcallback%26scope%3Demail%26response_type%3Dcode%26ret%3Dlogin%26fbapp_pres%3D0%26logger_id%3D324991b0-4aa1-4c18-85f0-82a68fdb5250%26tp%3Dunspecified&cancel_url=https%3A%2F%2Fauthorize.iconscout.com%2Fregister%2Ffacebook%2Fcallback%3Ferror%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%23_%3D_&display=page&locale=es_LA&pl_dbl=0&_rdc=1&_rdr"
                            class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/i/flow/login" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://accounts.google.com/o/oauth2/auth/oauthchooseaccount?client_id=301433174578-dts71njg8qairruf44dsa1s5gagarji0.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fauthorize.iconscout.com%2Fregister%2Fgoogle%2Fcallback&scope=openid%20profile%20email&response_type=code&flowName=GeneralOAuthFlow"
                            class="social-icon">
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
                        <input type="password" name="contraseña" placeholder="Contraseña" />
                    </div>
                    <button type="submit" class="btn" name="registrarse">Registrarse</button>
                    <p class="social-text">O registrate con plataformas sociales</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
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

    <script src="./js/app.js"></script>
</body>

</html>