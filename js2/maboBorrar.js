function borrar(){
var tits=$('#borraTitulo').val();
var proc=$('#borraProceso').val();
var borrado=$('#borraBorrado').val();

 $('body').prepend('<div id="alerta" class="alerta"></div>');

	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');

	 var apenda=' <div class="close" onClick="closeAlert(); return false;">X</div> '+

	 '<div class="clear20"></div><div class="div100 centrado titulosS" >¿Deseas eliminars  '+tits+'?</div>'+

	 '<div class="clear30"></div>'+
'Este proceso no puede ser revertido<div class="clear10"></div>'+
'Para continuar escribe <strong>ELIMINAR</strong><div class="clear10"></div>' +
'<input class="centrado" type="text" id="confirmando" onkeyup="confirma(this.value)">'+
 '<div class="clear30"></div>'+
	 '<div class="botonesCancelar"  onClick="closeAlert(); return false;">Cancelar</div>'+

	 '<div class="botonesRojo right" id="borrarBoton" style="display:none;" onClick="borrarProceso(\''+proc+'\',\''+borrado+'\'); return false;">Eliminar</div>';

	 $('#alertaBox').append(apenda);
	$('#alerta').fadeIn();
}

function borrarProceso(p,mata){
$('#borrarBoton').hide();
	$.ajax({
    type: "POST",
    url: "/sys/_api/procesos/borrar.php",
    data: "mata="+mata+"&pr="+p,
    success: 
		function(msg){
		//alert(msg);
		$('#aqui').html(msg);
		}
    });
}


function closeAlert(){
 $('#alerta').fadeOut().delay(1000).remove();
}

function confirma(este){
$('#borrarBoton').hide();
este=este.toLowerCase();

if(este=="eliminar"){
$('#borrarBoton').fadeIn();
}

}