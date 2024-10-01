<? include "../sesion/arriba.php";

$sal=$token.$pass1;
$contra= createPasswordHash($sal);

if($pass1!=""){
	

		 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$quien' LIMIT 1");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
			
			$nombre= $fila['nombre'];
			$email= $fila['correo'];

 $contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				<tr>
					<td style="text-align:center;"><img src="'.$urlA.'/img/logoMail.png" /></td>
				</tr>
				<tr>
					<td>Hello, '.$nombre.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Your  password for '.$nombreSistema.' has been changed</b> 
				</tr>
			
				<tr>
					<td>&nbsp;</td>
				</tr>

				
				<tr>
					<td>If this was not you, your account may have been compromised. Please contact us immediately.</td>
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
	
	$mail -> AddAddress ("$email");	
	
	$mail -> Subject = "Password change";
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
/*
if(!$mail->send()) {
   echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 //echo 'Message has been sent';
}
*/

			
			
			$query="UPDATE  usuarios SET contrasena='$contra' WHERE id='$quien' ";
			 $mysqli->query($query);
			}
			//pelas
		
}		

?>

   <div class="table" >
            <div class="tableCell padd3 material-icons">
check_circle
</div>
<div class="tableCell padd3">
Your password has been changed successfully!
</div>
            
            
            </div>