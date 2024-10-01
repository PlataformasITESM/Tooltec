<? include "../../sesion/arriba.php"; 
$dondeSeccion="registros";
include "../../sesion/mata.php"; 


if($programa!=""){
$valor=limpiaGET($programa);	
}


$displa="none";
$displa2="none";
$displaTit="none";
$displaProd="none";


if($formA!="afecta"){

//quien eres
	
	$esteArreglo= ($campos[$valorC]);
	

	$titulo_es=$esteArreglo['titulo_es'];
	$titulo_en=$esteArreglo['titulo_en'];
	$tipoM=$esteArreglo['tipoC'];
	$columna=$esteArreglo['columna'];
	$valoresM=$esteArreglo['valores'];
	$requeridoM= $esteArreglo['requerido'];
	$ancho= $esteArreglo['ancho'];
	
	if($tipoM=="programa_Programa"){$displa=""; $valoresM=explode(',',$valoresM);}
	if($tipoM=="select_Listado" || $tipoM=="radio_Radio"){$displa2="";}
	if($tipoM=="titulo_Título" ){$displaTit="";}
	
	if($tipoM=="productos_Productos" ){$displaProd="";}
 
	?>
	
	<div class="blanco10">

<div style="clear:both; height:20px;"></div>



  <form style="width:100%;" action="camposAddForma.php" method="post" enctype="multipart/form-data" id="forma">
    <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valorC?>" >
    <input type="hidden" name="registro" value="<?=$valor?>" >


      <input id="variable"  name="variable"  type="hidden" class="validate[required]"  value="<?=$valorC?>" />

    <script>
	
	<? if ($valorC==""){ $valorC=aleatorio(5);?>
		
		$('#variable').val('<?=$valorC?>');
	<? } ?>
$('#variable').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

</script>
    
   <div class="formaB">
	<div class="formaT requerido">Título </div>
    <div class="formaC">
   	<input id="titulo_es"  name="titulo_es"  type="text" required class=" validate[required] field"  value="<?=$titulo_es?>"  />
	</div>
</div>  


    

   <div class="formaB">
	<div class="formaT">Tipo</div>
      <select name="tipoC" id="tipoC" class="validate[required]" onChange="cambiaTipo(this.value); return false;">
        <option value="">Selecciona una opción</option>
        <? $res6 = $mysqli->query("SELECT * FROM registrosCampos ORDER BY nombre ASC");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{ 
	$idTipoC= $fila['id'];
    $nombreC= $fila['nombre'];
	$tipoCampo= $fila['tipoCampo'];
	$selec="";
	if($tipoM==$tipoCampo."_".$nombreC){$selec="selected";}
	?>
        <option value="<?=$tipoCampo?>_<?=$nombreC?>" <?=$selec?>>
        <?=$nombreC?>
        </option>
        <? } ?>
      </select>
    </div>

  
  

  
   <div id="titulotipo" class="tiposResultados" style="display:<?=$displaTit?>">
<div class="formaB">
	<div class="formaT">Liga</div>
    <div class="formaC">
   	<input id="ligaT"  name="ligaT"  type="text" class="" style="width:300px;"   value="<?=$valoresM?>" />
	</div>
</div>

    </div>
    
    
    <div id="listadoSelect" class="tiposResultados" style="display:<?=$displa2?>">
      <div style="width:150px; float:left; margin-bottom:5px; ">Opciones </div>
      <div style="float:left;  ">
      
      
      <? 
	  $valoresM= explode("|",$valoresM);
	  $cuenta=1;
	  foreach ($valoresM as $valorin) { 
	  
	  $valorin=explode('°',$valorin);
	  $valorinT=$valorin[0];
	  $valorinS=$valorin[1];
	  
	 ?>
     
     <div style="float:left; margin-bottom:10px; " id="selecOp<?=$cuenta?>">
      <input class="seleccion selectrones validate[required]" data-cuenta="<?=$cuenta?>" id="campo<?=$cuenta?>" type="text" value="<?=$valorinT?>"> 
      

      <span class="borra" style="margin-left:10px; cursor:pointer;" data-cuenta="<?=$cuenta?>">x</span>
      </div>
        <div style="clear:both;  "></div>
      <? 
	  $cuenta++;
	  } ?>

<input type="hidden" value="<?=$cuenta?> " id="va">

<div onClick="agregaOpcion(); return false;" style="float:right; font-size:12px; cursor:pointer;">      + Agregar opción</div>
    
     <div style="clear:both; height:10px;"></div>
    <div id="nuevasOpciones">
    
    
    </div>    
<input type="hidden" id="listado" name="listado">



<script>
function agregaOpcion(){
	
var va = parseInt($('#va').val());
va=va+1;	
$('#va').val(va);
	
	var apenda='<div style="float:left; margin-bottom:10px;   " id="selecOp'+va+'">'+
	'<input class="seleccion selectrones validate[required]" data-cuenta="'+va+'" id="campo'+va+'" type="text"  > '+
	
	'<span class="borra" style="margin-left:10px; cursor:pointer;" data-cuenta="'+va+'">x</span>'+
	' </div>'+
    '<div style="clear:both; "></div>';
	
	
	$('#nuevasOpciones').append(apenda);
}

$( ".selectrones" ).live("change", function() {
recargaSelects();
});


$( ".borra" ).live("click", function() {
	var borra=$(this).data("cuenta")
	$('#selecOp'+borra).remove();
recargaSelects();
});

recargaSelects();

function recargaSelects() {
	
	var opcionesSeleccion = new Array();
	$(".seleccion").each(function() {
		
		var este=$(this).data("cuenta")
		var seleccion=$('#campo'+este).val();
		
		if(seleccion!=""){
			
		var seleccionCorreo=$('#campo'+este+'S').val();	
			
			opcionesSeleccion.push(seleccion+'°'+seleccionCorreo);
			
		}
		
		var nuevo=opcionesSeleccion.join('|');

		$('#listado').val(nuevo);
    	
	});
	
}


</script>

		
      </div>
      <div style="clear:both; height:10px;"></div>
    </div>
    
    
   <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
<select name="ancho"  id="ancho">
<option <? if($camposFM[$auto]['ancho']==100) {  ?>selected<? } ?> value="100">100%</option>
<option <? if($camposFM[$auto]['ancho']==75) {  ?> selected<? } ?> value="75">75%</option>
<option <? if($camposFM[$auto]['ancho']==66) {  ?> selected<? } ?> value="66">66%</option>
<option <? if($camposFM[$auto]['ancho']==50) {  ?> selected<? } ?> value="50">50%</option>
<option <? if($camposFM[$auto]['ancho']==33) {  ?> selected<? } ?> value="33">33%</option>
<option <? if($camposFM[$auto]['ancho']==25) {  ?> selected<? } ?> value="25">25%</option>
</select>
	</div>
</div>   



<div class="formaB">
	<div class="formaT">Requerido</div>
    <div class="formaC">
 <input type="checkbox" name="requerido" id="requerido" <? if ($requeridoM=="on") {?>checked<? } ?>>
	</div>
</div> 
    
    
    <div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
    <div class="botonEnviar" style="float:right;">
      <input type="submit" value="Enviar" />
    </div>
  </form>

</div>

<script type="text/javascript">
<? if ($tituloM!=""){ ?>
$('#activo').val('<?=$activoM?>');
<? } ?>
$('#titulo').focus();
 </script>
<? } ?>
<? 
 if($formA=="afecta"){

 
	 $variable=mataMalos($variable);
	 $titulo=mataMalos($titulo);
	 $tipoC=mataMalos($tipoC);
	 $requerido=mataMalos($requerido);
	 $proveedor=mataMalos($proveedor);
	 
	 
//saquemos tu arreglo	
$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$registro'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$campos= $fila['campos'];
	$orden= $fila['orden'];
	$campos=arregloSaca($campos);	
	$orden=explode(',',$orden);
	
	
	
	/* selects con permisos */
	
	if($tipoC=="select_Listado") {
		
		$listadoP=explode('|',$listado);
	
		 foreach($listadoP as $listin) {
			
			if($listin!=""){ 
			 $listin=explode('°',$listin);
			 $valorPermiso=$listin[0];
			 $valorQuien=$listin[1];
			 
			 $camposPermisos[$variable.$valorPermiso]=$valorQuien;
			}
		 }
			
	}
	
	$camposPermisos=arregloMete($camposPermisos);
	/*   */
	
	
	
	
	$valores="";
	


	
	if($tipoC=="select_Listado" || $tipoC=="radio_Radio")
	{
	$valores=$listado;	
	}
	
	if($tipoC=="titulo_Título" ){ 
	$valores=$ligaT;
	}
	
	
	if($tipoC=="productos_Productos" ){ 
	$valores=$productos;
 
	}
	
	
	
	$orden[]=$variable;
	
	// titulo tipo valores requerido //
	
		$orden=array_filter($orden);
		$orden=implode(',',$orden);
		
		if($campos[$variable]==""){
		$query="UPDATE registros SET orden='$orden' WHERE id='$registro'";
		$mysqli->query($query);
		}
		
		$esteArreglo=array();
		
		$esteArreglo['titulo_es']=$titulo_es;
		$esteArreglo['titulo_en']=$titulo_en;
		$esteArreglo['tipoC']=$tipoC;
		$esteArreglo['ancho']=$ancho;
		$esteArreglo['valores']=$valores;
		$esteArreglo['requerido']=$requerido;
		$esteArreglo['proveedor']=$proveedor;
		
		$campos[$variable]=$esteArreglo;
		$campos=arregloMete($campos);
		$query="UPDATE registros SET campos='$campos' WHERE id='$registro'";
		$mysqli->query($query);
		
		
	

}





?>
<script>top.location.href = "<?=$url?>/_registros/registrosCampos/?u=<?=$registro?>";</script>
<?
 } ?>
