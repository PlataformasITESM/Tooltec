<?

$avatares=array();
$selas="SELECT * FROM herramientasCom WHERE  idHerramienta='$exp' and idComentario='' and muerto='0' order by cuando DESC";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$com= $fila['id'];
		$comentario= $fila['comentario'];
		$cuando= $fila['cuando'];
		$comenton= unserialize($fila['creado']);
		$avatar=$comenton['avatar'];
		

		
		if($avatares[$comenton['id']]==""){
		if($avatar!=""){		$avatares[$comenton['id']]="/avatars/".$comenton['id']."/".$avatar;}else{
			$avatares[$comenton['id']]="/img/noUser.png";
			}
		}
		
		$miAva=$avatares[$comenton['id']];
		?>

 
<div class="div100 comentarioB opacidadI">
<div class="avatar50" style="background-image: url(<?=$miAva?>)"></div>
<div class="div100 comentarioT">
<div class="div100 tituloMini bold"><?=$comenton['nombre']?></div>
<div class="div100"><?=$comentario?></div>
<div class="div100 gris " style="font-size: 12px"> <?=fechaEspHora($cuando)?></div>
<? if($quien!="") { ?>
<div class="cursor rosa" onClick="$('#<?=$com?>').slideToggle();">Responder</div>
<? } ?>
</div>

<div class="div100" style="padding-left:60px;" >

<div id="<?=$com?>" style=" display: none">

<div  onClick="$('#<?=$com?>').slideToggle();" class="close">X</div>
<div class="clear30"></div>

<div class="div100 padd10" id="comentaDiv<?=$com?>">
<textarea name="comentar<?=$com?>" id="comentar<?=$com?>"></textarea> 
<div class="clear10"></div>
<div class="botonEnviar right" onClick="comenta('<?=$exp?>','<?=$com?>');">Responder</div>
</div>
</div>

<div class="div100" id="com<?=$com?>"><? include "herramientasComentariosReply.php"; ?></div>


</div>



</div>

<?
	}
?>
