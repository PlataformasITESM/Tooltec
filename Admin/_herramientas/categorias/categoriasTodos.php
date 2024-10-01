
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;" >

<thead>
<tr>
<th>Título</th>
<th width="60px;"></th>
</tr>
</thead>
<tbody>
<?
 
 
$res6 = $mysqli->query("SELECT * FROM herramientasCat where muerto='0' ORDER BY titulo ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo'];
	$orden= $fila['orden'];
	$linea= $fila['linea'];
	$info= unserialize($fila['info']);
	$etiquetas= unserialize($fila['etiquetas']);
	$img= $fila['img'];
	
 $elArchivo=$arregloArchivos[$img.'imagen'];

	$infoA=unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$fecha= $fila['fechaI'];
	$fechaF= $fila['fechaF'];
	$estatus= $fila['activo'];
	
	$opa=1;
	 
$puedo=1;
	
 
 
	if($puedo==1){	 
				?>

<tr data-titulo="<?=$titulo?>" class="linea" id="<?=$idU?>" style="opacity: <?=$opa?>" >

<td  ><a href="categoriasAdd.php?u=<?=$idU?>"> 
<div class="div100">
<?=$titulo?>

</div>
</a></td>
 
<td class="ctrls"   id="controles_linea<?=$idU?>" >
<a class="left padd10 opacidad6" href="categoriasAdd?u=<?=$idU?>">
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

 
