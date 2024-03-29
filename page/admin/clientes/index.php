<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../../../conexion/conexion.php';
include '../../../sweetalerts/sweetalerts.php';
$sql = "SELECT * FROM clientes";
$query = mysqli_query($con, $sql);
//sesion
session_start();
if (!isset($_SESSION['correo'])) {
	echo $ple_sign_2;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <title>AdminSite</title>
    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../index.php" class="brand"><i class='bx bxs-smile icon'></i>AdminSite</a>
        <ul class="side-menu">
            <li><a href="../"><i class='bx bxs-dashboard icon'></i> Panel</a></li>
            <li class="divider" data-text="main">Main</li>

            <li><a href="../productos/index.php"><i class='bx bxs-inbox icon'></i>Productos</a></li>
            <li><a href="index.php" class="active"><i class='bx bxs-widget icon'></i>Clientes</a></li>
            <li><a href="../users/index.php"><i class='bx bxs-widget icon'></i>Usuarios</a></li>
            <li><a href="../proveedores/index.php"><i class='bx bxs-widget icon'></i>Provedores</a></li>
            <li><a href="../ventas/index.php"><i class='bx bxs-widget icon'></i>Ventas</a></li>
            <li><a href="../compras/index.php"><i class='bx bxs-widget icon' ></i>Compras</a></li>
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
                    <li><a href="../../cerrar_sesion.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->
        <div class="container">
            <h1 class="page-header text-center">Clientes</h1>
            <div class="row">
                <div class="col-auto">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo"><i
                            class="fa-solid fa-circle-plus"></i>Nuevo Cliente</a>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-bordered table-striped table_id" id="mitabla" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th class="">Cedula</th>
                                <th class="">Nombre</th>
                                <th class="">Apellido</th>
                                <th class="">Telefono</th>
                                <th class="">Correo</th>
                                <th class="">Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$sql = "SELECT * FROM clientes";
							$query = mysqli_query($con, $sql);

							while ($mostrar = $query->fetch_assoc()) { ?>
                            <tr>
                                <td class="">
                                    <?php echo $mostrar['cedula'] ?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['nombre'] ?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['apellido'] ?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['Telefono'] ?>
                                    </td>
                                <td class="">
                                    <?php echo $mostrar['correo'] ?>
                                </td>

                                <td class="text-center">
                                    <a href="#edit_<?php echo $mostrar['cedula']; ?>"
                                        class="btn btn-success btn-sm text-center" data-bs-toggle="modal">
                                        <i class='bx bxs-pencil'></i></a>
                                    <a href="#delete_<?php echo $mostrar['cedula']; ?>"
                                        class="btn btn-danger btn-sm text-center" data-bs-toggle="modal">
                                        <i class='bx bxs-trash-alt'></i></a>
                                </td>
                                <?php include('eliminar-editar.php'); ?>
                            </tr>

                            <?php include('eliminar-editar.php'); ?>
                            </tr>
                            <?php
							}
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/buscador.js"></script>
        <script>
        $('#mitabla').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
        </script>
</body>

</html>