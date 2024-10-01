
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
 <th>Or</th>
<th>Título</th>
<th width="60px;"></th>
</tr>
</thead>
<tbody>
<?
 
 
$res6 = $mysqli->query("SELECT * FROM recetasPlatillos where muerto='0' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
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
 <td><?=$orden?></td>
<td  ><a href="usosAdd.php?u=<?=$idU?>"> 
<div class="div100">
<div class="div100" style="padding-left: 70px"><?=$titulo?></div>
<div class="absoluteV" style="left: 0">
<img src="/recetas/platillos/<?=$idU?>/t_<?=$img?>"  style="max-height: 40px; max-width: 60px">
</div>
</div>
</a></td>
 
<td class="ctrls"   id="controles_linea<?=$idU?>" >
<a class="left padd10 opacidad6" href="usosAdd?u=<?=$idU?>">
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

 
