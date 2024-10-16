<? include_once "../sesion/arriba.php";

$selas = "SELECT * FROM usuariosF WHERE id='$quien'  LIMIT 1";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) {
	$galletas = unserialize($row11['galletas']);
}


unset($galletas[$huella]);
$galletas = serialize($galletas);

$query = "UPDATE usuariosF SET  galletas='$galletas'   WHERE id='$quien'";
$mysqli->query($query);


setcookie($huella, false, [
	'expires' => time() - (86400 * 30),
	'path' => '/',
	'secure' => true,
	'httponly' => true,
	'samesite' => 'Strict'
]); // 86400 = 1 day 
setcookie($device, false, [
	'expires' => time() - (86400 * 30),
	'path' => '/',
	'secure' => true,
	'httponly' => true,
	'samesite' => 'Strict'
]); // 86400 = 1 day 
session_destroy();

?>

<script>
	top.location.href = "/";
</script>