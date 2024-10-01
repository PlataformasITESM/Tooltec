
  function addEstilo(cual){

	closeAlert();
	var newFolder =$('#newFolder').val();
	 $('body').prepend('<div id="alerta" class="alerta"></div>');
	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
	 var apenda=' <div class="close" onClick="closeAlert(); return false;">X</div> '+
	 '<div class="alertaBoxTitulo" >Agregar Estilo</div>'+
	  '<div class="clear10"></div>'+
	 '<div class="clear30"></div>'+
	 '<input id="nombreEstilo"  class="field noEspacio" type="text" placeholder="Nombre">'+
	 '<div class="clear30"></div>'+
	  '<div id="contraAqui">'+
	  '<div class="botonesCancelar"  onClick="closeAlert(); return false;">Cancelar</div>'+
	   '<div class="botonesOk"  onClick="addEstiloDo(); return false;">OK</div>'+
	  '</div>';
 
	
	 $('#alertaBox').append(apenda);
	
	$('#nombreEstilo').focus();
	
  }

  
  function addEstiloDo() {

	  var folder=$('#nombreEstilo').val( );
	  if(folder!=""){
			$.ajax({
			type: "POST",
			url: "estilosAdd.php",
			data: "es="+folder,
			success: 
			function(msg){
			$("#folderes").html(msg);
			closeAlert();
			} });
	  }
else{
		  
		  $('#nombreEstilo').css('border', '#990000 solid 1px');  
			setTimeout(function(){ $('#nombreEstilo').css("border", "");}, 1000);
	  }
	  
	  
		}

function closeAlert(){

$('#alerta').fadeOut().remove();
}