<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";

if($formA!="afecta"){
 

$res6 = $mysqli->query("SELECT * FROM sitio  LIMIT 1");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$google=base64_decode($fila['google']);

	}
	

 


?>


<div class="blanco10">

<div class="div50">

<form action="analyticsAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
  <input type="hidden" name="d" value="<?=$d?>" >

 

 
<div class="formaB">
<div class="formaT">Código</div>
<div class="formaC "><textarea rows="10" name="google"><?=$google?></textarea></div>
</div>








 
<div class="div"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="GUARDAR" />
</div>

</form>
 
 </div>
</div>

 

 <? } ?>
 
 <? 
 if($formA=="afecta"){
 
$google=base64_encode($google);
	$query="UPDATE sitio SET google='$google' WHERE id='1'";
	$mysqli->query($query);
	

?>

<script> 
top.location.reload();
</script>	

<?
 } ?>