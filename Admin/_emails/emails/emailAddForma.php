<? include "../sesion/arriba.php"; 

$donde="emails";
$dondeSeccion="correos";
include "../sesion/mata.php"; 

$valor=$_GET['u'];
$valor=limpiaGet($valor);

$idioma=$_GET['idioma'];
$idioma=limpiaGet($idioma);

include "../_filesSelect/archivosDisponibles.php";

if($formA!="afecta"){
	
	$res6 = $mysqli->query("SELECT * FROM idiomas ORDER BY idiomaEn ASC ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idiomaEn=$fila['idiomaEn'];
	$idiomaU= $fila['idioma'];
	 $puesto="";
	 

	 if($idiomaU==$idioma){ 
	 $esteIdioma=$idiomaEn; 
	 $puesto="menuModuloP";
	   }  
	?>
    <a href="<?=$url?>/_emails/emailsAdd.php?u=<?=$valor?>&i=<?=$idiomaU?>">
   <div class="  menuModulo <?=$puesto?> padd5"> <?=$idiomaEn?></div>
   </a>
    <?	
	}

 $res6 = $mysqli->query("SELECT * FROM emails WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 
	$infoV= arregloSaca($fila['info']);

	}
	
	$info=arregloSaca($infoV[$idioma]);
	
	$subject=subject($info['subject']);
	$texto1=$info['texto1'];
	$texto2=$info['texto2'];
	$footer=$info['footer'];

	?>
 
<div style=" float:left; " id="emails">

<div class="clear20"></div>    
<div class="titulosS"><?=$esteIdioma?></div>
<div class="clear20"></div>

<div style=" float:left; ">

<div id="divCat">

<form action="<?=$url?>/_emails/emailsAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
     <input type="hidden" name="i" value="<?=$idioma?>" >


 <div style="clear:both; height:10px;"></div>
<? /* forma */ ?>

<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Header Image</div>
<div class="formaC">

<?=$elArchivo?>

<div onClick="abreArchivos('imgContenido','uno','img'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC"><img src="<?=$url?>/iconos/file.svg" height="20"  ></div>
       	<div class="seccionMenuC">Select file</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$img?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>

</div>
</div>

<div class="archivosSeleccion" id="seleccion_imgContenido">
<div class="closeSeleccion"  onClick="closeAlert('imgContenido'); return false;">X</div>
<div class="archivosSeleccionArchivos" id="archivos_imgContenido">
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

<div class="formaB">
     <div class="formaT">Text 2</div>
    	<div class="formaC">
    	<textarea id="texto2" rows="5"  name="texto2"  class="field"><?=$texto2?></textarea>
    </div>
</div>

<div class="formaB">
     <div class="formaT">Footer</div>
    	<div class="formaC">
    	<textarea id="footer" rows="5"  name="footer"  class="field"><?=$footer?></textarea>
    </div>
</div>


<div style="clear:both; height:10px;"></div>


</div>


<div style="clear:both; height:10px;"></div>
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Send" />
</div>

</form>
 
</div>

<script>
$('.numero').number( true, 0 );
</script>


<script type="text/javascript">

CKEDITOR.replace( 'texto1' );
CKEDITOR.replace( 'texto2' );
CKEDITOR.replace( 'footer' );

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

 $(document).ready(function(){
	
	$(function() {
         $( "#aquiFotos" ).sortable({
		 cursor: 'move',
	     update : function(event, ui){
          var orden=$('#aquiFotos').sortable('toArray').toString();
		  $('#imgContenidoOriginal, #imgContenido').val(orden);
		 
		 $('#imgContenido_Div').html('');
        }
		
		
		});
        $( "#aquiFotos" ).disableSelection();
        });
	
	
});

function mataSlider(diapositiva){
	
	$('#'+diapositiva).remove();
 
		 var arreglo = [];
		    $.each($(".sliderDropas"), function(){   
                arreglo.push(this.id);
            });
          $('#imgContenidoOriginal, #imgContenido').val( arreglo.join(","));
}


<? if ($nombreM!=""){ ?>
$('#tituloCurso').text('PRODUCT: <?=$nombreM?>');



<? } ?>

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
	

	$info=array();


	
	
	//imgs 
	if($imgContenidoOriginal!="" && $imgContenidoOriginal!=$imgContenido){
		$imgContenidoOriginal=explode(',',$imgContenidoOriginal);	
	
	
	if($imgContenido!=""){
		$imgContenido=explode(',',$imgContenido);	
	}
	$imgContenido = array_merge($imgContenidoOriginal, $imgContenido);
	$imgContenido=implode(',',$imgContenido);
	}
	 //
	 
	$esteArreglo=array();
	$esteArreglo['subject']=$subject;
	$esteArreglo['texto1']=$texto1;
	$esteArreglo['texto2']=$texto2;
	$esteArreglo['footer']=$footer;
	

	$esteArreglo=arregloMete($esteArreglo);
	$info[$i]=$esteArreglo;
	$info=arregloMete($info);
	

	$query="UPDATE emails SET    info='$info' WHERE id='$cambia' ";
$mysqli->query($query);		


	

?>

<script>  
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_emails/emailsTodos.php";</script>	
<?
 } ?>