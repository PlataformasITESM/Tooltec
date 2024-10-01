function agregaFuente(){ var e=$("#d").val(),a=$("#fuentes").val();""!=a&&$.ajax({type:"POST",url:"fuentesAdd.php",data:"d="+e+"&f="+a,success:function(e){$("#aqui").html(e)}})}function mataFuenteDo(e){var a=$("#d").val();""!=e&&$.ajax({type:"POST",url:"fuentesMata.php",data:"d="+a+"&f="+e,success:function(e){$("#aqui").html(e)}})}function mataFuente(e){closeAlert();$("#newFolder").val();$("body").prepend('<div id="alerta" class="alerta"></div>'),$("#alerta").prepend('<div id="alertaBox" class="alertaBox"></div>');var a=' <div class="close" onClick="closeAlert(); return false;">X</div> <div class="alertaBoxTitulo" >¿Deseas eliminar  '+e+' ?</div>Eliminar la fuente afectará los estilos que la utilicen<div class="clear10"></div><div class="clear30"></div><div id="contraAqui"><div class="botonesCancelar"  onClick="closeAlert(); return false;">Cancelar</div><div class="botonesOk"  onClick="mataFuenteDo(\''+e+"'); return false;\">OK</div></div>";$("#alertaBox").append(a),$("#nombreFolder").focus()}

$(function() {

$(".choseado").chosen({width:"100%"});

});