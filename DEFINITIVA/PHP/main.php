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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>
</head>
<body>
<div class="container-md" style="padding-top: 70px;">
    <div class="d-grid gap-2">
        <a href="proveedor.php" class="btn btn-primary" ><button class="btn" type="button" value="proveedor" name="proveedor" style="color: white;">Proveedor</button> </a>       
        <a href="mclientes.php" class="btn btn-primary"><button class="btn " type="button" value="clientes" name="clientes" style="color: white;"> Clientes </button></a>     
        <a href="productos.php" class="btn btn-primary"> <button class="btn " type="button" value="productos" name="productos" style="color: white;"> Productos </button></a> 
        <a href="pedidos.php" class="btn btn-primary"> <button class="btn " type="button" value="pedidos" name="pedidos" style="color: white;"> Pedidos </button></a>   
        <a href="facturas.php" class="btn btn-primary"> <button class="btn " type="button" value="facturas" name="facturas" style="color: white;"> Facturas </button></a> 
    </div>
    </div>
</body>
</html>

