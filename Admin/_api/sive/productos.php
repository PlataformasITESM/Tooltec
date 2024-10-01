<?  include "../../sesion/arriba.php"; 

 
$productosWS=json_decode(file_get_contents('https://quesosnavarro.biz/api/sitioWeb/productos?token=j3F05tilaPiHWghvd8n'),true);

//primero las divisiones

$query="truncate table productosPuntoVenta";
$mysqli->query($query);

foreach($productosWS as $div=>$das){
// las divisionees
$titulo=mataMalos($das['titulo']);
$productos=serialize($das['productos']);
$clientes=$das['clientes'];

$query="insert into productosDivisiones (id) values ('$div')";
$mysqli->query($query);

$query="UPDATE productosDivisiones SET titulo='$titulo', productos='$productos', modificado='$hoy' WHERE id='$div'";
$mysqli->query($query);

// los clientes

	foreach($clientes as $cli=>$clies){
	$nombreComercial=$clies['nombreComercial'];
	$productos=serialize($clies['productos']);
	$sucursal=mataMalos($clies['sucursal']);
	$latitud=$clies['latitud'];
	$longitud=$clies['longitud'];

if(strlen($nombreComercial)>2){
	$query="insert into productosPuntoVenta (id) values ('$cli')";
	$mysqli->query($query);

	$query="UPDATE productosPuntoVenta SET idDivision='$div', division='$titulo', nombre='$nombreComercial', productos='$productos', sucursal='$sucursal', latitud='$latitud', longitud='$longitud', modificado='$hoy' WHERE id='$cli'";
	$mysqli->query($query);

	}
	}

}
 


$res6 = $mysqli->query("SELECT * FROM quesos where muerto='0' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$presentaciones= unserialize($fila['presentaciones']);
	$info= unserialize($fila['info']);
	
	foreach($presentaciones as $pres=>$da){
	echo $pres."<br>";
	
	$selin="SELECT * FROM productosDivisiones where productos like '%$pres%' ";
	echo $selin."<br>";
	$res6x = $mysqli->query($selin);
$res6x->data_seek(0);
 while ($fila = $res6x->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$info['puntosVenta'][$titulo]=1;
	}
}
	$info=serialize($info);


 
	$query="UPDATE quesos SET    info='$info'  WHERE id='$idU'";
	$mysqli->query($query); 
	echo  $query."<br>";
	
	

	
	
	}




?>
	
