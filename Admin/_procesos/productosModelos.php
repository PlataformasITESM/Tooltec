<? include "../sesion/arriba.php"; 
$dondeSeccion="catalogo";
include "../sesion/mata.php"; 


$res6 = $mysqli->query("SELECT * FROM productos WHERE years LIKE '%-%' ");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$prod=$fila['id'];

$losModelos=explode('-',$fila['years']);
		
	$misYears=array();
	$primer=number_format($losModelos[0]);
	$ultimo=number_format($losModelos[1]);

if($primer>50){

			if($ultimo<=20){
			
			for($i=$primer;$i<100;$i++){	
			$misYears[]=$i;
			}
			
			
		for($i=$ultimo;$i>=0;$i--){
			if($i<10){$i='0'.$i;}
	if($i=='000'){$i='00';}
	if($i=='001'){$i='01';}
	
		$misYears[]=$i;
		}
		
		}
		
		if($ultimo<=99){
		
				for($i=$primer;$i<=$ultimo;$i++){	
			$misYears[]=$i;
			}	
		
		}
		
		
}

if($primer<=20){
		for($i=$primer;$i<=$ultimo;$i++){
			if($i<10){$i='0'.$i;}
	
	if($i=='000'){$i='00';}
	if($i=='001'){$i='01';}
	
		$misYears[]=$i;
		}
}	
	
	$misYears=implode(',',$misYears);


$query="UPDATE productos SET years='$misYears' WHERE id='$prod'";
$mysqli->query($query); 	

}
?>