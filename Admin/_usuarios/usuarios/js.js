function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}

 
$(function() {
	$('#tablesorter').fadeIn(); 
guardado();
	//forma
			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('.load').show();
   $('#sub').hide();
  
  $('.botonEnviar').hide();
  },

  complete: function(){

  $('.load').hide();
   $('#sub').show();
   
  },

  success: function() {}
		});


 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
});

function eliminarV(usuario){
	
	$('#linea'+usuario).hide();
	$.ajax({
    type: "POST",
    url: "/sys/_usuarios/usuarios/vendedorMata.php",
    data: "mata="+usuario,
    success: 
    function(msg){
	$("#sub").html(msg);
 	 }
     	 });
         	}



$(function() {		
		$("#tablesorter").DataTable( {
    responsive: true
} );
	
 });
 	
 