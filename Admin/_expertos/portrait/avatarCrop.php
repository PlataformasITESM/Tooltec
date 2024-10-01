<? include "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include "../../sesion/mata.php"; 
$original=$_SERVER["DOCUMENT_ROOT"]."/expertos/".$exp."/".$ava;
$final = $_SERVER["DOCUMENT_ROOT"]."/expertos/".$exp."/".$ava;
list($anchoImg, $alto) = getimagesize($original);	 
$proporcion=$anchoImg/500;
$w=$w*$proporcion;
$h=$h*$proporcion;
$x=$x*$proporcion;
$y=$y*$proporcion;
$image_p = imagecreatetruecolor($w, $h);
$image = imagecreatefromjpeg($original);
imagecopy($image_p, $image, 0, 0, $x, $y, $w, $h);
imagejpeg($image_p, $final, 100);
$ava=$ava."?u=".$hoySt;
	$query="UPDATE expertos SET img='$ava'    WHERE id='$exp'";
	$mysqli->query($query);
?>