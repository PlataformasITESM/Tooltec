
 <div class="clear20"></div>
 

 
<a href="registrosAdd.php" title="Agregar">
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar registro</div>
</div>  
            </a>
 

 
<div class="blanco10" style="overflow-y: hidden;">


<table id="tablesorter"  class="tablesorter"  >

<thead>
<tr>

<th>Código</th>
<th>Registro</th>
 
 
<th>Registros</th>
<th>Visitas</th>
<th style="opacity:0; border-right:0 !important; width:30px !important;"></th>


</tr>
</thead>


<?

$res6 = $mysqli->query("SELECT * FROM registros WHERE muerto='0' ORDER BY titulo ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$urlRegistro= $fila['url'];
	$titulo= $fila['titulo'];
	$idProveedor= $fila['idProveedor'];
	$permisos= $fila['usuarios'];
	$ultimo= $fila['ultima'];
	$campos= $fila['campos'];
	$camposPermisos= $fila['camposPermisos'];
	
	$area= $fila['area'];
	
	$permisos=explode(',',$permisos);
	
	$puedo="";
	if($tipoU=="admin"){$puedo=1;	}
	//externo
	
	if($tipoU=="externo" && $quien==$idProveedor){
	$puedo=1;
	}
	//interno
	if($tipoU=="tec"){
		if (in_array($quien, $permisos)) {
		$puedo=1;
		}
	}
	
	//te pusieron en algun select?
	
	if (strpos($camposPermisos, $quien) !== false) {
           $puedo=1;
	  
	}
	
	if($puedo==1) {
		
	$proveedor=$provee[$idProveedor];
	
	$res6C = $mysqli->query("SELECT * FROM registrosRegistros WHERE idRegistro='$idU'");
	$res6C->data_seek(0);
	 $cuantos = $res6C->num_rows;	
				?>


<tr class="linea" id="linea<?=$idU?>"  >

<td><a href="<?=$url?>/_registros/registrosRegistros/?u=<?=$idU?>"  ><?=$idU?></a></td>
<td><a href="<?=$url?>/_registros/registrosRegistros?u=<?=$idU?>"  ><?=$titulo?></a>
<br>
<a href="<?=$urlRegistro?>" target="_blank" ><?=$urlRegistro?></a>
</td>
 
 

<td><?=$cuantos?></td>
<td><?=$ultimo?></td>




<td  id="controles_linea<?=$idU?> " style="width:50px;">

 

<a href="<?=$url?>/_registros/registrosRegistros/?u=<?=$idU?>" >
 <div class="  material-icons">mode_edit</div>
</a>
 
 </td>


</tr>




              
 <?
	}
  } ?>
 


</table>
