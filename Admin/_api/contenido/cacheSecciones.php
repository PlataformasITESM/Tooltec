<? include "../../sesion/arriba.php"; 

$s=limpiaGet($_GET['s']);

ob_start();	
$s="home";
include $rutaFront."/_sitio/_contenido/contenido.php";

file_put_contents($rutaFront.'/_sitio/cache/'.$s.'.html', ob_get_contents());
ob_end_flush();
