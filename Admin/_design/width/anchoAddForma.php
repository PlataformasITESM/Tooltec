<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";

if($formA!="afecta"){

$tWidth="Ancho";
 


if($idiomaU=="en"){
$tWidth="Width";
 
}


$res6 = $mysqli->query("SELECT * FROM sitio  LIMIT 1");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$ancho=$fila['ancho'];

	}
	

	if($ancho<1000){$ancho=1000;}


?>


<div class="blanco10">

<div class="div25">

<form action="anchoAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
  <input type="hidden" name="d" value="<?=$d?>" >

 

 
<div class="formaB">
<div class="formaT"><?=$tWidth?> px</div>
<div class="formaC "><input type="text" name="ancho" id="ancho" class="  entero" style="text-align: left !important;" value="<?=$ancho?>"></div>
</div>








 
<div class="div"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="GUARDAR" />
</div>

</form>
 
 </div>
</div>

 <script>
  $( function() {
    $( "#ancho" ).spinner({
      spin: function( event, ui ) {
        if ( ui.value > 1600 ) {
          $( this ).spinner( "value", 1000 );
          return false;
        } else if ( ui.value < 1000 ) {
          $( this ).spinner( "value", 1600 );
          return false;
        }
      }
    });
  } );
  </script>



 <? } ?>
 
 <? 
 if($formA=="afecta"){
 
	$query="INSERT INTO sitio (id) VALUES ('1')";
	$mysqli->query($query);

	$query="UPDATE sitio SET ancho='$ancho' WHERE id='1'";
	$mysqli->query($query);
	

?>

<script> 
top.location.reload();
</script>	

<?
 } ?>