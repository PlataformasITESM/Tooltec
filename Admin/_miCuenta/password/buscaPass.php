<? include "../../sesion/arriba.php";
$dondeSeccion="password";
include "../../sesion/mata.php"; 

$contra=$nuevaC;
$_SESSION['errores']=0;

$eres="";
if ($_SESSION['errores']==""){
	$_SESSION['errores']=0;
}
$mete=$_SESSION['errores'];
if($contra!=""){
$res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$quien' LIMIT 1");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
			{
			$eres="si";	
			$nombre= $fila['nombre'];
			$contrasena= $fila['contrasena'];
			$email= $fila['correo'];		
			}
		if(password_verify($contra, $contrasena)){
 
	?>
    
     <script type="text/javascript" src="js.php"></script>      
        
        <div class="clear20"></div>
        <div class="blanco10"    >
        
        <div style="width:100%; float:left;">
       <form action="passwordForma.php" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="empresa" value="<?=$e?>">
<div class="campoC   "><input required onBlur="contras('uno'); return false;" type="password" class="validate[required] " name="pass1" id="pass1" placeholder="Contraseña nueva"    /></div>
<div style="clear:both; height:10px;"></div>
<div class="campoC   "><input required onBlur="contras('dos'); return false;" type="password" class="validate[required,equals[pass1]] " name="pass2" id="pass2"  placeholder="Confirmar contraseña"  /></div>
<div style="clear:both; height:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit"  id="boton" class="botonE" value="Enviar" />
</div>
</form>
</div>
</div>
   
   
    <?
			 
		}
		
		if($eres!="si"){ 
		$mete=$mete+1;
		$_SESSION['errores']=$mete;
		if($mete>4){
		session_destroy(); 
		?>
		<script> top.location.href = "/sesion/mataSesion.php";</script>	
		<? } ?>
        
<div class="table" style="width:auto;">
<div class="tableCell padd">
<input placeholder="Contraseña actual" class="" type="password" id="bucaPass" name="bucaPass" class="field"   />
</div>
<div class="tableCell padd">
<a onclick="buscaContra(); return false; "><div class="material-icons">search</div></a>
</div>
</div>
<div class="clear10"></div>
			
			
            
            <div class="table" style="color:#A20002; width:auto;">
            <div class="tableCell padd3 material-icons">
warning
</div>
<div class="tableCell padd3">
Password incorrecto
</div>
            
            
            </div>
            
	<?	}
			
}
?>