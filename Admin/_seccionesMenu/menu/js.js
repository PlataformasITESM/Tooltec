$(function() {
  $( "#losElementos" ).sortable({
			 
     	  handle: '.mueve',
		 cursor: 'move',
		   placeholder: 'placeholder',
	     update : function(event, ui){
         var orden=$('#losElementos').sortable('toArray').toString();
		  $('#orden').val(orden);
		   $("#botonReacomodo").fadeIn();
		 
		  
        }
		
		
		});
});


	
function reacomodoEnvia(){

	$('#botonReacomodo').hide();
	
	var ordensito=$('#orden').val();
	$.ajax({
    type: "POST",
    url: "reacomodoEnvia.php",
    data: "orden="+ordensito,
    success: 
    function(msg){
$("#aqui").html(msg);
 
 	 }
     	 });

}

function abre(cual){
	
	$('#losElementos'+cual).slideToggle();
	
	if ($('#losElementos'+cual).is(':visible')) {
		$('#flecha'+cual).html('keyboard_arrow_up');
	}
	else {$('#flecha'+cual).html('keyboard_arrow_down');}
	
	
}

$(document).on("click", ".close", function() {
	 closeAlert(); 
})


function closeAlert(){
	 $('.mensaje').fadeOut();
	  $('#alerta').fadeOut().remove();
  }
  
$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       closeAlert();
    }
});


function alertaBorraMenu(e,v){
	 
	 $('body').prepend('<div id="alerta" class="alerta"></div>');
	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
	
	 
	 $.ajax({
    type: "POST",
    url: "menuMata.php",
    data: "empresa="+e+"&mata="+v,
    success: 
    function(msg){
	 $("#alertaBox").html(msg);
	 $('.load').hide();
 	 }
     	 });
	 
	 
 }
 
 function alertaBorraMenuMenu(e,v){
	 
	 $('body').prepend('<div id="alerta" class="alerta"></div>');
	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
	
	 
	 $.ajax({
    type: "POST",
    url: "menuMenuMata.php",
    data: "empresa="+e+"&mata="+v,
    success: 
    function(msg){
	 $("#alertaBox").html(msg);
	 $('.load').hide();
 	 }
     	 });
	 
	 
 }
  
$(function() {		
		$("#tablesorter").DataTable( );
	
 });
