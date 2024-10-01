<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>
<div class="div100 centrado tituloSeccion rosa" id="crearTitulo">Mis sesiones</div>

<div class="clear20"></div>

<div id="creaCuentaResultado"></div>
 
<?

$selas="SELECT * FROM usuariosF WHERE id='$quien'  LIMIT 1";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) 
	{ 
	$galletas= unserialize($row11['galletas']); 
	}
	
   foreach ($galletas as $gal=>$galle){  ?>
   
   <div class="div100 padd5 opacidadI  " id="<?=$gal?>">
   <? if($gal!=$huella){ ?>
   <div class=" opacidad absoluteV material-icons borra" style="right: 10px;" onClick="borraSes('<?=$gal?>')">clear</div>
   <? } else { ?>
   <div class=" opacidad absoluteV material-icons  verde" style="right: 10px;" title="Sesión actual"  >check</div>
   <? } ?>
   <div class="div100" style="padding-right:50px;">
   <?=$gal?> <br>
 <?=$galle['ip']?> <br>
<?=$galle['browser']?><br>
<?=$galle['ciudad']?><br>
<?=$galle['cuando']?>
</div>
</div>
   <div class="clear20"></div>
   <? } 
 ?>



<script>
function borraSes(cual){
 if (confirm("¿Deseas eliminar la sesión?")) {
 $('#'+cual).slideToggle();
 
 	$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/sesionesP",
    data: "cual="+cual,
    success: 
		function(msg){
		
		}
    });
 
 }
}

</script>