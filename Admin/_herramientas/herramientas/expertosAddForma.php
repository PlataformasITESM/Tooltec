<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM herramientas WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
 
	$recomendaciones=unserialize($fila['recomendaciones']);
	$expertos=unserialize($fila['expertos']);
	
 
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="expertosAddForma" method="post" enctype="multipart/form-data" id="forma">
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
	<div class="formaT requerido">Expertos</div>
    <div class="formaC">
		 
	<?		$res6 = $mysqli->query("SELECT * FROM expertos order by titulo_es asc");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloL= $fila['titulo_es'];
	$idL= $fila['id'];
	?>
	<label><input type="checkbox" <? if($expertos[$idL]!="") { ?> checked <? } ?> name="expertos[]" value="<?=$idL?>"><?=$tituloL?></label>
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


$expertones=array();
foreach($expertos as $us){
$expertones[$us]=1;
}

$expertos=serialize($expertones);
if($cambia!=""){
	$query="UPDATE herramientas SET  expertos='$expertos'  WHERE id='$cambia'";
	$mysqli->query($query); 
}
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_herramientas/herramientas/expertos.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>