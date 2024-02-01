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
    <link rel="stylesheet" href="style.css">
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
        <!-- /NAVBAR -->
        <div>
            <h5>BUSCAR FOR FECHA:</h5>
            <form action="buscar_venta.php" method="get" class="form_search_date">
                <label>De:</label>
                <input type="date" name="fecha_de" id="fecha_de" required>
                <label>A:</label>
                <input type="date" name="fecha_a" id="fecha_a" required>
                <label><button type="submit" class="btn btn-info"> <i class="bx bx-search-alt"></i></button></label>
            </form>
        </div>

        <div class="container">
            <h1 class="page-header text-center">Ventas</h1>
            <div class="row">
                <div class="col-auto">
                    <a href="nuevaventa.php" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>Nuevo Venta</a>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th class="">Id Venta</th>
                                <th class="">Fecha</th>
                                <th class="">Cliente</th>
                                <th class="">vendedor</th>
                                <th class="">Estado</th>
                                
                                <th class="textright">Monto Total</th>
                                <th class="textright">Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT f.Id_factura, f.fecha, f.cliente, f.totalfactura, f.estatus,
                            u.usuario as usuario,
                            cl.nombre as cliente
                            from facturas f 
                            INNER JOIN usuarios u 
                            on f.usuario = u.id
                            inner join clientes cl
                            on f.cliente = cl.Id
                            where f.estatus != 10
                            order by f.fecha DESC"; 
                            

                            $query = mysqli_query($con, $sql); 

							while ($mostrar = $query->fetch_assoc()) { 
                                if ($mostrar['estatus'] == 1) {
                                    $estado = '<span class="bg-success-subtle">PAGADA</span>';
                                } else {
                                    $estado = '<span class="bg-danger-subtle">ANULADA</span>';
                                }
                                
                                ?>
                            <tr id="row_<?php echo $mostrar['Id_factura'];?>">
                                <td class="">
                                    <?php echo $mostrar['Id_factura'] ?>
                                </td>                                
                                <td class="">
                                    <?php echo $mostrar['fecha'] ?>
                                </td>
                        
                                <td class="">
                                    <?php echo $mostrar['cliente'] ?>
                                </td>
                                
                                <td class="">
                                    <?php echo $mostrar['usuario']?>
                                </td>
                                <td class="">
                                    <?php echo $estado?>
                                </td>
                                <td class="">
                                    <?php echo $mostrar['totalfactura'] ?>
                                </td>
                                <td>
                                    <div class="div_acciones">
                                    <div>
                                    <button class="btn btn-info view_factura" type="button" cl="<?php echo $mostrar['Id'];?>"  f="<?php echo $mostrar['Id_factura'];?>"><i class='bx bxs-detail'></i></button>
                                    </div>
                                    </div>
                                </td>
                        
                                
                            </tr>
                            <?php
							}
							?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
                integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
                integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
                crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
            <script src="../assets/js/app.js"></script>
            <script src="../assets/js/buscador.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                var usuarioid = '<?php echo $_SESSION['id']; ?>';
                searchfordetalle(usuarioid); 
            });       
        </script>

</body>


</html>