<? include_once "../sesion/arriba.php";
$e=mataMalos($email);
$u=mataMalos($u);
$c=mataMalos($c);

$mata=$_SESSION['mata'];
$ev=explode('@',$e)[1];


$errorito="";
if($t!=$elToken){die();}


$selas="SELECT * FROM usuariosF WHERE  id='$u' and clave='$c'   LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
			
		$cambia=$fila['id'];
		$nombre=$fila['nombre'];
		$email=$fila['correo'];
		$estoy=1;	
			
		 
			 $unicoU = aleatorio(10);
			 $sal=$contra;
			 $contra= createPasswordHash($sal);

$query="update usuariosF set clave='$unicoU', contrasena='$contra' where id='$cambia' ";
$mysqli->query($query);
 
				
				$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$urlFront.'/img/logo.png" width="250" /></td>
				</tr>
				<tr>
					<td><br><br>Hola, '.$nombre.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>   
			Tu contraseña fue cambiada</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
	 
				
				
				<tr>
					<td><br><br>Si tu no realizaste esta acción, cambia inmediantamente tu contraseña.</td>
				</tr>
			
			</table>
			</div>';		
			
			
			if($email!=''){ 
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
	$mail -> AddAddress ("$email");	
	$mail -> Subject = subject("Cambio de contraseña");
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	$mail -> Send ();
	//pelas
	}
$_SESSION['mata']=0;
?>

 
<script> top.location.href = "/loginAccesa";</script>
 
<?
die();
}

 
$_SESSION['mata']=100;
 
//
