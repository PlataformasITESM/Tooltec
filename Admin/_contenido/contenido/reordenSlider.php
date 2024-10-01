<? include "../sesion/arriba.php"; 
extract($_POST);

$orden=explode(',',$orden);

	$cuenta=1;
	
	foreach ($orden as $value) {
	echo"$value";
		$este=str_replace('slider_',',$value);
		$query="UPDATE contenidoSlider SET orden='$cuenta'   WHERE id=$este ";
		$mysqli->query($query);
		$cuenta++;
	}



 ?>