
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
<th></th>
<th>Título</th>
<th>Categoria</th>
<th>Fecha</th>
<th>Url</th>
	<th>Vistas</th>
	<th>Likes</th>
	<th>Comentarios</th>
<th width="60px;"></th>
</tr>
</thead>
<tbody>
<?
include "../../_files/filesSelect/archivosDisponibles.php";

$arregloVistas=array();
$res6 = $mysqli->query("SELECT * FROM blogsVistas ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idHerramienta= $fila['idHerramienta'];
	$idUsuario= $fila['idUsuario'];
	 if($idUsuario!="visitante"){$idUsuario="registro";}
	 $arregloVistas[$idHerramienta]['total']=$arregloVistas[$idHerramienta]['total']+1;
	 $arregloVistas[$idHerramienta][$idUsuario]=$arregloVistas[$idHerramienta][$idUsuario]+1;
 }

	
	$arregloSubs=array();
$res6 = $mysqli->query("SELECT * FROM blogsCat");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$arregloSubs[$fila['id']]= $fila['titulo'];
	}

$res6 = $mysqli->query("SELECT * FROM blogs where muerto=0 ORDER BY fecha DESC ,titulo ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];

	$titulo= $fila['titulo'];
	$tituloC= $fila['tituloC'];
	$img= $fila['img'];
	
 	 $meGusta= $fila['meGusta'];
	 $comentarios= $fila['comentarios'];
	$infoA=arregloSaca($fila['info']);
	$subcategoria= $fila['categoria'];
	$fecha= $fila['fecha'];
	$activo= $fila['activo'];
	
	$opa=1;
	if($activo==1){$activo="On";}else{$activo=""; $opa=.5;}
	 $vistas=$arregloVistas[$idU]; 
				?>

<tr class="linea" id="linea<?=$idU?>" style="opacity: <?=$opa?>" >
<td style="width: 50px;"><a href="blogAdd?u=<?=$idU?>">
<div class="left" style="background-image: url('<?=$url?>/img/transparente.png')">
	<img src="<?=$urlFront?>/blogs/<?=$idU?>/t_<?=$img?>" id="logoImg" height="150" style="max-height: 50px; max-width: 50px;" />
	</div>
</a></td>
<td><a href="blogAdd.php?u=<?=$idU?>"> <?=$titulo?> </a></td>
<td><?=$arregloSubs[$subcategoria]?></td>
<td><?=$fecha?></td>
 <td><a href="/blog/<?=$tituloC?>" target="_blank">/blog/<?=$tituloC?></a></td>
<td style="text-align: right"><?=number_format($vistas['total'])?></td>
<td style="text-align: right"><?=number_format($meGusta)?></td>
<td style="text-align: right"><?=number_format($comentarios)?></td>

<td class="ctrls" style="width: 180px;" id="controles_linea<?=$idU?>" >

<div onclick="javascript:if (confirm('¿Desea duplicar el blog \'<?=$titulo?>\'?')){copiarCategoria('<?=$idU?>');}" class="left padd10 opacidad6  cursor" style="margin-right: 10px;">Copiar</div>

<a class="left padd10 opacidad6" href="blogAdd?u=<?=$idU?>">
 Editar
</a>
 </td>

 <? 

 }  ?>
 
</tr>

</tbody>

</table>
</div>
<script>
$(function() {	
$('.tablesorter').show();
});
</script>

 
