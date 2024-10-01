<div class="clear20"></div>
 

<div class="blanco10">

 
 
<div class="div50 ">


<table id="tablesorter"  class="tablesorter" style="width:100%;  " >

<thead>
<tr>
<th>Menú</th>
<th></th>
 

 

</tr>
</thead>


<?

$res6 = $mysqli->query("SELECT * FROM seccionesMenu ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$color= $fila['color'];
	$titulo= $fila['titulo_es'];
	$idSeccion= $fila['idSeccion'];
	$urlSeccion= $fila['urlSeccion'];
 ?>


<tr class="linea" id="linea<?=$idU?>"  >
<td><a href="menuAdd.php?v=<?=$idU?>" title="Editar"><?=$titulo?> (<?=$color?>)</a></td>
<td style="width: 120px;" class="ctrls" id="controles_linea<?=$idU?>" >

 
<div class="left padd5">
<a href="menuAdd?v=<?=$idU?>" title="Editar">
 <div class="left"  >Editar</div>
</a>
</div>
 
 
	
 
 </td>
</tr>              
 <? } ?>
 




</table>
</div>


</div>


