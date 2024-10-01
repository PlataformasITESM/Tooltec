<? include "../../sesion/arriba.php"; 


 
$valor=$_GET['u'];
$valor=limpiaGet($valor);
$displa="none";
$dondeSeccion="admins";
include "../../sesion/mata.php"; 
 

if($formA!="afecta"){


 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$nombreM= $fila['nombre'];
	$apellidoM= $fila['apellido'];
	$tipoN= $fila['tipo'];
	$correoM= $fila['correo'];
	$correoN= $fila['correoN'];
	if($tipoN=="tec"){$tipoNN="Registros";}
	}
	
	if ($valor==""){
	$nueva = aleatorio(4);
}

	 if($tipoN=="externo"){$displa="";}
	
	?>

 
<div class="clear20"></div>


<div class="blanco10T">


<a href="<?=$url?>/_usuarios/admins" >     

        <div class="material-icons padd10 hover" style="width:30px;">keyboard_arrow_left</div>
        </a>
        
<? if ($tipoU=="admin" && $valor!=""){ ?>
    <div onclick="alertaBorra('<?=$e?>','<?=$valor?>','<?=$nombreM?>');" class="material-icons padd10 borra" style="float:right;">clear</div>
   <? } ?>
        
</div>

<div class="blanco10">
 

<form action="adminsAddForma.php"   method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$valor?>" >
     <input type="hidden" id="empresa" name="empresa" value="<?=$e?>" >
    
   
    <div class="formaB">
	<div class="formaT requerido">Email</div>
    <div class="formaC">
   	<input id="correo"  name="correo"  type="email" required class="field" title="Email"  value="<?=$correoM?>"  />
	</div>
</div>

<div id="mailRespuesta"></div>


    

 <div class="formaB">
	<div class="formaT requerido">Nombre</div>
    <div class="formaC">
   	<input id="nombre"  name="nombre"  type="text" class="field" required  value="<?=$nombreM?>" />
	</div>
</div>

 <div class="formaB">
	<div class="formaT requerido">Apellido</div>
    <div class="formaC">
   	<input id="apellido"  name="apellido"  type="text" required class="field"  value="<?=$apellidoM?>"  />
	</div>
</div>



 
 <div class="formaB">
	<div class="formaT">
	<? if ($valor!=""){?> Cambio de password<? }?> <? if ($valor==""){?> Password<? }?></div>

    <div class="formaC">
<input id="nuevaC"  name="nuevaC"  type="text" class= <? if ($valor==""){?>"validate[required]" <? } ?>  value="<?=$nueva?>"  />
</div>
</div>
<script>
$('#nueva').val('<?=$nueva?>');
</script>

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>



<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

</form>
</div>



<script type="text/javascript">



 </script>
 <? } ?>
 
 <? 
 if($formA=="afecta"){
	 
	 $tipo=mataMalos($tipo);
	 $nombre=mataMalos($nombre);
	 $apellido=mataMalos($apellido);
	 $correo=mataMalos($correo);
	 $correoN=mataMalos($correoN);
	 $nuevaC=$nuevaC; 
	

if($cambia==""){

	$existe="";
	 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE correo='$correo'");
	 $res6->data_seek(0);
	 while ($fila = $res6->fetch_assoc()) 
		{
		$existe=1;
		$tipoExiste=$fila['tipo'];
		}

if($existe=="" ) {
	
			
			 $idU = aleatorio(10);
			 $unicoU = aleatorio(10);
			 $contra= createPasswordHash($nuevaC);
				
				$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$dominioFrente.'/img/logo.png" height="40" /></td>
				</tr>
			   
			   
				<tr>
					<td>'.$nombre.':</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>Fuiste asignado como Administrador de '. $nombreSistema.'<br />
			<br />
			Puedes cambiar tu contraseña al ingresar a Mi Cuenta</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>Correo: '.$correo.'</td>
				</tr>
				
				<tr>
					<td>Contraseña: '.$nuevaC.'</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlA.'">'.$nombreSistema.'</a></td>
				</tr>
			
			</table>
			</div>';		
			
	$mail = new phpmailer (); 
	$mail->isSMTP();      
	//$mail->SMTPDebug  = 2;                                  
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->SMTPSecure = "tls";	
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	
	$mail -> AddAddress ("$correo");	
	
	$mail -> Subject = "Bienvenido a ".$nombreSistema;
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
 	$mail -> Send ();
	
			
					
						//pelas
	
		 
			$query="INSERT INTO usuarios (id,tipo,sA, nombre,apellido,correo, correoN, contrasena,clave) VALUES ('$idU','admin','1', '$nombre','$apellido','$correo', '$correoN','$contra','$unicoU')";
			 $mysqli->query($query);
			
}
		if($existe!=""){
		?>
		<script>alert('El correo <?=$correo?> ya se encuentra registrado como <?=$tipoExiste?>');</script>
		<?
		}
}

	

if($cambia!=""){
	$query="UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$correo', correoN='$correoN'  WHERE id='$cambia'";
	$mysqli->query($query);
	
	if($nuevaC!=""){
	
	$sal=$nuevaC;
	$contra=createPasswordHash($sal);

		$query="UPDATE usuarios SET contrasena='$contra'  WHERE id='$cambia' AND correo='$correo'";
		$mysqli->query($query);
		//die($sal."****  ".$query);
		
		
		$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$urlFront.'/img/logo.png" height="40" /></td>
				</tr>
			   
			   
				<tr>
					<td>'.$nombre.':</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>Se reestablecio tu contraseña para '.$nombreSistema.'<br />
			<br />
			Puedes cambiar tu contraseña al ingresar a Mi Cuenta</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>Nuava contraseña: '.$nuevaC.'</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlA.'">'.$nombreSistema.'</a></td>
				</tr>
			
			</table>
			</div>';		
			
	$mail = new phpmailer (); 
	$mail->isSMTP();      
 //	$mail->SMTPDebug  = 2;                                  
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->SMTPSecure = "tls";	
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	
	$mail -> AddAddress ("$correo");	
	
	$mail -> Subject = subject("Cambio de contraseña ".$nombreSistema);
	$mail -> Body = $contents;
	$mail -> IsHTML (true);
//$mail -> Send ();
	
	 
	}
}
 
?>

<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_usuarios/admins";</script>	
<?
 } ?>