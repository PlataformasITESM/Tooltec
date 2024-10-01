<?php include "../sesion/arriba.php";
$mete=$_SESSION['mientras'];


$browser = $_SERVER['HTTP_USER_AGENT'];
 $u=limpiaGET($_GET['u']);	
 $c=limpiaGET($_GET['c']);	
 

 if($c!=""){
 $selas="SELECT * FROM usuarios    WHERE id='$u' AND clave='$c' AND validado='0' ";

 $res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 	$idU= $fila['id'];
 
			
				$nueva=aleatorio(10);
				$query="UPDATE usuarios SET clave='$nueva', validado='1', lastLogin='$hoy'   WHERE id='$idU'";
				$mysqli->query($query);
	
	
	
			 $encripta =  encripta('encrypt',$idU);
			 $_SESSION['comunica_acceso']=$encripta."_".$nueva;
			 $_SESSION['comunica_galleta']=$superGalleta;
	
 
	
	 include "correoPendientes.php";
	
	
	}
		

		
		}else{
$mete=$_SESSION['mientras'];		
$mete++;
$_SESSION['mientras']=$mete;		
		}
		
?>
 
<script>top.location.href = "/sys";</script>	
 