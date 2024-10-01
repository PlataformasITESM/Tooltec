<? include_once "../../sesion/arriba.php"; 
header('Content-Type: text/html; charset=utf-8');

ob_start();	



file_put_contents($rutaFront.'/js2/siteCSS.css', ob_get_contents());
ob_end_flush();

