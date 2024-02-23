<?php

// Include the main TCPDF library (search for installation path).
global $pdo;
require_once('../app/TCPDF-main/tcpdf.php');

include ('../app/config.php');
include ('../app/controllers/ventas/literal.php');

$id_venta = $_GET['id'];
$nro_venta = $_GET['nro_venta'];

$sql_ventas = "
SELECT *,
       cli.nombre_cliente AS nombre_cliente,
       cli.dni_cliente AS dni_cliente,
       cli.celular_cliente AS celular_cliente,
       cli.email_cliente AS email_cliente
FROM tb_ventas AS ve 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = ve.cliente_id 
WHERE ve.id_venta = '$id_venta'
ORDER BY ve.nro_venta ASC
";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $ventas_dato) {
    $nro_venta      = $ventas_dato['nro_venta'];
    $id_cliente     = $ventas_dato['cliente_id'];
    $fyh_creacion   = $ventas_dato['fyh_creacion'];
    $nombre_cliente = $ventas_dato['nombre_cliente'];
    $dni_cliente    = $ventas_dato['dni_cliente'];
}

$fecha = date("d/m/Y", strtotime($fyh_creacion));




// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,279), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Morrone Sisventas');
$pdf->setTitle('Factura de Venta');
$pdf->setSubject('Factura de Venta');
$pdf->setKeywords('Factura de Venta');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(15,15,15);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Set font
$pdf->setFont('Helvetica', '', 12);

// Add a page

$pdf->AddPage();

// create some HTML content
$html = '
<table border="0" style="font-size: 10px">
    <tr>
        <td style="text-align: center; width: 200px">
            <img src="../public/images/logo.jpg" width="80px"> <br><br>
            <b>SISTEMA DE VENTAS MORRONE</b> <br>
            El Arreo 220, (1738) La Reja <br>
            Cel: 1138669097 <br>
            Buenos Aires - Argentina
        </td>
        <td style="width: 170px"></td>
        <td style="font-size: 16px; width: 280px"> <br><br><br><br>
            <b>CUIT: </b>20-22362590-9 <br>
            <b>Nro. Factura: </b>'.$nro_venta.' <br>
            <b>Nro de autorización: </b>10000232457
        </td>
    </tr>
</table>

<p style="text-align: center;font-size: 25px"><b>FACTURA</b></p>

<div style="border: 1px solid #000000">
    <table border="0" cellpadding="6px">
        <tr>
            <td><b>Fecha: </b>'.$fecha.'</td>
            <td></td>
            <td><b>DNI: </b>'.$dni_cliente.'</td>
        </tr>
        <tr>
            <td colspan="3"><b>Señor(es): </b>'.$nombre_cliente.'</td>
        </tr>
    </table>
</div>

<br>

<table border="1" cellpadding="5" style="font-size: 10px">
    <tr style="text-align: center;background-color: #d6d6d6;font-weight: bold">
        <th style="width: 6%">Nro</th>
        <th style="width: 16%">Producto</th>
        <th style="width: 30%">Descripción</th>
        <th style="width: 12%">Cantidad</th>
        <th style="width: 18%">Precio unitario</th>
        <th style="width: 18%">Subtotal</th>
    </tr>
    ';

$contador_carrito       = 0;
$cantidad_total         = 0;
$subtotal_producto      = 0;
$precio_unitario_total  = 0;
$total_unitario         = 0;
$importe_total          = 0;

$sql_carrito = "
SELECT *,
       pro.id_producto AS id_producto,
       pro.nombre AS nombre_producto, 
       pro.descripcion AS descripcion_producto,
       pro.precio_venta AS precio_venta,
       pro.stock AS stock
FROM tb_carrito AS carr 
INNER JOIN tb_almacen AS pro ON carr.producto_id = pro.id_producto 
WHERE nro_venta = '$nro_venta' 
ORDER BY id_carrito ASC
";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
foreach ($carrito_datos as $carrito_dato) {
    $contador_carrito       = $contador_carrito + 1;
    $id_carrito             = $carrito_dato['id_carrito'];
    $id_producto            = $carrito_dato['id_producto'];
    $nombre_producto        = $carrito_dato['nombre_producto'];
    $descripcion_producto   = $carrito_dato['descripcion_producto'];
    $importe_unitario       = $carrito_dato['precio_venta'];
    $cantidad_total         = $cantidad_total + floatval($carrito_dato['cantidad']);
    $precio_unitario_total  = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
    $subtotal_producto      = floatval($carrito_dato['cantidad']) * $importe_unitario;
    $total_unitario         = $total_unitario + floatval($carrito_dato['precio_venta']);
    $importe_total          = $importe_total + $subtotal_producto;

    $html.='
    <tr>
        <td style="text-align: center;width: 6%">'.$contador_carrito.'</td>
        <td style="width: 16%">'.$nombre_producto.'</td>
        <td style="width: 30%">'.$descripcion_producto.'</td>
        <td style="text-align: right;width: 12%">'.$carrito_dato['cantidad'].'</td>
        <td style="text-align: right;width: 18%">$ '.number_format($importe_unitario, 2, '.', ',').'</td>
        <td style="text-align: right;width: 18%">$ '.number_format($subtotal_producto, 2, '.', ',').'</td>
    </tr>
    ';
}

$html.='
    <tr style="background-color: #d6d6d6">
        <td colspan="3" style="text-align: right"><b>TOTAL</b></td>
        <td style="text-align: right">'.$cantidad_total.'</td>
        <td style="text-align: right">$ '.number_format($total_unitario, 2, '.', ',').'</td>
        <td style="text-align: right">$ '.number_format($importe_total, 2, '.', ',').'</td>
    </tr>
</table>

<p style="text-align: right">
    <b>Monto Total: </b> $ '.number_format($importe_total, 2, '.', ',').'
</p>
<p>
    <b>Son: </b> '.convertir($importe_total).'
</p>
<br>
---------------------------------------------------------------------- <br>
<b>USUARIO</b> Morrone Pablo <br><br><br><br><br><br><br><br>

<p style="text-align: center">GRACIAS POR SU COMPRA</p>
';

// Output the HTML content
$pdf->writeHTML($html,true,false,true,false,'');

$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1,
    'module_height' => 1
);

$QR = 'hola';
$pdf->write2DBarcode($QR,'QRCODE,L',180,240,35,35, $style);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
