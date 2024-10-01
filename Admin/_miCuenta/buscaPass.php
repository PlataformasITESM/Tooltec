<? include "../sesion/arriba.php";
$dondeSeccion="miCuenta";
include "../sesion/mata.php"; 

$sal=$token.$nueva;
$contra= createPasswordHash($sal);
$eres="";



if ($_SESSION['errores']==""){
	$_SESSION['errores']=0;
}

$mete=$_SESSION['errores'];




if($nueva!=""){
	
$res6 = $mysqli->query("SELECT * FROM usuarios WHERE id='$quien' AND contrasena='$contra' LIMIT 1");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
			{
			$eres="si";	
			$nombre= $fila['nombre'];
			$email= $fila['correo'];		
			}
		
		
		if($eres=="si"){
	?>
    
     <script type="text/javascript" src="<?=$url?>/_miCuenta/js.php"></script>      
        
       <form action="<?=$url?>/_miCuenta/cambiaPass.php" method="post" enctype="multipart/form-data" id="forma">

<div class="campoF"><input type="password" class="validate[required] " name="pass1" id="pass1" placeholder="New password"    /></div>
<div style="clear:both; height:10px;"></div>


<div class="campoF"><input type="password" class="validate[required,equals[pass1]] " name="pass2" id="pass2"  placeholder="Confirm password"  /></div>
<div style="clear:both; height:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit"  id="boton" class="botonE" value="Send" />
</div>

</form>
    
    <?
			 
		}
		
		if($eres!="si"){ 
		$mete=$mete+1;
		$_SESSION['errores']=$mete;
		if($mete>4){
		session_destroy(); 
		?>
		<script> top.location.href = "<?=$url?>/sesion/mataSesion.php";</script>	
		<? } ?>
        
<div class="table">
<div class="tableCell padd">
<input placeholder="Current password" class="" type="password" id="bucaPass" name="bucaPass" class="field"   />
</div>
<div class="tableCell padd">
<a onclick="buscaContra(); return false; "><div class="material-icons">search</div></a>
</div>

</div>

<div class="clear10"></div>
			
			
            
            <div class="table" style="color:#A20002">
            <div class="tableCell padd3 material-icons">
warning
</div>
<div class="tableCell padd3">
Wrong Password
</div>
            
            
            </div>
            
	<?	}
			
}
?>