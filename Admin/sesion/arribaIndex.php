<? ini_set( 'session.cookie_httponly', 1 );
 $secure = true;
 $httponly = true;
session_start();
extract($_POST);
$token="daCrMDASDFMASASFADSASDFSADyD98jsa";

$rutaServer= $_SERVER['DOCUMENT_ROOT'];
$ruta=$rutaServer."";
$rutaContent=$rutaServer."/contenido";
 
$dominioUrl="http://mofeg.mabodev.com/";

$url="";
$urlA="http://mofeg.mabodev.com";
$urlFront="";
$tituloURL="CrMOFEG";

$nombreSistema="CrMOFEG ";

${"acceso".$token}=$_SESSION['acceso'.$token];
${"accesoUltra".$token}=$_SESSION['accesoUltra'.$token];


include $ruta."/conexiones/conexion.php";

$estoy=$_SERVER['REQUEST_URI'];
$estoy=explode('/',$estoy);

		include_once $ruta."/control/funciones.php";
		include_once $ruta."/control/correo.php";
		
/* toquen */
if(!isset($_SESSION['toquenZote'])) {
$_SESSION['toquenZote']=substr(md5(uniqid(rand())),0,10);
} 
$elToken= $_SESSION['toquenZote'];
/* */

if(${"acceso".$token}!=""){
	
	 $quien =  $_SESSION['acceso'.$token];
	
		$res11 = $mysqli->query("SELECT * FROM usuarios WHERE id='$quien' LIMIT 1");
		$res11->data_seek(0);
		while ($row11 = $res11->fetch_assoc()) 
		{ 
		$nombreU= $row11['nombre']; 
		$apellidoU= $row11['apellido']; 
		$tipoU= $row11['tipo']; 
		
		} 

date_default_timezone_set('America/Mexico_City');	
	$usuarioU=$nombreU." ".$apellidoU;
	$hoy=date('Y-m-d H:i:s');
	$creado=$hoy."|".$usuarioU;		
}
extract($_POST);
  //error_reporting(E_ALL);
  //ini_set('display_errors', 1);
?>