<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
 
    <link rel="stylesheet" href="../css/es.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
    

    <title>Usuarios</title>
</head>
<br>
<div class="container is-fluid">


<div class="col-xs-12">
  		<h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h1>

		<h1>Lista de usuarios</h1>
    <br>
		<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo usuario   <i class="fa fa-plus"></i> </a></button>

      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>

       <a class="btn btn-primary" href="../includes/excel.php">Excel
       <i class="fa fa-table" aria-hidden="true"></i>
       </a>
       <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
		</div>


  <?php
$conexion=mysqli_connect("localhost","root","","megacom"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE cliente.cedula LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR telefono  LIKE'%".$busqueda."%'";
	}
  
}


?>


  <br>


      <table class="table table-striped table-dark table_id " id="table_id">

                   
                         <thead>    
                         <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","megacom");               
$SQL=mysqli_query($conexion,"SELECT cedula, nombre, apellido, correo, Telefono FROM clientes");

    while($fila=mysqli_fetch_assoc($SQL)):
    
?>
<tr>
<td><?php echo $fila['cedula']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['apellido']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['Telefono']; ?></td>

<td>


<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['cedula']?> ">
<i class="fa fa-edit"></i> </a>


<a class="btn btn-danger btn-del" href="eliminar_user.php?id=<?php echo $fila['cedula']?> ">
<i class="fa fa-trash"></i></a>
</td>
</tr>


<?php endwhile;?>

	</body>
  </table>

  <script>
$('.btn-del').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href')

  Swal.fire({
  title: 'Estas seguro de eliminar este usuario?',
  text: "¡No podrás revertir esto!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!', 
  cancelButtonText: 'Cancelar!', 
}).then((result)=>{
    if(result.value){
        if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El usuario fue eliminado.',
      'success'
    )
  }

        document.location.href= href;
    }   

})
})

  </script>
  
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/user.js"></script>

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