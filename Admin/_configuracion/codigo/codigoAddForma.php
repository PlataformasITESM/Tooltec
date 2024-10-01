<? include "../../sesion/arriba.php"; 
$dondeSeccion="experiencias";
include "../../sesion/mata.php"; 


if($formA!="afecta"){
	
 

	?>
  <div class="div100" >  
<form action="codigoAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
            <input type="hidden" name="cambia" id="cambia" value="<?=$valor?>" >
            <input type="hidden" name="tipinC" id="tipinC" value="<?=$tipoC?>" >


<div class="formaB ">
	<div class="formaT  requerido">Nombre</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo" name="titulo" value="<?=$tituloM?>"> 
	</div>
</div>


<textarea id="codigo" name="codigo" style="width:1px; opacity: 0; height: 1px; overflow: hidden; " ><?=$codigo?></textarea>
  <pre style="  margin: 0; position: absolute; top: 50px; bottom: 0;   left: 0;right: 0; height: 500px;" id="editor">
<?=htmlentities ($codigo)?>
</pre>
<div class="clear" style="height: 500px;"></div>
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 
</form>
</div>
 
<script>
 
$(document).bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
  $.ajax({
    type: "POST",
    url: "codigoAddForma.php",
    data: "formA=afecta&cambia=<?=$valor?>&tipinC=<?=$tipoC?>&titulo="+$('#titulo').val()+"&codigo="+encodeURIComponent($('#codigo').val()),
    success: 
    function(msg){
	//$('#aqui').html(msg);
	$('.load').hide();
	$('.botonEnviar').show();
 	 }
   	 });
    return false;
  }
});
  	
	
 <? if($tipoC=="css"){$vvv="css";}
 if($tipoC=="js"){$vvv="javascript";}?>
 
  var editor = ace.edit("editor");
    editor.setTheme("ace/theme/github");
    editor.session.setMode("ace/mode/<?=$tipoC?>");
var textarea = $('#codigo');
editor.getSession().on("change", function () {
    textarea.val(editor.getSession().getValue());
});
 

 
 
</script>
 
 <? } ?>
 
 <? 
if($formA=="afecta"){

$titulo=mataMalos($titulo);

$version=aleatorio(4);
$codigoSave=base64_encode($codigo);

if($cambia!=""){
	$query="UPDATE  codigo SET nombre='$titulo', codigo='$codigoSave', version='$version', modificado='$hoy' WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);

	$query="INSERT  INTO  codigo (id, nombre, tipo, codigo, version, modificado) VALUES ('$cambia', '$titulo', '$tipinC', '$codigoSave', '$version','$hoy')";
	$mysqli->query($query); 
}
ob_start();	
echo $codigo;
file_put_contents($rutaFront.'/codigo/'.$cambia.'.'.$tipinC, ob_get_contents());
ob_end_flush();
file_get_contents($urlA.'/_api/codigos/codigos.php');

?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href="?v=<?=$tipinC?>&u=<?=$cambia?>" ;</script>	
<?
 } ?>