
<?php
$id_producto=$_GET['id'];
include "Conexion.php";
$consulta=mysqli_query($con, "SELECT * FROM proveedores ORDER BY Nombre DESC" );
$csl= "SELECT * FROM productos WHERE id_producto = $id_producto";
$cos= mysqli_query($con,$csl);
$reg= mysqli_fetch_array($cos);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="actualizarproducto.php" method="POST">
    <input type="number" name="id_producto" value="<?php echo $reg[0] ?>" >
        <label for="marca">Marca del equipo:</label>
        <input type="text" name="marca" id="marca" value="<?php echo $reg[1] ?>">
         
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value=<?php echo $reg[2] ?>>
        
        <label for="proveedor" class="visually">Selecciona el proveedor:</label>
        <select required class="form-select" name="proveedor">
            <option value="<?php echo $reg[3] ?>"><?php echo $reg[3] ?></option>
            <?php
            while ($p = mysqli_fetch_array($consulta)){
                echo " <option value=".$p[0]." > ".$p[1]." / ".$p[2]." / ".$p[5]." </option>"; 
            }
?>
        </select>
        
        <label for="precio_base">Precio:</label>
        <input type="number" id="precio_base" name="precio_base" value="<?php echo $reg[4] ?>">
        
        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" value="<?php echo $reg[5] ?>">
        
        <label for="disponibilidad">Disponibilidad:</label>
        <input type="text" id="disponibilidad" name="disponibilidad" value="<?php echo $reg[6] ?>">

        <label for="Descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $reg[7] ?>">

        <input type="submit" value="send" name="submit">
    </form>

</body>
</html>
