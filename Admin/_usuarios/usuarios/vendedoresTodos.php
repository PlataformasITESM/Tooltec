<?
$arregloYaRegistrados=array();
$res6 = $mysqli->query("SELECT * FROM usuarios WHERE tipo='vendedor' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$arregloYaRegistrados[$fila['id']]=$fila['correo'];
	}

?>


<div class="blanco10"  > 
<table id="tablesorter"  class="tablesorter" style="width:100%; " >

<thead>
<tr>

<th>Perfil</th>
<th>Nombre</th>
<th>Correo</th>
<th></th>
 

</tr>
</thead>
<tbody>
<?


$res6 = $mysqli->query("SELECT * FROM vendedores WHERE empresa='$e' ORDER BY nombre ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$yaesta="";
	$idU= $fila['id'];
 	$idU='v'.$idU;
	$nombre= $fila['nombre'];
 	$correo=$arregloYaRegistrados[$idU];
 

				?>
<tr class="linea" id="linea<?=$idU?>"  >

 <td style="text-transform:capitalize;">Vendedorc</td>
<td><a href="/_usuarios/vendedoresAdd/?e=<?=$e?>&u=<?=$idU?>"><?=$nombre?></a></td>
<td><?=$correo?></td>


<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
<a href="/_usuarios/vendedoresAdd/?e=<?=$e?>&u=<?=$idU?>">
<div class="material-icons">mode_edit</div>
</a>
    </div>
 </td>
 

 </tr>             
 <? 
}
?>
 


</tbody>

</table>
</div>