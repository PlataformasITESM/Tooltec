<? 
header("Content-Type: text/javascript");
include_once "../sesion/arriba.php";
if ($fasd==433){?><script><? }?>

function guardado(){1==localStorage.guardado&&$("#guardado").animate({opacity:1,top:"30px"},"medium").delay(1e3).animate({opacity:0,top:"-100px"},"medium"),localStorage.removeItem("guardado")}$(function(){guardado(),jQuery.ajaxSetup({beforeSend:function(){$("#load").show(),$("#sub").hide(),$(".botonEnviar").hide()},complete:function(){$("#load").hide(),$("#sub").show(),$(".botonEnviar").show()},success:function(){}}),$("#forma").validationEngine({autoHidePrompt:!0,autoHideDelay:3e3,fadeDuration:.3});var a={target:"#sub",success:function(){$("#forma").clearForm()}};$("#forma").ajaxForm(a),$("#tablesorter").tablesorter({headers:{},widgets:["zebra"]})});
<? /*
function guardado(){

	if(localStorage.guardado==1){
	
	
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');

	
	
	}

	localStorage.removeItem("guardado");
}

$(function() {

  guardado();
			
			//forma
			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('#load').show();
   $('#sub').hide();
  
  $('.botonEnviar').hide();
  },

  complete: function(){

  $('#load').hide();
   $('#sub').show();
   
  $('.botonEnviar').show(); 
  },

  success: function() {}
		});


	  
$("#forma").validationEngine({autoHidePrompt: true,autoHideDelay: 3000,fadeDuration: 0.3}); 
 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 


		$("#tablesorter").tablesorter({
			headers: {

    		}, 
		widgets: ['zebra']});
	});	
	
	

*/ ?>
 


<? if ($fasd==433){?></script><? }?>