
<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
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
	include_once "../vendor/autoload.php";
	use Dompdf\Dompdf;

		$codCliente = $_REQUEST['cl'];
		$noFactura = $_REQUEST['f'];
		$anulada = '';

		$query_config   = mysqli_query($con,"SELECT * FROM configuracion");
		$result_config  = mysqli_num_rows($query_config);
		if($result_config > 0){
			$configuracion = mysqli_fetch_assoc($query_config);
		}


		$query = mysqli_query($con,"SELECT f.Id_factura, DATE_FORMAT(f.fecha, '%d/%m/%Y') as fecha, 
		DATE_FORMAT(f.fecha,'%H:%i:%s') as  hora, f.cliente, f.estatus,
												 v.usuario as vendedor,
												 cl.cedula, cl.nombre, cl.telefono
											FROM facturas f
											INNER JOIN usuarios v
											ON f.usuario = v.id
											INNER JOIN clientes cl
											ON f.cliente = cl.Id
											WHERE f.Id_factura = $noFactura AND f.cliente = $codCliente  AND f.estatus != 10 ");

		$result = mysqli_num_rows($query);
		if($result > 0){

			$factura = mysqli_fetch_assoc($query);
			$no_factura = $factura['Id_factura'];

			if($factura['estatus'] == 2){
				$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			}

			$query_productos = mysqli_query($con,"SELECT p.modelo,dt.cantidad,dt.precio_de_venta,(dt.cantidad * dt.precio_de_venta) as precio_total
														FROM facturas f
														INNER JOIN detallefactura dt
														ON f.Id_factura = dt.nofactura
														INNER JOIN productos p
														ON dt.producto = p.id_producto
														WHERE f.Id_factura = $no_factura ");
			$result_detalle = mysqli_num_rows($query_productos);

			
			ob_start();
		    include (dirname('__FILE__') ."/factura.php");
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('factura_'.$noFactura.''.$codCliente.'.pdf',array('Attachment'=>0));
			exit;
		}

?>
