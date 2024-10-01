<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="tags";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM herramientas WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
 
	$recomendaciones=unserialize($fila['recomendaciones']);
	$tags=unserialize($fila['tags']);
	
 
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="tagsAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div50">


<? if($valor==""){ ?>
<div class="formaB ">
	<div class="formaT  requerido">ID</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="idO" name="idO"  > 
	</div>
</div> 
<? } ?>

 
<div class="formaB ">
	<div class="formaT requerido">tags</div>
    <div class="formaC">
		 
	<?		$res6 = $mysqli->query("SELECT * FROM herramientasTags order by titulo_es asc");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloL= $fila['titulo_es'];
	$idL= $fila['id'];
	?>
	<label><input type="checkbox" <? if($tags[$idL]!="") { ?> checked <? } ?> name="tags[]" value="<?=$idL?>"><?=$tituloL?></label>
	<div class="clear"></div>
	<?
	}
	?>
			
		 
			</div>
</div>




<div class="clear"></div>






 
 
</div>
 

  
 
	
	
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 

</form>
</div>
 
<script type="text/javascript">

 

 </script>
 
 <? } ?>
 
 <? 
if($formA=="afecta"){


$cambia=mataMalos($cambia);


$tagnes=array();
foreach($tags as $us){
$tagnes[$us]=1;
}

$tags=serialize($tagnes);
if($cambia!=""){
	$query="UPDATE herramientas SET  tags='$tags'  WHERE id='$cambia'";
	$mysqli->query($query); 
}
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_herramientas/herramientas/tags.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>