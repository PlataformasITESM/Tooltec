<? header('Content-Type: application/json');
include "../../sesion/arriba.php"; 


$query="UPDATE sitio SET actualizacion=actualizacion+1    ";
$mysqli->query($query);

$expertos=array();
$ordenExpertos=array();


//blogs

$res6 = $mysqli->query("SELECT * FROM blogs where muerto='0' and activo='1' ORDER BY fecha ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo'];
	$tituloC= $fila['tituloC'];
	$info= arregloSaca($fila['info']);
	$categoria= $fila['categoria'];
	$experto= $fila['experto'];
	$img= $fila['img'];
	$imgB= $fila['imgB'];
	
	if($imgB==""){$imgB=$img;}
	
 $elArchivo=$arregloArchivos[$img.'imagen'];

	$infoA=unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$fecha= $fila['fecha'];
	$estatus= $fila['activo'];
	$ordenExpertos[$idU]=$orden;
	
	$opa=1;
	if($estatus==1){$estatus="On";}else{$estatus=""; $opa=.5;}
$puedo=1;
$expertos['blogsRef'][$idU]=$fecha.$idU;

$expertos['blogs'][$fecha.$idU]['id']=$idU;
$expertos['blogs'][$fecha.$idU]['titulo']=$titulo;
$expertos['blogs'][$fecha.$idU]['categoria']=$categoria;
$expertos['blogs'][$fecha.$idU]['experto']=$experto;
$expertos['blogs'][$fecha.$idU]['fecha']=fechaLetra($fecha);
$expertos['blogs'][$fecha.$idU]['url']="/blog/".$tituloC;
$expertos['blogs'][$fecha.$idU]['info']=$info;
$expertos['blogs'][$fecha.$idU]['imgB']="/blogs/".$idU."/".$imgB;
$expertos['blogs'][$fecha.$idU]['img']="/blogs/".$idU."/".$img;
$expertos['blogs'][$fecha.$idU]['imgt']="/blogs/".$idU."/t_".$img;
	
	


}



//
$res6 = $mysqli->query("SELECT * FROM expertos where muerto='0' and activo='1' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$tituloC= $fila['tituloC_es'];
	$orden= $fila['orden'];
	$info= unserialize($fila['info']);
	$etiquetas= unserialize($fila['etiquetas']);
	$img= $fila['img'];
	
 $elArchivo=$arregloArchivos[$img.'imagen'];

	$infoA=unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$fecha= $fila['fecha'];
	$estatus= $fila['activo'];
	$ordenExpertos[$idU]=$orden;
	
	$opa=1;
	if($estatus==1){$estatus="On";}else{$estatus=""; $opa=.5;}
$puedo=1;
$expertos['expertosRef'][$idU]=$orden.$idU;

$expertos['expertos'][$orden.$idU]['id']=$idU;
$expertos['expertos'][$orden.$idU]['nombre']=$titulo;
$expertos['expertos'][$orden.$idU]['url']="/expertos/".$tituloC;
$expertos['expertos'][$orden.$idU]['info']=$info;
$expertos['expertos'][$orden.$idU]['img']="/expertos/".$idU."/".$img;

 $res6s = $mysqli->query("SELECT * FROM expertosCualificaciones where idExperto='$idU' and muerto='0' order by orden ASC");
$res6s->data_seek(0);
 while ($fila = $res6s->fetch_assoc()) 
	{
	$idC= $fila['id'];
	$texto= $fila['texto_es'];
	$ordenC= $fila['orden'];
	$expertos['expertos'][$orden.$idU]['cualis'][$ordenC.$idC]['id']=$idC;
	$expertos['expertos'][$orden.$idU]['cualis'][$ordenC.$idC]['texto']=$texto;
	}
	
	


}


$res6 = $mysqli->query("SELECT * FROM herramientas where muerto='0' and activo='1' ORDER BY orden ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$tituloC= $fila['tituloC_es'];
	$tags= unserialize($fila['tags']);
	$categorias= unserialize($fila['categorias']);
	$orden= $fila['orden'];
	$linea= $fila['linea'];
	$info= unserialize($fila['info']);
	$expers= unserialize($fila['expertos']);
	$img= $fila['img'];
	$imgB= $fila['imgB'];
	
	if($imgB==""){$imgB=$img;}
	
	$expertones=array();
	foreach($expers as $expon=>$esdd){
		
		$elE=$ordenExpertos[$expon].$expon;
		$expertones[$elE]=1;
		
		$expertos['expertos'][$elE]['herramientas'][$orden.$idU]=1;
	}
	
	
	
 $elArchivo=$arregloArchivos[$img.'imagen'];

	$infoA=unserialize($fila['info']);
	$tipo= $fila['tipo'];
	$fecha= $fila['fecha'];
	$estatus= $fila['activo'];
	
	$opa=1;
	if($estatus==1){$estatus="On";}else{$estatus=""; $opa=.5;}
$puedo=1;
$expertos['herramientasRef'][$idU]=$orden.$idU;
$expertos['herramientas'][$orden.$idU]['id']=$idU;
$expertos['herramientas'][$orden.$idU]['nombre']=$titulo;
$expertos['herramientas'][$orden.$idU]['url']="/herramientas/".$tituloC;
$expertos['herramientas'][$orden.$idU]['info']=$info;
$expertos['herramientas'][$orden.$idU]['imgB']="/herramientas/".$idU."/".$imgB;
$expertos['herramientas'][$orden.$idU]['img']="/herramientas/".$idU."/".$img;
$expertos['herramientas'][$orden.$idU]['imgt']="/herramientas/".$idU."/t_".$img;
$expertos['herramientas'][$orden.$idU]['expertos']=$expertones;
$expertos['herramientas'][$orden.$idU]['tags']=$tags;
$expertos['herramientas'][$orden.$idU]['cats']=$categorias;

 $res6s = $mysqli->query("SELECT * FROM herramientasPasos where idHerramienta='$idU' and muerto='0' order by orden ASC");
$res6s->data_seek(0);
 while ($fila = $res6s->fetch_assoc()) 
	{
	$idC= $fila['id'];
	$texto= $fila['texto_es'];
	$tipoPaso= $fila['tipoPaso'];
	$tipo= $fila['tipo'];
	$expertos['herramientas'][$orden.$idU]['pasos'][$tipoPaso][$ordenC.$idC]['id']=$idC;
	$expertos['herramientas'][$orden.$idU]['pasos'][$tipoPaso][$ordenC.$idC]['texto']=$texto;
	$expertos['herramientas'][$orden.$idU]['pasos'][$tipoPaso][$ordenC.$idC]['tipo']=$tipo;
	
	}


}


 $res6s = $mysqli->query("SELECT * FROM herramientasTags where muerto='0' order by tituloC_es ASC");
$res6s->data_seek(0);
 while ($fila = $res6s->fetch_assoc()) 
	{
	$idC= $fila['id'];
	$titulo= $fila['titulo_es'];
	$tituloC_es= $fila['tituloC_es'];
	$expertos['tags'][$tituloC_es.$idC]['id']=$idC;
	$expertos['tags'][$tituloC_es.$idC]['titulo']=$titulo;
	}

 $res6s = $mysqli->query("SELECT * FROM herramientasCat where muerto='0' order by tituloC ASC");
$res6s->data_seek(0);
 while ($fila = $res6s->fetch_assoc()) 
	{
	$idC= $fila['id'];
	$titulo= $fila['titulo'];
	$tituloC = $fila['tituloC'];
	$tipo= $fila['tipo'];
	$expertos['cats'][$tituloC.$idC]['id']=$idC;
	$expertos['cats'][$tituloC.$idC]['titulo']=$titulo;
	}

$res6s = $mysqli->query("SELECT * FROM blogsCat where muerto='0' order by tituloC ASC");
$res6s->data_seek(0);
 while ($fila = $res6s->fetch_assoc()) 
	{
	$idC= $fila['id'];
	$titulo= $fila['titulo'];
	$tituloC = $fila['tituloC'];
	$tipo= $fila['tipo'];
	$expertos['blogCats'][$tituloC.$idC]['id']=$idC;
	$expertos['blogCats'][$tituloC.$idC]['titulo']=$titulo;
	}



$expertos=json_encode($expertos);
file_put_contents($rutaFront.'/js2/expertos.json', $expertos);
echo $expertos;

$expertos="var expertos= ".$expertos;
file_put_contents($rutaFront.'/js2/expertos.js', $expertos);
