<? include "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include "../../sesion/mata.php"; 

if($formA!="afecta"){
	?>

<form action="cualificacionesAddForma.php" method="post" enctype="multipart/form-data" id="forma">

  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$ing?>" >
	<input type="hidden" name="experto" value="<?=$valor?>" >
				    


	<? if($ing!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$texto_es?>" >
  <input type="hidden" id="borraProceso" value="expertosCualificaciones" >
  <input type="hidden" id="borraBorrado" value="<?=$ing?>" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>


	
 <div class="formaB">
	<div class="formaT requerido">Texto</div>
    <div class="formaC">
  <textarea id="texto_es" name="texto_es" class="textoEdit cke"><?=$texto_es?></textarea>
	</div>
</div>



 

<div  style="float:right;">

<input class="botonEnviar"  type="submit" value="Guardar" />
</div>

</form>


<script>

CKEDITOR.replace( 'texto_es' );

function CKupdate2(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}	
	
 $(".botonEnviar").click(function() {
       
   CKupdate2();
         
});
 

</script>
 
 <? } ?>

 

  <? 
 if($formA=="afecta"){
$cambia=mataMalos($cambia);
$experto=mataMalos($experto);
$tipo=mataMalos($tipo);
 
$texto_es=mataMalosTin($texto_es);
$texto_en=mataMalosTin($texto_en);

if($cambia!=""){
	$query="UPDATE expertosCualificaciones SET   tipo='$tipo', texto_es='$texto_es' WHERE id='$cambia'";
	$mysqli->query($query);
}

if($cambia==""){


$va=0;
$res6 = $mysqli->query("SELECT * FROM expertosCualificaciones where muerto='0' and idExperto='$experto' ORDER BY orden desc limit 1 ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$va= $fila['orden'];
	}
$va=$va+1;


	$cambia=aleatorio(10);
	$query="INSERT INTO expertosCualificaciones (id, idExperto, texto_es, orden) VALUES ('$cambia', '$experto', '$texto_es', '$va')";
	$mysqli->query($query);
			 
}

 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "cualificaciones?u=<?=$experto?>";</script>	
</script>	
<?
 } ?>