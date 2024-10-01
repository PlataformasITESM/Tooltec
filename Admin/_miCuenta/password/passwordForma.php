<? include "../../sesion/arriba.php";
$dondeSeccion="password";
include "../../sesion/mata.php";
$sal=$token.$pass1;
$contra= createPasswordHash($sal);
if($pass1!=""){

	
 
	
$selas="SELECT * FROM usuarios WHERE id='$quien' AND correo='$correoU' LIMIT 1";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
			
			$nombre= $fila['nombre'];
			$email= $fila['correo'];
 $contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				<tr>
					<td style="text-align:center;"><img src="'.$urlA.'/img/logo.png" width="150" /></td>
				</tr>
				<tr>
					<td>Hola, '.$nombre.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Tu contraseña de '.$nombreSistema.' ha sido cambiada</b> 
				</tr>
			
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>Si tu no realizaste este cambio, tu cuenta puede estar en riesgo. <br>Porfavor ponte en contacto con nosotros lo más pronto posible.</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlA.'">'.$nombreSistema.'</a></td>
				</tr
				
				
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
	$mail -> Subject = subject("Cambio de contraseña");
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	/*
	if(!$mail->send()) {
   echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 
}
*/
			
			
			$query="UPDATE  usuarios SET contrasena='$contra' WHERE id='$quien' AND correo='$correoU' ";
			 $mysqli->query($query);
			}
			
	 
	}
			//pelas
		
 	
?>
<div class="clear20"></div>
   <div class="table">
  <div class="tableCell padd3 material-icons">
check_circle
</div>
<div class="tableCell">
Tu contraseña ha sido cambiada !
</div>
            
            
            </div>