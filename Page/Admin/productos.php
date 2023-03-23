<?php

session_start();

if(!isset($_SESSION['correo'])){
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../Inicio_registro_pro/index.php";
    </script>
    ';
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megacom</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Assets/css/prueba.css">
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <a href="index.html" class="nav__brand">Productos</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="prueba.php" class="nav__link">
                            <i class="ri-home-line nav__icon"></i>
                            Inicio
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="productos.php" class="nav__link">
                            <i class="ri-user-line nav__icon"></i>
                            Productos
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="proveedores.php" class="nav__link">
                            <i class="ri-briefcase-line nav__icon"></i>
                            Proovedores</a>
                    </li>
                    <li class="nav__item">
                        <a href="../Inicio_registro_pro/cerrar_sesion.php" class="nav__link">
                            <i class="ri-folders-line nav__icon"></i>
                            Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <div class="nav__buttons">
                <span class="nav__toggle">
                    <i id="nav-toggle" class="ri-menu-4-line"></i>
                </span>
            </div>
        </nav>
    </header>


    <!--=================== SwiperJS  ====================-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!--=================== ScrollReveal ==================-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=================== Main JS ====================-->
    <script src="Assets/js/main.js"></script>
</body>

</html>