<?
	

$programas=$parametrosE['programas'];

	$tipo1=$parametrosE['tipo1'];
	$tipo2=$parametrosE['tipo2'];
	$tipo3=$parametrosE['tipo3'];
	$tipo4=$parametrosE['tipo4'];
	$tipo5=$parametrosE['tipo5'];
	
	$div="100";
	if($tipo2!=''){$div=50;}
	if($tipo3!=''){$div=33;}
	if($tipo4!=''){$div=25;}
	if($tipo5!=''){$div=20;}
	
//squemos todo lo que esta vivo

$arregloEventoides=array(); 
$arregloQue=array();
$selas="SELECT * FROM eventos where  activo ='1' and CURDATE()<=fechaF and muerto='0'  AND etiquetas like '%$campusN%'     order by fechaI DESC " ;
 //echo $selas;

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idT= $fila['id'];
	$fechaI= $fila['fechaI'];
	$fechaF= $fila['fechaF'];
	$titulo= $fila['titulo_'.$idioma];
	$tituloC= $fila['tituloC_'.$idioma];
	$etiquetas=$fila['etiquetas'];
	 
	$infoEve= unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$img2= $fila['img2'];
$urlEve= $infoEve['url_'.$idioma];	 

$tipoT=$tipo;
if($tipoT=="sesiones"){$tipoT="SESIONES INFORMATIVAS";}

$imas=$urlF."/contenido/".$idT."/".$img2;
if($img2==""){
$imas=$urlF."/img/eventos/".$tipo.".jpg";
}


if($infoEve['cualImg']==1){
$imas=$urlF."/contenido/".$infoEve['imgLib'];
}

if($imas==""){$imas="/img/eventos/".$tipo.".jpg";}


$fechon= fechaLetra($fechaI);
if($fechaI!=$fechaF) { $fechon .=" - ".fechaLetra($fechaF);}
$arregloEventoides[$idT]['tipo']=$tipo;
$arregloEventoides[$idT]['tipoT']=$tipoT;
$arregloEventoides[$idT]['titulo']=$titulo;
$arregloEventoides[$idT]['imas']=$imas;
$arregloEventoides[$idT]['fechon']=$fechon;
$arregloEventoides[$idT]['hora']=$infoEve['hora_'.$idioma];
$arregloEventoides[$idT]['urlEve']=$urlEve;
$arregloEventoides[$idT]['mostrarFecha']=$infoEve['mostrarFecha'];


$puedoEve="";

unset($programas['guadalajara']);
unset($programas['tabasco']);

foreach($programas as $prog=>$dasdf){
if (strpos($etiquetas, $prog) !== false) {
$puedoEve=1;
}
}

if( $puedoEve==1){
$arregloQue[$tipo]=$idT;
}
}
 
?>



 <div class="div100 elemento  <?=$clases?>" style="overflow-x: auto; white-space: nowrap;">
 
 <? for ($i = 1; $i <= 5; $i++) { 
 $tipon=$parametrosE['tipo'.$i];
if($tipon!=""){
$este=$arregloQue[$tipon];
$eventon=$arregloEventoides[$este];

if($eventon['titulo']!=""){
$mostrarFecha=$eventon['mostrarFecha'];
 ?>
<div class="eventos div<?=$div?>Eve padd10">
<div class="div100 eventosSombra">
	<div class="eventos_<?=$tipon?> div100 eventosCont  ">
	<div class="eventosTipo"> <?=$eventon['tipoT']?></div>
	  <div class="clear10"></div>
	<div class="eventosTitulo"> <?=$eventon['titulo']?></div>
	 
	 <div class="clear10"></div>
	<? if( $mostrarFecha==1 ){ ?> 
	<?=$eventon['fechon']?>
	<?  } ?>
		<div class="clear"></div>
	<? if(  $eventon['hora']!=""){ ?> 
	<?=$eventon['hora']?>
	<? } ?>
	  <div class="clear"></div>
	  <? if($eventon['urlEve']!=""){ ?>
	  <a href="<?=$eventon['urlEve']?>" target="_blank">
	 <div class="eventosUrl  "> + Ver más
	</div></a>
	  <? } ?>
	</div>
	<div class="eventos_<?=$eventon['tipoT']?> div100" style="background-color: #000;">
	<div class="div100 eventoCintilla" style="background-image: url(<?=$eventon['imas']?>); opacity:.6">	</div>
	</div>
	</div>
	</div>
 <? } 
 }
 }?>
 </div>