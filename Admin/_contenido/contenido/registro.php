<? include "../../sesion/arriba.php"; 
extract($_POST);
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
	$parametros= unserialize(base64_decode($fila['parametros']));

$textoM=$parametros['texto'];
	$idRegistroM=$parametros['idRegistro'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	$clases=$parametros['clases'];
	

	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];


	$flotaM=$parametros['flota'];
	$animacionM=$parametros['animacion'];
	}
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	

 
	?>
    
 
  <div class="div100 divElemento blanco10">   


   <form action="registro.php" method="post" enctype="multipart/form-data" id="forma" >
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >


<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>



<div class="tabsDivs" id="ele-general">



 <div class="formaB">
	<div class="formaT">Registro</div>
    <div class="formaC">
<select name="idRegistro" id="idRegistro" class="validate[required]">
<option value=""  >Seleccione una opción</option>
<?
 
$res6 = $mysqli->query("SELECT * FROM registros   ORDER BY titulo ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idRegistro= $fila['id'];
	$registro= $fila['titulo'];
?>
<option value="<?=$idRegistro?>"><?=$registro?></option>
<?
	}
 
?>



</select>
</div>
 </div>



 <div class="formaB">
	<div class="formaT">Ancho </div>
    <div class="formaC">
				
		<div class="left">		
    <select name="ancho" id="ancho"></select>
	</div>
 
	</div>
</div>




<div class="formaB">
<div class="formaT">Alineación</div>
<div class="formaC">
<select name="flota" id="flota">
<option value="left"  >Izquierda</option>
 <option value="right"  >Derecha</option>
  <option value="centro"  >Centro</option>
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
   
   <div class="left padd5" style="width: 90px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>



</div>



</div>

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



</form>
</div>

 
<script>


 $.getScript('elementos.js', function() {
  anchos();
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#animacion').val('<?=$animacionM?>');
$('#flota').val('<?=$flotaM?>');
$('#idRegistro').val('<?=$idRegistroM?>');

<? } ?>
 });
 



</script>
 

    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);


	$texto=$textoEdit;
	$tipoContenido="registro";
	
	$parametros=array();
	$parametros['idRegistro']=$idRegistro;
	$parametros['ancho']=$ancho;
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['flota']=$flota;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['animacion']=$animacion;
		$parametros['clases']=$clases;
			$parametros['style']=$style;
	$parametros=arregloMete($parametros);
	

	
	if($cambia!=""){
	
	$query="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros, orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros', '100')";
	$mysqli->query($query1);
	}
	?>
<script>
localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<? }
?>
