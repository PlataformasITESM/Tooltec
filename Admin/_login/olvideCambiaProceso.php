<? include "../sesion/arriba.php"; 
include "../control/correo.php";


$mete=$_SESSION['mientras'];

echo"$mete";
if($toq!=$elToken){$_SESSION['mientras']=100; die();}

if($mete>10){die();}


if( $key!=""){
die();	
}
	
$c=mataMalos($c);	
$u=mataMalos($u);	
 
$sal=$token.$contra;
$contraN= createPasswordHash($sal);
$nueva = aleatorio(10);		

 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$u' AND  clave='$c' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 
 	$puedoCambiarContra= $fila['id'];
	$idU= $fila['id'];
	$nombre= $fila['nombre'];
	$correo= $fila['correo'];

	 
	 $contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				<tr>
					<td style="text-align:center;"><img src="'.$urlFront.'/img/logo.png" height="40" /></td>
				</tr>
				<tr>
					<td>Hola, '.$nombre.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Tu contraseña fue cambiada</b>.<br>
<br>
 </td>
				</tr>
			
				
				<tr>
					<td><br />Si tú no realizaste el cambio por favor contáctanos </td>
				</tr>
				<tr>
					<td><br>
<br>
<a href="'.$urlA.'">'.$nombreSistema.'</a><br></td>
				</tr>
				
				<tr style="color:#666; font-size:11px;">
					<td><br>
		
					
					</td>
				</tr>
				
			</table>
			</div>';		
			
	$mail = new phpmailer (); 
	$mail->isSMTP();                                      
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	
	$mail -> AddAddress ("$correo");	
	
	$mail -> Subject = subject("Cambio de contraseña ".$nombreSistema);
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	if(!$mail->send()) {
   echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 // echo 'Message has been sent';
}
					
						//pelas
	
		 
	$query="UPDATE usuarios SET clave='$nueva', contrasena='$contraN'   WHERE id='$puedoCambiarContra'";
	$mysqli->query($query);
	
	//crear la sesion
				
			 $encripta =  encripta('encrypt',$idU);
			 $_SESSION['sive_acceso']=$encripta."_".$nueva;
			 $_SESSION['sive_galleta']=$superGalleta;
				
			  
			 
			header("Location:".$url."/_admin");
			die($contents); 

	
	}
 
 $mete++;
 $_SESSION['mientras']=$mete;

 
 die('<script>top.location.href = "'.$url.'";</script>');	
		
 
 
?>


