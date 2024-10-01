<? include "../sesion/arriba.php"; 
include "../sesion/mata.php"; 
extract($_POST);


$valor=$_GET['v'];
$valor=limpiaGet($valor);


if($formA!="afecta"){


 $res6 = $mysqli->query("SELECT * FROM contenido ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
$recorridosM= $fila['recorridos'];
$recorridosImgM= $fila['recorridosImg'];
$residenciasM= $fila['residencias'];
$residenciasImgM= $fila['residenciasImg'];
$campusM= $fila['campus'];
$videosM= $fila['videos'];
$faqM= $fila['faq'];
$faqImgM= $fila['faqImg'];



	}


	?>

<div style="clear:both; height:20px;"></div>


<div style=" float:left;">

<form action="<?=$url?>/_contenido/infoAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
 
    

      

   <div style="width:400px; float:left; margin-bottom:5px; ">Info recorridos</div>
        
        <div style="float:left;  ">
        <textarea id="recorridos"  name="recorridos"   class=" " style="width:500px; height:200px;"><?=$recorridosM?></textarea>
        </div>
        <div style="clear:both; height:10px;"></div>


  <div style="width:200px; float:left; margin-bottom:5px;" >Imagen recorridos</div>
        
        <div style="float:left;  ">
        <input id="recorridosImg"  name="recorridosImg"  type="file" class="img" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both; height:10px;"></div>

         
                 <? if ($recorridosImgM!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left;">
       <img src="<?=$urlContentC?>/<?=$valor?>/<?=$recorridosImgM?>" style="max-height:100px; max-width:200px;" />
        </div>
        <div style="clear:both;"></div>
        <? } ?>
        <div style="clear:both; height:10px;"></div>



   <div style="width:400px; float:left; margin-bottom:5px; ">Info residencias</div>
        
        <div style="float:left;  ">
        <textarea id="residencias"  name="residencias"   class=" " style="width:500px; height:200px;"><?=$residenciasM?></textarea>
        </div>
        <div style="clear:both; height:10px;"></div>



  <div style="width:200px; float:left; margin-bottom:5px;" >Imagen Residencias</div>
        
        <div style="float:left;  ">
        <input id="residenciasImg"  name="residenciasImg"  type="file" class="img" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both; height:10px;"></div>

         
                 <? if ($residenciasImgM!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left;">
       <img src="<?=$urlContentC?>/<?=$valor?>/<?=$residenciasImgM?>" style="max-height:100px; max-width:200px;" />
        </div>
        <div style="clear:both;"></div>
        <? } ?>
        <div style="clear:both; height:10px;"></div>





   <div style="width:400px; float:left; margin-bottom:5px; ">Info campus</div>
        
        <div style="float:left;  ">
        <textarea id="campus"  name="campus"   class=" " style="width:500px; height:200px;"><?=$campusM?></textarea>
        </div>
        <div style="clear:both; height:10px;"></div>



   <div style="width:400px; float:left; margin-bottom:5px; ">Videos del campus</div>
        
        <div style="float:left;  ">
        <textarea id="videos"  name="videos"   class=" " style="width:500px; height:200px;"><?=$videosM?></textarea>
        </div>
        <div style="clear:both; height:10px;"></div>
        
        
        
        
   <div style="width:400px; float:left; margin-bottom:5px; ">Info faq</div>
        
        <div style="float:left;  ">
        <textarea id="faq"  name="faq"   class=" " style="width:500px; height:200px;"><?=$faqM?></textarea>
        </div>
        <div style="clear:both; height:10px;"></div>
        
        
        
        
  <div style="width:200px; float:left; margin-bottom:5px;" >Imagen FAQ</div>
        
        <div style="float:left;  ">
        <input id="faqImg"  name="faqImg"  type="file" class="img" style="width:300px;" accept="image/x-png, image/gif, image/jpeg"   />
        </div>
        <div style="clear:both; height:10px;"></div>

         
                 <? if ($faqImgM!=""){ ?>
         <div style="clear:both; height:5px;"></div>
        <div style="float:left;">
       <img src="<?=$urlContentC?>/<?=$valor?>/<?=$faqImgM?>" style="max-height:100px; max-width:200px;" />
        </div>
        <div style="clear:both;"></div>
        <? } ?>
        <div style="clear:both; height:10px;"></div>
        
        

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

</form>
</div>

 <script>

CKEDITOR.replace( 'recorridos' );
CKEDITOR.replace( 'residencias' );
CKEDITOR.replace( 'campus' );
CKEDITOR.replace( 'videos' );
CKEDITOR.replace( 'faq' );

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}	
 $(".botonEnviar").click(function() {
   CKupdate();
});
</script>


<? } ?>
 
 <? 
 if($formA=="afecta"){
	
$recorridos=mataMalosTin($recorridos);
$residencias=mataMalosTin($residencias);
$campus=mataMalosTin($campus);
$videos=mataMalosTin($videos);
$faq=mataMalosTin($faq);
	
$query="UPDATE contenido SET  recorridos='$recorridos',  residencias='$residencias',  campus='$campus',  videos='$videos',  faq='$faq' ";
$mysqli->query($query);




?>
Datos guardados correctamente
<?
 } 


for ($i = 1; $i <= 4; $i++) {


	if($i==1){$cualFoto="img"; }

	$tmp_name = $_FILES[$cualFoto]["tmp_name"];
	$name = $_FILES[$cualFoto]["name"];
    $nameF = pathinfo($name);	
	$nameF=$nameF['filename'];
	
	$nombreArchivo=$cualFoto;
	$ext = getExtension($name);
 	$ext = strtolower($ext);

	
	if (($ext == "jpg")  || ($ext == "png") ||( $ext == "jpeg") ){
	$yosoy = $nombreArchivo.".".$ext;
	$ruta =  $rutaC."/".$cambia."/".$yosoy;

	
	if (copy($tmp_name,$ruta)){

	//imagen para impresion
	list($anchoImg, $alto) = getimagesize($ruta);
			
			if($anchoImg>1900){
			smart_resize_image( $ruta, $width = 1900, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}
					
			$query1="UPDATE contenido SET $cualFoto='$yosoy' ";	
			$mysqli->query($query1);
	}
	}

}

 
 ?>