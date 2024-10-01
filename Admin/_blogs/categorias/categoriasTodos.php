
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
<th>Título</th>
 
<th width="60px;"> </th>
</tr>
</thead>
<tbody>
<?

 



$res6 = $mysqli->query("SELECT * FROM blogsCat where activo='1' AND muerto='0'  ORDER BY titulo ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];

	$titulo= $fila['titulo'];
	$tituloC= $fila['tituloC'];
 
 	$activo= $fila['activo'];
	
	$opa=1;
	if($activo==1){$activo="On";}else{$activo=""; $opa=.5;}
	 
				?>


<tr class="linea" id="linea<?=$idU?>" style="opacity: <?=$opa?>" >
    <td><a href="categoriasAdd?u=<?=$idU?>"><?=$titulo?> </a></td>
     

    <td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:right;  ">
<a href="categoriasAdd?u=<?=$idU?>">
<div class="material-icons" title="Editar">mode_edit</div>
</a>

</div>

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

 
