<? include_once "../sesion/arriba.php";


$e=mataMalos($email);
$mata=$_SESSION['mata'];


if($mata>10){die();}

if($elToken!=$toq){die();}

if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
die();
}

if($key==""){

$errorito="El correo ".$email." no se encuentra registrado";
$selas="SELECT * FROM usuariosF WHERE  correo='$e'   LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
			
		$cambia=$fila['id'];
		$nombre=$fila['nombre'];
		$estoy=1;	
			
		 $clave= $hoySt;

$query="update usuariosF set clave='$clave' where id='$cambia' ";
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
			Para reestablcer tu contraseña ingresa a la siguiente liga:</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlFront.'/forgot/'.$cambia.'/'.$clave.'">'.$urlFront.'/forgot/'.$cambia.'/'.$clave.'</a></td>
				</tr>
				
				
				<tr>
					<td><br><br>Si tu no solicitaste reestablecer tu contraseña, haz caso omiso.</td>
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
	$mail -> Subject = subject("Recuperar contraseña");
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	$mail -> Send ();
	//pelas
	}
$_SESSION['mata']=0;
?>

<script>
$('#crearTitulo').html('Correo enviado');
	 $('#forma2').hide();
 setTimeout(function(){ $('#alerta').fadeOut() }, 10000);
</script>
<?
$errorito="Un correo fue enviado a ".$email.". Es necesario validar la cuenta dando clic a la liga que contiene. <br> No olvides revisar tu correo no deseado";

}

if($estoy==""){
$_SESSION['mata']=$_SESSION['mata']+1;
}
//

}else{  
$_SESSION['mata']=$_SESSION['mata']+1;
$errorito="El correo no es un correo institucional válido";
}


if($errorito!=""){ ?> 
<?=$errorito?>
<? } ?>