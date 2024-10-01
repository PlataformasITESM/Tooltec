$(function() {
jQuery.ajaxSetup({
  beforeSend: function() {
  
  $('.load').show();
  $('.botonEnviar ').hide();
  },
  complete: function(){
	  
  },
  success: function() {}
  })
  
  
jQuery("#formaC").validationEngine({ autoHidePrompt: true,autoHideDelay: 2000,fadeDuration: 0.3});
var optionss = { 
        target: '#aqui',
		success: function(){
		 }	
 			}; 	
$('#formaC').ajaxForm(optionss);

});


//telefono
$(function(){
 $(".telefono").keydown(function (e) {
 
	
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
  
				
				
				 
				 return;
				 
				
		

        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
 
    $(".telefono").blur(function(e){
	 var text = this.value.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, "$1 $2 $3 $4 $5");
		var text2=	text.substring(0, 14); 
     $(this).val(text2); 
 
    });  
	
	$(".telefono").keyup(function(e){
	 var text = this.value.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, "$1 $2 $3 $4 $5");
		var text2=	text.substring(0, 14); 
     $(this).val(text2); 
 
    });    
});

function news(){
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

var cor=$('#correoN').val();
var url=$('#urlas').val();
var ses=$('#ses').val();
var idRegistro=$('#idRegistro').val();
if(cor.match(re)) {
	$.ajax({
type: "POST",
url: url+"/_sitio/formaProcesar.php",
data: "contra=&ses="+ses+"&idRegistro="+idRegistro+"&correo="+cor,
success: 
function(msg){
$('.load').hide();
$('#graciasNius').html('Gracias por su registro');
$('#nius').html('<div class="clear50"></div>')
} });
}

}

