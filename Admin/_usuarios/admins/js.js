function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}

 
$(function() {
	$('#tablesorter').fadeIn();
 
guardado();

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

function eliminarU(usuario){
	
	$('#linea'+usuario).hide();
	$.ajax({
    type: "POST",
    url: "usuariosMata.php",
    data: "mata="+usuario,
    success: 
    function(msg){
	//$("#sub").html(msg);
 	 }
     	 });
         	}


$(function() {		
		$("#tablesorter").DataTable( {
    responsive: true
} );
	
 });
 	
 