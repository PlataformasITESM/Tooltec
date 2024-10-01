 
<div class="clear20"></div>



<div class="blanco10">
<div class="nueva" style="float:left; cursor:pointer;" id="nueva">
<a href="<?=$url?>/_usuarios/adminsAdd " title="Agregar">
            <div class="material-icons">add_circle</div>  
            <div class="botonA" >Agregar Admnistrador<?=$ver?></div>
            </a>
 	</div>
</div>

<div class="blanco10"  > 
<table id="tablesorter"  class="tablesorter" style="width:100%; display:none; " >

<thead>
<tr>
 
<th>Nombre</th>
<th>Email</th>
<th></th>

</tr>
</thead>
<tbody>
<?
$res6 = $mysqli->query("SELECT * FROM usuarios WHERE tipo='admin' AND id!='a' AND visible=0 ORDER BY nombre ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$nombre= $fila['nombre'];
	$apellido= $fila['apellido'];
	$correo= $fila['correo'];
	?>

<tr class="linea" id="linea<?=$idU?>"  >
<td><a href="<?=$url?>/_usuarios/adminsAdd/? u=<?=$idU?>" title="Editar"><?=$nombre?> <?=$apellido?></a></td>
<td><?=$correo?></td>
<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
<a href="<?=$url?>/_usuarios/adminsAdd/?e=<?=$e?>&u=<?=$idU?>" title="Editar">
<div class="material-icons">mode_edit</div>
</a>

    </div>
 </td>
              
 <?   
}?>
 
</tr>

</tbody>

</table>
</div>
