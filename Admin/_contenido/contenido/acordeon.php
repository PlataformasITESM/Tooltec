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
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$modificado= unserialize($fila['modificado']);
	$parametros= arregloSaca($fila['parametros']);
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	$titulo=$parametros['titulo'];
	$paddingM=$parametros['padding'];
	$margenM=$parametros['margen'];
	$animacionM=$parametros['animacion'];
	$clases=$parametros['clases'];
	$ancho=$parametros['ancho'];
	$flota=$parametros['flota'];
	$claseTitulo=$parametros['claseTitulo'];
	$claseTexto=$parametros['claseTexto'];

	 
	$orden=explode(',',$parametros['orden']);
	$acordeones=$parametros['acordeones'];
	

	
	}
	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	
if($colorFondo==""){$colorFondo="#FFFFFF"; $checkTrans="checked";}	
$cuenta=1;
	?>
    	<div class="div100">
  <div class="div100   blanco10"> 
    <form action="acordeon.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
	<input type="hidden" name="e" value="<?=$e?>" >
   
 
<div class="clear10"></div>
<div onClick="agregaOpcion(); return false;" style="float:left; font-size:12px; cursor:pointer;">      + Agregar entrada</div>
    <div style="clear:both; height:20px;"></div>
    
<div style=" width:100%; float:left;" id="losAcordeones">

<? 
if($orden !=""){
foreach ($orden as $ordenito) {
	
			$acordeonElemento=$acordeones[$ordenito];
 
	
			$tituloA=$acordeonElemento['titulo_es'];
			$textoA=$acordeonElemento['texto_es'];
			
			
			$tituloAe=$acordeonElemento['titulo_en'];
			$textoAe=$acordeonElemento['texto_en'];
			
			$colorTitulo=$acordeonElemento['colorTitulo'];
			$colorTexto=$acordeonElemento['colorTexto'];
			 
			$checkTransTitulo=""; 
			$checkTransTexto="";
			 
			if($colorTitulo==""){
				$colorTitulo="#FFFFFF";	
				$checkTransTitulo="checked";
			}
			
			if($colorTexto==""){
				$colorTexto="#FFFFFF";	
				$checkTransTexto="checked";
			}
			 
	
	 ?>
<div id="<?=$ordenito?>" class="acordeonAcordeon" style="width:100%;  margin-bottom:10px; float:left;" data-id="<?=$ordenito?>">
<div  class="acordeonTitulo"   style="background-color:<?=$colorTitulo?>;" >
<div   class="tableCell padd  material-icons mueve" style="width:30px; cursor:pointer;">open_with</div>
<div class="tableCell padd">
<?=$tituloA?>
</div>

<div id="<?=$ordenito?> " data-id="<?=$ordenito?>" class="tableCell padd  material-icons borra" style="width:30px; cursor:pointer; float:right;   ">clear</div>

<div id="<?=$ordenito?>_flecha" data-id="<?=$ordenito?>" class="tableCell padd  material-icons bajaAcordeon" style="width:30px; cursor:pointer; float:right; ">keyboard_arrow_up</div>


</div>
<div id="<?=$ordenito?>_bloque" style="width:100%; float:left; display:none;">
<div class="clear10"></div>
 <div class="formaB">
	<div class="formaT" >Título Esp</div>
    <div class="formaC">
    <textarea   id="<?=$ordenito?>_titulo_es" name="<?=$ordenito?>_titulo_es" class="textoEdit"><?=$tituloA?></textarea>
	</div>
</div>

 <div class="formaB">
	<div class="formaT" >Título Eng</div>
    <div class="formaC">
    <textarea   id="<?=$ordenito?>_titulo_en" name="<?=$ordenito?>_titulo_en" class="textoEdit"><?=$tituloAe?></textarea>
	</div>
</div>

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="color" id="colorTitulo<?=$cuenta?>" name="<?=$ordenito?>_colorTitulo" class=" "  value="<?=$colorTitulo?>" onChange="cambiaColor('Titulo<?=$cuenta?>');"/> 
    <div class="clear"></div>
    <input type="checkbox" <?=$checkTransTitulo?> name="<?=$ordenito?>_transparenteTitulo" id="transparenteTitulo<?=$cuenta?>"> Transparente
	</div>
</div>
 <div class="formaB">
	<div class="formaT">Texto Esp</div>
    <div class="formaC">
    <textarea id="<?=$ordenito?>_texto_es" name="<?=$ordenito?>_texto_es" class="textoEdit"><?=$textoA?></textarea>
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Texto Eng</div>
    <div class="formaC">
    <textarea id="<?=$ordenito?>_texto_en" name="<?=$ordenito?>_texto_en" class="textoEdit"><?=$textoAe?></textarea>
	</div>
</div>

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="color" id="coloTexto<?=$cuenta?>" name="<?=$ordenito?>_colorTexto" class=" "  value="<?=$colorTexto?>" onChange="cambiaColor('Texto<?=$cuenta?>');"/> 
    <div class="clear"></div>
    <input type="checkbox" <?=$checkTransTexto?> name="<?=$ordenito?>_transparenteTexto" id="transparenteTexto<?=$cuenta?>"> Transparente
	</div>
</div>
 </div>
 </div>
 
 <script>
 
CKEDITOR.replace( '<?=$ordenito?>_titulo_es' );
CKEDITOR.replace( '<?=$ordenito?>_texto_es' );
CKEDITOR.replace( '<?=$ordenito?>_titulo_en' );
CKEDITOR.replace( '<?=$ordenito?>_texto_en' );

 </script>
 
 <? 
 $cuenta=$cuenta+1;
 } 
 
 }?>
 
<div id="nuevasOpciones">
</div> 
</div>
<div class="clear10"></div>
 
<input type="hidden" value="<?=$cuenta?> " id="va">

<input type="hidden" id="orden" name="orden"  >
 
 <div class="clear10"></div>
 
 
 
 
 <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
    <select name="ancho" id="ancho">
    <option value="100"  >100%</option>
    <option value="75"  >75%</option>
    <option value="66.66"  >66%</option>
    <option value="50"  >50%</option>
    <option value="33.33"  >33%</option>
    <option value="25"  >25%</option>
    <option value="20"  >20%</option>
    <option value="15"  >15%</option>
    <option value="10"  >10%</option>
	</select>
	
	<div class="clear5"></div>
				
				<label><input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijoM==1){ ?>checked <? }?> > Ancho Fijo	</label>
				
	
	</div>
</div>
 <div class="formaB">
	<div class="formaT">Márgenes</div>
    <div class="formaC">
    <input type="checkbox" <?=$pad?> name="padding" /> Padding
    <input type="checkbox" <?=$mar?> name="margen" /> Bottom
	</div>
</div>
 
<div class="formaB">
	<div class="formaT">Alineación</div>
    <div class="formaC">
    <select name="flota" id="flota">
    <option value="left"  > Izquierda </option>
    <option value="right"  > Derecha </option>
	</select>
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases título</div>
    <div class="formaC">
    <input type="text" name="claseTitulo" id="claseTitulo" class="field clases" value="<?=$claseTitulo?>">
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases texto</div>
    <div class="formaC">
    <input type="text" name="claseTexto" id="claseTexto" class="field clases" value="<?=$claseTexto?>">
	</div>
</div>

 
 
  <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>
 

</form>
</div></div>
<script>

$('.clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});


<? if( $anchoM!="" ) { ?>
$('#animacion').val('<?=$animacionM?>');
$('#ancho').val('<?=$anchoM?>');
$('#flota').val('<?=$flota?>');
<? } ?>
recargaSelects(); 
 acordeonSorta();

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}	
	
	function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}
 $(".botonEnviar").click(function() {
       
   CKupdate();
         
});
$('.chosen').chosen({
});	
$("#forma").validationEngine(); 
 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
 
 $('#clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	$tipoContenido="acordeon";
	$ordenA=explode(',',$orden);
	$ordenA=array_filter($ordenA);
	
	$ordenA=array_map('trim',$ordenA);
	$orden=implode(',',$ordenA);
	
	$acordeones=array();
	
	foreach($ordenA as $ordenito){
		
			$acordeonElemento=array();
			$acordeonElemento['titulo_es']=mataMalosTin(${$ordenito."_titulo_es"});
			$acordeonElemento['texto_es']=mataMalosTin(${$ordenito."_texto_es"});
			$acordeonElemento['titulo_en']=mataMalosTin(${$ordenito."_titulo_en"});
			$acordeonElemento['texto_en']=mataMalosTin(${$ordenito."_texto_en"});
			$acordeonElemento['colorTitulo']=${$ordenito."_colorTitulo"};
			$acordeonElemento['colorTexto']=${$ordenito."_colorTexto"};
			
			if(${$ordenito."_transparenteTitulo"}=="on"){
				$acordeonElemento['colorTitulo']="";
			}
		
			if(${$ordenito."_transparenteTexto"}=="on"){
				$acordeonElemento['colorTexto']="";
			}
	
			$acordeonElemento=$acordeonElemento;
			$acordeones[$ordenito]=$acordeonElemento;
	}
	
	
	$acordeones=$acordeones;
	
	$parametros=array();
	$parametros['orden']=$orden;
	$parametros['titulo']=$titulo;
	$parametros['acordeones']=$acordeones;
	$parametros['ancho']=$ancho;
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['colorFondo']=$colorFondo;
	$parametros['flota']=$flota;
	
	$parametros['claseTitulo']=$claseTitulo;
	$parametros['claseTexto']=$claseTexto;
	
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
top.location.reload();
</script>
<?
}
?>
