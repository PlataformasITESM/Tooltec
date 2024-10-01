<? include "../../sesion/arriba.php"; 

$dondeSeccion="eventos";
include "../../sesion/mata.php"; 

$tabla=mataMalos($tabla);
$search=mataMalos($search);


if($tabla=="clientes"){
$selas="SELECT * FROM clientes WHERE razon like '%$search%' or nombreComercial like '%$search%' order by razon ASC limit 5 ";
//echo"$selas";
 $res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$id=$fila['id'];
	$razonSocial=$fila['razon'];
	$nombreComercial=$fila['nombreComercial'];
	
	$ponNC="";
	if($nombreComercial!=""){
	$ponNC=" (".$nombreComercial.")";
	}
	
?>
<div id="<?=$tabla?>_<?=$id?>" onClick="addSelectMabo('<?=$tabla?>','<?=$id?>');" class="div100 hover padd5 cursor">
<?=$razonSocial?> <?=$ponNC?>
</div>
<div class="div0"></div>
<?
	
	}
	
	}