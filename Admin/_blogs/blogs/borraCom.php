<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 
 


  if($com2!=""){
	 
	
	$query="UPDATE blogsCom SET  muerto='1'  WHERE id='$com2'";
	$mysqli->query($query); 
	
	}

	
 

 if($com2==""){
	$query="UPDATE blogsCom SET  muerto='1'  WHERE idComentario='$com'";
	$mysqli->query($query); 
	
	$query="UPDATE blogsCom SET  muerto='1'  WHERE id='$com'";
	$mysqli->query($query); 
	
	}
?>