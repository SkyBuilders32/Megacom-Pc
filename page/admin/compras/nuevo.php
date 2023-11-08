<?php
    session_start();
    include '../../../conexion/conexion.php';
 
    if(isset($_POST['nuevo'])){
            $proveedor = $_POST['proveedor'];
            $producto = $_POST['producto'];
            $fecha_compra = $_POST['fecha_compra'];
            $cantidad = $_POST['cantidad'];
            $valor_compra = $_POST['valor_compra'];
            $factura = $_POST['factura'];

 
            $sql = "INSERT INTO compras (fecha_compra, producto, cantidad, valor_compra, proveedor, factura) 
            VALUES ('$fecha_compra', '$producto','$cantidad','$valor_compra','$proveedor', '$factura')";
           

            $query = $con->query($sql);
 
        }
        
    header('location: index.php');

?>