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
$selas="SELECT * FROM eventos where  activo ='1' and CURDATE()<=fechaF     order by fechaI DESC " ;
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idT= $fila['id'];
	$fechaI= $fila['fechaI'];
	$fechaF= $fila['fechaF'];
	$titulo= $fila['titulo_'.$idioma];
	$tituloC= $fila['tituloC_'.$idioma];
	$tipo= $fila['tipo'];
	$img2= $fila['img2'];
	 

$tipoT=$tipo;
if($tipoT=="sesiones"){$tipoT="SESIONES INFORMATIVAS";}

$imas=$urlF."/contenido/".$idT."/".$img2;
if($imas!=""){
$imas=$urlF."/img/eventos/".$tipo.".jpg";
}

$fechon= fechaLetra($fechaI);
if($fechaI!=$fechaF) { $fechon .=" - ".fechaLetra($fechaF);}
$arregloEventoides[$idT]['tipo']=$tipo;
$arregloEventoides[$idT]['tipoT']=$tipoT;
$arregloEventoides[$idT]['titulo']=$titulo;
$arregloEventoides[$idT]['imas']=$imas;
$arregloEventoides[$idT]['fechon']=$fechon;

$arregloQue[$tipo]=$idT;
}
 
?>



 <div class="div100 elemento  <?=$clases?>" style="">
 
 <? for ($i = 1; $i <= 5; $i++) { 
$tipon=$parametrosE['tipo'.$i];
if($tipon!=""){
$este=$arregloQue[$tipon];
$eventon=$arregloEventoides[$este];

 ?>
<div class="eventos div<?=$div?> padd10"><?=$i?>
	<div class="eventos_<?=$tipon?> eventosCont padd10">
	<div class="eventosTipo"> <?=$eventon['tipoT']?></div>
	  <div class="clear10"></div>
	<div class="eventosTitulo"> <?=$eventon['titulo']?></div>
	 
	 <div class="clear10"></div>
	  
	</div>
	<div class="eventos_<?=$eventon['tipoT']?> div100" style="background-color: #000;">
	<div class="div100 eventoCintilla" style="background-image: url(<?=$eventon['imas']?>); opacity:.6">	</div>
	</div>
	</div>
 <? } 
 
 }?>
 </div>