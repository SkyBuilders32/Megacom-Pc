<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../../../conexion/conexion.php';
include '../../../sweetalerts/sweetalerts.php';

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
        alert("No  tienes permiso para entrar aqui");
        window.location = "../index.php";
    </script>
    ';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include "includes/scripts.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Nueva Venta</title>
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
			<li><a href="users/index.php"><i class='bx bxs-widget icon' ></i>Usuarios</a></li>

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
        <section id="container"> 
            <div class="title_page">
                <h1> <i class="fas fa-cube"></i>Nueva Venta </h1>
            </div>
            <div class="datos_cliente">
                <div class="action_cliente">
                    <h4>Datos del cliente</h4>
                    <a href="" class="btn_new btn_new_cliente"> <i class="fas fa-plus"></i>Nuevo Cliente</a>
                </div>

                <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos">
                    <input type="hidden" name="action" value="addcliente">
                    <input type="hidden" id="idcliente" name="idcliente" value="" required>

                    <div class="wd30">
                        <label>Nit</label>
                        <input type="text" name="nit_cliente" id="nit_cliente">
                    </div>

                    <div class="wd30">
                        <label>Nombre</label>
                        <input type="text" name="nom_cliente" id="nom_cliente" disabled required>
                    </div>

                    <div class="wd30">
                        <label>Telefono</label>
                        <input type="number" name="tel_cliente" id="tel_cliente" disabled required>
                    </div>

                    <div class="wd100">
                        <label>Direccion</label>
                        <input type="text" name="dir_cliente" id="dir_cliente" disabled required>
                    </div>
                    <div id="div_registro_cliente" class="wd100"> 
                        <button type="submit" class="btn_save"> <i class="far fa-save fa-lg"></i> Guardar </button>
                    </div>
                </form>
            </div>
        </section>

</body>
</html>