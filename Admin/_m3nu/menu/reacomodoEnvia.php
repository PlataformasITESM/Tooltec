<? include "../../sesion/arriba.php"; 


	$cuenta=1;
	$orden=explode(',',$orden);
	
	foreach ($orden as $value) {
		$este=str_replace('linea','',$value);
		$query="UPDATE menu SET  orden='$cuenta' WHERE id='$este'  ";
		$mysqli->query($query);
		$cuenta++;
	}

 

 ?>
<script>
$('.load').hide();
</script>
 
 