
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
 <th>Or</th>
<th>Título</th>
<th>Abstract</th>
<th>Url</th>
	<th>Vistas</th>
	<th>Likes</th>
	<th>Comentarios</th>
	<th>Descargas</th>

<th width="60px;"></th>
</tr>
</thead>
<tbody>
<?
$arregloVistas=array();
$res6 = $mysqli->query("SELECT * FROM herramientasVistas ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idHerramienta= $fila['idHerramienta'];
	$idUsuario= $fila['idUsuario'];
	 if($idUsuario!="visitante"){$idUsuario="registro";}
	 $som=$arregloVistas[$idHerramienta]['total'] ?? 0;
	 $arregloVistas[$idHerramienta]['total']=$som+1;
	 $som=$arregloVistas[$idHerramienta][$idUsuario] ?? 0;
	 $arregloVistas[$idHerramienta][$idUsuario]=$som+1;
 }
	
	
$res6 = $mysqli->query("SELECT * FROM herramientas where muerto='0' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$tituloC= $fila['tituloC_es'];
	$orden= $fila['orden'];
	 $meGusta= $fila['meGusta'];
	 $comentarios= $fila['comentarios'];
	$descargas= $fila['descargas'];
	$info= unserialize($fila['info']);

	$img= $fila['img'];
 


 
	$estatus= $fila['activo'];
	
	$opa=1;
	if($estatus==1){$estatus="On";}else{$estatus=""; $opa=.5;}
$puedo=1;
	
 $vistas=$arregloVistas[$idU];
 
	if($puedo==1){	 
				?>

<tr data-titulo="<?=$titulo?>" class="linea" id="<?=$idU?>" style="opacity: <?=$opa?>" >
 <td><?=$orden?></td>
<td  ><a href="herramientasAdd.php?u=<?=$idU?>"> 

<div class="div100">
<div class="div100" style="padding-left: 70px"><?=$titulo?></div>
<div class="absoluteV" style="left: 0">
<img src="/herramientas/<?=$idU?>/t_<?=$img?>" style="max-width: 50px; max-height: 50px;">
</div>
</div>
</a>
	</td>
<td><?=$info['abstractC']?></td>
 <td><a href="/herramientas/<?=$tituloC?>" target="_blank">/herramientas/<?=$tituloC?></a></td>
<td style="text-align: right"><?=number_format($vistas['total'] ?? 0)?></td>
<td style="text-align: right"><?=number_format($meGusta)?></td>
<td style="text-align: right"><?=number_format($comentarios)?></td>
<td style="text-align: right"><?=number_format($descargas)?></td>
	
<td class="ctrls"   id="controles_linea<?=$idU?>" >

<a class="left padd10 opacidad6" href="herramientasAdd?u=<?=$idU?>">
 Editar
</a>
 </td>
</tr>
 <? 

 }  } ?>
 


</tbody>

</table>
</div>
<script>
$(function() {	
$('.tablesorter').show();
});
</script>

 
