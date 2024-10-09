<?

if ($_SESSION[$huella . '_acceso'] == "") {

	$galleta = $_COOKIE[$huella];
	$huellaGalleta = $_COOKIE['device'];

	if ($galleta != "" && $huellaGalleta != "") {

		$laSesion =  explode('_', encripta('decrypt', $_COOKIE[$huella]));
		$idU =    $laSesion[0];
		$miClave = $laSesion[1];


		$selas = "SELECT * FROM usuariosF WHERE id='$idU'  LIMIT 1";
		$res = $mysqli->query($selas);
		$res->data_seek(0);
		while ($row = $res->fetch_assoc()) {

			$encripta =  encripta('encrypt', $idU . "_" . $miClave);
			$_SESSION[$huella . '_acceso'] = $encripta;
		}
	}
}



$laSesion =  explode('_', encripta('decrypt', $_SESSION[$huella . '_acceso']));
$quien =    $laSesion[0];
$miClave = $laSesion[1];


//si soy admin
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
	$usuarioU = array();
	$usuarioU['hoy'] = $hoy;
	$usuarioU['id'] = $quien;
	$usuarioU['avatar'] = $avatarU;
	$usuarioU['nombre'] = $nombreU . " " . $apellidoU;
	$usuarioU['perfil'] = $perfilUN;
	$usuarioU['admin'] = 1;
	$usuarioU = serializa($usuarioU);
	$creado = $usuarioU;
	$soyAdmin = 1;
}

if ($soyAdmin == "") {
	$selas = "SELECT * FROM usuariosF WHERE id='$quien'  LIMIT 1";
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
		$campusU = $row11['campus'];
		//$favoritosU= $row11['favoritos']; 
		$correoU = $row11['correo'];
		$sA = $row11['sA'];
		$claveU = $row11['clave'];
		$avatarU = $row11['avatar'];
		if ($sA == 1) {
			$perfilU = "admin";
		}


		//validemos
		if ($miClave == $galletaClave) {

			$nuevaClave = aleatorio(50);
			$galletas[$huella]['clave'] = $nuevaClave;
			$galletas[$huella]['cuando'] = $hoy;
			$galletas = serialize($galletas);
			$query = "UPDATE usuariosF SET galletas='$galletas', lastLogin='$hoy'   WHERE id='$quien'";
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


		}


		$usuarioU = array();
		$usuarioU['hoy'] = $hoy;
		$usuarioU['id'] = $quien;
		$usuarioU['avatar'] = $avatarU;
		$usuarioU['correoU'] = $correoU;
		$usuarioU['campus'] = $campusU;
		$usuarioU['nombre'] = $nombreU . " " . $apellidoU;
		$usuarioU['perfil'] = $perfilUN;
		$usuarioU = serializa($usuarioU);
		$creado = $usuarioU;
	}
}
if ($debug != "") {
	echo "Debug mode<br>";
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}
