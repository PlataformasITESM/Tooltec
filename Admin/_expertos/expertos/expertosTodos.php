
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
 <th>Or</th>
<th>Título</th>
 
<th>Vistas</th>
<th width="60px;"></th>
</tr>
</thead>
<tbody>
<?


$arregloVistas=array();
$res6 = $mysqli->query("SELECT * FROM expertosVistas ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idHerramienta= $fila['idExperto'];
	$idUsuario= $fila['idUsuario'];
	 if($idUsuario!="visitante"){$idUsuario="registro";}
	 $arregloVistas[$idHerramienta]['total']=$arregloVistas[$idHerramienta]['total']+1;
	 $arregloVistas[$idHerramienta][$idUsuario]=$arregloVistas[$idHerramienta][$idUsuario]+1;
 }
	

 
$res6 = $mysqli->query("SELECT * FROM expertos where muerto='0' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$orden= $fila['orden'];
 
	$info= unserialize($fila['info']);
	$etiquetas= unserialize($fila['etiquetas']);
	$img= $fila['img'];
	
 $elArchivo=$arregloArchivos[$img.'imagen'];

	$infoA=unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$fecha= $fila['fecha'];
	$estatus= $fila['activo'];
	
	$opa=1;
	if($estatus==1){$estatus="On";}else{$estatus=""; $opa=.5;}
$puedo=1;
	
 
  $vistas=$arregloVistas[$idU];
	if($puedo==1){	 
				?>

<tr data-titulo="<?=$titulo?>" class="linea" id="<?=$idU?>" style="opacity: <?=$opa?>" >
 <td><?=$orden?></td>
<td  ><a href="expertosAdd.php?u=<?=$idU?>"> 
<div class="div100">
<div class="div100" style="padding-left: 70px"><?=$titulo?></div>

<div class="absoluteV" style="left: 0">
<img src="/expertos/<?=$idU?>/<?=$img?>" width="45">
</div>
</div>
</a></td>
 
 <td style="text-align: right"><?=number_format($vistas['total'])?></td>
<td class="ctrls"   id="controles_linea<?=$idU?>" >
<a class="left padd10 opacidad6" href="expertosAdd?u=<?=$idU?>">
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

 
