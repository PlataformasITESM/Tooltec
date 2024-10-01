<? include "../../sesion/arriba.php"; 
$dondeSeccion="languages";
include "../../sesion/mata.php"; 

$valor=$_GET['u'];
$valor=limpiaGet($valor);

$idioma=$_GET['i'];
$idioma=limpiaGet($idioma);

if($formA!="afecta"){

include "../../_files/filesSelect/archivosDisponibles.php";

 $res6 = $mysqli->query("SELECT * FROM emails WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 
	$infoV= unserialize($fila['info']);

	}
	
	$info=$infoV[$idioma];
	
	$subject=$info['subject'];

	$texto1=$info['texto1'];
	$texto2=$info['texto2'];
	$footer=$info['footer'];
	$img=$info['imagen'];
	

  $elArchivo=$arregloArchivos[$img.'imagen']; 
	?>
 
<div style=" float:left; " id="emails">

<div class="clear20"></div>    
<div class="titulosS"><?=$esteIdioma?></div>
<div class="clear20"></div>

<div style=" float:left; ">

<div id="divCat">

<form action="emailsAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
     <input type="hidden" name="i" value="<?=$idioma?>" >


 <div style="clear:both; height:10px;"></div>
<? /* forma */ ?>

<? /* archivos */ ?>
<? if($valor!="footer"){	?>
<div class="formaB">
 <div class="formaT">Imagen Header</div>
<div class="formaC">


<?=$elArchivo?>
<div class="clear10"></div>

<div onClick="abreArchivos('','imgContenido','uno','img','<?=$seccion?>'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" <? if ($valor==""){ ?>  class="validate[required]" <? } ?> value="<?=$img?>" style="width:0; opacity:0;" />
</div>

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>

<? /* archivos */?>

<div class="formitas" style=" float:left;" id="informacionDiv">

<div class="formaB">
 	<div class="formaT">Subject</div>
	<div class="formaC">
	<input id="subject"  name="subject"  type="text" class="validate[required] field"  value="<?=$subject?>" /></div>
</div>


<div class="formaB">
     <div class="formaT">Text 1</div>
    	<div class="formaC">
    	<textarea id="texto1" rows="5"  name="texto1"  class="field"><?=$texto1?></textarea>
    </div>
</div>


 <? } ?>

<div class="formaB">
     <div class="formaT"><?   if($valor!="footer"){	?>Text 2 <? } else { echo"Footer"; }?></div>
    	<div class="formaC">
    	<textarea id="texto2" rows="5"  name="texto2"  class="field"><?=$texto2?></textarea>
    </div>
</div>
 

<? /* archivos */ ?>
<? if($valor=="footer"){	?>
<div class="formaB">
 <div class="formaT">Imagen Footer</div>
<div class="formaC">


<?=$elArchivo?>
<div class="clear10"></div>

<div onClick="abreArchivos('','imgContenido','uno','img','<?=$seccion?>'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" <? if ($valor==""){ ?>  class="validate[required]" <? } ?> value="<?=$img?>" style="width:0; opacity:0;" />
</div>

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>


<? /* archivos */?>


<? } ?>
	

<div style="clear:both; height:10px;"></div>


</div>


<div style="clear:both; height:10px;"></div>
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Send" />
</div>

</form>
 
</div>


<script type="text/javascript">
<? if($valor!="footer"){	?>
CKEDITOR.replace( 'texto1' );
<? } ?>
CKEDITOR.replace( 'texto2' );

 

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
	 
 $subject=mataMalos($subject);

 
 $res6 = $mysqli->query("SELECT * FROM emails WHERE id='$cambia' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$info= arregloSaca($fila['info']);

	}



	$esteArreglo=array();
	$esteArreglo['subject']=$subject;
	$esteArreglo['texto1']=mataMalosTin($texto1);
	$esteArreglo['texto2']=mataMalosTin($texto2);
 
	$esteArreglo['imagen']=$imgContenido;

	//$esteArreglo=arregloMete($esteArreglo);
	$info[$i]=$esteArreglo;

	$info=serialize($info);



	$query="UPDATE emails SET  info='$info' WHERE id='$cambia' ";
$mysqli->query($query);		

?>

<script>  
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_emails/emails";</script>	
<?
 } ?>