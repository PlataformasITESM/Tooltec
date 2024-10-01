<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="usuariosSys";
include_once "../../sesion/mata.php"; 
 
 
 if($vt!=""){$ver=$vt;}
$puedoPasar="";
if($tipoU=="admin" )	{
	$puedoPasar=1;
}


if($formA!="afecta"){
$que="cambia";

 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$nombreM= $fila['nombre'];
	$apellidoM= $fila['apellido'];
	$tipoN= $fila['tipo'];
	$correoM= $fila['correo'];
	$correoNM= $fila['correoP'];
		$usuarioM= $fila['usuario'];
	$info= arregloSaca($fila['info']);
	
	$permisos= unserialize($fila['permisos']);
	
	$telefonoM=$info['telefono'];
	$extM=$info['ext'];
	$celularM=$info['celular'];
	 
	}
	
	if ($valor==""){
	$nueva = aleatorio(4);
	}
 

	?>

 
<div class="blanco10">
 
<div class="div33">
<form action="usuariosAddForma.php"   method="post" enctype="multipart/form-data" id="forma"  >
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="<?=$que?>" value="<?=$valor?>" >
    <input type="hidden" id="vt" name="vt" value="<?=$ver?>" >
    
  
<div id="campos">
 <div class="formaB">
	<div class="formaT requerido">Nombre</div>
    <div class="formaC">
   	<input id="nombre"    name="nombre"  type="text" class="field validate[required]"    value="<?=$nombreM?>" />
	</div>
</div>

 <div class="formaB">
	<div class="formaT requerido">Apellido</div>
    <div class="formaC">
   	<input id="apellido"    name="apellido"  type="text"   class="field validate[required]"  value="<?=$apellidoM?>"  />
	</div>
</div>

    <div class="formaB">
	<div class="formaT requerido">Correo</div>
    <div class="formaC">
   	<input id="correo"  name="correo"  type="email"   class="field validate[required]" title="Email"  value="<?=$correoM?>"  />
	</div>
</div>

<div id="mailRespuesta"></div>




<div class="clear20"></div>
 
 <div class="formaB">
	<div class="formaT">
	<? if ($valor!=""){?> Password<? }?> <? if ($valor==""){?> Password<? }?></div>

    <div class="formaC">
<input id="nuevaC"  name="nuevaC"  type="text"  <? if ($valor==""){?> required <? } ?>  value="<?=$nueva?>"  />
</div>
</div>

<script>
$('#nueva').val('<?=$nueva?>');
</script>




<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>



<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

</div>

</form>
</div>



<script type="text/javascript">



 </script>
 <? } ?>
 
 <? 
 if($formA=="afecta"){
 $e=mataMalos($e);
 $vt=mataMalos($vt);	 
	 
	 $cambia=mataMalos($cambia);
	  $vend=mataMalos($vend);
	 $tipo=mataMalos($tipo);
	 $nombre=mataMalos($nombre);
	 $apellido=mataMalos($apellido);
	 $correo=mataMalos($correo);
	 $telefono=mataMalos($telefono);
	 $extension=mataMalos($extension);
	 $celular=mataMalos($celular);
	 $nuevaC=($nuevaC); 
	 $usuario=mataMalos($usuario); 
	 
	 $info=array();
	 
	 $info['telefono']=$telefono;
	 $info['ext']=$extension;
	 $info['celular']=$celular;
	 
	 $info=arregloMete($info);


$permisos=array();



$permisos['mh_gdl']=$mh_gdl;
$permisos['mh_tab']=$mh_tab;

$permisos['eve_gdl']=$eve_gdl;
$permisos['eve_tab']=$eve_tab;

$permisos['alu_gdl']=$alu_gdl;
$permisos['alu_tab']=$alu_tab;

$permisos['prof_gdl']=$prof_gdl;
$permisos['prof_tab']=$prof_tab;

$permisos['inst_gdl']=$inst_gdl;
$permisos['inst_tab']=$inst_tab;

$permisos=serialize($permisos);

if($cambia!=""){

	$query="UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$correo' ,usuario='$usuario', permisos='$permisos'  WHERE   id='$cambia'";
	$mysqli->query($query);
	
	if($nuevaC!=""){
		$contra=createPasswordHash($nuevaC);
 
 
			$query="UPDATE usuarios SET contrasena='$contra'  WHERE  correo='$correo'";
 
			$mysqli->query($query);
			
		 
	 
	}

}	

	
if($cambia==""){

	$existe="";
	 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE correo='$correo'");
	 $res6->data_seek(0);
	 while ($fila = $res6->fetch_assoc()) 
		{
		$existe=1;
		}

if($existe=="" ) {
	 
 			
			 $cambia = aleatorio(10);
			 
			 if($vend!=""){$cambia=$vend;}
			 if($ases!=""){$cambia=$ases;}
			 
			 $unicoU = aleatorio(10);
			 $sal=$nuevaC;
			 $contra= createPasswordHash($sal);

$pongoContra='<tr><td>Contraseña: '.$nuevaC.'</td></tr>';
//sepamos si ya tienes contraseña

$query="INSERT INTO usuarios (id,usuario,tipo,nombre, apellido ,correo, info,  contrasena, permisos, clave) VALUES ('$cambia','$usuario','$vt','$nombre','$apellido','$correo','$info','$contra', '$permisos', '$unicoU')";
$mysqli->query($query);
				
				$contents='<div align="center">
			<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:700px;">
				
			   
				<tr>
					<td style="text-align:center;"><img src="'.$urlA.'/img/logo.png" width="150" /></td>
				</tr>
				<tr>
					<td>'.$nombre.':</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Fuiste asignado a '.$nombreSistema.' como '.$vtT.'<br />
			<br />
			Puedes cambiar tu contraseña al ingresar a Mi Cuenta</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>

				
				'.$pongoContra.'
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><a href="'.$urlA.'">'.$nombreSistema.'</a></td>
				</tr>
			
			</table>
			</div>';		
			
			
			if($correo!=''){ 
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
	//$mail -> Send ();
	//pelas
	}

}
		if($existe!=""){
		?>
		<script>alert('El usuario <?=$usuario?> ya se encuentra registrado');</script>
		<?
		}
}
 
?>

<script> top.location.href = "<?=$url?>/_usuarios/usuarios/usuarios?v=<?=$vt?>";</script>	
<?
 } ?>