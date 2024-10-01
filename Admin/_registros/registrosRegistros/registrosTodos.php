<? include_once "../sesion/arriba.php"; 
 
	
	$plural="s";
	$camposF=explode(',',$camposF);
	 if (in_array("apellidoM", $camposF)) { $hayMaterno=1; $plural="";}
	 if (in_array("celular", $camposF)) { $hayCelular=1;}
	 
	 
	  if (in_array("nombre", $camposF)) { $hayNombre=1;}
	 if (in_array("apellidoP", $camposF)) { $hayApellidoP=1;}
	 if (in_array("correo", $camposF)) { $hayCorreo=1;}
	 if (in_array("telefono", $camposF)) { $hayTelefono=1;}
	 
	 
	 $cuantosCampos=count($campos);
	 
	 $orden=explode(',',$orden); 
	$permisos=explode(',',$permisos);


 		
$arregloAutos=array();
$arregloAutos['nombre']="Nombre";
$arregloAutos['apellidoP']="Apellido Paterno";
$arregloAutos['apellidoM']="Apellido Materno";
$arregloAutos['correo']="Correo";
$arregloAutos['telefono']="Teléfono";
$arregloAutos['celular']="Celular";


$arregloCRM=array();
$arregloCRM['nacionalidad']="Nacionalidad";
$arregloCRM['pais']="País";
$arregloCRM['estado']="Estado";
$arregloCRM['ciudad']="Ciudad";
$arregloCRM['nivel']="Nivel";
$arregloCRM['programa']="Programa";
$arregloCRM['inicio']="Inicio";
$arregloCRM['como']="¿Cómo se enteró?";
 



?>
<input type="hidden" id="eliminarListado" />
<input type="hidden" id="valor" value="<?=$valor?>" />
 
<div class="blanco10" style="float:left;color:#f00; display:none;" id="eliminar" >

<a   style="color:#F00;" onclick="javascript:if (confirm('¿Desea eliminar los registros seleccionados?')){eliminarCapturas();return false;}">

<div class="mensaje">
<div class="material-icons ">delete_forever </div>
<div class="div100">Eliminar registros</div></div>
 </a>


</div>

<script type="text/javascript" src="js.js"></script>


<div class="blanco10" style="overflow-x: hid den">
<span id="cuantos"></span> Registros
<div class="clear20"></div>

<table id="tableSorter"  class="tablesorter" style="width:100%;  " >

<thead>
<tr>


<th style="width:20px;"></th>
<th>Fecha</th>
<?
foreach ($arregloAutos as $ordecin=>$ordecin){ ?>
<th><?=$ordecin?></th>
<? } ?>

 <?
 if($crm>0){
foreach ($arregloCRM as $ordecin=>$ordecin){ ?>
<th><?=$ordecin?></th>
<? } 
}
?>

<? // campos variables //

foreach ($orden as $ordecin){ 
 

$esteArreglo=$campos[$ordecin];
$tituloC=$esteArreglo['titulo_es'];
$tipoC=$esteArreglo['tipoC'];
$proveedorC=$esteArreglo['proveedor'];


 

if($tituloC!=""){
?>
	
<th><?=$tituloC?> </th>

<? }   }// ?>


<th>Refer</th>
<th>Origen</th>



</tr>
</thead>
  <?
  

$buscaRefer="";
if($referesSelect!=""){$buscaRefer="AND refer='$referesSelect'";}
if($referesSelect=="todos" ){$buscaRefer="";}
if($referesSelect=="sinRef2r"){$buscaRefer="AND refer=''";}

if($fechaI!="" && $fechaF==""){$fechaBusca="AND DATE(cuando)='$fechaI'";}
if($fechaF!="" && $fechaI==""){$fechaBusca="AND DATE(cuando)='$fechaF'";}

if($fechaF!="" && $fechaI!=""){
	
	if($fechaF==$fechaI){
	$fechaBusca="AND DATE(cuando)='$fechaF'";
	}
	if($fechaF>$fechaI){
	$fechaBusca= "AND cuando between DATE('$fechaI') AND DATE('$fechaF')";
	}
	if($fechaI>$fechaF){
	$fechaBusca= "AND cuando between DATE('$fechaF') AND DATE('$fechaI')";
	}
	
	}
$cuantos=0;
$sel="SELECT * FROM registrosRegistros WHERE idRegistro='$valor' $buscaRefer $fechaBusca ORDER BY id DESC";

$res6 = $mysqli->query($sel);

 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$nombre= $fila['nombre'];
	$vengoUrl= $fila['vengoUrl'];
	$apellidoP= $fila['apellidoP'];
	$apellidoM= $fila['apellidoM'];
	$telefono= $fila['telefono'];
	$celular= $fila['celular'];
	$correo= $fila['correo'];
	$refer= $fila['refer'];
	$cuando= $fila['cuando'];
	$capturaT= $fila['captura'];
	$captura= unserialize($fila['captura']);
	
	$puedoVer="";




	

		$cuantos++;
	?>
	
<tr class="linea" id="linea<?=$idU?>"  >

<td><input onClick="eliminas();" name="eliminas" class="eliminas" value="<?=$idU?>" type="checkbox"></td>
 <td><?=$cuando?></td>
<? foreach ($arregloAutos as $ordecin=>$ordecin){ ?>
<td><?=$captura[$ordecin]?></td>
<? } ?>


<?
 if($crm>0){
foreach ($arregloCRM as $ordecin=>$ordecin){ ?>
<td><?=$captura[$ordecin]?></td>
<? } 
}
?>


<? // campos variables //

foreach ($orden as $ordecin){ 

 

$esteArreglo=arregloSaca($campos[$ordecin]);


$tituloC=$esteArreglo['titulo_es'];


$tipoC=$esteArreglo['tipoC'];
$proveedorC=$esteArreglo['proveedor'];


$puedo=1;
if($tipoC=="titulo_Título"){$puedo="";}
if($tipoU=="externo" && $proveedorC!="on"){$puedo="";}
if($tipoU=="externo" && $proveedorC!="on"){$puedo="";}
if($tituloC!=""){
$esteValor=$captura[$ordecin];
$esteValor=explode('°',$esteValor);
$esteValor=$esteValor[0];


if($tipoC=="file_Archivo"){ 
$esteValor='<a href="'.$esteValor.'" target="_blank">'.$esteValor.'</a>';
}

if($tipoC=="productos_Productos"){ 
$esteValor=str_replace(',','<br><br>',$esteValor);;
}
?>
	
<td style="word-break: break-all;  "><?=$esteValor?> </td>

<? } }//?>
 
<td style="word-break: break-all;  "><?=$refer?></td>
<td style="word-break: break-all;  "><?=$vengoUrl?></td>
 


</tr>

  <? 
	}

	
 ?>
</table>
</div>

<script>
$('#cuantos').text('<?=$cuantos?>');


var table = $('#tableSorter').DataTable({
  orderCellsTop: true,
      fixedHeader: true,
	    "scrollX": true,
	   scrollCollapse: true,
   "order": [[ 1, "desc" ]],
  "dom": 'lrtip',
  dom: 'Bfrtip',
	    buttons: [
            {
                extend: 'excel',
                title: 'Registros <?=$titulo?>' 
            },
            {
                extend: 'copy' 
            }
        ]
 
 });

</script>
