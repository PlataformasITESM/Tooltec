<div class="clear10"  > 
<a href="<?=$url?>/_usuarios/usuariosAdd/?t=" title="Agregar">
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar usuario</div>
</div>  
</a>

 
<div class="blanco10"  > 
<table id="tablesorter"  class="tablesorter" style="width:100%; " >

<thead>
<tr>

<th>Perfil</th>
<th>Nombre</th>
<th>Email</th>
<th></th>

</tr>
</thead>
<tbody>
<?
 
$res6 = $mysqli->query("SELECT * FROM usuarios WHERE tipo=''  ORDER BY nombre ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
 
	$nombre= $fila['nombre'];
	$apellido= $fila['apellido'];
	$correo= $fila['correo'];
		$usuario= $fila['usuario'];


				?>
                     

<tr class="linea" id="linea<?=$idU?>"  >

 <td style="text-transform:capitalize;"><?=$ver?></td>
<td><a href="<?=$url?>/_usuarios/usuariosAdd/?t=<?=$ver?>&u=<?=$idU?>"><?=$nombre?> <?=$apellido?></a></td>
<td><?=$correo?></td>


<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
<a href="<?=$url?>/_usuarios/usuariosAdd/?t=<?=$ver?>&u=<?=$idU?>">
<div class="material-icons">mode_edit</div>
</a>

    </div>
    
    
    
 </td>
              
 <? 
}

 
?>
                   
    </div>
 </td>
              

</tr>

</tbody>

</table>
</div>
