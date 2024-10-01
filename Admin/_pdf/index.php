<? include "../../sesion/arriba.php"; 
extract($_POST);
$dondeSeccion="pedidos";
include "../../sesion/mata.php"; 


$valor=$_GET['v'];
$valor=limpiaGet($valor);


$selas="SELECT * FROM pedidos WHERE id='$valor' ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$id= $fila['id'];
	$idClienteWeb= $fila['idClienteWeb'];
	$idCliente= $fila['idCliente'];
	$subTotal= $fila['subTotal'];
	$iva= $fila['iva'];
	$totalF= $fila['total'];
	$web= $fila['web'];
	$productines= $fila['productos'];
	$pedido= $fila['pedido'];
	$cuando= $fila['cuando'];
	
$showroom=$fila['showroom'];
$idDireccionEnvio=$fila['idDireccionEnvio'];
$fCalle=$fila['fCalle'];
$fNumero=$fila['fNumero'];
$fNumeroInt=$fila['fNumeroInt'];
$fColonia=$fila['fColonia'];
$fCP=$fila['fCP'];
$fCiudad=$fila['fCiudad'];
$fEstado=$fila['fEstado'];

$eCalle=$fila['eCalle'];
$eNumero=$fila['eNumero'];
$eNumeroInt=$fila['eNumeroInt'];
$eColonia=$fila['eColonia'];
$eCP=$fila['eCP'];
$eCiudad=$fila['eCiudad'];
$eEstado=$fila['eEstado'];
	
	$fechaLimite=$fila['limite'];

	
	$estatus=$fila['estatus'];
	$comprobantePago=explode(',',$fila['comprobantePago']);
	$comentarios=$fila['comentarios'];
	 
 }
	require_once('tcpdf_include.php');

 // Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file ='https://lumoliving.com/_sitio/img/logo.png';
        $this->Image($image_file, 15, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
       
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
       
$logoX = 10; // 
   $logoFileName = $e.'.png';
   $logoWidth = 30; // 15mm
   $logoY = 280;
   $logo = $this->   Image($logoFileName, $logoX, $logoY, $logoWidth);

 
  // $this->Cell(10,10, $logo, 0, 0, 'C');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Lumo Living');
$pdf->SetTitle('Pedido '.$pedido);
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 50, 30);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
 $pdf->SetFont('helvetica', ' ', 11);

// add a page
$pdf->AddPage();

// set some text to print
$html .= "";

$html=file_get_contents("https://mofeg.biz/_pedidos/_pdf/pedidoPartida.php?e=".$e."&p=".$valor."&m=".$m);




// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Pedido_'.$pedido.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+