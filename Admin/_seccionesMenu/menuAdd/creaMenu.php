<? include_once "../../sesion/arriba.php"; 


 // el menu principal de arriba
	for ($i = 1; $i <= 2; $i++) {

	$idioma="es";
	if($i==2){$idioma="en";}
	ob_start();	
	
	$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE  idMenu='1' AND idTitulo='' and activo='1' ORDER BY orden ASC");
	$res6->data_seek(0);
	 while ($fila = $res6->fetch_assoc()) 
		{
		$idU= $fila['id'];
		$titulo= $fila['titulo_'.$idioma];
		
		$liga= $fila['liga_'.$idioma];
		$ligaTarget= $fila['ligaTarget_'.$idioma];
		
		$color= $fila['color'];
		$tipo= $fila['tipo'];

$flota="left";
//if($color=="D"){$flota="right";}

$noRelas="";
if($ligaTarget=="_blank"){
$noRelas='rel="noopener"';
}

if($tipo!="titulo"){
?>
<a href="<?=$liga?>" target="<?=$ligaTarget?>" <?=$noRelas?>>
 <div class="menuMenuE <?=$flota?>" id="mn_<?=nombreBonito($titulo)?>">
 <div class="div100 menuMenuEM ">
 <?=$titulo?> 
 </div>
 </div>
</a>
		<?	} 
if($tipo=="titulo"){ ?>
 <div class="menuMenuE <?=$flota?>" id="mn_<?=nombreBonito($titulo)?>">
 <div class="div100 menuMenuEM cursorDefault">
<?=$titulo?>
 </div>
 
 <div class="menuMenuES">
 <?  $res62 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE idTitulo='$idU' and activo='1' ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo_'.$idioma];
	$tipoSub= $filas['tipo'];
	$ligaSub= $filas['liga_'.$idioma];
	$ligaTargetSub= $filas['ligaTarget_'.$idioma];
	
	$noRelas="";
if($ligaTargetSub=="_blank"){
$noRelas='rel="noopener"';
}
	
	?>
 <a href="<?=$ligaSub?>" target="<?=$ligaTargetSub?>" <?=$noRelas?>>
 <div class="menuRCintilaSubMenu  "><?=$seccionSub?></div>
 </a>
 <? } ?>
 </div>
 </div>

<? }
		
		}
	?>
 
	<?

	file_put_contents($rutaFront.'/_sitio/recursos/menu1_'.$idioma.'.html', ob_get_contents());
	// end buffering and displaying page
	ob_end_flush();
	}
// responsivo

 // el menu principal de arriba
	for ($i = 1; $i <= 2; $i++) {

	$idioma="es";
	if($i==2){$idioma="en";}
	ob_start();	
	
	$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE  idMenu='1' AND idTitulo='' and activo='1' ORDER BY orden ASC");
	$res6->data_seek(0);
	 while ($fila = $res6->fetch_assoc()) 
		{
		$idU= $fila['id'];
		$titulo= $fila['titulo_'.$idioma];
		
		$liga= $fila['liga_'.$idioma];
		$ligaTarget= $fila['ligaTarget_'.$idioma];
		
		$color= $fila['color'];
		$tipo= $fila['tipo'];

$flota="left";
//if($color=="D"){$flota="right";}

$noRelas="";
if($ligaTarget=="_blank"){
$noRelas='rel="noopener"';
}

if($tipo!="titulo"){
?>
<a href="<?=$liga?>" target="<?=$ligaTarget?>" <?=$noRelas?>>
 <div class="div100 padd20 centrado  " id="me_<?=nombreBonito($titulo)?>">
 
 <?=$titulo?> 
 
 </div>
</a>
		<?	} 
if($tipo=="titulo"){ ?>
 <div class="div100 padd20 centrado   " id="me_<?=nombreBonito($titulo)?>">
 <div class="div100 div100 cursorDefault">
<?=$titulo?>
 </div>
 
 <div class="menuMenuES">
 <?  $res62 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE idTitulo='$idU' and activo='1' ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo_'.$idioma];
	$tipoSub= $filas['tipo'];
	$ligaSub= $filas['liga_'.$idioma];
	$ligaTargetSub= $filas['ligaTarget_'.$idioma];
	
	$noRelas="";
if($ligaTargetSub=="_blank"){
$noRelas='rel="noopener"';
}
	
	?>
 <a href="<?=$ligaSub?>" target="<?=$ligaTargetSub?>" <?=$noRelas?>>
 <div class="menuRCintilaSubMenu  "><?=$seccionSub?></div>
 </a>
 <? } ?>
 </div>
 </div>

<? }
		
		}
	?>
 
	<?

	file_put_contents($rutaFront.'/_sitio/recursos/menures_'.$idioma.'.html', ob_get_contents());
	// end buffering and displaying page
	ob_end_flush();
	}

?>