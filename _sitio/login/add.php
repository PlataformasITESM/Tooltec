<? include_once "../sesion/arriba.php";
$e=mataMalos($email);


$errorito="";

if($elToken!=$toq){die();}
if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
die();
}

if($key==""){



$selas="SELECT * FROM usuariosF WHERE  correo='$e'   LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
$estoY=1;
		$errorito="El correo ya está registrado";
}

//proceso
if($estoY==""){

$campus=mataMalos($campus);
$trabajo=mataMalos($trabajo);
$puesto=mataMalos($puesto);
$otra=mataMalos($otra);
if($aviso==""){$aviso=0;}
$puesto=$puesto.$otra;
 			
			
			 $cambia = aleatorio(10);
			 $unicoU = aleatorio(10);
			 $sal=$contra;
			 $contra= createPasswordHash($sal);

$query="INSERT INTO usuariosF (id,usuario,tipo,nombre, apellido ,correo, campus, institucion, puesto,  info,   aviso,  contrasena, permisos, clave) VALUES ('$cambia','$usuario','$vt','$nombre','$apellido','$email', '$campus', '$trabajo', '$puesto' ,'$info','$aviso','$contra', '$permisos', '$unicoU')";
$mysqli->query($query);
 
				
				$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$urlFront.'/img/logo.png" width="250" /></td>
				</tr>
				<tr>
<td>
			<br><br>
			
Hola, '.$nombre.':<br><br>
 
¡Bienvenid@! Estamos muy contentos de que te sumes a Tooltec. <br><br>
Aquí podrás encontrar, descargar y compartir herramientas de innovación. Nuestra misión es conocer y aprender sobre innovación para crear un banco de herramientas através de un equipo de innovadores del que ya eres parte.
<br><br>
Si tiene alguna pregunta sobre nuestra página, no dudes en contactarnos; puedes comunicarte con nosotros vía mail <a href="mailto:plataformas@servicios.tec.mx">plataformas@servicios.tec.mx</a> . Estaremos atentos y haremos todo lo posible para ayudarte cuanto antes.<br>
<br>
¡Disfruta de Tooltec!<br>

P.D.: No olvides descargar las plantillas y PDF editables de las herramientas para que puedas hacer uso de ellas.
<br><br>
Es necesario que compruebes tu correo. Da clic o ingresa a la siguiente liga para activar tu cuenta:
 <br><br>
			
			
			<strong>En necesario que compruebes tu correo. Da clic o ingresa a la siguiente liga para activar tu cuenta</strong>:</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlFront.'/valida/'.$cambia.'/'.$unicoU.'">'.$urlFront.'/valida/'.$cambia.'/'.$unicoU.'</a></td>
				</tr>
				
				<tr>
				<td>
				

<br>
				</td>
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
	$mail -> Subject = "Bienvenido a ".$nombreSistema;
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
	$mail -> Send ();
	//pelas
	}

?>

<script>
$('#crearTitulo').html('Cuenta creada exitosamente');
 setTimeout(function(){ $('#alerta').fadeOut() }, 5000);
</script>
<?
$errorito="Un correo fue enviado a ".$email.". Es necesario validar la cuenta dando clic a la liga que contiene. <br> No olvides revisar tu correo no deseado";

}
//

}


if($errorito!=""){ ?>
 
<?=$errorito?>

<? } ?>