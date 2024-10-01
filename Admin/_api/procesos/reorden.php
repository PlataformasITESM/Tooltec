<?  include "../../sesion/arriba.php"; 
$dondeSeccion="hoteles";
include "../../sesion/mata.php"; 

// echo"$base $ordenito";
	$base=mataMalos($base);	
	$orden=explode(',',$ordenito);

	$cuenta=1;
	
	foreach ($orden as $este) {
	
		$query="UPDATE ".$base." SET orden='$cuenta' WHERE id='$este'";
		$mysqli->query($query);
		$cuenta++;
		echo $query."<br>";
	
	}


?>
	
