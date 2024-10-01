function goToDiv(cual, offset, orden){

var altoHead=$('#headerSiempre').height();
var arribaBN=$(document).scrollTop()+altoHead;
var mueve=  altoHead+arribaBN
console.log(mueve)
 
     $("html, body").animate({ scrollTop: $('#'+cual).offset().top -offset }, 500);  
}

 
$(document).ready(function() {

 
 
		
		

});



function creaAlerta(){
 $('body').prepend('<div id="alertaBg" class="alertaBg"></div>');
	 $('#alertaBg').prepend('<div id="alerta" class="alerta"></div>');
	 var apenda=' <div class="close" onClick="closeAlert(); return false;">X</div>';
	 $('#alerta').append(apenda);
	$('#alertaBg').fadeIn();
	}

function closeAlert(){
	 $('.load').hide()
	  $('.botonEnviar').show()
  $('#elemento_igSob4').appendTo('#formaFooterOriginal');
    $('#formaXfj9d8fGD5 .div50').addClass('formaO div25').removeClass('div50');
$('#headerSiempre').append( $('.formaFooter'));
 $('.formaFooter').addClass('displayNone');
 $('#alertaBg').fadeOut().remove();
 $(".formaPosicion").val("")
	
  }
		
$(document).ready(function() {
//close alert
$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       closeAlert();
    }
});
$('html').click(function() {
  //closeAlert();
});
$('#alertaBox, .alerta, .borra, .eliminas, .mails, .alertaB, .alertaBoxContenido').click(function(event){
    event.stopPropagation();
});
});


function altoEventos(){
    var altoEve=0;
    
    $( ".eventosCont" ).each(function() {
    
    var esteAlto=$(this).height();
    if(esteAlto>altoEve){altoEve=esteAlto;}
    });
    
    $('.eventosCont').height(altoEve);
 

}