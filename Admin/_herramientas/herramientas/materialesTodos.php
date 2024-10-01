
<div class="clear20"></div>

<div class="div100">
<table id="tablesorter"  class="tablesorter"   >



<thead>
<tr>
<th style="width: 50px;">Orden</th>
<th>Tipo</th>
<th>Texto</th>

 <th width="30px;"></th>

</tr>
</thead>

<?
$res6 = $mysqli->query("SELECT * FROM herramientasPasos WHERE idHerramienta='$valor' and tipoPaso='material'  and muerto='0' ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$idHerramienta= $fila['idHerramienta'];
 
$tipo= $fila['tipo'];
$texto= $fila['texto_es'];
$orden= $fila['orden'];
if($tipo=="texto") {$tipo="material";}
				?>



<tr class="linea" id="<?=$idU?>" data-titulo="<?=$texto?>" style="opacity: <?=$opa?>"  >
	
	<td class="centrado"><?=$orden?></td>
	<td><a href="materialesAdd.php?u=<?=$valor?>&ing=<?=$idU?>"> 
 
		<?=$tipo?> </a> </td>  

<td><a href="materialesAdd.php?u=<?=$valor?>&ing=<?=$idU?>"> 
 
<?=$texto?> </td>  

<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
		<a href="materialesAdd.php?u=<?=$valor?>&ing=<?=$idU?>"> 
		<div class="material-icons">mode_edit</div>
		</a>
</div>
				
 
	
</td>
</tr>
      
 <? } ?>
</table>


</div>

<script>
	$("#tablesorter").DataTable( {});
</script>