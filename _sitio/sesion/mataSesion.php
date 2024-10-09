<? include "arriba.php";
unset($_SESSION[$huella.'_acceso']);
unset($_SESSION[$huella.'_galleta']);
unset($_SESSION['mientras']);
setcookie('device', false, [
	'expires' => time() - (86400 * 30),
	'path' => '/',
	'domain' => null,
	'secure' => true,
	'httponly' => true,
	'samesite' => 'Strict'
]); // 86400 = 1 day 
?>

<script>
localStorage.clear();
top.location.href = "/"; </script>