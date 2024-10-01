<? include "arriba.php";
unset($_SESSION[$huella.'_acceso']);
unset($_SESSION[$huella.'_galleta']);
unset($_SESSION['mientras']);
setcookie('device', false, time() - (86400 * 30), "/"); // 86400 = 1 day 
?>

<script>

top.location.href = "/Admin"; </script>