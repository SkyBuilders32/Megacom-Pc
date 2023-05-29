<?php

    $id= $_GET['id'];
    $conexion=mysqli_connect("localhost","root","","megacom");
    $consulta= mysqli_query($conexion,"DELETE FROM clientes WHERE Cedula= '$cedula'");

    header('Location: mclientes.php');
