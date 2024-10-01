$(document).ready(function() {

 menuResMuestra();
animando();
	$(window).scroll( function(){
		animando();
		 
		});
 



	$(window).resize( function(){
		menuResMuestra();
		 
		});
 

		
});




$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
function animando(){    
var ancho=$(window).width();

//precarga las imagenes

$('.fondosLoad').each( function(i){
var bottom_of_object = $(this).offset().top + ($(this).outerHeight())/3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            

            if( bottom_of_window > bottom_of_object ){
			var surce=$(this).data('bg');
			if(ancho<=600){
			surce=$(this).data('bgm');
			}
			
			$(this).css('background-image', 'url(' + surce + ')');
			$(this).removeClass('fondosLoad');
			}

});


$('.imagenesLoad').each( function(i){
var bottom_of_object = $(this).offset().top + ($(this).outerHeight())/3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            

            if( bottom_of_window > bottom_of_object ){
			var surce=$(this).data('src');
			if(ancho<=600){
			surce=$(this).data('srcm');
			}
			
			$(this).attr("src",surce);
			$(this).removeClass('imagenesLoad');
			}
			
			//console.log('aa')

});


$('.animacion').each( function(i){



            var bottom_of_object = $(this).offset().top + ($(this).outerHeight())/3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            

            if( bottom_of_window > bottom_of_object ){
                
		var queAnimo=$(this).data("animacion");	
		
		var imags=$(this).find('img');
		var surce=$(imags).data('src');
		var ocultoMovil=$(imags).data('ocultomovil');	
		var muestraImg=1;
		if(ocultoMovil==1 && ancho<600){
		muestraImg=0;
		}
		
		if(muestraImg==1){$(imags).attr("src",surce);}
		
	$(this).animateCss(queAnimo);		
	$(this).removeClass('animacion');

				
              
                    
            }
            
        }); 
        }
 


//telefono
$(function(){

 $(document).on('click', '.close', function(){
 $('#alerta').fadeOut().remove();
 closeAlert(); 
})

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

//botones scroll    
      $(".inversionBoton").click(function(e){
   $("html, body").animate({ scrollTop: $('.tituloInversion').offset().top-100 }, 1000);
      });
           $(".planBoton").click(function(e){
   $("html, body").animate({ scrollTop: $('.tituloPlan').offset().top-100 }, 1000);
      });
    
});

function abre(cual){
var flecha=$('#flecha_'+cual).html();
$('#'+cual+'Div').slideToggle();
var pon="add"
if(flecha=="add"){pon="remove";}
$('#flecha_'+cual).html(pon);
}



function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validaTelefono(telefonon){
var re =/^[0-9]{2}\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}$/;
return re.test(telefonon);
}

/* el menu */
function menuResMuestra(){
 
}


function validaForma(cual){		
var puedo="";
$( ".f"+cual+"requerido" ).each(function( index ) {

$(this).css('borderColor','#CCC');

  esteid=(this.id);
  vals=$(this).val();
  tipon=$(this).data('tipo');
  
  if(tipon=="email" || tipon=="correo"){
  if(validateEmail(vals)!=true){vals="";}
  }
  
  if(tipon=="telefono" || tipon=="phone" || tipon=="celular"){
  if(validaTelefono(vals)!=true){vals="";}
  }
  //console.log(esteid+' '+vals)
  if(vals==""){
   	puedo="no";
    $(this).css('borderColor','#F00').delay(1000).animate({borderColor:'#CCC'});
  }
});
if(puedo=="no"){return false;} else {return true;}
}


function enviarForma(cual){
	
	

	
	
  if(validaForma(cual)==true){
 
var posis=$('#posicion'+cual).val();
if(posis=="1"){posis="DT";}
if(!posis){posis="Footer";}

window.dataLayer = window.dataLayer || [];  
dataLayer.push(
 {
'event': 'formulario-contacto',
'nivel': $('#'+cual+'_nivel').val(),
'programa': $('#'+cual+'_programa').val(),
'ubicación': posis,
'pagina': $('#vengo'+cual).val(),
 });

console.log(posis);
$('#forma'+cual).submit();
creaAlerta();
$('#alerta').append( '<div class="clear20"></div><div class="tituloSeccion tintoUag centrado">GRACIAS</div>');
 $('#alerta').append( '<div class="centrado padd10">Tus datos fueron enviados exitosamente.</div>');

	
	document.getElementById('forma'+cual).reset();  
	  
  }
}




function closeAlert(){
	 //$('.mensaje').fadeOut();
	 
	  $('.alerta').fadeOut().remove();
  }
  
$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        $('.alerta').fadeOut().remove();
	   closeAlert();
    }
});

function signup(p){
 $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/creaUsuario",
    data: "pr="+p,
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


function miInformacion(){
 $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/miInformacion",
    data: "",
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


function descarga(cual,quien){

if(!quien){
$('#descargaAviso').fadeIn();
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/descargaSin",
    data: "d="+cual,
    success: 
		function(msg){
		//alert(msg)
		}
    });
}else {
top.location.href="/_sitio/miCuenta/descarga?d="+cual;
}
	
}


function miSes(){
 $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/sesiones",
    data: "",
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


function miAvatar(){
 $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/avatar",
    data: "",
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}

function miPassw(){
 $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/passwd",
    data: "",
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


 function cierraSes (){
 if (confirm("¿Deseas cerrar seión?")) {
 top.location.href="/_sitio/miCuenta/cerrarSesion";
} else {
  }
 }

function favorito(p){
	$.ajax({
    type: "POST",
    url: "/herramientaLike",
    data: "pr="+p,
    success: 
		function(msg){
		$('#corazonMelon').html(msg);
		}
    });
	
}
function comenta(p,co){
var te=$('#comentar'+co).val();
if(te.length>3){
$('.load').show();
$('.botonEnviar').hide();
	$.ajax({
    type: "POST",
    url: "/herramientaComentario",
    data: "pr="+p+"&co="+co+"&t="+te,
    success: 
		function(msg){
		$('#comentar'+co).val('');
		
		if(!co){		$('#comentones').html(msg);}
		if(co){		$('#com'+co).html(msg);}
		
		
		$('.load').hide();
$('.botonEnviar').show();
		
		}
    });
	} else {
	$('#comentar'+co).css('border','1px solid red');
	 setTimeout(function(){ $('#comentar'+co).css('border','1px solid transparent'); }, 1000);
	}
}

function favoritoB(p){
	$.ajax({
    type: "POST",
    url: "/blogLike",
    data: "pr="+p,
    success: 
		function(msg){
		$('#corazonMelon').html(msg);
		}
    });
	
}

function  expRedes(exp,red,liga){
	$.ajax({
    type: "POST",
   url: "/_sitio/procesos/expertoRed",
    data: "exp="+exp+"&red="+red,
    success: 
		function(msg){
		//alert(msg);
		}
    });
  window.open(liga,'_blank');
}

function comentaB(p,co){
var te=$('#comentar'+co).val();
if(te.length>3){
$('.load').show();
$('.botonEnviar').hide();
	$.ajax({
    type: "POST",
    url: "/blogComentario",
    data: "pr="+p+"&co="+co+"&t="+te,
    success: 
		function(msg){
		$('#comentar'+co).val('');
		
		if(!co){		$('#comentones').html(msg);}
		if(co){		$('#com'+co).html(msg);}
				
		$('.load').hide();
$('.botonEnviar').show();
		}
    });
	} else {
	$('#comentar'+co).css('border','1px solid red');
	 setTimeout(function(){ $('#comentar'+co).css('border','1px solid transparent'); }, 1000);
	}
}



function login(p){
  $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/loginUsuario",
    data: "pr="+p,
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


function forgot(u,c){
  $('.alerta').fadeOut().remove();
 $('body').prepend('<div id="alerta" class="alerta"></div>');
 $('#alerta').prepend('<div id="alertaBox" class="alertaBox"></div>');
 
	
		$.ajax({
    type: "POST",
    url: "/recuperar",
    data: "u="+u+"&c="+c,
    success: 
		function(msg){
		$('#alertaBox').html(msg);
		$('#alerta').fadeIn();
		}
    });
	
}


function olvidon(p){

	
		$.ajax({
    type: "POST",
    url: "/olvide",
    data: "pr="+p,
    success: 
		function(msg){
		$('#alertaBox').html(msg);
 
		}
    });
	
}

function buscaP(cual){
 
		$.ajax({
    type: "POST",
    url: "/_sitio/miCuenta/buscaPassw",
    data: "cual="+cual,
    success: 
		function(msg){
		$('#creaCuentaResultado').html(msg);
		
		}
    });
	 
	
}

function buscaCorreo(cual,que){
  if(validateEmail(cual)==true){
		$.ajax({
    type: "POST",
    url: "/loginEmail",
    data: "e="+cual+"&q="+que,
    success: 
		function(msg){
		$('#aqui').html(msg);
		
		}
    });
	}else {
	
	$('#emailNo').html('El correo no es válido').fadeIn().delay(2000).fadeOut();
	$('#email').val('');
	}
	
}