<? include_once "../sesion/arriba.php";

$contra= createPasswordHash($contra);
	$query="UPDATE usuariosF SET  contrasena='$contra'   WHERE id='$quien'";
	$mysqli->query($query); 


	$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$urlFront.'/img/logo.png" width="250" /></td>
				</tr>
				<tr>
					<td><br><br>Hola, '.$nombreU.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>   
			Tu contraseña fue cambiada</td>
				</tr>
				
				 
				
				
			
			</table>
			</div>';		
			
			
			
			if($correoU!=''){ 
	$mail = new phpmailer (); 
	$mail->isSMTP();      
 	// $mail->SMTPDebug  = 2;                                  
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->SMTPSecure = "tls";	
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	$mail -> AddAddress ("$correoU");	
	$mail -> Subject = subject('Cambio de contraseña');
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	$mail -> Send ();
	//pelas
	}


//echo $query;
?>
<script>
top.location.reload(true)
</script>
