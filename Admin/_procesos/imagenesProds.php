<? include "../sesion/arriba.php";
include "../sesion/mata.php"; 

echo "<table border='1'><tbody>";
	
$res6 = $mysqli->query("SELECT * FROM productos WHERE imgPrincipal=''  ORDER BY sku DESC");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	
	$sku=$fila['sku'];
	$idProd=$fila['id'];
	
	
	echo "<tr><td colspan='2'>$sku</td></tr>";
	
	
	$nombreFileJpg=$sku.'.jpg';	

	
	$rutaOriginal=$_SERVER["DOCUMENT_ROOT"]."/fotosprods/".$nombreFileJpg;
	echo "<tr><td colspan='2'><a href='https://procomautopartes.mx/fotosprods/$nombreFileJpg' target='_blank'>https://procomautopartes.mx/fotosprods/$nombreFileJpg</a></td></tr>";
	
	//si existe un jpg 
	if(file_exists($rutaOriginal)) {
	
	
	$query="UPDATE productos SET principal='$idProd.jpg' WHERE id='$idProd'";
	$mysqli->query($query);

					//existe carpeta de producto
					$rutaProd=$_SERVER["DOCUMENT_ROOT"]."/productos/".$idProd;
					if (!file_exists($rutaProd)) {
					mkdir($rutaProd, 0777);
					}
					chmod($rutaProd, 0777);

				// si no hay un jpg con ese nombre
				$output_file=$rutaProd."/".$idProd.'.jpg';
				if(!file_exists($output_file)){
					

				if(copy($rutaOriginal,$output_file)){
				
				
					$thumb=$rutaProd."/t_".$idProd.'.jpg';

if(copy($rutaOriginal,$thumb)){
					
			smart_resize_image( $thumb, $width = 400, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
}
			
					$cuentas=$cuentas+1;
				echo "<tr><td>$sku $idProd</td><td><a href='https://procomautopartes.mx/productos/$idProd/$idProd.jpg' target='_blank'>https://procomautopartes.mx/productos/$idProd/$idProd.jpg</a></td></tr>";
				
				
					$query="UPDATE productos SET  imgPrincipal='$idProd.jpg' WHERE id='$idProd'";
						$mysqli->query($query); 
				
					}
				
				}



}
	
	


	}
	echo "</table></tbody>";
	
	
	echo "$cuentas";