<? header("Content-Type: text/javascript");
if ($fasd==433){?><script><? }?>
<? /*
function buscaContra(){var a=$("#bucaPass").val();""!=a&&$.ajax({type:"POST",url:"buscaPass.php",data:"nueva="+a,success:function(a){$("#sub").html(a)}})}jQuery.ajaxSetup({beforeSend:function(){$("#load").show(),$("#sub").hide(),$("#botonEnviar").hide()},complete:function(){$("#load").hide(),$("#sub").show(),$("#botonEnviar").show()},success:function(){}}),$(function(){jQuery("#forma").validationEngine();var a={target:"#sub"};$("#forma").ajaxForm(a)});
*/ ?>
jQuery.ajaxSetup({
  beforeSend: function() {
  $('#load').show();
   $('#sub').hide();
    $('#botonEnviar').hide();
  },
  complete: function(){
  $('#load').hide();
   $('#sub').show();
   $('#botonEnviar').show();
  },
  success: function() {}
		});
		
$(function() {
 
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
		
function buscaContra(){
	
	var pass=$('#bucaPass').val();
	
	if(pass!=""){
	$.ajax({
    type: "POST",
    url: "buscaPass.php",
    data: "nuevaC="+pass,
    success: 
    function(msg){
	$("#sub").html(msg);
 	 }
     	 });
         	}	
}
$(function() {
var optionss = { 
        target: '#sub'
       			}; 	
 $('#forma').ajaxForm(optionss);
 
 })
function contras(cual){
	
	var una=$('#pass1').val();
	var dos=$('#pass2').val();
	
	if(una!=dos){
	 
	$('#pass2').val('');
	}
	 
	
}
<? if ($fasd==433){?></script><? }?>