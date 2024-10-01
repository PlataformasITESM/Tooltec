
<div class="clear20"></div>

<div class="div100">
<table id=" "  class="tabla div100"   >



<thead>
<tr>

<th style="width: 150px;">Usuario</th>
<th>Comentario</th>
<th style="width: 80px;">Fecha</th>

 <th width="20px;"></th>

</tr>
</thead>

<?

$res6 = $mysqli->query("SELECT * FROM blogsCom WHERE idPost='$valor' and idComentario='' and muerto='0' ORDER BY idComentario ASC, cuando desc");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
 
	$idComentario= $fila['idComentario'];
	
$comentario= $fila['comentario'];
$info= unserialize($fila['creado']);
$cuando= $fila['cuando'];

if($info['admin']==1){$soya="(Admin)";} else {$soya="";}
			?>

<tr class="linea" id="<?=$idU?>" data-titulo="<?=$texto?>" style="opacity: <?=$opa?>"  >

	<td><?=$info["nombre"]?> <?=$soya?></td>
 
		<td ><?=$comentario?></td>
		<td><?=$cuando?></td> 
 

<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  " class="borra" onClick="borraCom('<?=$idU?>','')">
		
		<div class="material-icons">clear</div>
		
</div>
</div>
				
	
</td>
</tr>
<?

$res6d = $mysqli->query("SELECT * FROM blogsCom WHERE idPost='$valor' and idComentario='$idU' and muerto='0' ORDER BY idComentario ASC, cuando desc");
$res6d->data_seek(0);
 while ($fila = $res6d->fetch_assoc()) 
	{
	$idU2= $fila['id'];
	$idComentario= $fila['idComentario'];
	
$comentario= $fila['comentario'];
$info= unserialize($fila['creado']);
$cuando= $fila['cuando'];
if($info['admin']==1){$soya="(Admin)";} else {$soya="";}
?>
   <tr class="linea" id="<?=$idU2?>" data-titulo="<?=$texto?>" style="opacity: <?=$opa?>"  >

	<td><?=$info["nombre"]?> <?=$soya?></td>
 
		<td style="padding-left: 50px" ><?=$comentario?></td>
		<td><?=$cuando?></td> 
 

<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  " class="borra" onClick="borraCom('<?=$idU?>','<?=$idU2?>')">
		
		<div class="material-icons">clear</div>
		
</div>
				
	
</td>
</tr>   
 <?
 $cuentaR=$cuentaR+1;
 } 
  $cuenta=$cuenta+1;
 }
 ?>
</table>


</div>

<script>
function borraCom(cual,que){
var ale="";

ooo=cual;
if(que){ooo=que;}
if(!que){ ale="\n Se eliminará todo el hilo del comentario";}
if (confirm("¿Deseas eliminar el comentario?"+ale) == true) {

	$.ajax({
    type: "POST",
    url: "borraCom.php",
    data: "com="+cual+'&com2='+que,
    success: 
    function(msg){
		 $('#'+ooo).remove();
 	 }
   	});
}

}
	//$("#tablesorter").DataTable( {});
</script>