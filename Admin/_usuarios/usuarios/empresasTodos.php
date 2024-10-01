<div style="clear:both; height:20px;"></div>



<div class="clear20"></div>

<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" style="width:100%; display:none;" >

<thead>
<tr>

<th>Empresa</th>
<th>Administradores</th>
<th>Gerentes</th>
<th>Vendedores</th>
<th>Asesores</th>
<th ></th>

</tr>
</thead>
<tbody>
<?
$res6 = $mysqli->query("SELECT * FROM empresas  WHERE admin LIKE %'$quien'% OR gerente LIKE %'$quien'% ORDER BY nombre ASC");
if($tipoU=="admin"){
$res6 = $mysqli->query("SELECT * FROM empresas   ORDER BY nombre ASC");
}

$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$nombre= $fila['nombre'];
	
	$empresaAdmins=$fila['admin'];
	$empresaGerentes=$fila['gerente'];
	$empresaVendedores=$fila['vendedor'];
	$empresaAsesores=$fila['asesor'];
	
	if($empresaAdmins!=""){$empresaAdmins=count(unserialize($empresaAdmins));}else {$empresaAdmins=0;}
	if($empresaGerentes!=""){$empresaGerentes=count(unserialize($empresaGerentes));}else {$empresaGerentes=0;}
	if($empresaVendedores!=""){$empresaVendedores=count(unserialize($empresaVendedores));}else {$empresaVendedores=0;}
	if($empresaAsesores!=""){$empresaAsesores=count(unserialize($empresaAsesores));}else {$empresaAsesores=0;}
?>


<tr class="linea" id="linea<?=$idU?>"  >

 
<td><a href="usuarios?e=<?=$idU?>" ><?=$nombre?></a></td>
<td style="text-align:right;"><?=$empresaAdmins?></td>
<td style="text-align:right;"><?=$empresaGerentes?></td>
<td style="text-align:right;"><?=$empresaVendedores?></td>
<td style="text-align:right;"><?=$empresaAsesores?></td>


<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
<a href="usuarios?e=<?=$idU?>" >
<div class="material-icons">visibility</div>
</a>

    </div>
 </td>
              
 <? } ?>
 
</tr>

</tbody>

</table>
</div>

