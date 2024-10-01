<? include "../../sesion/arriba.php"; 


	$cuenta=1;
	$orden=explode(',',$orden);
	
	foreach ($orden as $value) {

	
		
		$este=str_replace('linea','',$value);
		$query="UPDATE secciones SET  orden='$cuenta' WHERE id='$este' AND menu='1' ";
		$mysqli->query($query);
	 
		$cuenta++;
	}

 

 ?>
 
 