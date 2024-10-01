<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	?>

<form action="materialesAddForma.php" method="post" enctype="multipart/form-data" id="forma">

  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$ing?>" >
	<input type="hidden" name="herramienta" value="<?=$valor?>" >
				    


	<? if($ing!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$texto_es?>" >
  <input type="hidden" id="borraProceso" value="herramientasPasos" >
  <input type="hidden" id="borraBorrado" value="<?=$ing?>" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>

	
			
 <div class="formaB">
	<div class="formaT requerido">Tipo</div>
    <div class="formaC">
   <select name="tipo" id="tipo">
   <option value="texto">Material</option>
   <option value="titulo" <? if ($tipo=="titulo")  { ?> selected<? } ?>>Título</option>
   </select>
	</div>
</div>

	
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
$herramienta=mataMalos($herramienta);
$tipo=mataMalos($tipo);
 
$texto_es=mataMalosTin($texto_es);


if($cambia!=""){
	$query="UPDATE herramientasPasos SET   tipo='$tipo', texto_es='$texto_es' WHERE id='$cambia'";
	$mysqli->query($query);
}

if($cambia==""){

$va=0;
$res6 = $mysqli->query("SELECT * FROM herramientasPasos where muerto='0' and idHerramienta='$herramienta' ORDER BY orden desc limit 1 ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$va= $fila['orden'];
	}
$va=$va+1;


	$cambia=aleatorio(10);
	$query="INSERT INTO herramientasPasos (id, idherramienta, tipoPaso, tipo, texto_es, orden) VALUES ('$cambia', '$herramienta', 'material', '$tipo', '$texto_es', '$va')";
	$mysqli->query($query);
			 
}

 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "materiales?u=<?=$herramienta?>";</script>	
</script>	
<?
 } ?>