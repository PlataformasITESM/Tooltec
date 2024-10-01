<? include "../sesion/arriba.php"; 


$previo='PREVIOUS POST';
$siguiente='NEXT POST';
if($idioma=='es'){$previo='POST ANTERIOR'; $siguiente='POST SIGUIENTE';}
	
$selas="SELECT * FROM blogs WHERE  tituloC='$s'   or id='$s' LIMIT 1 ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$s= $fila['id'];
	$fecha= $fila['fecha'];
	$idCategoria= $fila['categoria'];
	$titulo= $fila['titulo_'.$idioma];
	$tituloC= $fila['tituloC_'.$idioma];

}

$tituloPagina=$titulo. " | ".$nombreSistema;
 ?>
<!doctype html>
<html>
<head>
  <meta name="description" content="<?=$metaDes?>">

<meta charset="utf-8">
<title><?=html_entity_decode($tituloPagina)?></title>
 <?php
 
 include "../control/magia.php";
 include "../control/css.php";


?> 

<style>
<?=$codigoCSS?>
</style>

 </head>

<body>
<input type="hidden" value="<?=$tituloCMenu?>" id="setsion">

<? include "../interfase/header.php"; ?>

<div id="aqui"></div>  
<div class="clear50"></div>
<div class="clear30"></div>

<div class="cont"><div class="contF">
<div class="div75">
<?
include "../_contenido/contenido.php";
?>
</div>

<div class="div25 padd5">
<div class="div100" style="font-size: 16px; color: #0375c0; font-weight: bold;">Categorías</div>

 <?
$selas="SELECT * FROM blogsCat where estatus='1' order by titulo ASc ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$id= $fila['id'];
	$titulo= $fila['titulo'];
	$tituloC= $fila['tituloC'];

	?>
	<a href="<?=$url?>/naturalmente/<?=$tituloC?>">
	<div class="div100 padd5 hover cursor">
	<div class="material-icons left" style="font-size: 18px;">keyboard_arrow_right</div>
	<div class="left"><?=$titulo?></div>
	</div>
	</a>
	<div class="div0"></div>
	<?
	}

 
?>
</div>
</div></div>
<div class="cont"><div class="contF">


<div class="clear20"></div>
<div class="div"></div>
<div class="div100">
<div class="clear10"></div>
<? 
$selas="SELECT * FROM blogs WHERE  fecha<'$fecha' ORDER BY fecha DESC LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
		$tituloM= $fila['titulo'];
		$tituloCCC= $fila['tituloC'];
		?>
		
				<a class="div50f left" style="cursor: pointer;" href="<?=$url?>/naturalmente/post/<?=$tituloCCC?>">
		<div class="material-icons iconoL" style="color:#c9c9c9;">chevron_left</div>
		<div class="left">
		<div class="blogMas"><?=$previo?></div>
 
		
		<div class="tituloPlay blogMasT" style="float: left"><?=$tituloM?></div>
		</div>
		
		</a>
		<?	} ?>
		
		<? 
$selas="SELECT * FROM blogs WHERE  fecha>'$fecha' ORDER BY fecha ASC LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
		$tituloM= $fila['titulo'];
		$tituloCCC= $fila['tituloC'];
		?>
		
		<a class="div50f right" style="cursor: pointer;" href="<?=$url?>/naturalmente/post/<?=$tituloCCC?>">
		<div class="material-icons iconoR"  style="color:#c9c9c9;">chevron_right</div>
		<div class="iconoRM">
		<div class="blogMas right"><?=$siguiente?></div>
		<div class="clear10"></div>
		
		<div class="tituloPlay blogMasT right" style="padding-left: 26%;"><?=$tituloM?></div>
		</div>
		
		</a>
		<?	} ?>
		
		<div class="clear10"></div>
</div>
<div class="div"></div>
<div class="clear20"></div>


</div></div>

<div class="clear"></div> 
	<? include "../interfase/footer.php"; ?>
        </body>
</html>