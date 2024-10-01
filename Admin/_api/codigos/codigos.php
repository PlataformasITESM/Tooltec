<? include "../../sesion/arriba.php"; 
header('Content-Type: text/html; charset=utf-8');

$query="UPDATE sitio SET actualizacion=actualizacion+1    ";
$mysqli->query($query);

$arregloCss=array();
//$arregloCss[]=$dominioFrente.'/js2/jquery-ui/jquery-ui.min.css';
$arregloCss[]=$dominioFrente.'/js2/slick/slickon.css';
//$arregloCss[]=$dominioFrente.'/js2/slick/slick-theme.css';
//$arregloCss[]=$dominioFrente.'/js2/chosen.css';
$arregloCss[]=$dominioFrente.'/js2/uploader.css';
$arregloCss[]=$dominioFrente.'/js2/animate.css';
//$arregloCss[]=$dominioFrente.'/js2/simplelightbox.min.css';
// los guardados

$selas="SELECT * FROM codigo where tipo='css' ORDER BY orden ASC ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
{
$idCodigo= $fila['id'];
$arregloCss[]=$dominioFrente.'/codigo/'.$idCodigo.'.css';
}


	//que dias no trabaja la instancia
$granCss="/* powered by mabo dev*/";	
foreach($arregloCss as $arre){
$granCss.= file_get_contents($arre)."\n";
}

// init the request, set various options, and send it
    
   $url = 'https://cssminifier.com/raw';
	$ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([ "input" => $granCss ])
    ]);

    $minifiedC = curl_exec($ch);

    // finally, close the request
    curl_close($ch);
 
    // output the $minified css

//$minifiedC=$granCss;
ob_start();	
echo $minifiedC;
file_put_contents($rutaFront.'/js2/siteCSS.css', ob_get_contents());
ob_end_flush();

// los js
$arregloJ=array();
 
$arregloJ[]=$dominioFrente.'/js2/jquery.js';
$arregloJ[]=$dominioFrente.'/js2/jquery-migrate.js';
//$arregloJ[]=$dominioFrente.'/js2/jquery-ui/jquery-ui.min.js';
$arregloJ[]=$dominioFrente.'/js2/forma.js';
$arregloJ[]=$dominioFrente.'/js2/validation.js';
$arregloJ[]=$dominioFrente.'/js2/jquery.number.min.js';
$arregloJ[]=$dominioFrente.'/js2/upload.js';
//$arregloJ[]=$dominioFrente.'/js2/datatables.min.js';
$arregloJ[]=$dominioFrente.'/js2/slick/slick.min.js';
//$arregloJ[]=$dominioFrente.'/js2/simple-lightbox.min.js';
$arregloJ[]=$dominioFrente.'/js2/frente.js';

$selas="SELECT * FROM codigo where tipo='js' ORDER BY orden ASC ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
{
$idCodigo= $fila['id'];
$arregloJ[]=$dominioFrente.'/codigo/'.$idCodigo.'.js';
}
//$arregloJ[]=$dominioFrente.'/js2/productos.js';

$granJs="/* powered by mabodev*/";
foreach($arregloJ as $arre){
//echo"$arre<br>";
$granJs.= "\n\r".file_get_contents($arre )."\n";
}
 /*
    $url = 'https://javascript-minifier.com/raw';
    $ch = curl_init($url);

   curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([ "input" => $granJs ])
    ]);
$minifiedJ = curl_exec($ch);
    curl_close($ch);
 */
  $minifiedJ .=$granJs;
$minifiedJ.="/* end powered by mabodev*/";

ob_start();	
   echo $minifiedJ;
file_put_contents($rutaFront.'/js2/siteJS.js', ob_get_contents());
ob_end_flush();

