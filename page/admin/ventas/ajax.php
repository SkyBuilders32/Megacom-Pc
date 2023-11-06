<?php
//conexion
$con = new mysqli('localhost', 'root', '', 'megacom');

if ($con->connect_errno) {

    die('Error' . $con->connect_errno);
} else {
    // echo "conectada";
}

if (!empty($_POST)) {
// Buscar Cliente
if ($_POST['action'] == 'searchCliente' ) {
    if (!empty($_POST['cliente'])) {
        $cedula = $_POST['cliente'];

        $query = mysqli_query($con, "SELECT * FROM clientes WHERE cedula like '$cedula'");
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        $data = '';
        if ($result > 0) {
            $data = mysqli_fetch_assoc($query);
        }else{
            $data = 0;
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
    exit;
}

// Agregar Cliente - ventas
if ($_POST['action'] == 'addCliente') {

        $cedula = $_POST['cedula_cliente'];
        $nombre = $_POST['nom_cliente'];
        $apellido = $_POST['ap_cliente'];
        $correo = $_POST['cor_cliente'];
        $telefono = $_POST['tel_cliente'];
        $sql = mysqli_query ($con, "INSERT INTO clientes (cedula, nombre, apellido, correo, Telefono) VALUES ('$cedula','$nombre','$apellido','$correo', '$telefono')");
    }
}
exit;
?>