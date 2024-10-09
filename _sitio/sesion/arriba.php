<? ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
$secure = true;
$httponly = true;
session_start();
extract($_POST);
$time_start = microtime(true);
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d H:i:s");
$hoyYMD = date("Y-m-d");
$hoySt = strtotime($hoy);

$url = "";
$nombreToquen = "huxley";
$nombreSistema = "Tool Tec";


$rutaServer = $_SERVER['DOCUMENT_ROOT'] . "/" . $url;

$token = $rutaServer;
include_once $rutaServer . "/Admin/conexiones/conexion.php";
include_once $rutaServer . "/Admin/control/funciones.php";
include_once $rutaServer . "/Admin/control/correo.php";

$dominioUrl = 'https://' . $_SERVER['SERVER_NAME'] . $url;
$urlFront = 'https://' . $_SERVER['SERVER_NAME'] . $url;
$dominioAdmin = "/Admin";


$idioma = "es";
if (limpiaGET($_GET['i']) != "") {
	$idioma = limpiaGET($_GET['i']);
}

$s = limpiaGET($_GET['s']);
$refer = limpiaGET($_GET['refer']);

if ($refer != "") {
	$_SESSION['referencia'] = $refer;
	$referencia = $_SESSION['referencia'];
}

$referencia = $_SESSION['referencia'];
$gracias = limpiaGET($_GET['gracias']);

include $rutaServer . "/Admin/_files/filesSelect/archivosDisponibles.php";
//debug
if ($debug == "") {
	$debug = limpiaGET($_GET['debug']);
}

//

/* toquen */
if (!isset($_SESSION[$nombreToquen])) {
	$_SESSION[$nombreToquen] = aleatorio(100);
}
$elToken = $_SESSION[$nombreToquen];


$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
$browser = $_SERVER['HTTP_USER_AGENT'];
$superGalleta = limpiaGET(createPasswordHash($browser . $ip));
if ($_COOKIE['device'] == "") {
	setcookie('device', aleatorio(20), [
		'expires' => time() + (86400 * 30 * 3650),
		'path' => '/',
		'domain' => null,
		'secure' => true,
		'httponly' => true,
		'samesite' => 'Strict'
	]);
}
$huella = $_COOKIE['device'];



$tokenI = $token . 'i';

$galleton = $_COOKIE[$token];
if ($galleton == "") {
	$ales = aleatorio(10);
	setcookie($token, $ales, strtotime('+30 days'), '/', $_SERVER['SERVER_NAME'], 1, true);

	$myIP = "http://ip-api.com/json/" . $ip;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $myIP);
	curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout after 30 seconds
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
	$resultIPO = curl_exec($ch);
	$meteIp = encripta('encrypt', $resultIPO);
	$resultIP = json_decode(curl_exec($ch), true);
	curl_close($ch);
	$ciudad = $resultIP['city'];
	$pais = $resultIP['country'];
	$paisCodigo = $resultIP['countryCode'];
	$estadoCodigo = $resultIP['region'];
	$estadoNombre = $resultIP['regionName'];
	$lat = $resultIP['lat'];
	$lon = $resultIP['lon'];
?>

	<script>
		localStorage['wLat'] = <?= $lat ?>;
		localStorage['wLon'] = <?= $lon ?>;
	</script>
<?
	setcookie($tokenI, $meteIp, strtotime('+30 days'), '/', $_SERVER['SERVER_NAME'], 1, true);
}

//que campus eres


$acumulaFunciones = "";


include "mata.php";


?>