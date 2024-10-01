<? 
$vengode= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$vengode=str_replace($dominioAdmin,'',$vengode);

$datas=array();
$refer=$_GET['refer'];
$quer="SELECT * FROM registros WHERE id='$idRegistro'";
  $res6 = $mysqli->query($quer);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idArea= $fila['idArea'];
	$campos= $fila['campos'];
	$crm= $fila['crm'];
	
	
	$orden= $fila['orden'];
	$columnas= $fila['columnas'];
	$camposFM= unserialize($fila['camposF']);
	$graciasMensaje= $fila['gracias'];

	}
	$plural="s";
 
	
	$campos=arregloSaca($campos);
	$orden=explode(',',$orden); 


$anchoCampo=100;
if($columnas>1){$anchoCampo=100/$columnas;}

$arregloAutos=array();
$arregloAutos['nombre']="Nombre";
$arregloAutos['apellidoP']="Apellido Paterno";
$arregloAutos['apellidoM']="Apellido Materno";
$arregloAutos['correo']="Correo";
$arregloAutos['telefono']="Teléfono";
$arregloAutos['celular']="Celular";




/* */
	
	//campos fijos
	?>

    <div style="clear:both;"></div>

    
   
 <div class="formaForma" id="gracias" style=" width:100%;   <? if ($graciasGet!="") { ?> margin-bottom:50px;  <? } ?> " >

<div class="tituloForma">
<?=$tituo?>
</div>
	


<div style="float:left;   width:100%;">

<form style="  " action="<?=$dominioUrl?>/_sitio/formaProcesar" method="post" enctype="multipart/form-data" id="forma<?=$idRegistro?>">
<input type="text" name="contra" value="" style="width:0px; height:0px; border:0; padding:0;" />
<input type="hidden" name="refer" value="<?=$refer?>" />
<input type="hidden" name="posicion" class="formaPosicion" id="posicion<?=$idRegistro?>"  />
<input type="hidden" name="idRegistro" value="<?=$idRegistro?>" />
<input type="hidden"  name="vengoUrl" id="vengo<?=$idRegistro?>" value="<?=$vengode?>"/>
<input type="hidden"  name="idQue" value="<?=$idQue?>"/>
<input type="hidden"  name="queTitulo" value="<?=$queTitulo?>"/>
<input type="hidden"  name="ses" value="<?=$elToken?>"/>
<input type="hidden"  name="idiomaF" value="<?=$idioma?>"/>
<input type="hidden"  name="dAt74s" id="datas"/>

 <? foreach($arregloAutos as $auto=>$tit) { 
 if($camposFM[$auto]!=""){
 $reqs="";
 if($camposFM[$auto]['req']==1){$reqs="required";}
 
 if($auto=="correo"){$reqs="required,custom[email]";}
 
 $camposCRM="";

 ?>
<div class="padd10 div<?=$camposFM[$auto]['ancho']?>"><input data-tipo="<?=$auto?>" autocomplete="off" type="text" class=" <?=$auto?> f<?=$idRegistro?>requerido validate[<?=$reqs?>] <?=$camposCRM?> field fieldS" name="<?=$auto?>" id="<?=$auto?>" placeholder="<?=$camposFM[$auto][$idioma]?>"/></div>
<? } }

if($crm>0){} ?>
  
								
 
								
    <?
	//

 
	foreach ($orden as $ordecin){

	$este=$campos[$ordecin];

	$tituloC=($este['titulo_'.$idioma]);
	$tipoC=$este['tipoC'];
	$anchoC=$este['ancho'];
	$valoresC=$este['valores'];
	$requeridoC=$este['requerido'];
	//$proveedorC=$este[4];
	
	$custom="";
	
	$tipoC=explode('_',$tipoC);
	$tipoCampo=$tipoC[0];
	$tipoCampoN=$tipoC[1];
	

	
	if($tipoC=="Telefono"){
	$custom=",custom[phone]";	
	}
	
	if($tipoC=="Númerico"){
	$custom=",custom[number]";	
	}
	
	//comienzan los campos
	if($tituloC!=""){ 
	
	
	$tituloC=explode('|',$tituloC);
	if($idioma=="es"){$tituloC=$tituloC[0];}else {$tituloC=$tituloC[1];}
	?>
		
        <div class="padd10 div<?=$anchoC?>">
         <? if ($tipoCampo=="titulo"){ ?> 
         
         <? if ($valoresC!=""){ ?><a href="<?=$valoresC?>" target="_blank"><? } ?>
         <?=$tituloC?>
          <? if ($valoresC!=""){ ?></a><? } ?>
         <? } ?>
		 
		 <? if ($tipoCampo=="date"){ ?>
         <input type="date" class="  <? if($requeridoC=="1"){ ?>validate[required<?=$custom?>]<? } ?> field fieldS <? if ($tipoC=="Telefono") {?>telefono <? } ?>" <? if ($tipoC=="Telefono") {?>maxlength="14"<? } ?> name="<?=$ordecin?>" id="<?=$ordecin?>" placeholder=" <?=$tituloC?>"/>
         <? } ?>
         
          <? if ($tipoCampo=="text"){ ?>
         <input type="text" class="<? if($requeridoC=="on"){ ?>validate[required<?=$custom?>]<? } ?> field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" placeholder=" <?=$tituloC?>"/>
         <? } ?>
		 
		         <? if ($tipoCampo=="email"){ ?>
         <input type="email" class="<? if($requeridoC=="on"){ ?>validate[required,custom[email]]<? } ?> field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" placeholder=" <?=$tituloC?>"/>
         <? } ?>
         
         <? if ($tipoCampo=="check"){ ?>
         <label style="font-size:12px;">
         <input type="checkbox" class="<? if($requeridoC=="on"){ ?>validate[required]<? } ?> " name="<?=$ordecin?>" id="<?=$ordecin?>"> <?=$tituloC?>
         </label>
         <? } ?>

         <? if ($tipoCampo=="textarea"){ ?>
         <textarea class="field fieldS <? if($requeridoC=="on"){ ?>validate[required]<? } ?> field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" rows=5 placeholder=" <?=$tituloC?>"></textarea>
         <? } ?>
         
         
         <? if ($tipoCampo=="file"){
			 
			
			 $datas[]=aleatorio(5).base64_encode($ordecin);
			 
			  ?>
         <?=$tituloC?>
           <input type="file" class="<? if($requeridoC=="on"){ ?>validate[required<?=$custom?>] archivosForma<? } ?> field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" placeholder=" <?=$tituloC?>"/>
         <? } ?>
         
         
          <? if ($tipoCampo=="programaP"){ ?>
         <input type="hidden"  name="<?=$ordecin?>" id="<?=$ordecin?>" value="<?=$programaP?>"/>
         <? } ?>
         
         
         <? if ($tipoCampo=="programa"){ 
		 $valoresC=explode(',',$valoresC);
		 ?>
         
         <select   class="<? if($requeridoC=="on"){ ?>validate[required]<? } ?> <? if ($idArea==1) { ?> programaOtra <? }?>field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" >
         <option value=""><?=$tituloC?></option>
         <? foreach($valoresC as $valin) { 
		 $valin=explode('_',$valin);
		 $valinV=$valin[0];
		 $valinT=$valin[1];
		 ?>
			<option value="<?=$valinV?>"><?=$valinT?></option> 
			 
		
         <? } ?>
         
         <? if ($idArea==1){ ?>
         <option value="Otra ">Otra opción</option> 
         <? } ?>
         </select>
         
         <? if ($idArea==1){ ?>
         <div id="<?=$ordecin?>OtraDiv" style="display:none; float:left; width:100%;">

         <div class="campoF"><input type="text" class="validate[required] field fieldS" name="<?=$ordecin?>OtraVal" id="<?=$ordecin?>OtraVal" placeholder=" Otra"/></div>
  
        
        </div>
         <? } ?>
         
		 <? } ?>
         
         <? if ($tipoCampo=="select"){ 
		 $valoresC=explode('|',$valoresC);
		 
		 
		 
		 
		 ?>
         
         <select   class="<? if($requeridoC=="on"){ ?>validate[required]<? } ?> field fieldS" name="<?=$ordecin?>" id="<?=$ordecin?>" >
         <option value=""><?=$tituloC?></option>
         <? foreach($valoresC as $valin) { 
		 
		 $valin=explode('°',$valin);
		 $valinV=$valin[0];
		 $valinVC=$valin[1];
	
		 $correoSecreto="";
		if($valinVC!=""){
		
		 $correoSecreto="°".$valinVC;
		 }
		 ?>
			<option value="<?=$valinV?><?=$correoSecreto?>"><?=$valinV?> </option> 
			 
		
         <? } ?>
         </select>
		 <? } ?>
         
         
         </div>
         
         <? if ($tipoCampo!="programaP"){ ?>

		<? } ?>
<?	
//fin del ciclo
} 
?>
<div class="clear5"></div>
<?

	}
	?>      

      
	  <div class="clear10"></div>
 
 <div class="div100 centrado loadForm" style="display: none;"><img src="/img/load.gif"></div>
        
        <input type="text" name="ctrl" class="inputCrtl" >   
		<input type="text" name="ctrlTmp" class="inputCrtl" value="<?=encripta('encrypt',$hoySt);?>" >   
        <div onclick="$('#forma<?=$idRegistro?>').submit();return false;" class="botonEnviar right" style="display: none;"  >Enviar</div>
 
            
   </form>       
     </div>
            
            </div>



            <script>
$(function() {
  <? $datas=implode(',',$datas); ?> 

$('#datas').val('<?=$datas?>');
var registro='<?=$idRegistro?>';
jQuery.ajaxSetup({beforeSend:function(){$(".load").show(),$(".botonEnviar ").hide()},complete:function(){},success:function(){}}),jQuery("#forma"+registro).validationEngine({autoHidePrompt:!0,autoHideDelay:2e3,fadeDuration:.3});var optionss={target:"#aqui",success:function(){}};$("#forma"+registro).ajaxForm(optionss),$(".archivosForma").change(function(){var o=3145728,a=this.files[0].size;a>=o&&(alert("3MX máx"),$("#"+this.id).val(""));var i=$("#"+this.id).val().split(".").pop().toLowerCase();""!=i&&-1==$.inArray(i,["doc","docx","txt","pdf","zip","rar","jpg","png"])&&(alert("Solo archivos de documentos"),$("#"+this.id).val(""))});

setTimeout(
  function() 
  {
   $('.botonEnviar').show();
  }, 5000);


});
  </script>
 