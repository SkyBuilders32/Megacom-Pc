<?php

session_start();

if (!isset($_SESSION['correo'])) {
  echo '
    <script>
        alert("Por favor, debes iniciar sesion");
        window.location = "../sign-in-up/index.php";
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
  <title>Megacom-Pc</title>
  <link rel="stylesheet" href="../page-inicio/assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>

<body id="top">
  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">Megacom-Pc</a>
      </h1>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">Megacom-Pc</a>

          <button class="nav-close-btn" aria-label="Close menu" data-nav-toggler>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li class="navbar-item activ">
            <a href="index.php" class="navbar-link" data-nav-toggler>Inicio</a>
          </li>

          <li class="navbar-item">
            <a href="../page-inicio/proyectos.php" class="navbar-link" data-nav-toggler>Productos</a>
          </li>

          <li class="navbar-item">
            <a href="../page-inicio/servicios.php" class="navbar-link" data-nav-toggler>Servicios</a>
          </li>

          <li class="navbar-item">
            <a href="nosotros.php" class="navbar-link" data-nav-toggler>Nosotros</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-toggler>Contactanos</a>
          </li>

        </ul>

      </nav>

      <div class="header-actions">
        <button class="header-action-btn" aria-label="Open search" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>
        
        <div class="header-action-btn login-btn profile">
          <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
          <span class="span img">
            <?php echo $_SESSION['correo'] ?>
            <ul class="profile-link">
              <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
              <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
              <li><a href="cerrar_sesion.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
            </ul>
          </span>
        </div>

        <button class="header-action-btn nav-open-btn" aria-label="Open menu" data-nav-toggler>
          <ion-icon name="menu-outline"></ion-icon>
        </button>
      </div>
      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <!-- 
    - #SEARCH BOX
  -->

  <div class="search-container" data-search-box>
    <div class="container">

      <button class="search-close-btn" aria-label="Close search" data-search-toggler>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="search-wrapper">
        <input type="search" name="search" placeholder="Search Here..." aria-label="Search" class="search-field">

        <button class="search-submit" aria-label="Submit" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </div>

    </div>
  </div>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home" aria-label="hero"
        style="background-image: url('../page-inicio/assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">La Mejor Tecnologia A Tu Alcance</p>

            <h2 class="h1 hero-title">Componentes Equipos Y Mas</h2>

            <p class="hero-text">
              Sed eu volutpat arcu, a tincidunt nulla quam, feugiat sit amet ipsum a, dapibus porta velit.
            </p>

            <a href="#" class="btn btn-primary">
              <span class="span">Get Started Today</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <img src="../page-inicio/assets/images/hero-banner.png" width="500" height="500" loading="lazy"
              alt="hero image" class="w-100">

            <img src="../page-inicio/assets/images/hero-abs-1.png" width="318" height="352" loading="lazy"
              aria-hidden="true" class="abs-img abs-img-1">

            <img src="../page-inicio/assets/images/hero-abs-2.png" width="160" height="160" loading="lazy"
              aria-hidden="true" class="abs-img abs-img-2">

          </figure>

        </div>
      </section>



      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <img src="../page-inicio/assets/images/about-banner.jpg" width="450" height="590" loading="lazy"
              alt="about banner" class="w-100 about-img">

            <img src="../page-inicio/assets/images/about-abs-1.jpg" width="188" height="242" loading="lazy"
              aria-hidden="true" class="abs-img abs-img-1">

            <img src="../page-inicio/assets/images/about-abs-2.jpg" width="150" height="200" loading="lazy"
              aria-hidden="true" class="abs-img abs-img-2">

          </figure>

          <div class="about-content">

            <p class="section-subtitle">Quienes Somos</p>

            <h2 class="h2 section-title">Ofrecemos La mejor Tecnologia</h2>

            <ul class="about-list">

              <li class="about-item">

                <div class="item-icon item-icon-1">
                  <img src="../page-inicio/assets/images/about-icon-1.png" width="30" height="30" loading="lazy"
                    aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Dispositivos</h3>

                  <p class="item-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna
                    aliqua.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="item-icon item-icon-2">
                  <img src="../page-inicio/assets/images/about-icon-2.png" width="30" height="30" loading="lazy"
                    aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Componentes</h3>

                  <p class="item-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna
                    aliqua.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="item-icon item-icon-3">
                  <img src="../page-inicio/assets/images/about-icon-3.png" width="30" height="30" loading="lazy"
                    aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Accesorios</h3>

                  <p class="item-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna
                    aliqua.
                  </p>
                </div>

              </li>

            </ul>

            <a href="#" class="btn btn-primary">
              <span class="span">Know About Us</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>
      </section>
      <!-- 
        - #NEWSLETTER
      -->

      <section class="section newsletter" aria-label="newsletter"
        style="background-image: url('../page-inicio/assets/images/newsletter-bg.jpg')">
        <div class="container">

          <p class="section-subtitle">Subscribe Newsletter</p>

          <h2 class="h2 section-title">Get Every Latest News</h2>

          <form action="" class="newsletter-form">

            <div class="input-wrapper">
              <input type="email" name="email_address" aria-label="email" placeholder="Enter your mail address" required
                class="email-field">

              <ion-icon name="mail-open-outline" aria-hidden="true"></ion-icon>
            </div>

            <button type="submit" class="btn btn-primary">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </button>

          </form>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">

          <a href="#" class="logo">EduHome</a>

          <p class="section-text">
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its
            layout. The point of using Lorem Ipsum.
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Explore</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">About Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Upcoming Events</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Blog & News</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">FAQ Question</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Testimonial</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Privacy Policy</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Useful Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Contact Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Pricing Plan</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Instructor Profile</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">FAQ</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Popular Courses</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Terms & Conditions</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Info</p>
          </li>

          <li class="footer-item">
            <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

            <address class="footer-link">
              275 Quadra Street Victoria Road, New York
            </address>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+13647657839" class="footer-link">+ 1 (364) 765-7839</a>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+13647657840" class="footer-link">+ 1 (364) 765-7840</a>
          </li>

          <li class="footer-item">
            <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

            <a href="mailto:contact@eduhome.com" class="footer-link">contact@eduhome.com</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">
        <p class="copyright">
          Copyright 2022 EduHome. All Rights Reserved by <a href="#" class="copyright-link">codewithsadee</a>
        </p>
      </div>

    </div>
  </footer>

  <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
    <ion-icon name="arrow-up"></ion-icon>
  </a>
  <script src="../page-inicio/assets/js/app.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>