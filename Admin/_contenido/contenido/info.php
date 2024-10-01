<? include "../sesion/arriba.php"; 
extract($_POST);

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';

 $res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$seccion'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize($fila['parametros']);

	$colorHeader=$parametros['colorHeader'];
	$logoIzq=$parametros['logoIzq'];
	$logoDer=$parametros['logoDer'];
	
	$fondoForma=$parametros['fondoForma'];
	
	$formaTitulo=$parametros['formaTitulo'];
	$formaTituloColor=$parametros['formaTituloColor'];
	
	$tituloIzq=$parametros['tituloIzq'];
	$textoIzq=$parametros['textoIzq'];
	$colorTituloIzq=$parametros['colorTituloIzq'];
	$colorTextoIzq=$parametros['colorTextoIzq'];
	
	
	$footerColor=$parametros['footerColor'];
	$footerIzq=$parametros['footerIzq'];
	
	$footerTuit=$parametros['footerTuit'];
	$footerFace=$parametros['footerFace'];
	$footerYT=$parametros['footerYT'];
	$footerInsta=$parametros['footerInsta'];



}
	
if($colorHeader==""){$colorHeader="#FFFFFF";}	
if($formaTituloColor==""){$formaTituloColor="#FFFFFF";}	
if($colorTituloIzq==""){$colorTituloIzq="#FFFFFF";}	
if($colorTextoIzq==""){$colorTextoIzq="#FFFFFF";}	
if($footerColor==""){$footerColor="#FFFFFF";}	
 
	?>
  <script type="text/javascript" src="<?=$url?>/_contenido/imgJs.php"></script>  
 <script>
 $('.botonEnviar').show();
 </script>
 <div style="float:left; width:100%;  ">
 
    <form action="<?=$url?>/_contenido/info.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$seccion?>" >

    <input type="hidden" name="logoIzqB" value="<?=$logoIzq?>" >
    <input type="hidden" name="logoDerB" value="<?=$logoDer?>" >
    <input type="hidden" name="fondoFormaB" value="<?=$fondoForma?>" >

    
    

<div class="titulosS">Información</div>
<div style="clear:both; height:5px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Fondo header</div>
<div style="float:left; width:300px;   ">
<input type="color" id="colorHeader" name="colorHeader" class="validate[ ]" style="width:100%;" value="<?=$colorHeader?>" />
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:100px; float:left; margin-bottom:5px; ">Logo Izquierdo</div>
        
        <div style="float:left;  ">
        <input id="logoIzq"  name="logoIzq"  type="file" class="imagen" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both;"></div>
        
         <div style="clear:both; height:10px;"></div>



 <? if ($logoIzq!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left; background-color:<?=$colorHeader?>;">
        <img src="<?=$urlContent?>/<?=$seccion?>/<?=$logoIzq?>" style="max-height:50px; max-width:50px;" />
        </div>
        <div style="clear:both;"></div>
         <? } ?>
        
        
        <div style="clear:both; height:10px;"></div>
 
 <div style="width:100px; float:left; margin-bottom:5px; ">Logo Derecho</div>
        
        <div style="float:left;  ">
        <input id="logoDer"  name="logoDer"  type="file" class="imagen" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both;"></div>
        
 <div style="clear:both; height:10px;"></div>



 <? if ($logoDer!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left; background-color:<?=$colorHeader?>;">
        <img src="<?=$urlContent?>/<?=$seccion?>/<?=$logoDer?>" style="max-height:50px; max-width:50px;" />
        </div>
        <div style="clear:both;"></div>
         <? } ?>
        
        
        <div style="clear:both; height:10px;"></div>


<div style="width:100px; float:left; margin-bottom:5px; ">Fondo forma</div>
        
        <div style="float:left;  ">
        <input id="fondoForma"  name="fondoForma"  type="file" class="imagen" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both;"></div>
        
 <div style="clear:both; height:10px;"></div>



 <? if ($fondoForma!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left;">
        <img src="<?=$urlContent?>/<?=$seccion?>/<?=$fondoForma?>" style="max-height:50px; max-width:50px;" />
        </div>
        <div style="clear:both;"></div>
         <? } ?>
        
        
        <div style="clear:both; height:10px;"></div>

    
<div style="width:150px; float:left; margin-bottom:5px; ">Título forma izquierda</div>
<div style="clear:both; height:5px;"></div>
<div style="float:left; width:100%;   ">
<textarea id="tituloIzq" name="tituloIzq" class="textoEdit"><?=$tituloIzq?></textarea>
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Fondo título izquierda</div>
<div style="float:left; width:300px;  ">
<input type="color" id="colorTituloIzq" name="colorTituloIzq" class="validate[ ]" style="width:100%;" value="<?=$colorTituloIzq?>" />
</div>
<div style="clear:both; height:10px;"></div>

<div style="width:150px; float:left; margin-bottom:5px; ">Texto forma izquierda</div>
<div style="clear:both; height:5px;"></div>
<div style="float:left; width:100%;   ">
<textarea id="textoIzq" name="textoIzq" class="textoEdit"><?=$textoIzq?></textarea>
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Fondo texto izquierda</div>
<div style="float:left; width:300px;  ">
<input type="color" id="colorTextoIzq" name="colorTextoIzq" class="validate[ ]" style="width:100%;" value="<?=$colorTextoIzq?>" />
</div>
<div style="clear:both; height:10px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Título forma</div>
<div style="clear:both; height:5px;"></div>
<div style="float:left; width:100%;   ">
<textarea id="formaTitulo" name="formaTitulo" class="textoEdit"><?=$formaTitulo?></textarea>
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Título forma color</div>
<div style="float:left; width:300px;  ">
<input type="color" id="formaTituloColor" name="formaTituloColor" class="validate[ ]" style="width:100%;" value="<?=$formaTituloColor?>" />
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Footer</div>
<div style="clear:both; height:5px;"></div>
<div style="float:left; width:100%;   ">
<textarea id="footerIzq" name="footerIzq" class="textoEdit"><?=$footerIzq?></textarea>
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Fondo footer</div>
<div style="float:left; width:300px;  ">
<input type="color" id="footerColor" name="footerColor" class="validate[ ]" style="width:100%;" value="<?=$footerColor?>" />
</div>
<div style="clear:both; height:10px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Facebook</div>
<div style="float:left; width:300px;  ">
<input type="text" id="footerFace" name="footerFace" class="validate[custom[url]]" style="width:100%;" value="<?=$footerFace?>" />
</div>
<div style="clear:both; height:10px;"></div>

<div style="width:150px; float:left; margin-bottom:5px; ">Twitter</div>
<div style="float:left; width:300px;  ">
<input type="text" id="footerTuit" name="footerTuit" class="validate[custom[url]]" style="width:100%;" value="<?=$footerTuit?>" />
</div>
<div style="clear:both; height:10px;"></div>

<div style="width:150px; float:left; margin-bottom:5px; ">Instagram</div>
<div style="float:left; width:300px;  ">
<input type="text" id="footerInsta" name="footerInsta" class="validate[custom[url]]" style="width:100%;" value="<?=$footerInsta?>" />
</div>
<div style="clear:both; height:10px;"></div>

<div style="width:150px; float:left; margin-bottom:5px; ">Youtube</div>
<div style="float:left; width:300px;  ">
<input type="text" id="footerYT" name="footerYT" class="validate[custom[url]]" style="width:100%;" value="<?=$footerYT?>" />
</div>
<div style="clear:both; height:10px;"></div>

 

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input class="botonEnviar" type="submit" value="Enviar" />
</div>

</form>
</div>
<script>
CKEDITOR.replace( 'tituloIzq' );
CKEDITOR.replace( 'textoIzq' );
CKEDITOR.replace( 'footerIzq' );
CKEDITOR.replace( 'formaTitulo' );

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
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);

	
$res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$cambia'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize($fila['parametros']);
	}
	
	 
	
	$parametros['colorHeader']=mataMalos($colorHeader);
	$parametros['formaTituloColor']=mataMalos($formaTituloColor);
	$parametros['formaTitulo']=mataMalosTin($formaTitulo);
	$parametros['formaTituloColor']=mataMalos($formaTituloColor);
	
	$parametros['tituloIzq']=mataMalosTin($tituloIzq);
	$parametros['textoIzq']=mataMalosTin($textoIzq);
	$parametros['colorTituloIzq']=mataMalos($colorTituloIzq);
	$parametros['colorTextoIzq']=mataMalos($colorTextoIzq);
	
	
	$parametros['footerColor']=mataMalos($footerColor);
	$parametros['footerIzq']=mataMalosTin($footerIzq);
	
	$parametros['footerTuit']=mataMalos($footerTuit);
	$parametros['footerFace']=mataMalos($footerFace);
	$parametros['footerYT']=mataMalos($footerYT);
	$parametros['footerInsta']=mataMalos($footerInsta);	
	

	

	
	for ($i = 1; $i <= 3; $i++) {
   
		if($i==1){$cualFoto="logoIzq"; }
		if($i==2){$cualFoto="logoDer"; }
		if($i==3){$cualFoto="fondoForma"; }
		
		
		$tmp_name = $_FILES[$cualFoto]["tmp_name"];
		$name = $_FILES[$cualFoto]["name"];
		$nameF = pathinfo($name);	
		$nameF=$nameF['filename'];
		
		$nombreArchivo=nombreBonito($nameF);
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$ext = getExtension($name);
		$ext = strtolower($ext);
	
		
		if (($ext == "jpg")  || ($ext == "png") ||( $ext == "jpeg") ){

			$yosoy = $nombreArchivo."_".$prefijo.".".$ext;
			$ruta =  $rutaContent."/".$cambia."/".$yosoy;
		
		
			if(copy($tmp_name,$ruta)){
		
			 
					list($anchoImg, $alto) = getimagesize($ruta);
					
					if($anchoImg>1900){
					smart_resize_image( $ruta, $width = 1900, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
					}
					
					
					if($borra!=""){
					unlink($rutaContent."/".$seccion."/".$borra);
					
					}
					
					$parametros[$cualFoto]=$yosoy;
					
			}
				
		}

	}

$parametros=base64_encode(serialize($parametros));
$query1="UPDATE secciones SET parametros='$parametros' WHERE id='$cambia'";	
$mysqli->query($query1);
	
include "acomodo.php";	
}



?>

