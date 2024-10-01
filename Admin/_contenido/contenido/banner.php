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

include "../../_files/filesSelect/archivosDisponibles.php";


 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize(base64_decode($fila['parametros']));

	$img=$parametros['img'];
	$tituloM=$parametros['titulo'];
	$colorFondoM=$parametros['colorFondo'];
	$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	$margenM=$parametros['margen'];
	$ligaM=$parametros['liga'];
	$ligaTargetM=$parametros['ligaTarget'];
	$animacionM=$parametros['animacion'];
	$paddingM=$parametros['padding'];
	$altoM=$parametros['alto'];
	$ajustaBloque=$parametros['ajustaBloque'];
	$colorTitulo=$parametros['colorTitulo'];
	$colorTexto=$parametros['colorTexto'];
	
	
	
	$estiloM=$parametros['estilo'];
	
$elArchivo=$arregloArchivos[$img.'imagen'];
	

}
if($colorFondoM==""){$colorFondoM="#FFFFFF";}		
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	
if($altoM==""){$altoM="350";}

if($ajustaBloque=="on"){$ajust='checked';}

if($colorTitulo==""){$colorTitulo="#FFFFFF"; $checkTrans1="checked";}	
if($colorTexto==""){$colorTexto="#FFFFFF"; $checkTrans2="checked";}	

 $i=1;



	?>
 
 <script>
 $('.botonEnviar').show();
 </script>
 <div style="float:left; width:100%;  ">
 
    <form action="banner.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="borra" value="<?=$img?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
<input type="hidden" name="e" value="<?=$e?>" >

    
    

<div class="titulosS">Banner</div>
<div style="clear:both; height:5px;"></div>


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen</div>
<div class="formaC">


<?=$elArchivo?>
<div class="clear10"></div>

<div onClick="abreArchivos('<?=$e?>','imgContenido','uno','img','<?=$seccion?>'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$img?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>



<? /* archivos */ ?>
<div class="formaB">
	<div class="formaT">Título</div>
    <div class="formaC">
 	<textarea id="tituloEdit" name="titulo" class="textoEdit"><?=$tituloM?></textarea>
	</div>
</div>

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="color" id="colorTitulo" name="colorTitulo" class=" "  value="<?=$colorTitulo?>" onChange="cambiaColor('<?=$i?>');"/> 
    <div class="clear"></div>
    <input type="checkbox" <?=$checkTrans1?> name="transparente<?=$i?>" id="transparente<?=$i?>"> Transparent
	</div>
</div>


<div class="formaB">
	<div class="formaT">Texto</div>
    <div class="formaC">
 	<textarea id="textoEdit" name="texto" class="textoEdit"><?=$textoM?></textarea>
	</div>
</div> 

<?
$i=2;
?>

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="color" id="colorTexto" name="colorTexto" class=" "  value="<?=$colorTexto?>" onChange="cambiaColor('<?=$i?>');"/> 
    <div class="clear"></div>
    <input type="checkbox" <?=$checkTrans2?> name="transparente<?=$i?>" id="transparente<?=$i?>"> Transparent
	</div>
</div>
 
<div class="formaB">
   <div class="formaT">Altura</div>
  <div class="formaC">
  <input id="alto"  name="alto"  type="text" class="validate[custom[integer],min[300],max[1000]] field" style="width:120px;" value="<?=$altoM?>"/> px</div>
</div>

 <div class="formaB">
	<div class="formaT">Ajustar al tamaño del bloque</div>
    <div class="formaC">
    <input type="checkbox" <?=$ajust?> name="ajustaBloque" /> 
	</div>
</div>

<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Send" />
</div>

</form>
</div>
 
 

<script>
CKEDITOR.replace( 'textoEdit' );
CKEDITOR.replace( 'tituloEdit' );

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
	$seccion=mataMalos($seccion);
	$tipoContenido="banner";
	
	for ($i = 1; $i <= 2; $i++) {
	if(${"transparente".$i}=="on"){
		
	$colorTitulo="";	
	}
	}
	if($transparente2=="on"){
		
	$colorTexto="";	
	}
	
 	
	$parametros['colorTitulo']=$colorTitulo;
	$parametros['colorTexto']=$colorTexto;
	$parametros['img']=mataMalos($imgContenido);
	$parametros['titulo']=mataMalosTin($titulo);
	$parametros['texto']=mataMalosTin($texto);
	$parametros['colorFondo']=mataMalos($colorFondo);
	$parametros['alto']=mataMalos($alto);
	$parametros['ajustaBloque']=$ajustaBloque;
	$parametros['ancho']=100;
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['liga']=mataMalos($liga);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['estilo']=mataMalos($estilo);
	$parametros=base64_encode(serialize($parametros));
	
	
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}
 
?>
<script>
top.location.reload();
</script>
<?
}



?>

