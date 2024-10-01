function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}

 
$(function() {
 
guardado();
	//forma
			
// ajax			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('.load').show();
	$('input[type="submit"]').prop('disabled', true);
  },

  complete: function(){

  $('.load').hide();
	$('input[type="submit"]').prop('disabled', false);
  },

  success: function() {}
});
//ajax


 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
});


$(document).on("change", "#correo", function() {
 if (validateEmail(this.value)) {
	 $.ajax({
    type: "POST",
    url: "emailBusca.php",
    data: "correo="+this.value,
    success: 
    function(msg){
	 $("#mailRespuesta").html(msg);
 	 }
     	 });
		 
	 }
})


function mataAdmin(e,v){
	closeAlert();
	 $('.load').show();
	$.ajax({
    type: "POST",
    url: "/_usuarios/adminsAdd/adminesMata.php",
    data: "empresa="+e+"&mata="+v,
    success: 
    function(msg){
	 $("#aqui").html(msg);
 	 }
     	 });
         	}

 
 function alertaBorra(ev,v,t){
	 
	 $('body').prepend('<div id="alerta" class="alerta"></div>');
	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
	 var apenda=' <div class="close" onClick="closeAlert(); return false;">X</div> '+
	 '<div class="alertaBoxTitulo" >¿Desea eliminar a \"'+t+'\" de administrador? <br>Esta acción no se puede deshacer</div>'+
	 '<div class="clear30"></div>'+
	 '<div class="botonesCancelar"  onClick="closeAlert(); return false;">Cancelar</div>'+
	 '<div class="botonesRojo right" onClick="mataAdmin(\''+ev+'\',\''+v+'\'); return false;">Borrar usuario</div>';
	 $('#alertaBox').append(apenda);
	 
 }
 	
	function closeAlert(){
  
	 $('#alerta').fadeOut().remove();
  }


$(function() {		
		$("#tablesorter").DataTable( {
    responsive: true
} );
	
 });
 	
 function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}