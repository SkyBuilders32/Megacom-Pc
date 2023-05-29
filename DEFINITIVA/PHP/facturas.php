<?php
include "conexion.php";
$consulta=mysqli_query($con, "SELECT * FROM productos ORDER BY Modelo DESC" );
$consult=mysqli_query($con, "SELECT * FROM Clientes ORDER BY nombre DESC" );
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
<form action="guardarfac.php" method="POST">

<label for="cliente" class="form-label">Cliente:</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Id_cliente">
  <option>Open this select menu</option>
<?php
            while ($pr = mysqli_fetch_array($consult)){
                echo " <option value=".$pr[0]." > ".$pr[1]." / ".$pr[2]." / ".$pr[5]." </option>"; 
            }
?>
</select>

<label for="cliente" class="form-label">Producto:</label>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Id_producto">
  <option>Open this select menu</option>
<?php
            while ($pr = mysqli_fetch_array($consulta)){
                echo " <option value=".$pr[0]." > ".$pr[1]." / ".$pr[2]." / ".$pr[5]." </option>"; 
            }
?>
</select>

    <div class="mb-3">
        <label for="valor_total" class="form-label">Valor de la factura:</label>
        <input type="number" class="form-control" name="valor_total" id="valor_total">
    </div>
    
    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
    </div> 
    
    <input type="submit" class="btn btn-primary" value="send" name="submit">
    </form>
    </div>
    </body>
</html>