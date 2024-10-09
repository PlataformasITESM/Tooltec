<?
$quienO =  explode('_', $_SESSION['comunica_acceso']);
$quien = $quienO[0];
$miClave = $quienO[1];


include "galleta.php";


$puedoAccesoEmpresa = "";
$selas = "SELECT * FROM usuarios WHERE id='$quien' LIMIT 1";
echo "$selas";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) {
	$nombreU = $row11['nombre'];
	$apellidoU = $row11['apellido'];
	$tipoU = $row11['tipo'];
	$correoU = $row11['correo'];
	$claveU = $row11['clave'];
	$claveSistema = createPasswordHash($claveU);
	$avatarU = $row11['avatar'];

	if ($miClave == $claveSistema) {
		$puedo = 1;
	}
}

die();

if ($puedo != 1) {

	if (isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach ($cookies as $cookie) {
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', time() - 1000, '/', '', false, true, ['samesite' => 'Strict']);
			setcookie($name, '', time() - 1000, '/', '', false, true, ['samesite' => 'Strict']);
		}
	}


	header("Location:" . $url);
	die('<script>top.location.href = "/";</script>');
}
/* galleta */



$usuarioU = $nombreU . " " . $apellidoU;
$creado = $hoy . "|" . $usuarioU;
