<? include "../sesion/arriba.php"; 
extract($_POST);
$mete=$_SESSION['mientras'];

 
if($toq!=$elToken){$_SESSION['mientras']=100; die();}
if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){$_SESSION['mientras']=100; die();}
if($mete>10){die();}


$nueva = aleatorio(10);
$sal=$token.$nueva;
$contra= createPasswordHash($sal);
$usuario=nombreBonito($usuario);
$block=1;



if($mete<10 && $key==""){

	$selas="SELECT * FROM usuarios WHERE correo='$correo' LIMIT 1  ";
	$res6 = $mysqli->query($selas);
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];	
	$nombre= $fila['nombre'];	
	$clave= $fila['clave'];	
	$email= $fila['correo'];	
	

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
					<td>¿Olvidaste tu contraseña?</b>.<br>
<br>
Para cambiarla, por favor accede a la siguiente liga, o copiala en el navegador:</td>
				</tr>
			
				
				<tr>
					<td><br /> </td>
				</tr>
				<tr>
					<td><a href="'.$urlFront.'/login/olvide/'.$idU.'/'.$clave.'">'.$urlFront.'/login/olvide/'.$idU.'/'.$clave.'</a><br></td>
				</tr>
				
				
				<tr>
					<td>Si tu no solicitaste el cambio, por favor haz caso omiso<br>
<br>
Cuida tu información: recuerda que nunca te solicitaremos tu contraseña por ningún medio.</td>
				</tr>
				
				
				<tr style="color:#666; font-size:11px;">
					<td><br>


					
					</td>
				</tr>
				
			</table>
			</div>';		
			
	$mail = new phpmailer (); 
 //$mail->SMTPDebug  = 2;
	$mail->isSMTP();                                      
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	
	$mail -> AddAddress ("$email");	
	
	$mail -> Subject = subject("Cambio de contraseña ".$nombreSistema);
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	if(!$mail->send()) {
   echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent';
}
					

		}
		
	 
} 


 $mete++;
 $_SESSION['mientras']=$mete;

 die('<script>top.location.href = "'.$url.'/_login/olvide.php?msj=2";</script>');	
	


?>