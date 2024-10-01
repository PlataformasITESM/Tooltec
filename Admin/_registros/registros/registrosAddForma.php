<? include_once "../../sesion/arriba.php"; 


$dondeSeccion="registros";
include_once "../../sesion/mata.php"; 


if($formA!="afecta"){
 $res6 = $mysqli->query("SELECT * FROM registros WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo'];
	$urlRegistroM= $fila['url'];
	$idAreaM= $fila['idArea'];
	$crm= $fila['crm'];
	$idProveedorM= $fila['idProveedor'];
	$gracias= str_replace('<br />','',$fila['gracias']);
	$correos= $fila['correos'];
	$camposFM= unserialize($fila['camposF']);
	
	$camposFV= $fila['camposF'];
	$camposV= $fila['campos'];
	$ordenV= $fila['orden'];
	$columnas= $fila['columnas'];
	
	$notificacionM= $fila['notificacion'];
	$automaticoM= $fila['automatico'];
	$referM= $fila['refer'];
	$procesoM= $fila['proceso'];
	}
	 
	 
$arregloAutos=array();
$arregloAutos['nombre']="Nombre";
$arregloAutos['apellidoP']="Apellido Paterno";
$arregloAutos['apellidoM']="Apellido Materno";
$arregloAutos['correo']="Correo";
$arregloAutos['telefono']="Teléfono";
$arregloAutos['celular']="Celular";
 
 
$graciasM=str_replace('<br />','',$graciasM);

?>

<div class="blanco10 ">
<div class="div100">
  <form action="registrosAddForma.php" method="post" enctype="multipart/form-data" id="forma">
    <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
    <? if($activoM!="") { ?>
    <div style="width:150px; float:left; margin-bottom:5px; ">Estatus</div>
    <div style="float:left;  ">
      <select name="activo" id="activo">
        <option value="0"  >Activo</option>
        <option value="1"  >Inactivo</option>
      </select>
    </div>
    <div style="clear:both; height:10px;"></div>
    <? } ?>
 
 
 
 
 
 
 

<div class="formaB">
   <div class="formaT requerido">Título</div>
     <div class="formaC">
      <input id="titulo" style="width: 200px;"  name="titulo"  type="text" class="validate[required]"   value="<?=$tituloM?>" />
    </div>
 </div>
   
 
    
 
    <div class="formaB">
   <div class="formaT requerido">Mensaje de gracias.</div>
     <div class="formaC">
     <textarea id="gracias"  rows="5" name="gracias"  type="text" class="validate[required]  " style="width:350px;"><?=$gracias?></textarea>
    </div>
 </div>
       
    
 
	    <div class="formaB">
   <div class="formaT  ">Correos de notificacion, separar por coma</div>
     <div class="formaC">
      <textarea id="correos"  rows="5" name="correos"  type="text"  style="width:350px;"><?=$correos?></textarea>
    </div>
 </div>
       
     
    	    <div class="formaB">
   <div class="formaT  ">
    Campos Automáticos
	</div>
    
 <div class="formaC">
   
   <table class="tablas div100">
   <thead>
   <tr>
   <th>Activo</th>
   <th>Campo</th>
   <th>Esp</th>
   <th>Eng</th>
   <th>Ancho</th>
   <th>Requerido</th>
   </tr>
   </thead>
   <tbody>
 <? foreach($arregloAutos as $auto=>$tit) { ?>
<tr>
<td style="text-align: center"><input   type="checkbox" <? if ($camposFM[$auto]!="") { ?> checked <? } ?>  name="fijos[]" value="<?=$auto?>"></td>
<td><?=$tit?></td>
<td><input     name="<?=$auto?>_es"   id="<?=$auto?>_es" type="text"    placeholder="<?=$tit?>"  value="<?=$camposFM[$auto]['es']?>" /></td>
<td><input     name="<?=$auto?>_en"   id="<?=$auto?>_en" type="text"    placeholder="<?=$tit?>"  value="<?=$camposFM[$auto]['en']?>" /></td>
<td>
<select name="<?=$auto?>_ancho"  id="<?=$auto?>_ancho">
<option <? if($camposFM[$auto]['ancho']==100) {  ?>selected<? } ?> value="100">100%</option>
<option <? if($camposFM[$auto]['ancho']==75) {  ?> selected<? } ?> value="75">75%</option>
<option <? if($camposFM[$auto]['ancho']==66) {  ?> selected<? } ?> value="66">66%</option>
<option <? if($camposFM[$auto]['ancho']==50) {  ?> selected<? } ?> value="50">50%</option>
<option <? if($camposFM[$auto]['ancho']==33) {  ?> selected<? } ?> value="33">33%</option>
<option <? if($camposFM[$auto]['ancho']==25) {  ?> selected<? } ?> value="25">25%</option>
</select>
</td>
<td style="text-align: center"><input type="checkbox" <? if ($camposFM[$auto]['req']!="") { ?> checked <? } ?>   name="<?=$auto?>_req" value="1"></td>

</tr> 
 <? } ?>
 </tbody>
    </table>
 
 
 
</div>
 
 </div> 
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
	 
	 
	 if($crmCheck==""){$crm=0;}
	 else {
	 
	 }
	
 
	 
	 $correos=mataMalos($correos);
$gracias=nl2br(mataMalos($gracias));
	 
$titulo=mataMalos($titulo);

$fijoA=array();
if($fijos!=""){
	foreach($fijos as $fijs){
	$fijoA[$fijs]['es']=${$fijs."_es"};
	$fijoA[$fijs]['en']=${$fijs."_en"};
	$fijoA[$fijs]['ancho']=${$fijs."_ancho"};
	$fijoA[$fijs]['req']=${$fijs."_req"};
	}
	$fijos=serialize($fijoA);
	}else {
	$fijos="";
	}




if($cambia!=""){
	$query="UPDATE registros SET   titulo='$titulo', correos='$correos',  camposF='$fijos', gracias='$gracias', modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query);
}						//pelas
	
if($cambia==""){	
$cambia = aleatorio(10);
$query="INSERT INTO registros (id,titulo,crm,camposF,gracias,creado) VALUES ('$cambia', '$titulo','$crm','$fijos','$gracias', '$creado')";

$mysqli->query($query);
			
}


?>
<script>
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_registros/registros/registrosAdd.php?u=<?=$cambia?>";
</script>
<?
 } ?>
