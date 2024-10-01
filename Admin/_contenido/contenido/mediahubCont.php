<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){
include "../../_files/filesSelect/archivosDisponibles.php"; 
$mi='checked="checked"';
$md=' "';

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];

$displa="none";
$paddT=0;
$paddR=0;
$paddB=0;
$paddL=0;

$marginT=0;
$marginB=0;

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
$modificado= unserialize($fila['modificado']);
$programas=$parametros['programas'];

	$tipo1=$parametros['tipo1'];
	$tipo2=$parametros['tipo2'];
	$tipo3=$parametros['tipo3'];
	$tipo4=$parametros['tipo4'];
	$tipo5=$parametros['tipo5'];
	$tipo6=$parametros['tipo6'];


$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	
	
	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];
	
	$imagen=$parametros['imagen'];
	$imgFondo=$parametros['imgFondo'];
	
	$bgAjuste=$parametros['bgAjuste'];
	$posX=$parametros['posX'];
	$posY=$parametros['posY'];
	
	$colorFondo=$parametros['colorFondo'];
	$animacionM=$parametros['animacion'];
	$clases=$parametros['clases'];
	$ancho=$parametros['ancho'];
	$flota=$parametros['flota'];
	$style=$parametros['style'];
	}
	
 if($imagen==1){$displa="";
$elArchivo=$arregloArchivos[$imgFondo.'imagen'];
}

	?>
	<div class="div100">
  <div class="div100   blanco10">  
 
    <form action="eventosCont.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
	<input type="hidden" name="e" value="<?=$e?>" >
   



<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('fondo');" id="tab-fondo" class="elementoTabs">Programas</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>

<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>


<div class="tabsDivs" id="ele-general">


 <? for ($i = 1; $i <= 5; $i++) { ?>

 <div class="formaB ">
	<div class="formaT">Espacio <?=$i?></div>
    <div class="formaC ">
	<select name="tipo<?=$i?>" id="tipo<?=$i?>" <? if($i==1){ ?>class="validate['required']"<? } ?>>
	<? if($i>1){ ?> <option value="">Sin espacio</option> <? } ?>
		 <? $res6 = $mysqli->query("SELECT * FROM eventosTipos ORDER BY titulo_es ASC");
							$res6->data_seek(0);
								while ($fila = $res6->fetch_assoc()) 
								{
								$idC=$fila['id'];
								$titCat= $fila['titulo_es'];
								$tipo=${'tipo'.$i};
								?>
							<option <? if ($tipo==$idC) { ?>selected <? } ?> value="<?=$idC?>"><?=$titCat?></option>	
							<?	
								} ?>
								</select>
	</div>
</div>

 
<? } ?>


<div class="formaB">
<div class="formaT">Alineación Horizontal</div>
    <div class="formaC">
	</select>
	</div>
</div>
 

 <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
				
		<div class="left">		
    <select name="ancho" id="ancho"></select>
	</div>
	
	<div class="left padd5">
	

<div class="left">Ancho Fijo. <br>No responsivo</div>	
<label class="switch">
  <input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijo==1){ ?>checked <? }?> >	
  <span class="slider round"></span>
</label>
	</div>
	
	</div>
</div>



<div class="div50">
	<div class="formaT">Alineación Horizontal</div>
    <div class="formaC">
    <select name="flota" id="flota">
    <option value="left"  > Izquierda </option>
    <option value="right"  > Derecha</option>
	 <option value="centro"  > Centro</option>
	</select>
	</div>
</div>



<div class="div50">
	<div class="formaT">Alineación Vertical</div>
    <div class="formaC">
    <select name="alineacionV" id="alineacionV">
    <option value="auto"  >Automática</option>
    <option value="medio"  > Al centro de su columna</option>
	 <option value="abajo"  >Al fondo de su columna</option>
	</select>
	</div>
</div>

<div class="clear10"></div>
<div class="formaB">
	<div class="formaT">Efecto</div>
    <div class="formaC">
  	<select name="animacion" id="animacion" class=" ">
	<option value=""  >Sin animación</option>

<?

$res6 = $mysqli->query("SELECT * FROM animaciones   ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$animacion= $fila['animacion'];

?>
<option value="<?=$animacion?>"><?=$animacion?></option>
<?
	}
?>

</select>
</div>
</div>


</div>

<div class="oculta tabsDivs" id="ele-medidas">



<div class="div100">

<div class="formaB">
	<div class="formaT">Márgenes internos (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 90px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="paddT" id="paddT" value="<?=$paddT?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Derecho<input type="text" class="entero textAlignCenter" name="paddR" id="paddR" value="<?=$paddR?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="paddB" id="paddB" value="<?=$paddB?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Izquierdo<input type="text" class="enter textAlignCenter" name="paddL" id="paddL" value="<?=$paddL?>"></div>
   
   
	</div>
</div>


<div class="formaB">
	<div class="formaT">Márgenes externos (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 90px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>



</div>



</div>

<? /* fondo */ ?>
<div class="oculta tabsDivs" id="ele-fondo">


<? 


$selas="select * from niveles where muerto='0'    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$tituloP= $fila['titulo_es'];
		$idNivel= $fila['id'];
		?>
		<div class="div100 padd10">
			<strong><?=$tituloP?></strong>
			<div class="div"></div>
			<div class="clear"></div>
				<label onClick="pon(true,'<?=$idNivel?>')" ><input <? if($programas[$idNivel.'todos']!="") { ?>checked <? } ?> name="programas[]" class="  " value="<?=$idNivel?>todos" type="checkbox"><?=$tituloP?></label> 
 
		<div class="clear20"></div>
		<?
$selas="select * from programas where idNivel='$idNivel' and muerto='0'     ";
$res6x = $mysqli->query($selas);
$res6x->data_seek(0);
 while ($fila = $res6x->fetch_assoc()) 
	{
		$idPrograma= $fila['id'];
		$tituloN= $fila['titulo_es'];
	?>

<label class="div50"><input <? if($programas[$idPrograma]!="") { ?>checked <? } ?> name="programas[]" class="<?=$idNivel?> programas " value="<?=$idPrograma?>" type="checkbox"><?=$tituloN?></label>
	 
	<?
	}
	?>
	</div>
	<?
	}
	?>
	  

</div>

<? /* fondo */ ?>
<div class="oculta tabsDivs" id="ele-estilo">

 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field clases" value="<?=$clases?>">
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Style</div>
    <div class="formaC">
    <input type="text" name="style" id="style" class="field" value="<?=$style?>">
	</div>
</div>

</div>
 
  <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>
 
</form>
</div>
</div>
<script>

function  pon(que, cual){
	$('.'+cual).prop('checked', que);

 }

 $.getScript('elementos.js', function() {
  anchos();
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#animacion').val('<?=$animacionM?>');
$('#flota').val('<?=$flota?>');
$('#alineacionV').val('<?=$alineacionV?>');

$('#bgAjuste').val('<?=$bgAjuste?>');
$('#posX').val('<?=$posX?>');
$('#posY').val('<?=$posY?>');

<? } ?>
 });
 

</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	$textoEdit=mataMalosTin($textoEdit);
	$texto=$textoEdit;
	$tipoContenido="mediahubCont";
	$parametros=array();


$etiquetas=array();
$programasA=array();
foreach($programas as $prog){
$programasA[$prog]=1;
}



$parametros['tipo1']=$tipo1;
$parametros['tipo2']=$tipo2;
$parametros['tipo3']=$tipo3;
$parametros['tipo4']=$tipo4;
$parametros['tipo5']=$tipo5;
$parametros['tipo6']=$tipo6;


$parametros['programas']=$programasA;
	$parametros['ancho']=$ancho;
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	
	$parametros['alineacionV']=$alineacionV;
	
	
	$parametros['imagen']=mataMalos($imagen);
	
	if($imagen==1){
	$parametros['imgFondo']=mataMalos($imgFondo);
	$parametros['bgAjuste']=mataMalos($bgAjuste);
	$parametros['posX']=mataMalos($posX);
	$parametros['posY']=mataMalos($posY);
	}
	
	$parametros['animacion']=$animacion;
	$parametros['colorFondo']=$colorFondo;
	$parametros['flota']=$flota;
	$parametros['clases']=$clases;
	$parametros['style']=$style;
	$parametros=arregloMete($parametros);
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros', modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden, modificado) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100','$creado')";
	$mysqli->query($query1);
	}
	
?>
<script>
localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<?
}
?>
