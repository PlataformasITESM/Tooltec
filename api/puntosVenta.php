<? header("access-control-allow-origin: *");
header('Content-Type: application/json');
extract($_POST);
$rutaServer= $_SERVER['DOCUMENT_ROOT'];


include $rutaServer."/AdminNavarro/conexiones/conexion.php";
include $rutaServer."/AdminNavarro/control/funciones.php";

$prod=mataMalos($prod);
 
$contador=1;
if($latMy==""){die('.');}

$selas="SELECT * FROM productosPuntoVenta where productos like '%$prod%'   ";
$res6x = $mysqli->query($selas);
$res6x->data_seek(0);
 while ($fila = $res6x->fetch_assoc()) 
	{
	$id= $fila['id'];
	$sucursal= $fila['sucursal'];
	$division= $fila['division'];
	$nombre= $fila['nombre'];
	$productos= unserialize($fila['productos']);
	$latitud= $fila['latitud'];
	$longitud= $fila['longitud'];

$distancia=distance($latitud, $longitud, $latMy, $longMy, 'K') ;

$icono="supermercado";
 

if($distancia<3 ){
$nombre=str_replace('SA de CV','',$nombre);
	$este=array();
		if($nombre=="Fraguas"){$nombre="Farmacia Guadalajara";  }
		
		
		if($division=="Abastos"){$icono="abastos";}
		if($division=="Mayoristas"){$icono="abastos";}
		if($division=="Detalle"){$icono="detalle";}
		
	
	
	
	$este['nombre']=$nombre;
	

	$este['icono']=strtolower($icono);
	$este['division']=$division;
	$este['latitud']=$latitud;
	$este['distancia']=$distancia;
	$este['longitud']=$longitud;
	$este['sucursal']=$sucursal;
	$este['productos']=$productos;
	$respuesta[$contador]=$este;
	$contador=$contador+1;
 }
 }

echo  json_encode($respuesta);
?>