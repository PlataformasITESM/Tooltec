<? include "../../sesion/arriba.php"; 
$dondeSeccion="avatar";
include "../../sesion/mata.php"; 
$e=$_GET['e'];
$e=limpiaGet($e);
extract($_POST);
$foteta=$_SESSION['foteta'];
$granAncho=$_SESSION['granAncho'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="<?=$url?>/js/cropper.js"></script>
<link rel="stylesheet" href="<?=$url?>/js/cropper.css" /> 
<script type="text/javascript" src="../password/js.php"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 
</head>
<body>
 
<!--cont-->
<div class="contC">
<? include $ruta."/interfase/menu.php"; ?>
<!--aqui-->
<div class="contenido">
<? include "../../interfase/header.php"; ?>
<div class="titulosDiv">
<div class="titulos">MI CUENTA </div>
</div>
 
 
<div class="clear20"></div>
<div style=" width:50%; max-width:500px; margin-left:20px;" >
<? include "avatarForma.php";?>
</div>
<? include "../../interfase/foot.php"; ?>
</div>
<!--aqui-->
 
</div>
<div style="clear:both;"></div>
 
</body>
</html>