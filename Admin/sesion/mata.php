<?

if ($_SESSION[$huella . '_acceso'] == "" || $_SESSION[$huella . '_galleta'] != $superGalleta) {

	include "galleta.php";
}


if ($_SESSION[$huella . '_acceso'] == "" || $_SESSION[$huella . '_galleta'] != $superGalleta) {
	die('<script>top.location.href = "' . $url . '/sesion/mataSesion.php";</script>');
}



$laSesion =  explode('_', encripta('decrypt', $_SESSION[$huella . '_acceso']));
$quien =    $laSesion[0];
$miClave = $laSesion[1];
$puedo = "";

$arregloIdiomas = array();
$selas = "SELECT * FROM idiomas ORDER BY nombre asc";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) {
	$arregloIdiomas[$fila['id']] = $fila['nombre'];
}

$selas = "SELECT * FROM usuarios WHERE id='$quien'  LIMIT 1";

$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) {
	$galletas = unserialize($row11['galletas']);
	$permisosU = unserialize($row11['permisos']);
	$galletasHuella = $galletas[$huella];
	$galletaClave = $galletasHuella['clave'];
	$nombreU = $row11['nombre'];
	$apellidoU = $row11['apellido'];
	$tipoU = $row11['tipo'];
	//$favoritosU= $row11['favoritos']; 
	$correoU = $row11['correo'];
	$sA = $row11['sA'];
	$claveU = $row11['clave'];
	$avatarU = $row11['avatar'];
	if ($sA == 1) {
		$perfilU = "admin";
	}
}
//validemos
if ($miClave == $galletaClave) {

	$nuevaClave = aleatorio(50);
	$galletas[$huella]['clave'] = $nuevaClave;
	$galletas[$huella]['cuando'] = $hoy;
	$galletas = serialize($galletas);
	$query = "UPDATE usuarios SET galletas='$galletas'   WHERE id='$quien'";
	$mysqli->query($query);

	$encripta =  encripta('encrypt', $quien . "_" . $nuevaClave);
	$_SESSION[$huella . '_acceso'] = $encripta;

	//nueva galleta
	setcookie($huella, $encripta, [
		'expires' => time() + (86400 * 30),
		'path' => '/',
		'secure' => true,
		'httponly' => true,
		'samesite' => 'Strict'
	]); // 86400 = 1 day

	$puedo = "si";
}



$selas = "SELECT * FROM usuariosPerfiles WHERE tipo='$tipoU'   LIMIT 1";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) {
	$perfilU = $row11['tipo'];
	$perfilUN = $row11['nombre'];
	$jerarquiaU = $row11['jerarquia'];
}


if ($puedo != "si" || $quien == "") {
	die('<script>top.location.href = "' . $url . '/sesion/mataSesion.php";</script>');
	header("Location:" . $url . "/sesion/mataSesion.php");
}

$hoy = date('Y-m-d H:i:s');
$hoyYMD = date('Y-m-d');
//$creado=$hoy."|".$quien."|".$usuarioU;		
$hoySt = strtotime($hoy);

$usuarioU = array();
$usuarioU['hoy'] = $hoy;
$usuarioU['id'] = $quien;
$usuarioU['avatar'] = $avatarU;
$usuarioU['nombre'] = $nombreU . " " . $apellidoU;
$usuarioU['perfil'] = $perfilUN;
$usuarioU = serializa($usuarioU);
$creado = $usuarioU;

$selas = "SELECT * FROM configuracion ";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) {
	//$nombreInstancia= $row11['nombre'];
	$actualizacion = $row11['actualizacion'];
}


//permiso en el menu
$puedo = "";




$selas = "SELECT * FROM menu WHERE dondeSeccion='$dondeSeccion' AND permiso!='' AND  FIND_IN_SET('$perfilU',permiso)  ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) {
	$permisoModulo = $fila['permiso'];
	$menuPuesto = $fila['donde'];
	$puedo = 1;
}



//super admin
if ($sA == 1) {
	$puedo = 1;
}
//seccion comun
if ($seccionComun == 1) {
	$puedo = 1;
}

if ($puedo != 1) {
	die();
}
//conexion a cada

$aleatorio5 = aleatorio(5);
$aleatorio2 = aleatorio(2);

if ($perfilU == "") {
	header("Location:" . $url . "/sesion/mataSesion.php");
	die('<script>top.location.href = "' . $url . '/sesion/mataSesion.php";</script>');
}


//tienes acceso a esta instancia
//estatus
