<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);

if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];


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
	$modificado= unserialize($fila['modificado']);
	$parametros= arregloSaca($fila['parametros']);
	$sub=$parametros['sub'];
	
	$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	 $divTipo=$parametros['divTipo'];
	$anchoFijoM=$parametros['anchoFijo'];
	
	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];
	
	$colorFondo=$parametros['colorFondo'];
	$animacionM=$parametros['animacion'];
	$clases=$parametros['clases'];
	$ancho=$parametros['ancho'];
	$flota=$parametros['flota'];
	$style=$parametros['style'];
	$tituloPre=$parametros['tituloPre'];
	
	
	}


if($colorFondo==""){$colorFondo="";}	

if($sub=="on"){$subi='checked';}	
	
	?>
	<div class="div100">
  <div class="div100 divElemento blanco10">  
 
    <form action="titulo.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
	<input type="hidden" name="e" value="<?=$e?>" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
    
    
<? foreach($arregloIdiomas as $cod => $idiomin){ ?>
 <div class="formaB">
		<?=$idiomin?>
    <textarea id="textoEdit<?=$cod?>" name="textoEdit<?=$cod?>" class="textoEdit cke"><?=$parametros['texto_'.$cod]?></textarea>
</div>
<? } ?>

<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>


<div class="tabsDivs" id="ele-general">
<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="text" id="colorFondo" name="colorFondo" class="colores"  value="<?=$colorFondo?>" onChange="cambiaColor();"/> 
   
	</div>
</div>


<div class="formaB">
	<div class="formaT">Subtítulo</div>
    <div class="formaC">
  	<label><input type="checkbox" <?=$subi?> name="sub" /> Subtítulo</label>
	</div>
</div>

	
	
	<div class="formaB">
	<div class="formaT">Tipo</div>
    <div class="formaC">
    <select name="divTipo" id="divTipo" style="width: 150px">
    <option value="div"  >Div</option>
    <option value="h1"  > H1</option>
	 <option value="h2"  >H2</option>
		<option value="h3"  >H3</option>
		<option value="h4"  >H4</option>
	</select>
	</div>
</div>


<div class="formaB">
	<div class="formaT">Alineación Vertical</div>
    <div class="formaC">
    <select name="alineacionV" id="alineacionV">
    <option value="auto"  >Automática</option>
    <option value="medio"  > Al centro de su columna</option>
	 <option value="abajo"  >Al fondo de su columna</option>
	</select>
	</div>
</div>



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
   
   <div class="left padd5" style="width: 120px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 120px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>



</div>



</div>

<div class="oculta tabsDivs" id="ele-estilo">

 <div class="formaB">
	<div class="formaT">Clases para Títulos</div>
    <div class="formaC">
   <div class="div100" id="titulo_pre" style="background-image: url(<?=$url?>/img/transparente.png); height:150px; overflow-y:auto;">
   
   
   </div>
	</div>
</div>


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



 $.getScript('elementos.js', function() {
  anchos();
  clasesPre('titulo');
 <? if( $anchoM!="" ) { ?>
$('#animacion').val('<?=$animacionM?>');
$('#ancho').val('<?=$anchoM?>');
$('#alineacionV').val('<?=$alineacionV?>');
$('#divTipo').val('<?=$divTipo?>');

<? if($tituloPre!=""){
$tituloPre=explode(' ',$tituloPre);
foreach($tituloPre as $pr){ ?>
$( "#titulo_<?=$pr?>" ).prop( "checked", true );
<? }} ?>

<? } ?>
 });
 
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	$tipoContenido="titulo";
	
	$textoEdit=mataMalosTin($textoEdit);

	$texto=$textoEdit;
	
	if($transparente=="on"){		
	$colorFondo="";	
	}
	
	 
	
	$parametros=array();

	foreach($arregloIdiomas as $cod => $idiomin){
		$parametros['texto_'.$cod]=mataMalosTin(${'textoEdit'.$cod});
	}
	$parametros['colorFondo']=$colorFondo;
	$parametros['ancho']=100;
	$parametros['sub']=$sub;
	$parametros['divTipo']=$divTipo;
	$parametros['tituloPre']=implode(' ',$tituloPre);
	
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	$parametros['alineacionV']=$alineacionV;
	
	
	
	$parametros['animacion']=$animacion;
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
	
	if($divTipo==""){$divTipo="div";}	
	
?>
<script>
localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<?
}



?>

