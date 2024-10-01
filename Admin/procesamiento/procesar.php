<?  include "../sesion/arriba.php";
/*error_reporting(E_ALL);
ini_set('display_errors', 1);
*/


$arregloEnvioSeleccion=array();
echo"SELECT * FROM registros WHERE id='$idRegistro'";
$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$idRegistro'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloR= $fila['titulo'];
	$areaR= $fila['area'];
	$campos= $fila['campos'];
	$crm= $fila['crm'];
	$orden= $fila['orden'];
	$camposFM= $fila['camposF'];
	$refersCode= unserialize($fila['refersCode']);
	$gracias= $fila['gracias'];
	$usuarios= $fila['usuarios'];
	$correos= explode(',',$fila['correos']);
	$permisos= $fila['usuarios'];
	$proceso= $fila['proceso'];
	}
		
		
		
$arregloAutos=array();
$arregloAutos['nombre']="Nombre";
$arregloAutos['apellidoP']="Apellido Paterno";
$arregloAutos['apellidoM']="Apellido Materno";
$arregloAutos['correo']="Correo";
$arregloAutos['telefono']="Teléfono";
$arregloAutos['celular']="Celular";


	
	$campos=arregloSaca($campos);
	$orden=explode(',',$orden); 
	
	$arregloRespuestas=array();
	
	
	//los basicos
	foreach ($arregloAutos as $ordecin=>$ordecin){
		$esteValor=${$ordecin};
		$esteValor=mataMalos($esteValor);
		$arregloRespuestas[$ordecin]=$esteValor;
		
		if($esteValor!=""){
		$extras .='<tr><td>'.$ordecin.':</td><td>'.$esteValor.'</td>	</tr>';
		}
	}
	
	foreach ($arregloCRM as $ordecin=>$ordecin){
		$esteValor=${$ordecin};
		$esteValor=mataMalos($esteValor);
		$arregloRespuestas[$ordecin]=$esteValor;
	}
	
	
	foreach ($orden as $ordecin){
	
	$esteArreglo=$campos[$ordecin];
	$tituloC=$esteArreglo['titulo_es'];
	$tipoC=$esteArreglo['tipoC'];
	$valoresC=$esteArreglo['valores'];
	$requeridoC= $esteArreglo['requerido'];
	$proveedorC= $esteArreglo['proveedor'];
		
		
		$esteValor=${$ordecin}." ".${$ordecin."OtraVal"};
		$esteValorC=$esteValor;
		//tiene envio especial? //
		
		$esteValor2=explode('°',$esteValor);
		$esteValor2Correo=$esteValor2[1];
	 
			
		if($esteValor2Correo!=""){
			
			$esteValor2Correo=trim($esteValor2Correo);
			$correoSelect=$losUsuarios['correo'.$esteValor2Correo];
			$arregloEnvioSeleccion[]=$correoSelect;
			$esteValorC=$esteValor2[0];
			 }
		
		//
		
		
		$esteValor=mataMalos($esteValor);
		$arregloRespuestas[$ordecin]=$esteValor;
		
		//para correos
		
		$extras .='<tr><td>'.$tituloC.':</td><td>'.$esteValorC.'</td>	</tr>';
		
		
	}
	


foreach($correos as $correoN){

	
	
	$contentsE='<div align="center">
	<table style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#333; max-width:600px;">
		<tr>
	<td colspan="2"><img src="'.$dominioFrente.'/img/logo.png" height="50"  /><br><br></td>
		</tr>
			   
				'.$extras.
		
				'</table>
			</div>';	


	$mail = new phpmailer (); 
	$mail->CharSet = 'UTF-8';
	$mail->isSMTP();                                      
	$mail->Host = $mailHost;  
	$mail->SMTPAuth = true;  			                
	$mail->Port       = $mailPort;                           
	$mail->Username = $mailUsername;  
	$mail->Password = $mailPassword;      
	$mail -> From = $mailFrom; 
	$mail -> FromName = $mailFromName; 
	
	$mail -> AddAddress ("$correoN");	
	
	$mail -> Subject = "Registro: $tituloR";
	$mail -> Body = $contentsE;
	$mail -> IsHTML (true);
	$mail -> Send ();
	
	}
	
	
	
	
$captura=serialize($arregloRespuestas);

if($tituloR!=""){	
$query="INSERT INTO registrosRegistros ( area, idDonde,donde, idRegistro,	registro,		nombre,	apellidoP,	apellidoM,	correo,	telefono, celular,	refer,	captura, vengoUrl	) VALUES ('$areaR', '$queTitulo','$idQue','$idRegistro' ,		'$tituloR' ,	'$nombreF' ,	'$apellidoPF' ,	'$apellidoMF' , '$correoF' ,	'$telefonoF' ,	'$celularF' ,	'$referF' ,	'$captura','$vengoUrl' )";
$mysqli->query($query); 

//pongamos la ultima
$hoy=date("Y-m-d H:i:s");
$query="UPDATE registros SET ultima='$hoy'WHERE id='$idRegistro'";
$mysqli->query($query);

}else{die();}


// aqui viene el crm


$gracias=$gracias;
$gracias = str_replace(array("\r", "\n"), '', $gracias);

?>

 
<script>
$(".loadForm").show()
 
 
function alertaGraciasO(e,v){
	$("html, body").animate({ scrollTop: 0 }, "fast"); 
	 $('body').prepend('<div id="alerta" class="alerta" style="z-index:9999;"></div>');
	 $('#alerta').prepend('<div id="alertaBox"   class="alertaBox"></div>');
	 var apendaxF='<div class="close" onClick="closeAlert(); return false;">X</div> '+
	 
	 '<div class=" padd10 left centrado " id="textoAqui" style="width:100%;color:#000;"> </div>'+
	 '</div>';
	 $('.load').hide();
	 $('#alertaBox').append(apendaxF);
	 $('.div100').css('opacity','.5');
	 $('#textoAqui').html('<?=$gracias?>');
 }
 
 function closeAlert(){
 top.location.reload();
 }
 alertaGraciasO();
 
 
  setTimeout(function(){ closeAlert() }, 5000);
 
	</script>