<? include "../sesion/arriba.php";
include "../control/magia.php";

$s=limpiaGet($_GET['s']);

if($s==""){die();}
ob_start();	

include "../_contenido/contenido.php";
file_put_contents($rutaServer.'/_sitio/cache/'.$s.'.html', ob_get_contents());
ob_end_flush();


?>