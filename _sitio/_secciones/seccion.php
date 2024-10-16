<? include "../sesion/arriba.php";
 
if($s==""){$s="home";}
$sO=$s;

$seccionBusca="url_".$idioma."='".$s."' OR url_".$idioma."='".$s."' or id='$s'";
$selas="SELECT * FROM secciones WHERE  ($seccionBusca   ) AND activo='1' AND muerto='0' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{

		$s= $fila['id'];
		$activo= $fila['activo'];
		$sO=$s;
		$tituloM= $fila['titulo_'.$idioma];
		$llevaMenuLateral= $fila['menuLateral'];
			$menuTopPermanente= $fila['menuSuperior'];
		$tituloPagina= $fila['tituloPagina_'.$idioma];
		$metaDes= $fila['metaDes'];
		$metaKeys= $fila['metaKeys'];
	}

 
if($tituloM==""){
$s="home";
}

if($_GET['test']!=""){$activo=1;}

if($activo!=1){die();}
 
if($tituloPagina==""){$tituloPagina=$nombreSistema;} else {$tituloPagina=$tituloPagina;}
 ?>
<!doctype html>
<html>
<head>
  <meta name="description" content="<?=$metaDes?>">
 <meta name="keywords" content="<?=$metaKeys?>">

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
 
<? 
//
$s=$sO;
include "../_contenido/contenido.php";
?>


<? $s="footer"; include "../_contenido/contenido.php"; ?>

<? include "../interfase/footer.php"; ?>
        </body>
</html>
