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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
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
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="../index.php" class="active"><i class='bx bxs-dashboard icon'></i> Panel</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Productos <i
						class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Computadores</a></li>
					<li><a href="#">Celulares</a></li>
					<li><a href="#">Tablets</a></li>
					<li><a href="#">Accesorios</a></li>
				</ul>
			</li>
			<li><a href="../users/index.php"><i class='bx bxs-chart icon'></i>Usuarios</a></li>
			<li><a href="index.php"><i class='bx bxs-widget icon'></i>Clientes</a></li>
			<li class="divider" data-text="table and forms">Table and forms</li>
			<li><a href="#"><i class='bx bx-table icon'></i> Tables</a></li>
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
					<li><a href="../../cerrar_sesion.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->
		<div class="container">
			<h1 class="page-header text-center">Usuarios</h1>
			<div class="row">
				<div class="col-auto">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo usuario   <i class="fa fa-plus"></i> </a></button>
				</div>
				<div class="col-12 mt-3">
					<table class="table table-bordered table-striped table_id" id="mitabla" style="margin-top:20px;">
						<thead>
							<tr>
								<th class="">Cedula</th>
								<th class="">Nombre</th>
								<th class="">Apellido</th>
								<th class="">Correo</th>
								<th class="">Telefono</th>
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
										<?php echo $mostrar['Cedula'] ?>
									</td>
									<td class="">
										<?php echo $mostrar['nombre'] ?>
									</td>
									<td class="">
										<?php echo $mostrar['apellido'] ?>
									</td>
									<td class="">
										<?php echo $mostrar['correo'] ?>
									</td>
									<td class="">
										<?php echo $mostrar['Telefono'] ?>
									</td>
									<td>
										<a href="#edit_<?php echo $mostrar['Cedula']; ?>" class="btn btn-success btn-sm"
											data-bs-toggle="modal">
											Edit</a>
										<a href="#delete_<?php echo $mostrar['Cedula']; ?>" class="btn btn-danger btn-sm"
											data-bs-toggle="modal">
											Delete</a>
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

<!--VENTANA MODAL-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <ad>

<body id="page-top">

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <form  action="guardarcliente.php" method="POST" >

                          <div class="form-group">
                                <label for="cedula">Cedula:</label><br>
                                <input type="number" name="Cedula" id="cedula" class="form-control" placeholder="">
                            </div>  
                            
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text"  id="nombre" name="Nombre" class="form-control">
                            </div>

                            <div class="form-group">
                            <label for="apellido" class="form-label">apellido</label>
                            <input type="text"  id="apellido" name="Apellido" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="nombre" class="form-label">Correo</label>
                              <input type="email"  id="correo" name="Correo" class="form-control">
                            
                            <div class="form-group">
                                  <label for="telefono" class="form-label">Telefono</label>
                                <input type="tel"  id="telefono" name="Telefono" class="form-control">
                             
                            </div>
                      <br>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="sub">
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                       

                        </form>
                        </div>link rel="stylesheet" href="./package/dist/sweetalert2.css">
</he> 		
</html>