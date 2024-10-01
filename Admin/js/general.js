

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
var e = getUrlParameter('e');
function closeAlert(){
	 $('#alerta').fadeOut().html('');
	 $('.contenido').css('filter',''); 
  }
		
function closeAlertR(){
	 $('#alertaR').fadeOut().html('');
	 $('.contenido').css('filter',''); 
 }
		
function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "50%" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}


$(document).ready(function() {
//close alert





$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       closeAlert();
    }
});
$('html').click(function() {
  closeAlert();
});
$('#alertaBox, .borra, .eliminas, .alertaB, .alertaBoxContenido').click(function(event){
    event.stopPropagation();
});
//
//no espacios
$('.clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});
$('.noEspacio').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});
	//
guardado();
jQuery.ajaxSetup({
  beforeSend: function() {
 $('.load').show();
$('#forma').children().prop('disabled',true);
 $('.botonEnviar').hide();
  },
  complete: function(){
 $('.botonEnviar').show();
$('#forma').children().prop('disabled',false);
  $('.load').hide();
   },
  success: function() {}
		});
 
$("#forma").validationEngine({autoHidePrompt: true,autoHideDelay: 3000,fadeDuration: 0.3, validateNonVisibleFields: true, 
           prettySelect : true,
           useSuffix: "_chosen"}); 
 var optionss = { 
		        target:        '#aqui', 
				
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
//
	
 $('.entero').number( true, 0 );
 $('.decimal').number( true, 2 );
 $('.decimalTres').number( true, 2 );
        $('.menuIcono').click(function(){
		 	
			$('.menuEspacio').width('300px');	
		});
		
		$(window).click(function() {
	$('.menuEspacio').width('0');	
	});
$('.menuEspacio, .menuIcono').click(function(event){
    event.stopPropagation();
});
		
		
		 $('.cierraMenu').click(function(){
		 	
			$('.menuEspacio').width('0');	
		});
		
		
		       
        $('.menu, .menuP').click(function(){
        
          var clase=$('#'+this.id).attr('class');
          var pon='menu';
          var quita='menuP'; 
          if(clase=='menu'){pon='menuP'; quita='menu'; flecha="ic_keyboard_arrow_down"; } 
          if(clase=='menuP'){pon='menu'; quita='menuP'; flecha="ic_keyboard_arrow_left";} 
		  $('#'+this.id).find('.flecha').html(flecha);
		  $('#'+this.id).removeClass(quita).addClass(pon);
          $('#menu_'+this.id).slideToggle();
        
         }); 
		 
		 }); 
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
 dayNamesShort: ['Dom','Lun','Mar','MiÃ©','Juv','Vie','SÃ¡b'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','SÃ¡'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$(".fecha").datepicker({ minDate: 0,});
});




function aleatorio()
{
    var text = "";
	var possible2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
 text += possible2.charAt(Math.floor(Math.random() * possible.length));
    for( var i=0; i < 5; i++ ){
        text += possible.charAt(Math.floor(Math.random() * possible.length));
}
    return text;
}
$(document).on('click', '.decimal', function(){ $(this).select(); }); 
$(document).on('click', '.entero', function(){ $(this).select(); }); 
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


	
	//muestra imagen en el campo
function muestraImg(input,cual) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#'+cual).attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


 /* fotos */

function deleteFoto(cual,borra){

if(borra=="del"){
$('#'+cual).addClass('fotinesBorra').removeClass('fotines');
}else{
$('#'+cual).addClass('fotines').removeClass('fotinesBorra');
}

var borrados=[];
$('#borrados').val('')
$( ".fotinesBorra" ).each(function() {
borrados.push(this.id);
})
$('#borrados').val(borrados.join(','))


}