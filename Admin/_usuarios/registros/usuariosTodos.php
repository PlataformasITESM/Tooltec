 
 
<div class="blanco10"  > 
<table id="tablesorter"  class="tablesorter" style="width:100%; " >

<thead>
<tr>


<th>Nombre</th>
<th>Apellido</th>

<th>Email</th>
<th>Institución</th>
<th>Datos</th>
<th>Herramientas frecuencia</th>
<th>Vistas Herramientas</th>
<th>Vistas Herramientas x día</th>
<th>Última conexión</th>
<th>Desde</th>
<th>Desde días</th>
 
</tr>
</thead>
<tbody>
<?
 
$res6 = $mysqli->query("SELECT * FROM usuariosF    ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
 
	$nombre= $fila['nombre'];
	$apellido= $fila['apellido'];
	$correo= $fila['correo'];
	$institucion= $fila['institucion'];
	$puesto= $fila['puesto'];
	$campus= $fila['campus'];
	$lastLogin= $fila['lastLogin'];
	$desde= $fila['cuando'];

 
$anterior=strtotime($lastLogin);
$desdeD=$hoySt-strtotime($desde);
$desdeD=ceil($desdeD/86400);

$granPasado=0;
$granCuenta=0;
$vistones=array();
$res6s = $mysqli->query("SELECT * FROM herramientasVistas where idUsuario='$idU' order by id DESC   ");
$res6s->data_seek(0);
 while ($filax = $res6s->fetch_assoc()) 
	{
	$cuando= strtotime($filax['cuando']);
	$dia=explode(' ',$filax['cuando'])[0];
	 
	
	$vistones[$dia]=$vistones[$dia]+1;
	
	$pasado=($anterior-$cuando)/(60*60*24);
	$granPasado= $granPasado + ($anterior-$cuando);
 	$anterior=$cuando;
	$granCuenta=$granCuenta+1;
 }
$granPasado=$granPasado/86400;

if($granCuenta>0){
$cuantoH=$granPasado/$granCuenta;
}
else {$cuantoH="-";}

$porDia=0;
$dias=0;
{
foreach($vistones as $vis=>$cu){
$dias=$dias+1;
$porDia=$porDia+$cu;
}
}
if($dias>0){$porDia=$porDia/$dias;}
?>
                     

<tr class="linea" id="linea<?=$idU?>"  >
 
<td><?=$nombre?></td>
<td><?=$apellido?></td>
<td><?=$correo?></td>
<td><?=$institucion?> <?=$campus?></td>
<td><?=$puesto?></td>
<td title="cada cuantos días" data-sort="<?=$cuantoH?>" class="centrado"><?=number_format($cuantoH,2)?>    </td>
<td class="centrado"><?=$granCuenta?></td>
<td class="centrado"><?=$porDia?></td>
<td><?=$lastLogin?></td>
<td><?=$desde?></td>
<td class="centrado"><?=$desdeD?></td>


 
   </tr>           
 <? 
}

 
?>
                   
  
              



</tbody>

</table>
</div>

<script>
		$(".tablesorter").DataTable( {
 "order": [[ 0, "desc" ]],
	  paging: false,
	   "info": false,
	   dom: 'Bfrtip',
	    buttons: [
            {
                extend: 'excel',
                title: 'Usuarios registrados'
            },
            {
                extend: 'copy' 
            }
        ]
} );
</script>
