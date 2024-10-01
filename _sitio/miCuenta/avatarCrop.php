<? include "../sesion/arriba.php"; 
$dondeSeccion="avatar";
$original=$_SERVER["DOCUMENT_ROOT"]."/avatars/".$quien."/".$ava;
$final = $_SERVER["DOCUMENT_ROOT"]."/avatars/".$quien."/".$ava;
list($anchoImg, $alto) = getimagesize($original);	 
$proporcion=$anchoImg/300;
$w=$w*$proporcion;
$h=$h*$proporcion;
$x=$x*$proporcion;
$y=$y*$proporcion;
$image_p = imagecreatetruecolor($w, $h);
$image = imagecreatefromjpeg($original);
imagecopy($image_p, $image, 0, 0, $x, $y, $w, $h);
imagejpeg($image_p, $final, 100);
$ava=$ava."?u=".$hoySt;
	$query="UPDATE usuariosF SET avatar='$ava'    WHERE id='$quien'";
	$mysqli->query($query);
 
?>