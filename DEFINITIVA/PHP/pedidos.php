<?php
include "conexion.php";
$consulta=mysqli_query($con, "SELECT * FROM productos ORDER BY Modelo DESC" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
    <title>Pedidos</title>
</head>
<body>
<div class="container-sm" style="padding-top: 20px;">
<form action="guardar.php" method="POST">
    <div class="mb-3">
        <label for="cliente" class="form-label">cliente:</label>
        <input type="text" class="form-control" id="cliente" name="cliente">
    </div>
    <div class="mb-3">
        <label for="Id_producto" class="form-label">Id_producto</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Id_producto">
  <option>Open this select menu</option>
<?php
            while ($pr = mysqli_fetch_array($consulta)){
                echo " <option value=".$pr[0]." > ".$pr[1]." / ".$pr[2]." / ".$pr[5]." </option>"; 
            }
?>
</select>
    </div>
    <div class="mb-3">
        <label for="fecha_realizacion_pedido" class="form-label">Fecha de relizacion:</label>
        <input type="date" class="form-control" name="Nit" id="Nit">
    </div>
        
    <div class="mb-3">
        <label for="cantidad" class="form-label">fecha_entrega_pedido:</label>
        <input type="date" class="form-control" id="fecha_entrega_pedido" name="fecha_entrega_pedido">
    </div>
    <div class="mb-3">
        <label for="Id_producto" class="form-label">Direccion:</label>
        <input type="text" class="form-control" id="direccion" name="direccion">
    </div>  
        

        <input type="submit" class="btn btn-primary" value="send" name="submit">
    </form>
    </div>
    </body>
</html>