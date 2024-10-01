<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 
 
	$original = $rutaTmp."/".$ava;
	$final = $rutaContent."/".$ava;
	
	
$original=$rutaContent."/".$f."/".$ava;
$final=$rutaContent."/".$f."/".$ava;

$thumb=$rutaContent."/".$f."/t_".$ava;
 
list($anchoImg, $alto) = getimagesize($original);

$proporcion=$anchoImg/400;

 

$w=$w*$proporcion;
$h=$h*$proporcion;
$x=$x*$proporcion;
$y=$y*$proporcion;



$image_p = imagecreatetruecolor($w, $h);
$image = imagecreatefromjpeg($original);
imagecopy($image_p, $image, 0, 0, $x, $y, $w, $h);
imagejpeg($image_p, $final, 100);


 
copy($final,$thumb);

$query="UPDATE cRepositorioArchivos SET   modificado='$hoySt'   WHERE id='$ar'";
$mysqli->query($query);
?>
<script>
archivos('<?=$f?>');
</script>