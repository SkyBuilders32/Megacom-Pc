<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../../conexion/conexion.php';
include '../../sweetalerts/sweetalerts.php';
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);

//sesion

session_start();
if (!isset($_SESSION['correo'])) {
  echo $ple_sign_1;
session_destroy();
    die();
}
$rol = $_SESSION['rol'];
if ($rol == 2) {
    echo '
    <script>
        alert("No tienes permiso para entrar aqui");
        window.location = "../index.php";
    </script>
    ';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">

    <title>AdminSite</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
        <ul class="side-menu">
            <li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i> Panel</a></li>
            <li class="divider" data-text="main">Main</li>
            <li>
                <a href="productos/index.php"><i class='bx bxs-inbox icon'></i> Productos <i
                        class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="productos/index.php">Computadores</a></li>
                    <li><a href="#">Celulares</a></li>
                    <li><a href="#">Tablets</a></li>
                    <li><a href="#">Accesorios</a></li>
                </ul>
            </li>
            <li><a href="clientes/index.php"><i class='bx bxs-widget icon'></i>Clientes</a></li>
            <li><a href="proveedores/index.php"><i class='bx bxs-widget icon'></i>Provedores</a></li>
            <li><a href="ventas/index.php"><i class='bx bxs-widget icon'></i>Ventas</a></li>
            <li><a href="stocks/index.php"><i class='bx bxs-widget icon'></i>Stocks</a></li>
            <li>
                <a href="#"><i class='bx bxs-notepad icon'></i> Forms <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Basic</a></li>
                    <li><a href="#">Select</a></li>
                    <li><a href="#">Checkbox</a></li>
                    <li><a href="#">Radio</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <span class="divider"></span>
            <div class="profile">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
                    <li><a href="../cerrar_sesion.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <section>

            <div class="container_inve">
                <div class="item">
                    <img src="assets/media/products.svg" alt="Productos" class="item__image">
                    <h3 class="item__name">Productos</h3>
                    <p class="item__description">Cantidad de productos</p>
                    <?php
		$result = mysqli_query($con, "SELECT COUNT(1) AS Total FROM productos");
		$row = mysqli_fetch_assoc($result);
		echo '<span class="item__price"> '.$row['Total'].'</span>';
		?>
                </div>
                <div class="item">
                    <img src="assets/media/clients.svg" alt="Producto 2" class="item__image">
                    <h3 class="item__name">Clientes</h3>
                    <p class="item__description">Cantidad de clientes</p>
                    <?php
		$result = mysqli_query($con, "SELECT COUNT(1) AS Total FROM clientes");
		$row = mysqli_fetch_assoc($result);
		echo '<span class="item__price"> '.$row['Total'].'</span>';
		?>
                </div>
				
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="assets/js/app.js"></script>
</body>

</html>