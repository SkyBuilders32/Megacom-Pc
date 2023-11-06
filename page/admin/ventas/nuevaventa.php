<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../../../conexion/conexion.php';
include '../../../sweetalerts/sweetalerts.php';
$sql = "SELECT * FROM productos";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
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
		<a href="" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="../index.php"><i class='bx bxs-dashboard icon' ></i> Panel</a></li>
			<li class="divider" data-text="main">Main</li>
            <li><a href="index.php" ><i class='bx bxs-inbox icon'></i>Productos</a></li>
			<li><a href="../clientes/index.php"><i class='bx bxs-widget icon' ></i>Clientes</a></li>
			<li><a href="../users/index.php"><i class='bx bxs-widget icon' ></i>Usuarios</a></li>
			<li><a href="../proveedores/index.php"><i class='bx bxs-widget icon' ></i>Provedores</a></li>
			<li><a href="../ventas/index.php" class="active"><i class='bx bxs-widget icon' ></i>Ventas</a></li>
			<li><a href="../stocks/index.php"><i class='bx bxs-widget icon' ></i>Stocks</a></li>

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

        <section id="container" > 
            <div class="title_page">
                <h1><i class="bx bxs-package"></i> Nueva Venta</h1>
            </div>
        <div class="datos_cliente">
            <div class="action_cliente">
                <h4>Datos del Cliente</h4>
                <a href="#" class="btn btn-primary btn_new_cliente"><i class='bx bx-plus'></i>Nuevo Cliente</a>
            </div>

            <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos">
                <input type="hidden" name="action" value="addCliente">
                <input type="hidden" id="idcliente" name="idcliente" value="" required>
                <div class="wd30">
                    <label for="cedula">Cedula</label>
                <input type="number" name="cedula_cliente" id="cedula_cliente">
                </div>

                <div class="wd30">
                    <label for="nombre">Nombre</label>
                <input type="text" name="nom_cliente" id="nom_cliente" disabled required>
                </div>

                <div class="wd30">
                    <label for="apellidp">Apellido</label>
                <input type="text" name="ap_cliente" id="ap_cliente" disabled required>
                </div>
    
                <div class="wd30">
                    <label for="telefono">Télefono</label>
                <input type="number" name="tel_cliente" id="tel_cliente" disabled required>
                </div>

                <div class="wd30">
                    <label for="">Correo</label>
                <input type="text" name="cor_cliente" id="cor_cliente" disabled required>
                </div>
                <div id="div_registro_cliente" class="wd100">
                    <button type="submit" class="btn_save btn btn-primary"><i class='bx bxs-save'></i>Guardar</button>
                </div>
            </form>
        </div>
        <div class="datos_venta">
            <h4>Datos de Venta</h4>
            <div class="datos">
                <div class="wd50">
                    <label for="vendedor">Vendedor</label>
                    <p>Juan Manuel Usme</p>
                </div>
                <div class="wd50">
                    <label for="acciones">Acciones</label>
                    <div id="acciones_venta">
                        <a href="#" class="btn_ok textcenter" id="btn_anular_venta"> <i class="fas fa-ban"></i>Anular</a>
                        <a href="#" class="btn_new textcenter" id="btn_facturar_venta"> <i class="fas fa-edit"></i>Procesar</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped" style="margin-top:20px;">
            <thead>
                <tr>
                    <th width="100px">Codigo</th>
                    <th>Decripcion</th>
                    <th>Existencias</th>
                    <th width="100px">Cantidad</th>
                    <th class="textright">Precio</th>
                    <th class="textright">Precio Total</th>
                    <th>Accion</th>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
                    <td id="txt_descripcion">-</td>
                    <td id="txt_existencia">-</td>
                    <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
                    <td id="txt_precio" class="textright">0.00</td>
                    <td id="txt_precio_total" class="textright">0.00</td>
                    <td> <a href="" id="add_product_venta" class="link_add"><i class="fas fa-plus"></i>Agregar</a></td>
                </tr>
                <tr>
                <th>Codigo</th>
                    <th colspan="2">Decripcion</th>
                    <th>Cantidad</th>
                    <th class="textright">Precio</th>
                    <th class="textright">Precio Total</th> 
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody id="detalle_venta" >
                <tr>
                    <td>1</td>
                    <td colspan="2">Asus</td>
                    <td class="textcenter">1</td>
                    <td class="textright">100.00</td>
                    <td class="textright">100.00</td>
                    <td class="">
                        <a class="link_delete" href="#" onclick="event.preventDefault();
                        del_product_detalle(1);"> <i class=""></i> </a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="textright"> SUBTOTAL Q.</td>
                    <td class="textright">88.00</td>
                </tr>
                <tr>
                    <td colspan="5" class="textright">IVA 19%</td>
                    <td class="textright">19</td>
                </tr>
            </tfoot>
        </table>
        </section>


            
        
        
        
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
                integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
                integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
                crossorigin="anonymous"></script>
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
            
        