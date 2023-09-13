<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../../../conexion/conexion.php';
include '../../../sweetalerts/sweetalerts.php';
$sql = "SELECT * FROM usuarios";
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
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 

    <title>Venta</title>
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
            <li><a href="../index.php"><i class='bx bxs-dashboard icon'></i> Panel</a></li>
            <li class="divider" data-text="main">Main</li>

            <li><a href="../productos/index.php"><i class='bx bxs-inbox icon'></i>Productos</a></li>
            <li><a href="../clientes/index.php"><i class='bx bxs-widget icon'></i>Clientes</a></li>
            <li><a href="../users/index.php"><i class='bx bxs-widget icon'></i>Usuarios</a></li>
            <li><a href="../proveedores/index.php"><i class='bx bxs-widget icon'></i>Provedores</a></li>
            <li><a href="index.php" class="active"><i class='bx bxs-widget icon'></i>Ventas</a></li>
            <li><a href="../stocks/index.php"><i class='bx bxs-widget icon'></i>Stocks</a></li>

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
        <div class="container">
            <h1 class="page-header text-center">Ventas</h1>
            <div class="row">
                <div class="col-auto">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo"><i
                            class="fa-solid fa-circle-plus"></i>Nuevo Venta</a>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-bordered table-striped table_id" id="mitabla" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th class="">Id Venta</th>
                                <th class="">Cantidad</th>
                                <th class="">Fecha</th>
                                <th class="">Cliente</th>
                                <th class="">Productos</th>
                                <th class="">Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ventas.*,a.marca, a.id_producto, c.modelo, c.id_producto, b.nombre, b.Id FROM ventas
                        INNER JOIN productos as c ON ventas.productos = c.id_producto
                        INNER JOIN clientes as b ON ventas.cliente = b.Id
                        INNER JOIN productos as a ON ventas.productos = a.id_producto";
                            

                            $query = mysqli_query($con, $sql); 

							while ($mostrar = $query->fetch_assoc()) { ?>
                            <tr>
                                <td class="">
                                    <?php echo $mostrar['id_venta'] ?>
                                </td>                                
                                <td class="">
                                    <?php echo $mostrar['cantidad'] ?>
                                </td>
                        
                                <td class="">
                                    <?php echo $mostrar['fecha'] ?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['nombre'] ?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['modelo'] ." ". $mostrar['marca'] ?>
                                </td>
                                
                                </td>
                                <td class="text-center">
                                    <a href="#edit_<?php echo $mostrar['id_venta']; ?>"
                                        class="btn btn-success btn-sm text-center" data-bs-toggle="modal">
                                        <i class='bx bxs-pencil'></i></a>
                                    <a href="#delet_<?php echo $mostrar['id_venta']; ?>"
                                        class="btn btn-danger btn-sm text-center" data-bs-toggle="modal">
                                        <i class='bx bxs-trash-alt'></i></a>
                                </td>
                                <?php include('eliminar-editar.php'); ?>
                            </tr>
                            <?php
							}
							?>
                        </tbody>
                    </table>
                </div>
            </div>

</body>

</html>