<? include "../sesion/arriba.php";
if($s==""){$s="home";}
$sO=$s;


$selas="SELECT * FROM secciones WHERE  id='$s' AND activo='1' AND muerto='0' LIMIT 1";
//echo $selas;
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{

		$s= $fila['id'];
		$activo= $fila['activo'];
		$sO=$s;
		$tituloM= $fila['titulo_'.$idioma];
		//$metaDes= $fila['metaDes'];
		
	}
 
if($tituloM==""){
$s="home";
}
if($activo!=1){die();}
if(!isset($tituloPagina)){$tituloPagina=$nombreSistema;} else {$tituloPagina=$tituloPagina." | ".$nombreSistema;}
?>
<!doctype html>
<html lang="<?=$idioma?>">
<head>
  <meta name="description" content="<?=$metaDes ?? ''?>">
 
<meta charset="utf-8">
<title><?=html_entity_decode($tituloPagina)?></title>
 <?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
include "../control/magia.php";
include "../control/css.php";
?>
 </head>


<body>
 

<? include "../interfase/header.php"; ?>

 

<? // los contenedores // 

$s=$sO;
include "../_contenido/contenido.php";
?>
 
 
 

<? // ?>
</div>


<? $s="footer"; include($rutaServer.'/_sitio/cache/'.$s.'.html'); ?>



 
<script>
<?
if($quien==""){
if($_GET['accion']=="logins"){ ?>
 $(document).ready(function() {
login();
});
<? } 
if($_GET['accion']=="recupera"){ ?>
 $(document).ready(function() {
forgot('<?=$_GET['u']?>','<?=$_GET['clave']?>');
});
<? } 
}
?>

</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
