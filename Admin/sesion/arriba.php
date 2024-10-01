<? ini_set( 'session.cookie_httponly', 1 );
ini_set( 'session.cookie_secure', 1 );
$secure = true;
$httponly = true;
session_start();
extract($_POST);
$nombreSistema="Tool Tec";
$url="/Admin"; 
$rutaA="/Admin";
$urlFront="";
$rutaServer= $_SERVER['DOCUMENT_ROOT'];
$ruta=$rutaServer."".$url;
$token=$ruta;
$rutaFront=$rutaServer."/".$urlFront;
$rutaContent=$rutaServer.$urlFront."/contenido";


$urlContent=$rutaA."/img";

$estaUrl=$_SERVER['SERVER_NAME'];

$dominioUrl='https://'.$estaUrl.$url;
$dominioFrente='https://'.$estaUrl;
$urlCurl='https://'.$estaUrl.$url;

$urlA='https://'.$estaUrl.$url;
$urlR=$rutaA;
$urlF=$urlFront;
$urlFront=$urlF;




$estoy=$_SERVER['REQUEST_URI'];
$estoy=explode('/',$estoy);
		include_once $ruta."/control/funciones.php";
		include_once $ruta."/control/correo.php";
		include_once $ruta."/conexiones/conexion.php";
$mailFromName=$nombreSistema;
		
/* toquen */
if(!isset($_SESSION[$token.'toquenZote'])) {
$_SESSION[$token.'toquenZote']=aleatorio(50);
} 
$elToken= $_SESSION[$token.'toquenZote'];
/* */
date_default_timezone_set('America/Mexico_City');	
extract($_POST);
//debug
if($debug==""){
$debug=limpiaGET($_GET['debug']);
}
if($debug!=""){
echo"Debug mode<br>";
error_reporting(E_ALL);
ini_set('display_errors', 1);
}
//
$hoy=date('Y-m-d H:i:s');
$hoyYMD=date('Y-m-d');
$hoySt=strtotime($hoy);


$ip = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
$browser = $_SERVER['HTTP_USER_AGENT'];
$superGalleta=encripta('encrypt',$browser.$ip);
if($_COOKIE['device']=="" ){
setcookie('device', aleatorio(50), time() + (86400 * 30 * 3650), "/");
}
$huella=$_COOKIE['device'];



 //error_reporting(E_ALL); ini_set('display_errors', 1);
 //echo $elToken;
?>