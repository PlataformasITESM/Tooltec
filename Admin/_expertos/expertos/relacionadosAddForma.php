<? include "../../sesion/arriba.php"; 
$dondeSeccion="quesos";
include "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM quesos WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
 
	$relacionados=unserialize($fila['relacionados']);
	
 
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="relacionadosAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div50">


 

 


<div class="formaB ">
	<div class="formaT requerido">Productos</div>
    <div class="formaC">
		 
	<?		$res6 = $mysqli->query("SELECT * FROM quesos order by orden asc");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloL= $fila['titulo_es'];
	$idL= $fila['id'];
	?>
	<label><input type="checkbox" <? if($relacionados[$idL]!="") { ?> checked <? } ?> name="usos[]" value="<?=$idL?>"><?=$tituloL?></label>
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


$relacionados=array();

foreach($usos as $us){
$relacionados[$us]=1;
}
foreach($platillos as $us){
$relacionados['platillos'][$us]=1;
}
 $relacionados=serialize($relacionados);

if($cambia!=""){
	$query="UPDATE quesos SET  relacionados='$relacionados'  WHERE id='$cambia'";
	$mysqli->query($query); 
}
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_quesos/quesos/relacionados.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>