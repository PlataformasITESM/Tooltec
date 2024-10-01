<? die();

include "../sesion/arriba.php"; 
$dondeSeccion="catalogo";
include "../sesion/mata.php"; 

 $res6 = $mysqli->query("SELECT * FROM productos WHERE imgs!='' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	
	$idU= $fila['id'];
	$imgs=unserialize($fila['imgs']);


$rutaProd=$rutaContent."/".$idU;



foreach($imgs as $nombreFile){

 $rutaOriginal=$rutaProd."/".$nombreFile;
	$thumb=$rutaProd."/t_".$nombreFile;

if(copy($rutaOriginal,$thumb)){
					
			smart_resize_image( $thumb, $width = 400, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
			echo "$thumb <br>";

}
							
				
				
							



}



}

