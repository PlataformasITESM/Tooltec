<?

$cuentaCom=1;
$selas="SELECT * FROM blogsCom WHERE  idPost='$exp' and idComentario='$com'  and muerto='0'  order by cuando DESC";
$res6s = $mysqli->query($selas);
$res6s->data_seek(0);
while ($fila = $res6s->fetch_assoc())
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

 <? if($cuentaCom==1){ ?><div class="clear20"></div><? } ?>
<div class="div100 comentarioB opacidadI">
<div class="avatar50" style="background-image: url(<?=$miAva?>)"></div>
<div class="div100 comentarioT">
<div class="div100 tituloMini bold"><?=$comenton['nombre']?></div>
<div class="div100"><?=$comentario?></div>
<div class="div100 gris " style="font-size: 12px"> <?=fechaEspHora($cuando)?></div>
 
</div>

 


</div>

<?
$cuentaCom=87;
	}
?>
