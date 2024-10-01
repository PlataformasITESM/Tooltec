<div class="blanco10T">
<a href="codigoAdd.php?v=<?=$ver?>">    
         <div class="seccionMenu" id="c_n"  >
      <div class="material-icons padd10NL">add</div>
       		<div class=" tableCell   padd10NR" >Agregar código <?=strtoupper($ver)?></div>
</div>  
</a>
</div>

<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%;display:none; " >

<thead>
<tr>
<th>Nombre</th>
<th>Última edición</th>
<th></th>
</tr>
</thead>
<tbody>
<?
$selas="SELECT * FROM codigo WHERE tipo='$ver' ORDER BY nombre ASC ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['nombre'];
	$modificado= $fila['modificado'];

	 
	?>


<tr class="linea" id="linea<?=$idU?>" style="opacity: <?=$opa?>" >
 <td><a href="codigoAdd?v=<?=$ver?>&u=<?=$idU?>"><?=$titulo?> </a></td>
	<td><?=$modificado?></td>
 <td class="ctrls" style="width: 100px;" id="controles_linea<?=$idU?>" >
<a class="left padd10 opacidad6" href="codigoAdd?v=<?=$ver?>&u=<?=$idU?>">
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

 
