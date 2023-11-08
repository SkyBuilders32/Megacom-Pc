<?php

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
        $query_insert = mysqli_query ($con, "INSERT INTO clientes (cedula, nombre, apellido, correo, Telefono) VALUES ('$cedula','$nombre','$apellido','$correo', '$telefono')");
    
    if ($query_insert){
        $codCliente = mysqli_insert_id($con);
        $msg = $codCliente;
        } else {
            $msg = 'No se pudo agregar el registro';
    }
    mysqli_close($con);
    echo $msg;
    exit;
}
if ($_POST['action'] == 'infoProducto') {
    $producto_id = $_POST['producto'];
    $query = mysqli_query($con, "SELECT id_producto, modelo, existencias, precio_de_venta FROM productos where id_producto = $producto_id");
    mysqli_close($con);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    echo 'error';
    exit;
}

//add products to detail
if($_POST['action']=='addProductoDetalle'){
    if (empty($_POST['producto'] ) || empty($_POST['cantidad'])) {
        echo 'error';
    } else {
        $codproducto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $token = md5($_SESSION['id']);

        $query_iva = mysqli_query($con, "SELECT iva FROM configuracion");
        $result_iva = mysqli_num_rows($query_iva);

        $query_detalle_temp = mysqli_query($con, "CALL add_detalle_temp($codproducto, $cantidad, '$token')");
        $result = mysqli_num_rows($query_detalle_temp);

        $detalletabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arrayData = array();

        if($result > 0 ){
            if ($result_iva > 0) {
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['iva'];
            }
            while ($data = mysqli_fetch_assoc($query_detalle_temp)){
                $preciototal = round($data['cantidad'] * $data['precio_de_venta'], 2);
                $sub_total   = round($sub_total + $preciototal, 2);
                $total       = round($total + $preciototal, 2); 
                $detalletabla .= '
                <tr>
                <td>'.$data['producto'].'</td>
                <td colspan="2">'.$data['modelo'].'</td>
                <td class="textcenter">'.$data['cantidad'].'</td>
                <td class="textright">'.$data['precio_de_venta'].'</td>
                <td class="textright">'.$preciototal.'</td>
                <td class="">
                    <a class="link_delete" href="#" onclick="event.preventDefault();
                    del_product_detalle('.$data['producto'].');"> <i class="bx bxs-trash" ></i> </a>
                </td>
            </tr>';
                }
                $impuesto = round($sub_total * ($iva / 100), 2);
                $total_sin_iva = round($sub_total - $impuesto, 2);
                $total = round($total_sin_iva + $impuesto, 2);

                $detalle_totales = '
                <tr>
                    <td colspan="5" class="textright"> SUBTOTAL Q.</td>
                    <td class="textright">'.$total_sin_iva.'</td>
                </tr>
                <tr>
                    <td colspan="5" class="textright">IVA ('.$iva.')</td>
                    <td class="textright">'.$impuesto.'</td>
                </tr>
                <tr>
                <td colspan="5" class="textright"><strong> TOTAL A PAGAR Q.</strong></td>
                <td class="textright">'.$total.'</td>
                </tr>
                ';
                $arrayData['detalle'] = $detalletabla;
                $arrayData['totales'] = $detalle_totales;
                echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
            } else{
                echo "No hay productos";
            }
            mysqli_close($con);
        }
        exit;
    }
//extract data from detalle temp
if($_POST['action']=='searchfordetalle'){
    if (empty($_POST['user'] )) {
        echo 'error';
    } else {
        $token = md5($_SESSION['id']);
        $query = mysqli_query($con, "SELECT tmp.correlativo,
                                            tmp.token_user,
                                            tmp.producto,
                                            tmp.cantidad,
                                            tmp.precio_de_venta,
                                            p.id_producto,
                                            p.modelo
                                            FROM detalle_temp tmp
                                            INNER JOIN productos p
                                            ON tmp.producto = p.id_producto
                                            WHERE token_user='$token'");
        $result = mysqli_num_rows($query);
        $query_iva = mysqli_query($con, "SELECT iva FROM configuracion");
        $result_iva = mysqli_num_rows($query_iva);


        $detalletabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arrayData = array();

        if($result > 0 ){
            if ($result_iva > 0) {
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['iva'];
            }
            while ($data = mysqli_fetch_assoc($query)){
                $preciototal = round($data['cantidad'] * $data['precio_de_venta'], 2);
                $sub_total   = round($sub_total + $preciototal, 2);
                $total       = round($total + $preciototal, 2); 
                $detalletabla .= '
                <tr>
                <td>'.$data['producto'].'</td>
                <td colspan="2">'.$data['modelo'].'</td>
                <td class="textcenter">'.$data['cantidad'].'</td>
                <td class="textright">'.$data['precio_de_venta'].'</td>
                <td class="textright">'.$preciototal.'</td>
                <td class="">
                    <a class="link_delete" href="#" onclick="event.preventDefault();
                    del_product_detalle('.$data['producto'].');"> <i class="bx bxs-trash" ></i> </a>
                </td>
            </tr>';
                }
                $impuesto = round($sub_total * ($iva / 100), 2);
                $total_sin_iva = round($sub_total - $impuesto, 2);
                $total = round($total_sin_iva + $impuesto, 2);

                $detalle_totales = '
                <tr>
                    <td colspan="5" class="textright"> SUBTOTAL Q.</td>
                    <td class="textright">'.$total_sin_iva.'</td>
                </tr>
                <tr>
                    <td colspan="5" class="textright">IVA ('.$iva.')</td>
                    <td class="textright">'.$impuesto.'</td>
                </tr>
                <tr>
                <td colspan="5" class="textright"><strong> TOTAL A PAGAR Q.</strong></td>
                <td class="textright">'.$total.'</td>
                </tr>
                ';
                $arrayData['detalle'] = $detalletabla;
                $arrayData['totales'] = $detalle_totales;
                echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
            } else{
                echo "No hay productos";
            }
            mysqli_close($con);
        }
        exit;
    }
}
exit;
?>