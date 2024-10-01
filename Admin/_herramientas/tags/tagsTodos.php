
<div class="blanco10"  >  
<div class="div100">
<table id="tablesorter"  class="tablesorter" style="width:100%; table-layout: fixed; display:none; " >

<thead>
<tr>
 
<th>Título</th>


<th style=" width: 60px"></th>
</tr>
</thead>
<tbody>
<?
 

 
$res6 = $mysqli->query("SELECT * FROM herramientasTags where muerto='0' ORDER BY titulo_es ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$orden= $fila['orden'];
	$img= $fila['img'];
	
 $elArchivo=$arregloArchivos[$img.'imagen'];


	$estatus= $fila['activo'];
	
	$opa=1;
	 
$puedo=1;
	
 
 
	if($puedo==1){	 
				?>

<tr data-titulo="<?=$titulo?>" class="linea" id="<?=$idU?>" style="opacity: <?=$opa?>" >
 
<td  ><a href="tagsAdd.php?u=<?=$idU?>"> 
 <?=$titulo?>

</a></td>

 
 
 
<td class="ctrls"   id="controles_linea<?=$idU?>" style="width: 50px" >
<a class="left padd10 opacidad6" href="tagsAdd?u=<?=$idU?>">
 Editar
</a>
 </td>
</tr>
 <? 

 }  } ?>
 


</tbody>

</table>
</div>
</div>
<script>
$(function() {	
$('.tablesorter').show();
});
</script>

 
